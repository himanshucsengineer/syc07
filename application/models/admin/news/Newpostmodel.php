<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Newpostmodel extends CI_Model
{

  function newpost($datas)
  {
    $this->db->insert('news_newpost', $datas);
    return true;
  }

  public function fetch_data()
  {
    return $this->db->get('news_newpost')->result_array();
  }
}
