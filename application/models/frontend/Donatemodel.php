<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Donatemodel extends CI_Model
{
    function insert_data($data)
    {

        return  $this->db->insert('donate', $data);
    }
    public function fetch_user_donate_data(){
        return  $this->db->get('donate')->result_array();
           
       }
    


       public function fetch_user_sponsor_data(){
        return  $this->db->get('sponsoranimal')->result_array();
           
       }


       public function fetch_user_adoption_data(){
        return  $this->db->get('adoption')->result_array();
           
       }

    function insert_gift_data($data)
    {

        return  $this->db->insert('giftgiving', $data);
    }
    function insert_pet_memo_data($data)
    {

        return  $this->db->insert('petmemo', $data);
    }
    function insert_spondor_data($data)
    {

        return  $this->db->insert('sponsoranimal', $data);
    }
    public function blog_detail($slug = '')
    {
      return $this->db->where('link', $slug)->get('petmemo')->row();
    }
    function fetch_data($limit, $start)
    {
   
     $this->db->select("*");
     $this->db->from("petmemo");
     
     $this->db->order_by("id", "DESC");
     $this->db->limit($limit, $start);
     $query = $this->db->get();
     return $query;
    }
    function fetch_data_search($name)
    {
   
     $this->db->select("*");
     $this->db->from("petmemo");
     $this->db->where($name);
     $this->db->order_by("id", "DESC");
     
     $query = $this->db->get();
     return $query;
    }
}
