<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Testimonial_model');
    }

    public function index()
    {
        $this->render('testimonials/index', array(
            'page_title' => 'Testimonials',
            'items'      => $this->Testimonial_model->all(),
        ), 'testimonials');
    }

    public function form($id = NULL)
    {
        $this->render('testimonials/form', array(
            'page_title' => $id ? 'Edit Testimonial' : 'Add Testimonial',
            'item'       => $id ? $this->Testimonial_model->find($id) : NULL,
        ), 'testimonials');
    }

    public function save()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        if ($this->form_validation->run() === FALSE)
        {
            return $this->form($id ?: NULL);
        }

        $current = $id ? $this->Testimonial_model->find($id) : NULL;
        $data = array(
            'name'       => $this->input->post('name', TRUE),
            'position'   => $this->input->post('position', TRUE),
            'message'    => $this->input->post('message', TRUE),
            'rating'     => (int) $this->input->post('rating'),
            'sort_order' => (int) $this->input->post('sort_order'),
        );
        if ($photo = handle_upload('photo', 'testimonials')) {
            if ($current && $current['photo']) delete_upload('testimonials', $current['photo']);
            $data['photo'] = $photo;
        }

        if ($id) $this->Testimonial_model->update($id, $data);
        else     $this->Testimonial_model->insert($data);

        $this->session->set_flashdata('success', 'Testimonial saved.');
        redirect('admin/testimonials');
    }

    public function delete($id)
    {
        if ($item = $this->Testimonial_model->find($id)) delete_upload('testimonials', $item['photo']);
        $this->Testimonial_model->delete($id);
        $this->session->set_flashdata('success', 'Testimonial deleted.');
        redirect('admin/testimonials');
    }
}
