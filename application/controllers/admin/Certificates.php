<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificates extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Certificate_model');
    }

    public function index()
    {
        $this->render('certificates/index', array(
            'page_title' => 'Certificates',
            'items'      => $this->Certificate_model->all(),
        ), 'certificates');
    }

    public function form($id = NULL)
    {
        $this->render('certificates/form', array(
            'page_title' => $id ? 'Edit Certificate' : 'Add Certificate',
            'item'       => $id ? $this->Certificate_model->find($id) : NULL,
        ), 'certificates');
    }

    public function save()
    {
        $id = $this->input->post('id');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        if ($this->form_validation->run() === FALSE)
        {
            return $this->form($id ?: NULL);
        }

        $current = $id ? $this->Certificate_model->find($id) : NULL;
        $data = array(
            'title'          => $this->input->post('title', TRUE),
            'issuer'         => $this->input->post('issuer', TRUE),
            'issue_date'     => $this->input->post('issue_date') ?: NULL,
            'credential_url' => $this->input->post('credential_url', TRUE),
            'sort_order'     => (int) $this->input->post('sort_order'),
        );
        if ($img = handle_upload('image', 'certificates')) {
            if ($current && $current['image']) delete_upload('certificates', $current['image']);
            $data['image'] = $img;
        }

        if ($id) $this->Certificate_model->update($id, $data);
        else     $this->Certificate_model->insert($data);

        $this->session->set_flashdata('success', 'Certificate saved.');
        redirect('admin/certificates');
    }

    public function delete($id)
    {
        if ($item = $this->Certificate_model->find($id)) delete_upload('certificates', $item['image']);
        $this->Certificate_model->delete($id);
        $this->session->set_flashdata('success', 'Certificate deleted.');
        redirect('admin/certificates');
    }
}
