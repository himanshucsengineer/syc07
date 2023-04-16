<?php
class Initialamount extends CI_controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('vendorAuth')) {
      redirect('admin/login');
    }
    $this->load->model('frontend/Contactmodel');
  }
  public function index()
  {
    $this->load->view('admin/template/header');
    $this->load->view('admin/template/sidebar');
    $this->load->view('admin/template/topbar');
    $this->load->view('admin/initialamount');
    $this->load->view('admin/template/footer');
  }

  public function update(){
    $this->input->post('formSubmit');
    
    $this->form_validation->set_rules('joining', 'Name', 'required');
    $this->form_validation->set_rules('salary', 'Email', 'required');
    $this->form_validation->set_rules('bonus', 'Number', 'required');
    $this->form_validation->set_rules('insurance', 'Address', 'required');
    $this->form_validation->set_rules('pension', 'Address', 'required');
    $this->form_validation->set_rules('id', 'Address', 'required');

    if ($this->form_validation->run()) {

      $id = $this->input->post('id');

      $data = array(
        'joining' => $this->input->post('joining'),
        'salary' => $this->input->post('salary'),
        'bonus' => $this->input->post('bonus'),
        'insurance' => $this->input->post('insurance'),
        'pension' => $this->input->post('pension'),
      );

      if ($this->Contactmodel->update_initial_amount( $data, $id)) {
        $this->session->set_flashdata('error', 'Error in submission');
        redirect(base_url().'admin/initialamount');
      } else {
        $this->session->set_flashdata('success', 'Updated Successfully');
        redirect(base_url().'admin/initialamount');
      }
    } else {
      $this->session->set_flashdata('error', 'Please Fill All The Fields');
      redirect(base_url().'admin/initialamount');
    }
  }
  
}