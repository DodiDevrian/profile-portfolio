<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends MY_Model {

    protected $table = 'settings';

    /** Return all settings as an associative key => value array. */
    public function all_kv()
    {
        $rows = $this->db->get($this->table)->result_array();
        $kv = array();
        foreach ($rows as $r)
        {
            $kv[$r['skey']] = $r['svalue'];
        }
        return $kv;
    }

    public function get_value($key, $default = '')
    {
        $row = $this->find_by('skey', $key);
        return $row ? $row['svalue'] : $default;
    }

    /** Upsert a single key. */
    public function set_value($key, $value)
    {
        $row = $this->find_by('skey', $key);
        if ($row)
        {
            return $this->db->where('skey', $key)->update($this->table, array('svalue' => $value));
        }
        return $this->db->insert($this->table, array('skey' => $key, 'svalue' => $value));
    }

    public function set_many($pairs)
    {
        foreach ($pairs as $k => $v)
        {
            $this->set_value($k, $v);
        }
    }
}
