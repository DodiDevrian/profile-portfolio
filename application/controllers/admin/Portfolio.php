<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Portfolio_model');
    }

    public function index()
    {
        $this->render('portfolio/index', array(
            'page_title' => 'Portfolio',
            'items'      => $this->Portfolio_model->all(),
        ), 'portfolio');
    }

    public function form($id = NULL)
    {
        $this->render('portfolio/form', array(
            'page_title' => $id ? 'Edit Project' : 'Add Project',
            'item'       => $id ? $this->Portfolio_model->find($id) : NULL,
            'gallery'    => $id ? $this->Portfolio_model->images($id) : array(),
        ), 'portfolio');
    }

    public function save()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        if ($this->form_validation->run() === FALSE)
        {
            return $this->form($id ?: NULL);
        }

        $current = $id ? $this->Portfolio_model->find($id) : NULL;

        // Build a unique slug.
        $slug = $this->input->post('slug', TRUE);
        $slug = slugify($slug ?: $this->input->post('title', TRUE));
        $slug = $this->unique_slug($slug, $id);

        $data = array(
            'title'            => $this->input->post('title', TRUE),
            'slug'             => $slug,
            'category'         => $this->input->post('category', TRUE),
            'description'      => $this->input->post('description', TRUE),
            'technology'       => $this->input->post('technology', TRUE),
            'github_url'       => $this->input->post('github_url', TRUE),
            'demo_url'         => $this->input->post('demo_url', TRUE),
            'status'           => $this->input->post('status', TRUE),
            'featured'         => $this->input->post('featured') ? 1 : 0,
            'meta_title'       => $this->input->post('meta_title', TRUE),
            'meta_description' => $this->input->post('meta_description', TRUE),
            'sort_order'       => (int) $this->input->post('sort_order'),
        );

        if ($thumb = handle_upload('thumbnail', 'portfolio')) {
            if ($current && $current['thumbnail']) delete_upload('portfolio', $current['thumbnail']);
            $data['thumbnail'] = $thumb;
        }

        if ($id) {
            $this->Portfolio_model->update($id, $data);
        } else {
            $id = $this->Portfolio_model->insert($data);
        }

        // Gallery images (multiple).
        if ( ! empty($_FILES['gallery']['name'][0]))
        {
            $files = $_FILES['gallery'];
            $count = count($files['name']);
            for ($i = 0; $i < $count; $i++)
            {
                if ($files['error'][$i] !== 0) continue;
                $_FILES['gallery_one'] = array(
                    'name'     => $files['name'][$i],
                    'type'     => $files['type'][$i],
                    'tmp_name' => $files['tmp_name'][$i],
                    'error'    => $files['error'][$i],
                    'size'     => $files['size'][$i],
                );
                if ($img = handle_upload('gallery_one', 'portfolio'))
                {
                    $this->Portfolio_model->add_image($id, $img);
                }
            }
        }

        $this->session->set_flashdata('success', 'Project saved.');
        redirect('admin/portfolio');
    }

    public function delete($id)
    {
        if ($item = $this->Portfolio_model->find($id))
        {
            delete_upload('portfolio', $item['thumbnail']);
            foreach ($this->Portfolio_model->images($id) as $img)
            {
                delete_upload('portfolio', $img['image']);
            }
        }
        $this->Portfolio_model->delete($id); // cascades gallery rows
        $this->session->set_flashdata('success', 'Project deleted.');
        redirect('admin/portfolio');
    }

    public function delete_image($image_id, $portfolio_id)
    {
        $this->db->where('id', $image_id);
        $row = $this->db->get('portfolio_images')->row_array();
        if ($row) delete_upload('portfolio', $row['image']);
        $this->Portfolio_model->delete_image($image_id);
        $this->session->set_flashdata('success', 'Image removed.');
        redirect('admin/portfolio/form/' . $portfolio_id);
    }

    private function unique_slug($slug, $ignore_id = NULL)
    {
        $base = $slug; $i = 1;
        while (TRUE)
        {
            $this->db->where('slug', $slug);
            if ($ignore_id) $this->db->where('id !=', $ignore_id);
            if ($this->db->count_all_results('portfolios') == 0) return $slug;
            $slug = $base . '-' . (++$i);
        }
    }
}
