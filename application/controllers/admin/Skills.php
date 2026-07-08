<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skills extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Skill_model');
    }

    public function index()
    {
        $this->render('skills/index', array(
            'page_title' => 'Skills',
            'items'      => $this->Skill_model->all(),
        ), 'skills');
    }

    public function form($id = NULL)
    {
        $this->render('skills/form', array(
            'page_title' => $id ? 'Edit Skill' : 'Add Skill',
            'item'       => $id ? $this->Skill_model->find($id) : NULL,
        ), 'skills');
    }

    public function save()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required');
        if ($this->form_validation->run() === FALSE)
        {
            return $this->form($id ?: NULL);
        }

        $data = array(
            'name'       => $this->input->post('name', TRUE),
            'category'   => $this->input->post('category', TRUE),
            'icon'       => $this->input->post('icon', TRUE),
            'percentage' => (int) $this->input->post('percentage'),
            'color'      => $this->input->post('color', TRUE),
            'sort_order' => (int) $this->input->post('sort_order'),
        );

        if ($id) { $this->Skill_model->update($id, $data); $msg = 'Skill updated.'; }
        else     { $this->Skill_model->insert($data);     $msg = 'Skill added.'; }

        $this->session->set_flashdata('success', $msg);
        redirect('admin/skills');
    }

    public function delete($id)
    {
        $this->Skill_model->delete($id);
        $this->session->set_flashdata('success', 'Skill deleted.');
        redirect('admin/skills');
    }
}
