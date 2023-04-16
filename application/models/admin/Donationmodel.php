<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
class Donationmodel extends CI_Model
{
  function __construct()
  {
  }
  public function fetchinventory_api()
  {
    return $this->db->get('donate')->result_array();
  }
  function insert_data($datas)
  {
    $this->db->insert('petmemo', $datas);
    return true;
  }


  public function deletedonationdata($data)
  {
    $explodData = explode(',', $data);
    $this->db->where_in('id', $explodData);
    $getDeleteStatus = $this->db->delete('donate');
    if ($getDeleteStatus == 1) {
      return array('message' => 'yes');
    } else {
      return array('message' => 'no');
    }
  }


  public function fetch_gift_data()
  {
    return $this->db->get('giftgiving')->result_array();
  }

  public function delete_gift_data($data)
  {
    $explodData = explode(',', $data);
    $this->db->where_in('id', $explodData);
    $getDeleteStatus = $this->db->delete('giftgiving');
    if ($getDeleteStatus == 1) {
      return array('message' => 'yes');
    } else {
      return array('message' => 'no');
    }
  }

  public function fetch_pet_memorial_data()
  {
    return $this->db->get('petmemo')->result_array();
  }

  public function delete_pet_memo_data($data)
  {
    $explodData = explode(',', $data);
    $this->db->where_in('id', $explodData);
    $getDeleteStatus = $this->db->delete('petmemo');
    if ($getDeleteStatus == 1) {
      return array('message' => 'yes');
    } else {
      return array('message' => 'no');
    }
  }

  public function fetch_sponsor_animal_data()
  {
    return $this->db->get('sponsoranimal')->result_array();
  }

  public function delete_sponsor_detail($data)
  {
    $explodData = explode(',', $data);
    $this->db->where_in('id', $explodData);
    $getDeleteStatus = $this->db->delete('sponsoranimal');
    if ($getDeleteStatus == 1) {
      return array('message' => 'yes');
    } else {
      return array('message' => 'no');
    }
  }
}
