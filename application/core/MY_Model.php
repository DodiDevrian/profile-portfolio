<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Lightweight base model providing common Query Builder CRUD.
 * Child models set $table and (optionally) $order_by.
 */
class MY_Model extends CI_Model {

    protected $table    = '';
    protected $order_by = 'id ASC';

    public function all($where = array())
    {
        if ( ! empty($where)) $this->db->where($where);
        if ($this->order_by)  $this->db->order_by($this->order_by);
        return $this->db->get($this->table)->result_array();
    }

    public function find($id)
    {
        return $this->db->where('id', $id)->get($this->table)->row_array();
    }

    public function find_by($field, $value)
    {
        return $this->db->where($field, $value)->get($this->table)->row_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id)
    {
        return $this->db->where('id', $id)->delete($this->table);
    }

    public function count($where = array())
    {
        if ( ! empty($where)) $this->db->where($where);
        return $this->db->count_all_results($this->table);
    }
}
