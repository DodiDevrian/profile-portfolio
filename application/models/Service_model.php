<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service_model extends MY_Model {

    protected $table    = 'services';
    protected $order_by = 'sort_order ASC, id ASC';
}
