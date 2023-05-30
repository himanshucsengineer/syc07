<?php
class Signup extends CI_controller{

  public function __construct(){
    parent::__construct();
    $this->load->model('frontend/Signupmodel');
  }

  public function index(){
    

    $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/signup');
        $this->load->view('frontend/template/footer');
  }
  
  public function create(){

    $this->load->model('frontend/Signupmodel');
    $this->input->post('formSubmit');

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
    $this->form_validation->set_rules('number', 'Mobile Number', 'required');
    $this->form_validation->set_rules('aadhar', 'Mobile Number', 'required|is_unique[user.aadhar]');
    $this->form_validation->set_rules('dob', 'Message', 'required');

    $this->form_validation->set_rules('gender', 'Name', 'required');
    $this->form_validation->set_rules('address', 'Email', 'required');
    $this->form_validation->set_rules('country', 'Mobile Number', 'required');
    $this->form_validation->set_rules('refer', 'Mobile Number', 'required');
    $this->form_validation->set_rules('password', 'Message', 'required');
    $this->form_validation->set_rules('confirm_password', 'Message', 'required');
    
    if ($this->form_validation->run()) {
      if($this->input->post('password') == $this->input->post('confirm_password')){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 8; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        if (!empty($_FILES['images']['name'])) {
          $File_name = '';
          $config['upload_path'] = APPPATH . '../upload/user_image';
          $config['file_name'] = $File_name;
          $config['overwrite'] = TRUE;
          $config["allowed_types"] = 'jpeg|jpg|png';
          $config["max_size"] = '';
          $this->load->library('upload', $config);
          if (!$this->upload->do_upload('images')) {
            $this->data['error'] = $this->upload->display_errors();
            $this->session->set_flashdata('error', $this->upload->display_errors());
            redirect('user/signup');
          } else {
            $dataimage_return = $this->upload->data();
            $imageurl =$dataimage_return['file_name'];
          }
        }
        $_SESSION["rgister_name"]=$this->input->post('name');
        $_SESSION["rgister_email"]=$this->input->post('email');
        $_SESSION["rgister_number"]=$this->input->post('number');
        $_SESSION["rgister_aadhar"]=$this->input->post('aadhar');
        $_SESSION["rgister_dob"]=$this->input->post('dob');
        $_SESSION["rgister_gender"]=$this->input->post('gender');
        $_SESSION["rgister_address"]=$this->input->post('address');
        $_SESSION["rgister_country"]=$this->input->post('country');
        $_SESSION["rgister_refer_from"]=$this->input->post('refer');
        $_SESSION["rgister_password"]=$this->input->post('confirm_password');
        $_SESSION["rgister_image"]=$imageurl;
        $_SESSION["rgister_refer_to"]=$randomString;

  
        redirect(base_url() . 'create/agreecondition');
      }else{
        $this->session->set_flashdata('error', 'Password Does Not Match!');
        redirect(base_url() . 'user/signup');
      }
    }else{
      $this->session->set_flashdata('error', 'Please Fill All The Fields or you are already Registerd with us!');
      redirect(base_url() . 'user/signup');
    }        
  }



  public function login(){
    $this->load->model('frontend/Signupmodel');
    $this->input->post('formSubmit');

    $this->form_validation->set_rules('password', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');

    if ($this->form_validation->run()) {

      $email = $this->input->post('email');
      $password = $this->input->post('password');

      $userdata = $this->db->where('email',$email)->where('password',$password)->get('user')->result_array();
      

      if($userdata == Array()){
        $this->session->set_flashdata('error', 'User Not Found!');
        redirect(base_url() . 'user/login');
      }else{

        foreach($userdata as $value){
          $user_email = $value['email'];
          $user_id = $value['id'];
        }
        $_SESSION['user_id'] = $user_id;
        $_SESSION['user_email'] = $user_email;
        $this->session->set_flashdata('success', 'Login Successfull');
        redirect(base_url() . 'user/dashboard');
      }


    }else{
      $this->session->set_flashdata('error', 'Please Fill All the fields!');
      redirect(base_url() . 'user/login');
    }

  }

    
}