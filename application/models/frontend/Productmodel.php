<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Productmodel extends CI_Model
{

    public function fetch()
    {
        return $this->db->get('products')->result_array();
    }
    public function blog_detail($slug = '')
  {
    return $this->db->where('link', $slug)->get('products')->row();
  }


    function fetch_data($limit, $start)
    {
   
     $this->db->select("*");
     $this->db->from("products");
     
     $this->db->order_by("id", "DESC");
     $this->db->limit($limit, $start);
     $query = $this->db->get();
     return $query;
    }
}
