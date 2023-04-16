<?php   defined('BASEPATH') OR exit('No direct script access allowed');

    class Utility{
        public static function getsocial(){
            $CI =& get_instance();

            $CI->db->select('*')->from('houdinv_social_links');
            $getSearchsocial = $CI->db->get()->row();
            return $getSearchsocial;

        }
        public static function gallarylink(){
            $CI =& get_instance();
            $CI->db->select('*')->from('gallary');
            $getSite = $CI->db->get()->result_array();
            return $getSite;
            
        }

        public static function gallarycate(){
            $CI =& get_instance();
            $CI->db->select('*')->from('gallary_cate');
            $getSite = $CI->db->get()->result_array();
            return $getSite;
            
        }
    }

?>