<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contactmodel extends CI_Model
{
    function insert_data($name, $email, $mob,$sub, $msg)
    {
        $data = array(
            'name' => $name,
            'email' => $email,
            'number' => $mob,
            'subject' => $sub,
            'msg' => $msg
        );
        return  $this->db->insert('contact', $data);
    }

    function update_initial_amount($data, $id){
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('schemesetting', $data);
    }
}