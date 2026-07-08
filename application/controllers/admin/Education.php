<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Education extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Education_model');
    }

    public function index()
    {
        $this->render('education/index', array(
            'page_title' => 'Education',
            'items'      => $this->Education_model->all(),
        ), 'education');
    }

    public function form($id = NULL)
    {
        $this->render('education/form', array(
            'page_title' => $id ? 'Edit Education' : 'Add Education',
            'item'       => $id ? $this->Education_model->find($id) : NULL,
        ), 'education');
    }

    public function save()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('institution', 'Institution', 'required|trim');
        if ($this->form_validation->run() === FALSE)
        {
            return $this->form($id ?: NULL);
        }

        $current = $id ? $this->Education_model->find($id) : NULL;
        $data = array(
            'institution' => $this->input->post('institution', TRUE),
            'major'       => $this->input->post('major', TRUE),
            'gpa'         => $this->input->post('gpa', TRUE),
            'start_year'  => $this->input->post('start_year', TRUE),
            'end_year'    => $this->input->post('end_year', TRUE),
            'description' => $this->input->post('description', TRUE),
            'sort_order'  => (int) $this->input->post('sort_order'),
        );
        if ($logo = handle_upload('logo', 'education')) {
            if ($current && $current['logo']) delete_upload('education', $current['logo']);
            $data['logo'] = $logo;
        }

        if ($id) $this->Education_model->update($id, $data);
        else     $this->Education_model->insert($data);

        $this->session->set_flashdata('success', 'Education saved.');
        redirect('admin/education');
    }

    public function delete($id)
    {
        if ($item = $this->Education_model->find($id)) delete_upload('education', $item['logo']);
        $this->Education_model->delete($id);
        $this->session->set_flashdata('success', 'Education deleted.');
        redirect('admin/education');
    }
}
