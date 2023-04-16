<?php
class Addaccount extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['user_id'])){
          redirect(base_url() . 'user/login');
        }
        $this->load->model('frontend/Signupmodel');
    }

    public function index()
    {
        $this->load->view('frontend/user/common/header');
        $this->load->view('frontend/user/common/navbar');
        $this->load->view('frontend/user/common/sidebar');
        $this->load->view('frontend/user/addaccount');
        $this->load->view('frontend/user/common/footer');
    }


    public function add(){
      $this->load->model('frontend/Signupmodel');
      $this->input->post('formSubmit');
      $this->form_validation->set_rules('bank_name', 'Email', 'required');
      $this->form_validation->set_rules('branch_name', 'Email', 'required');
      $this->form_validation->set_rules('ifsc', 'Email', 'required');
      $this->form_validation->set_rules('account', 'Email', 'required');
      $this->form_validation->set_rules('confirm_account', 'Email', 'required');
      $this->form_validation->set_rules('holder', 'Email', 'required');

      if ($this->form_validation->run()) {
        

        if($this->input->post('confirm_account') == $this->input->post('account')){
          $data = array(
            'bank_name' => $this->input->post('bank_name'),
            'branch_name' => $this->input->post('branch_name'),
            'ifsc' => $this->input->post('ifsc'),
            'account' => $this->input->post('account'),
            'holder' => $this->input->post('holder'),
            'userid' => $_SESSION['user_id'],
          );
              
          if ($this->Signupmodel->add_bank($data)) {
            $this->session->set_flashdata('success', 'Bank Added');
            redirect(base_url() . 'user/addaccount');
          } else {
            $this->session->set_flashdata('error', 'Wrong Email Or Password');
            redirect(base_url(). 'user/addaccount');
          }
        }else{
          $this->session->set_flashdata('error', 'Account Does Not Match!');
          redirect(base_url(). 'user/addaccount');
        }

        
      } else {
        $this->session->set_flashdata('error', 'Please Fill All the fields!');
        redirect(base_url().'user/addaccount');
      }
    }
}