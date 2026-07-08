<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

    public function stats()
    {
        return array(
            'projects'     => $this->db->count_all('portfolios'),
            'skills'       => $this->db->count_all('skills'),
            'certificates' => $this->db->count_all('certificates'),
            'testimonials' => $this->db->count_all('testimonials'),
            'services'     => $this->db->count_all('services'),
            'visitors'     => $this->db->count_all('visitors'),
            'messages'     => $this->db->count_all('messages'),
            'unread'       => $this->db->where('is_read', 0)->count_all_results('messages'),
        );
    }

    public function recent_messages($limit = 5)
    {
        return $this->db->order_by('created_at', 'DESC')
                        ->limit($limit)->get('messages')->result_array();
    }

    /** Visitor counts for the last 7 days (for the dashboard chart). */
    public function visitors_last_7days()
    {
        $labels = array();
        $data   = array();
        for ($i = 6; $i >= 0; $i--)
        {
            $day = date('Y-m-d', strtotime("-$i day"));
            $labels[] = date('D', strtotime($day));
            $data[] = (int) $this->db->where('DATE(visited_at)', $day)
                                     ->count_all_results('visitors');
        }
        return array('labels' => $labels, 'data' => $data);
    }
}
