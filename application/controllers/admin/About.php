<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('About_model');
    }

    public function index()
    {
        if ($this->input->method() === 'post')
        {
            $current = $this->About_model->get();
            $data = array(
                'description'      => $this->input->post('description', TRUE),
                'age'             => $this->input->post('age') ?: NULL,
                'domicile'        => $this->input->post('domicile', TRUE),
                'email'           => $this->input->post('email', TRUE),
                'phone'           => $this->input->post('phone', TRUE),
                'freelance'       => $this->input->post('freelance', TRUE),
                'experience_years'=> $this->input->post('experience_years') ?: 0,
                'projects_done'   => $this->input->post('projects_done') ?: 0,
                'happy_clients'   => $this->input->post('happy_clients') ?: 0,
            );
            if ($photo = handle_upload('photo', 'profile'))
            {
                if ($current && $current['photo']) delete_upload('profile', $current['photo']);
                $data['photo'] = $photo;
            }
            $this->About_model->save($data);
            $this->session->set_flashdata('success', 'About section updated.');
            redirect('admin/about');
        }

        $this->render('about/index', array(
            'page_title' => 'About',
            'about'      => $this->About_model->get(),
        ), 'about');
    }
}
