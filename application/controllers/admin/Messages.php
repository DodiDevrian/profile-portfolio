<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Message_model');
    }

    public function index()
    {
        $this->render('messages/index', array(
            'page_title' => 'Messages',
            'items'      => $this->Message_model->all(),
        ), 'messages');
    }

    public function view($id)
    {
        $msg = $this->Message_model->find($id);
        if ( ! $msg) show_404();
        $this->Message_model->mark_read($id);

        $this->render('messages/view', array(
            'page_title' => 'Message',
            'msg'        => $msg,
        ), 'messages');
    }

    public function toggle_reply($id)
    {
        $msg = $this->Message_model->find($id);
        if ($msg) $this->Message_model->update($id, array('is_replied' => $msg['is_replied'] ? 0 : 1));
        $this->session->set_flashdata('success', 'Reply status updated.');
        redirect('admin/messages/view/' . $id);
    }

    public function delete($id)
    {
        $this->Message_model->delete($id);
        $this->session->set_flashdata('success', 'Message deleted.');
        redirect('admin/messages');
    }

    public function export()
    {
        $rows = $this->Message_model->all();
        $this->output->set_content_type('text/csv')
                     ->set_header('Content-Disposition: attachment; filename="messages.csv"');

        $out = fopen('php://output', 'w');
        fputcsv($out, array('ID', 'Name', 'Email', 'Subject', 'Message', 'Read', 'Replied', 'Received'));
        foreach ($rows as $r)
        {
            fputcsv($out, array($r['id'], $r['name'], $r['email'], $r['subject'], $r['message'],
                $r['is_read'] ? 'Yes' : 'No', $r['is_replied'] ? 'Yes' : 'No', $r['created_at']));
        }
        fclose($out);
    }
}
