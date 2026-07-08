<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message_model extends MY_Model {

    protected $table    = 'messages';
    protected $order_by = 'created_at DESC, id DESC';

    public function unread_count()
    {
        return $this->count(array('is_read' => 0));
    }

    public function mark_read($id)
    {
        return $this->update($id, array('is_read' => 1));
    }
}
