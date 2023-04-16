<?php
class Withdrawinsurance extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        if(!isset($_SESSION['user_id'])){
          redirect(base_url() . 'user/login');
        }
    }

    public function index()
    {
        $this->load->view('frontend/user/common/header');
        $this->load->view('frontend/user/common/navbar');
        $this->load->view('frontend/user/common/sidebar');
        $this->load->view('frontend/user/withdrawinsurance');
        $this->load->view('frontend/user/common/footer');
    }

    public function transfer(){
      $this->load->model('frontend/Signupmodel');
      $this->input->post('formSubmit');
      // $this->form_validation->set_rules('bank_id', 'Email', 'required');
      $this->form_validation->set_rules('amount', 'Email', 'required');

      $current_balance = $this->db->where('id',$_SESSION['user_id'])->get('user')->result_array();

      if ($this->form_validation->run()) {
        
        // if($this->input->post('amount') >= 1500){
          foreach($current_balance as $value){

            $getcreateddate = $value['created_on'];

            $getdate = explode(' ',$getcreateddate);

            $newDate = date('Y-m-d', strtotime($getdate[0]. ' + 2 years'));


            if($getdate[0] <= $newDate){
              $this->session->set_flashdata('success', 'You Can Transfer Your Insurance Amount after 2 years');
              redirect(base_url(). 'user/withdrawinsurance');
            }else{
              if($value['insurance'] >= $this->input->post('amount')){
                $data = array(
                  'credit' => "Debit",
                  'amount' => $this->input->post('amount'),
                  'user_id' => $_SESSION['user_id'],
                );
                if ($this->Signupmodel->transfer_insurance($data)) {
                  $userid = $_SESSION['user_id'];
                  $updateinsurance = array(
                    'insurance' => $value['insurance'] - $this->input->post('amount'),
                    'salary' => $value['salary'] + $this->input->post('amount'),
                  ); 
                  $this->Signupmodel->update_insurance_bal($userid, $updateinsurance);
                  $this->session->set_flashdata('success', 'Transfered!');
                  redirect(base_url() . 'user/withdrawinsurance');
                } else {
                  $this->session->set_flashdata('success', 'Error in submission!');
                  redirect(base_url(). 'user/withdrawinsurance');
                }
              }else{
                $this->session->set_flashdata('success', 'Low Balance');
                redirect(base_url(). 'user/withdrawinsurance');
              }
            }


            
          }
        // }else{
        //   $this->session->set_flashdata('success', 'Minimum Amount to be withdraw is 500');
        //   redirect(base_url(). 'user/withdrawpension');
        // } 
      } else {
        $this->session->set_flashdata('success', 'Please Fill All the fields!');
        redirect(base_url().'user/withdrawinsurance');
      }
    }
}