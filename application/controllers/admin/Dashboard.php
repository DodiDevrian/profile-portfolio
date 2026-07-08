<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
    }

    public function index()
    {
        $data = array(
            'page_title' => 'Dashboard',
            'stats'      => $this->Dashboard_model->stats(),
            'recent'     => $this->Dashboard_model->recent_messages(5),
            'chart'      => $this->Dashboard_model->visitors_last_7days(),
        );
        $this->render('dashboard/index', $data, 'dashboard');
    }
}
