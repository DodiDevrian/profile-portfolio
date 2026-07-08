<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Service_model');
    }

    public function index()
    {
        $this->render('services/index', array(
            'page_title' => 'Services',
            'items'      => $this->Service_model->all(),
        ), 'services');
    }

    public function form($id = NULL)
    {
        $this->render('services/form', array(
            'page_title' => $id ? 'Edit Service' : 'Add Service',
            'item'       => $id ? $this->Service_model->find($id) : NULL,
        ), 'services');
    }

    public function save()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        if ($this->form_validation->run() === FALSE)
        {
            return $this->form($id ?: NULL);
        }

        $data = array(
            'icon'        => $this->input->post('icon', TRUE),
            'title'       => $this->input->post('title', TRUE),
            'description' => $this->input->post('description', TRUE),
            'sort_order'  => (int) $this->input->post('sort_order'),
        );

        if ($id) $this->Service_model->update($id, $data);
        else     $this->Service_model->insert($data);

        $this->session->set_flashdata('success', 'Service saved.');
        redirect('admin/services');
    }

    public function delete($id)
    {
        $this->Service_model->delete($id);
        $this->session->set_flashdata('success', 'Service deleted.');
        redirect('admin/services');
    }
}
