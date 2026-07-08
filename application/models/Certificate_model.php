<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certificate_model extends MY_Model {

    protected $table    = 'certificates';
    protected $order_by = 'sort_order ASC, id ASC';
}
