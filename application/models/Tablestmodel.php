<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Tablestmodel extends CI_Model
{
  function __construct()
  {
  }



  public function fetchaddinventory_api()
  {

    return $getSlider = $this->db->select('*')->from('tables')->get()->result();
  }
}
