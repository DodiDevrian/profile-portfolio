<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function login()
    {
        if ($this->session->userdata('logged_in'))
        {
            redirect('admin');
        }

        if ($this->input->method() === 'post')
        {
            $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run())
            {
                $user = $this->User_model->verify(
                    $this->input->post('email', TRUE),
                    $this->input->post('password')
                );

                if ($user)
                {
                    $this->session->set_userdata(array(
                        'logged_in'   => TRUE,
                        'user_id'     => $user['id'],
                        'user_name'   => $user['name'],
                        'user_email'  => $user['email'],
                        'user_avatar' => $user['avatar'],
                    ));

                    if ($this->input->post('remember'))
                    {
                        // Extend the cookie lifetime handled by session config; flag only.
                        $this->session->set_userdata('remember', TRUE);
                    }

                    $this->session->set_flashdata('success', 'Welcome back, ' . $user['name'] . '!');
                    redirect('admin');
                }

                $this->session->set_flashdata('error', 'Invalid email or password.');
                redirect('login');
            }
        }

        $this->load->view('auth/login', array('page_title' => 'Sign In'));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }

    public function forgot()
    {
        // Minimal stub: capture the email and show a confirmation.
        if ($this->input->method() === 'post')
        {
            $this->session->set_flashdata('success',
                'If that email exists, a reset link has been sent.');
            redirect('login');
        }
        $this->load->view('auth/forgot', array('page_title' => 'Forgot Password'));
    }
}
