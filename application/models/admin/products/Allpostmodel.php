

<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Allpostmodel extends CI_Model
{


  function get_details($id)
  {
    $this->db->select('*');
    $this->db->from('products');
    $this->db->where('link', $id);
    $query = $this->db->get();
    return $query->result();
  }

  function update_pro($name, $about,$temp,$height,$weight,$exp,$grp, $id, $link, $imageurl)
  {

    $data = array(
      'name' => $name,
      'link' => $link,
      'about' => $about,
      'temp' => $temp,
      'height' => $height,
      'weight' => $weight,
      'exp' => $exp,
      'grp' => $grp,
      'id' => $id,
      'image' => $imageurl,

    );

    $this->db->set($data);
    $this->db->where('id', $id);
    $this->db->update('products');
  }

  public function fetch_data()
  {
    return $this->db->get('products')->result_array();
  }

  public function blog_detail($slug = '')
  {
    return $this->db->where('link', $slug)->get('products')->row();
  }



  public function deleteposts($data)
  {
    $explodData = explode(',', $data);
    $this->db->where_in('id', $explodData);
    $getDeleteStatus = $this->db->delete('products');
    if ($getDeleteStatus == 1) {
      return array('message' => 'yes');
    } else {
      return array('message' => 'no');
    }
  }
}
