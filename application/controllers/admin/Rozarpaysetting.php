<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Rozarpaysetting extends CI_Controller
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
     
        $this->load->view('admin/rozarpaysetting');
        $this->load->view('admin/template/footer');
    }

    public function update_websetting(){
        $this->load->model('frontend/Signupmodel');
        $this->input->post('formSubmit');

 
        $this->form_validation->set_rules('key', 'Email', 'required');
        $this->form_validation->set_rules('secret', 'Number', 'required');
    
       
        
        if ($this->form_validation->run()) {

            $data = array(
                'key_id' => $this->input->post('key'),
                'secret' => $this->input->post('secret'),
            );

            $id = 1;

            if ($this->Signupmodel->update_rozarpaysetting($data, $id)) {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url().'admin/rozarpaysetting');
            } else {
                $this->session->set_flashdata('success', 'Updated');
                redirect(base_url().'admin/rozarpaysetting');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url().'admin/rozarpaysetting');
        }
    }
   




    
}
