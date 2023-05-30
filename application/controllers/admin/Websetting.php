<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Websetting extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('vendorAuth')) {
            redirect('admin/login');
        }
        
        $this->load->model('admin/Profilemodel');
        
    }


    public function index()
    {
        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
     
        $this->load->view('admin/websetting');
        $this->load->view('admin/template/footer');
    }

    public function update_websetting(){
        $this->load->model('frontend/Signupmodel');
        $this->input->post('formSubmit');

 
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('number', 'Number', 'required');
     
        $this->form_validation->set_rules('address', 'Email', 'required');
       
        
        if ($this->form_validation->run()) {

            $data = array(
  
                'email' => $this->input->post('email'),
                'number' => $this->input->post('number'),
         
                'address' => $this->input->post('address'),
       
            );

            $id = 1;

            if ($this->Signupmodel->update_websetting($data, $id)) {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url().'admin/websetting');
            } else {
                $this->session->set_flashdata('success', 'Updated');
                redirect(base_url().'admin/websetting');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url().'admin/websetting');
        }
    }
   




    
}
