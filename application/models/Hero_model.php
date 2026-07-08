<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hero_model extends MY_Model {

    protected $table = 'hero';

    public function get()
    {
        return $this->db->order_by('id', 'ASC')->limit(1)->get($this->table)->row_array();
    }

    public function save($data)
    {
        $row = $this->get();
        if ($row)
        {
            $this->update($row['id'], $data);
            return $row['id'];
        }
        return $this->insert($data);
    }
}
