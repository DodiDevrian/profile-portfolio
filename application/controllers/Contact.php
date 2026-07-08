<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Message_model');
    }

    /** AJAX endpoint for the contact form. Returns JSON. */
    public function send()
    {
        $this->output->set_content_type('application/json');

        $this->form_validation->set_rules('name', 'Name', 'required|trim|max_length[120]');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|max_length[200]');
        $this->form_validation->set_rules('message', 'Message', 'required|trim');

        $csrf = array(
            'csrf_name' => $this->security->get_csrf_token_name(),
            'csrf_hash' => $this->security->get_csrf_hash(),
        );

        if ($this->form_validation->run() === FALSE)
        {
            return $this->output->set_status_header(422)->set_output(json_encode(array_merge($csrf, array(
                'status'  => 'error',
                'message' => validation_errors('', ' '),
            ))));
        }

        $this->Message_model->insert(array(
            'name'       => $this->input->post('name', TRUE),
            'email'      => $this->input->post('email', TRUE),
            'subject'    => $this->input->post('subject', TRUE),
            'message'    => $this->input->post('message', TRUE),
            'ip_address' => $this->input->ip_address(),
        ));

        return $this->output->set_output(json_encode(array_merge($csrf, array(
            'status'  => 'success',
            'message' => 'Thank you! Your message has been sent.',
        ))));
    }
}
