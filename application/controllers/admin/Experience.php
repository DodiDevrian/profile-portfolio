<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Experience extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Experience_model');
    }

    public function index()
    {
        $this->render('experience/index', array(
            'page_title' => 'Experience',
            'items'      => $this->Experience_model->all(),
        ), 'experience');
    }

    public function form($id = NULL)
    {
        $this->render('experience/form', array(
            'page_title' => $id ? 'Edit Experience' : 'Add Experience',
            'item'       => $id ? $this->Experience_model->find($id) : NULL,
        ), 'experience');
    }

    public function save()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('company', 'Company', 'required|trim');
        $this->form_validation->set_rules('position', 'Position', 'required|trim');
        if ($this->form_validation->run() === FALSE)
        {
            return $this->form($id ?: NULL);
        }

        $current = $id ? $this->Experience_model->find($id) : NULL;
        $data = array(
            'company'     => $this->input->post('company', TRUE),
            'position'    => $this->input->post('position', TRUE),
            'start_date'  => $this->input->post('start_date', TRUE),
            'end_date'    => $this->input->post('end_date', TRUE),
            'description' => $this->input->post('description', TRUE),
            'technology'  => $this->input->post('technology', TRUE),
            'sort_order'  => (int) $this->input->post('sort_order'),
        );
        if ($logo = handle_upload('logo', 'experience')) {
            if ($current && $current['logo']) delete_upload('experience', $current['logo']);
            $data['logo'] = $logo;
        }

        if ($id) $this->Experience_model->update($id, $data);
        else     $this->Experience_model->insert($data);

        $this->session->set_flashdata('success', 'Experience saved.');
        redirect('admin/experience');
    }

    public function delete($id)
    {
        if ($item = $this->Experience_model->find($id)) delete_upload('experience', $item['logo']);
        $this->Experience_model->delete($id);
        $this->session->set_flashdata('success', 'Experience deleted.');
        redirect('admin/experience');
    }
}
