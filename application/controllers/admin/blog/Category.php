<?php
    class Category extends CI_controller{

        public function __construct()
        {
            parent::__construct();
            if(! $this->session->userdata('vendorAuth')){
            redirect('login');}
            $this->load->model('admin/blog/catemodel');
        }
              
        public function index(){
            
            
            
            $this->load->view('admin/template/header');
            $this->load->view('admin/template/sidebar');
            $this->load->view('admin/template/topbar');
            $this->load->view('admin/blog/category',$data);
            $this->load->view('admin/template/footer');
        }
        
        
       public function insert(){
           $this->load->model('admin/blog/catemodel');
           $this->input->post('formSubmit');
           
           
           $data = array(
            'cate_name' => $this->input->post('name'),
            'cate_desc' => $this->input->post('desc'),
        );
           if($this->catemodel->insert($data) ){
            $this->session->set_flashdata('admin_success','Category Created'); 
            redirect(base_url().'admin/blog/category');
                
            
        }
        else{
            $this->session->set_flashdata('admin_error','Error In Updating Please Try Again'); 
            redirect(base_url().'admin/blog/category');
        } 
           
       }
       
       
       
       public function addinventory_api(){

            $getPurchaseData = $this->catemodel->fetch_data();
    
    
            foreach ($getPurchaseData as $key => $value) { 
//                $short_desc_vl=$lst_desc.'<a class="edit" href="'.base_url().'admin/brands/galleryedit/'.$value->id.'" data-toggle="tooltip" data-original-title="Edit">Read More</a>';
    
                $arrya_json[] = array($value['cate_name'],$value['cate_desc'],'
               <a class="delete_sliders" data-id="'.$value['id'].'"  style="color: red;cursor: pointer;" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>' );
                }
                 echo json_encode(array('data'=>$arrya_json));
            }
      


public function deletecardetail(){ 
    
                    if($this->input->post('deletesliderId'))
                {
                  $this->form_validation->set_rules('deletesliderId','text','required');
                  if($this->form_validation->run() == true)
                  {
                    $getDeleteStatus = $this->catemodel->deletecate($this->input->post('deletesliderId'));
                    if($getDeleteStatus['message'] == 'yes')
                    {
                      $this->session->set_flashdata('success','Category  deleted successfully');
                      redirect(base_url()."admin/blog/category");
                    }
                    else
                    {
                      $this->session->set_flashdata('error','Something went wrong. Please try again');
                    redirect(base_url()."admin/blog/category");
                      
                    }
                  }
                  else
                  {
                    $this->session->set_flashdata('error','Something went wrong. Please try again');
                    redirect(base_url()."admin/blog/category");
    
                  }
                }
              }
  
    }

?>