<?php
    class Newpost extends CI_controller{

        public function __construct()
        {
            parent::__construct();
            if(! $this->session->userdata('vendorAuth')){
            redirect('login');}
            $this->load->model('admin/blog/Catemodel');
            $this->load->model('admin/blog/Newpostmodel');
        }
              
        public function index(){
  
           $data['fetch_category'] = $this->Catemodel->fetch_data();
            
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/template/topbar');
            $this->load->view('admin/blog/newpost', $data);
            $this->load->view('admin/template/footer');
        }
        
        
        public function post(){
           $this->load->model('admin/blog/newpostmodel');
           $this->input->post('formSubmit');
           
           
           if (!empty($_FILES['images']['name'])){
                    $File_name='';
                    $config['upload_path'] = APPPATH . '../upload/blog/fetured';
                    $config['file_name'] = $File_name;
                    $config['overwrite'] = TRUE;
                    $config["allowed_types"] = 'jpeg|jpg|png';
                    $config["max_size"] = 2048;
                    $this->load->library('upload', $config);
                    if(!$this->upload->do_upload('images')) {
                        $this->data['error'] = $this->upload->display_errors();
                        $this->session->set_flashdata('error',$this->upload->display_errors());
                        redirect('admin/blog/newpost');
                    } else {
                        $dataimage_return = $this->upload->data();
                        $imageurl=base_url().'upload/blog/fetured/'.$dataimage_return['file_name'];
                        
                    }
          }
           
           
           
           
           $datas = array(
                'head' => $this->input->post('heading'),
                 'mt_title' => $this->input->post('mtitle'),
                 'm_desc' => $this->input->post('mdesc'),
                 'm_key' => $this->input->post('mkey'),
                'content' => $this->input->post('content'),
                'cate' => $this->input->post('category'),
                'link' => $this->input->post('link'),
                'tag' => $this->input->post('tags'),
                
                'image' =>$imageurl,
        );
           if($this->newpostmodel->newpost($datas) ){
            $this->session->set_flashdata('success','Post Published'); 
            redirect(base_url().'admin/blog/newpost');
                
            
        }
        else{
            $this->session->set_flashdata('error','Error In Updating Please Try Again'); 
            redirect(base_url().'admin/blog/newpost');
        } 
           
       }
        
        
        
       
       

  
    }

?>