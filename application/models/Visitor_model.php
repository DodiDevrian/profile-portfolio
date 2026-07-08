<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visitor_model extends MY_Model {

    protected $table = 'visitors';

    /** Log a page view once per session to avoid inflating counts. */
    public function track($page = '/')
    {
        $CI =& get_instance();
        if ($CI->session->userdata('tracked')) return;

        $this->db->insert($this->table, array(
            'ip_address' => $CI->input->ip_address(),
            'user_agent' => substr((string) $CI->input->user_agent(), 0, 255),
            'page'       => $page,
        ));
        $CI->session->set_userdata('tracked', TRUE);
    }
}
