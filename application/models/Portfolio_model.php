<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Portfolio_model extends MY_Model {

    protected $table    = 'portfolios';
    protected $order_by = 'sort_order ASC, id DESC';

    public function published()
    {
        return $this->all(array('status' => 'Published'));
    }

    public function featured()
    {
        return $this->all(array('status' => 'Published', 'featured' => 1));
    }

    public function categories()
    {
        $rows = $this->db->distinct()->select('category')
                         ->where('status', 'Published')
                         ->where('category IS NOT NULL', NULL, FALSE)
                         ->get($this->table)->result_array();
        return array_filter(array_column($rows, 'category'));
    }

    public function by_slug($slug)
    {
        return $this->find_by('slug', $slug);
    }

    /** Gallery images belonging to a project. */
    public function images($portfolio_id)
    {
        return $this->db->where('portfolio_id', $portfolio_id)
                        ->order_by('sort_order', 'ASC')
                        ->get('portfolio_images')->result_array();
    }

    public function add_image($portfolio_id, $image)
    {
        return $this->db->insert('portfolio_images', array(
            'portfolio_id' => $portfolio_id,
            'image'        => $image,
        ));
    }

    public function delete_image($id)
    {
        return $this->db->where('id', $id)->delete('portfolio_images');
    }

    public function increment_views($id)
    {
        return $this->db->set('views', 'views+1', FALSE)->where('id', $id)->update($this->table);
    }
}
