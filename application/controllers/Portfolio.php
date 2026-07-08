<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Portfolio_model');
    }

    public function detail($slug)
    {
        $project = $this->Portfolio_model->by_slug($slug);
        if ( ! $project || $project['status'] !== 'Published')
        {
            show_404();
        }

        $this->Portfolio_model->increment_views($project['id']);

        $data = array(
            'project'    => $project,
            'gallery'    => $this->Portfolio_model->images($project['id']),
            'related'    => array_slice($this->Portfolio_model->published(), 0, 3),
            'page_title' => $project['meta_title'] ?: $project['title'],
        );

        $this->load->view('portfolio/detail', $data);
    }
}
