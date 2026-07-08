<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skill_model extends MY_Model {

    protected $table    = 'skills';
    protected $order_by = 'sort_order ASC, id ASC';

    /** Group skills by their category for the public view. */
    public function grouped()
    {
        $groups = array();
        foreach ($this->all() as $skill)
        {
            $groups[$skill['category']][] = $skill;
        }
        return $groups;
    }
}
