<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Profile_model');
    }

    public function index()
    {
        if ($this->input->method() === 'post')
        {
            $profile = $this->Profile_model->get();
            if ($pdf = handle_upload('resume', 'resume', 'pdf'))
            {
                if ($profile && $profile['resume']) delete_upload('resume', $profile['resume']);
                $this->Profile_model->save(array('resume' => $pdf));
                $this->session->set_flashdata('success', 'Resume uploaded.');
            }
            else
            {
                $this->session->set_flashdata('error', 'Please choose a valid PDF file.');
            }
            redirect('admin/resume');
        }

        $this->render('resume/index', array(
            'page_title' => 'Resume',
            'profile'    => $this->Profile_model->get(),
        ), 'resume');
    }

    public function delete()
    {
        $profile = $this->Profile_model->get();
        if ($profile && $profile['resume'])
        {
            delete_upload('resume', $profile['resume']);
            $this->Profile_model->save(array('resume' => NULL));
        }
        $this->session->set_flashdata('success', 'Resume removed.');
        redirect('admin/resume');
    }
}
