<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    public function index()
    {
        if ($this->input->method() === 'post')
        {
            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            $this->form_validation->set_rules('email', 'Email', 'trim|valid_email');

            if ($this->form_validation->run())
            {
                $current = $this->Profile_model->get();
                $data = array(
                    'name'      => $this->input->post('name', TRUE),
                    'title'     => $this->input->post('title', TRUE),
                    'bio'       => $this->input->post('bio', TRUE),
                    'email'     => $this->input->post('email', TRUE),
                    'phone'     => $this->input->post('phone', TRUE),
                    'address'   => $this->input->post('address', TRUE),
                    'birthday'  => $this->input->post('birthday') ?: NULL,
                    'freelance' => $this->input->post('freelance', TRUE),
                    'linkedin'  => $this->input->post('linkedin', TRUE),
                    'github'    => $this->input->post('github', TRUE),
                    'instagram' => $this->input->post('instagram', TRUE),
                    'facebook'  => $this->input->post('facebook', TRUE),
                    'twitter'   => $this->input->post('twitter', TRUE),
                    'youtube'   => $this->input->post('youtube', TRUE),
                    'website'   => $this->input->post('website', TRUE),
                );

                if ($photo = handle_upload('photo', 'profile'))
                {
                    if ($current && $current['photo']) delete_upload('profile', $current['photo']);
                    $data['photo'] = $photo;
                }

                $this->Profile_model->save($data);
                $this->session->set_flashdata('success', 'Profile updated successfully.');
                redirect('admin/profile');
            }
        }

        $this->render('profile/index', array(
            'page_title' => 'Profile',
            'profile'    => $this->Profile_model->get(),
        ), 'profile');
    }
}
