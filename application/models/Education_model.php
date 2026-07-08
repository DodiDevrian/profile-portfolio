<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Education_model extends MY_Model {

    protected $table    = 'educations';
    protected $order_by = 'sort_order ASC, id ASC';
}
