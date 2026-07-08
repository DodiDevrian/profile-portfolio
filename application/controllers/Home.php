<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'Hero_model', 'About_model', 'Skill_model', 'Experience_model',
            'Education_model', 'Portfolio_model', 'Service_model',
            'Certificate_model', 'Testimonial_model', 'Visitor_model',
        ));
    }

    public function index()
    {
        // Track the visit (once per session).
        $this->Visitor_model->track('home');

        $data = array(
            'hero'         => $this->Hero_model->get(),
            'about'        => $this->About_model->get(),
            'skills'       => $this->Skill_model->grouped(),
            'experiences'  => $this->Experience_model->all(),
            'educations'   => $this->Education_model->all(),
            'portfolios'   => $this->Portfolio_model->published(),
            'categories'   => $this->Portfolio_model->categories(),
            'services'     => $this->Service_model->all(),
            'certificates' => $this->Certificate_model->all(),
            'testimonials' => $this->Testimonial_model->all(),
            'page_title'   => setting('meta_title', 'Portfolio'),
        );

        $this->load->view('home/index', $data);
    }
}
