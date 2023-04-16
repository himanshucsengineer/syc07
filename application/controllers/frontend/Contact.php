<?php
class Contact extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Contactmodel');
    }
    public function index(){
      $this->load->view('frontend/template/header');
      // $this->load->view('frontend/template/navbar');
      $this->load->view('frontend/contact');
      $this->load->view('frontend/template/footer');
    }


    public function insert_data()
    {
        $this->load->model('frontend/Contactmodel');
        $this->input->post('formSubmit');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('mob', 'Mobile Number', 'required');
        $this->form_validation->set_rules('sub', 'Mobile Number', 'required');
        $this->form_validation->set_rules('msg', 'Message', 'required');
        if ($this->form_validation->run()) {
            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $mob = $this->input->post('mob');
            $sub = $this->input->post('sub');
            $msg = $this->input->post('msg');
            if ($this->Contactmodel->insert_data($name, $email, $mob,$sub, $msg)) {
                $this->session->set_flashdata('success', 'Your data have been submitted');
                redirect(base_url() . "contact-us");
            } else {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url() . "contact-us");
            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url() . "contact-us");
        }
    }
}