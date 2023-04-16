<?php
    class Editblog extends CI_controller{

        public function __construct()
        {
            parent::__construct();
            if(! $this->session->userdata('vendorAuth')){
            redirect('login');}
          $this->load->model('admin/blog/Catemodel');
            $this->load->model('admin/blog/Allpostmodel');
        }
              
        public function index(){
          
  
          $data['fetch_category'] = $this->Catemodel->fetch_data();
           $data['fetch_content'] = $this->Allpostmodel->fetch_data();
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/template/topbar');
            $this->load->view('admin/blog/editblog', $data);
            $this->load->view('admin/template/footer');
        }
        
         public function update(){
        $this->load->model('admin/blog/Allpostmodel');
        
        $this->input->post('formSubmit');

            
            $this->form_validation->set_rules('heading', 'Name', 'required');
            $this->form_validation->set_rules('link', 'Email', 'required');
            $this->form_validation->set_rules('content', 'Number', 'required');
            $this->form_validation->set_rules('tags', 'Address', 'required');
            $this->form_validation->set_rules('mtitle', 'Meta Title', 'required');
            $this->form_validation->set_rules('mdesc', 'Meta Description', 'required');
            $this->form_validation->set_rules('id', 'Id', 'required');
            $this->form_validation->set_rules('mkey', 'Meta Keyword', 'required');
            if ($this->form_validation->run()){ 
                
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
          }else{
              $data = $this->Allpostmodel->fetch_data();
              
              foreach($data as $value){
                  if($value['id'] == $this->input->post('id')){
                  $imageurl= $value['image'];
                  }
                  
              }
          }
               
               $head = $this->input->post('heading');
                        $link = $this->input->post('link');
                        $content = $this->input->post('content');
                        $tag = $this->input->post('tags');
                        $id = $this->input->post('id');
                        $mtitle = $this->input->post('mtitle');
                        $mdesc = $this->input->post('mdesc');
                        $mkey = $this->input->post('mkey');
                
                    if($this->Allpostmodel->update_pro($head,$content,$tag,$id,$link,$imageurl,$mtitle,$mdesc,$mkey)){
                        
                        
                        
                        $this->session->set_flashdata('success','Technical error'); 
                        redirect(base_url().'admin/blog/allpost');  
                    }
                    else{
                        $this->session->set_flashdata('success','Updated Successfully'); 
                        redirect(base_url().'admin/blog/allpost'); 
                    }
                }
                else{
                    $this->session->set_flashdata('error','Please Fill all Fields'); 
                    redirect(base_url().'admin/blog/allpos');   
                }
       
}
       
        
        
        
       
       

  
    }

?>