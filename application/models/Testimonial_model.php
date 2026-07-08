<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial_model extends MY_Model {

    protected $table    = 'testimonials';
    protected $order_by = 'sort_order ASC, id ASC';
}
