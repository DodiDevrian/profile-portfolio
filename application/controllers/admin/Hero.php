<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hero extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hero_model');
    }

    public function index()
    {
        if ($this->input->method() === 'post')
        {
            $this->form_validation->set_rules('title', 'Title', 'required|trim');
            if ($this->form_validation->run())
            {
                $current = $this->Hero_model->get();
                $data = array(
                    'title'                => $this->input->post('title', TRUE),
                    'subtitle'             => $this->input->post('subtitle', TRUE),
                    'description'          => $this->input->post('description', TRUE),
                    'typed_text'           => $this->input->post('typed_text', TRUE),
                    'cta_primary_label'    => $this->input->post('cta_primary_label', TRUE),
                    'cta_secondary_label'  => $this->input->post('cta_secondary_label', TRUE),
                    'animation'            => $this->input->post('animation', TRUE),
                );
                if ($photo = handle_upload('photo', 'profile'))
                {
                    if ($current && $current['photo']) delete_upload('profile', $current['photo']);
                    $data['photo'] = $photo;
                }
                $this->Hero_model->save($data);
                $this->session->set_flashdata('success', 'Hero section updated.');
                redirect('admin/hero');
            }
        }

        $this->render('hero/index', array(
            'page_title' => 'Hero',
            'hero'       => $this->Hero_model->get(),
        ), 'hero');
    }
}
