<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Signupmodel extends CI_Model
{
    function insert_data(){
      return  $this->db->insert('user',$regsterdata);
    }

    function create_withdraw($data){
      return  $this->db->insert('withdraw',$data);
    }


    function transfer_pension($data){
      return  $this->db->insert('pension',$data);
    }

    function transfer_insurance($data){
      return  $this->db->insert('insurance',$data);
    }

    function transfer_bonus($data){
      return  $this->db->insert('bonus',$data);
    }

    function add_bank($data){
      return  $this->db->insert('bank',$data);
    }

    function fetchModeldata()
    {
        $response = array();
        $this->db->select('*');
        $q = $this->db->get('user');
        $response = $q->result_array();
        return $response;
    }
    function update_pension_bal($userid, $updatepension)
    {

        $this->db->set($updatepension);
        $this->db->where('id', $userid);
        $this->db->update('user', $updatepension);
    }

    function update_insurance_bal($userid, $updateinsurance)
    {

        $this->db->set($updateinsurance);
        $this->db->where('id', $userid);
        $this->db->update('user', $updateinsurance);
    }

    function update_bonus_bal($userid, $updatebonus)
    {
        $this->db->set($updatebonus);
        $this->db->where('id', $userid);
        $this->db->update('user', $updatebonus);
    }



    function update_pro($data, $id){
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    function update_websetting($data, $id){
      $this->db->set($data);
      $this->db->where('id', $id);
      $this->db->update('websetting', $data);
  }

  function update_rozarpaysetting($data, $id){
    $this->db->set($data);
    $this->db->where('id', $id);
    $this->db->update('rozarpay', $data);
}
}