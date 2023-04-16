<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gallarymodel extends CI_Model
{
    public function fetch_gallary()
    {
      return $this->db->get('gallary')->result_array();
    }
    public function fetch_cate()
  {
    return $this->db->get('gallary_cate')->result_array();
  }
}
