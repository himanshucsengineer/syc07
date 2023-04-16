

<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Allpostmodel extends CI_Model {

    
    function get_details($id)
{
    $this->db->select('*');
    $this->db->from('cate_newpost');
    $this->db->where('link',$id);
    $query = $this->db->get();
    return $query->result();
}
   
   function update_pro($head,$content,$tag,$id,$link,$imageurl,$mtitle,$mdesc,$mkey){
      
         $data = array(
                        'head' =>$head,
                        'link' => $link,
                        'content' => $content,
                        'tag' => $tag,
                        'id' => $id,
                        'image' => $imageurl,
                        'mt_title' => $mtitle,
                        'm_desc' => $mdesc,
                        'm_key' => $mkey
                    );
                    
        $this->db->set($data);
        $this->db->where('id',$id);
         $this->db->update('cate_newpost');
    }
    
     public function fetch_data() {
    return $this->db->get('cate_newpost')->result_array();
   
  }
  
    public function blog_detail($slug = '') {
    return $this->db->where('link',$slug)->get('cate_newpost')->row();
   
  }
   

  
  public function deleteposts($data)
    {
        $explodData = explode(',',$data);
        $this->db->where_in('id',$explodData);
        $getDeleteStatus = $this->db->delete('cate_newpost');
        if($getDeleteStatus == 1)
        {
            return array('message'=>'yes');
      }else{
        return array('message'=>'no');
      }
      }

  
  
  
  
 
 
 
 
}



