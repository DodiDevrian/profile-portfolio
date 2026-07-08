<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_model extends MY_Model {

    protected $table    = 'social_medias';
    protected $order_by = 'sort_order ASC, id ASC';
}
