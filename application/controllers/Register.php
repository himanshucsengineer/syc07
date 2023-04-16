<?php

require_once(APPPATH . "libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Register extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('frontend/Signupmodel');
  }
  public function index()
  {
    $this->load->view('registration-form');
  }
  /**
   * This function creates order and loads the payment methods
   */
  public function pay()
  {
    $api = new Api('rzp_test_QwQyLEAMfyLG2q', '7wE9vtsco6hly4eNQzlo7zJ7');
    /**
     * You can calculate payment amount as per your logic
     * Always set the amount from backend for security reasons
     */
    $_SESSION['agree'] = $this->input->post('agree');
    $settingdata = $this->db->get('schemesetting')->result_array();
    foreach($settingdata as $setting){
      $setting_joining = $setting['joining'];
    }
    // $_SESSION['rgister_name'] = $_SESSION["rgister_name"];
    // $_SESSION['mob'] = $_SESSION["rgister_name"];
    // $_SESSION['address'] = $_SESSION["rgister_name"];
    // $_SESSION['state'] = $_SESSION["rgister_name"];
    // $_SESSION['city'] = $_SESSION["rgister_name"];
    // $_SESSION['citizen'] = $_SESSION["rgister_name"];
    // $_SESSION['motive'] = $_SESSION["rgister_name"];

    // $_SESSION['email'] = $_SESSION["rgister_name"];
    // $_SESSION['mob'] = $_SESSION["rgister_name"];
    // $_SESSION['address'] = $_SESSION["rgister_name"];
    // $_SESSION['state'] = $_SESSION["rgister_name"];
    // $_SESSION['city'] = $_SESSION["rgister_name"];
    // $_SESSION['citizen'] = $_SESSION["rgister_name"];
    // $_SESSION['motive'] = $_SESSION["rgister_name"];

    $_SESSION['payable_amount'] = $setting_joining;
    $razorpayOrder = $api->order->create(array(
      'receipt'         => rand(),
      'amount'          => $_SESSION['payable_amount'] * 100, // 2000 rupees in paise
      'currency'        => 'INR',
      'payment_capture' => 1 // auto capture
    ));
    $amount = $razorpayOrder['amount'];
    $razorpayOrderId = $razorpayOrder['id'];
    $_SESSION['razorpay_order_id'] = $razorpayOrderId;
    $data = $this->prepareData($amount, $razorpayOrderId);
    $this->load->view('giftgivepay', array('data' => $data));
  }
  /**
   * This function verifies the payment,after successful payment
   */
  public function verify()
  {
    $success = true;
    $error = "payment_failed";
    if (empty($_POST['razorpay_payment_id']) === false) {
      $api = new Api('rzp_test_QwQyLEAMfyLG2q', '7wE9vtsco6hly4eNQzlo7zJ7');
      try {
        $attributes = array(
          'razorpay_order_id' => $_SESSION['razorpay_order_id'],
          'razorpay_payment_id' => $_POST['razorpay_payment_id'],
          'razorpay_signature' => $_POST['razorpay_signature']
        );
        $api->utility->verifyPaymentSignature($attributes);
      } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay_Error : ' . $e->getMessage();
      }
    }
    if ($success === true) {
      $regsterdata = array(
        'name' => $_SESSION['rgister_name'],
        'email' => $_SESSION['rgister_email'],
        'number' => $_SESSION['rgister_number'],
        'aadhar' => $_SESSION['rgister_aadhar'],
        'dob' => $_SESSION['rgister_dob'],
        'gender' => $_SESSION['rgister_gender'],
        'address' => $_SESSION['rgister_address'],
        'country' => $_SESSION['rgister_country'],
        'referid' => $_SESSION['rgister_refer_to'],
        'password' => $_SESSION['rgister_password'],
        'image' => $_SESSION['rgister_image'],
        'agree' => $_SESSION['agree'],
      );
      $create_user = $this->db->insert('user',$regsterdata);
      if ($create_user == true) {
        $userdata = $this->db->where('email',$_SESSION['rgister_email'])->get('user')->result_array();
        foreach($userdata as $user){
          $userId = $user['id'];
        }
        $transaction = array(
          'order_id' => $_SESSION['razorpay_order_id'],
          'user_id' => $userId,
          'type' => 'Initial',
          'amount' => $_SESSION['payable_amount'],
        );
        
        $create_transaction = $this->db->insert('transaction',$transaction);
        
        
        if($create_transaction == true){
          $referdata = $this->db->where('referid',$_SESSION['rgister_refer_from'])->get('user')->result_array();
          
          if($referdata == Array()){
            $this->session->set_flashdata('error', 'Invalid Refrral Code!');
            redirect(base_url() . 'user/signup');
          }else{
            foreach($referdata as $refer){
              $referfrom = $refer['id'];
            }
  
            $referto = $userId;
  
            $referarray = array(
              'refer_from' => $referfrom,
              'refer_to' => $referto,
            );
  
            $create_refer = $this->db->insert('refer',$referarray);
  
            if($create_refer == true){
              $settingdata = $this->db->get('schemesetting')->result_array();

              foreach($settingdata as $setting){
                $setting_joining = $setting['joining'];
                $setting_bonus = $setting['bonus'];
                $setting_insurance = $setting['insurance'];
                $setting_pension = $setting['pension'];
                $setting_salary = $setting['salary'];

              }
              $pension = array(
                'credit' => 'Credit',
                'user_id' => $referfrom,
                'amount' => $setting_pension,
              );
              $bonus = array(
                'credit' => 'Credit',
                'user_id' => $referfrom,
                'amount' => $setting_bonus,
              );
              $insurance = array(
                'credit' => 'Credit',
                'user_id' => $referfrom,
                'amount' => $setting_insurance,
              );

              $create_pension = $this->db->insert('pension',$pension);
              $create_bonus = $this->db->insert('bonus',$bonus);
              $create_insurance = $this->db->insert('insurance',$insurance);

              if($create_pension == true && $create_bonus == true && $create_insurance == true){
                $getuserdata = $this->db->where('id',$referfrom)->get('user')->result_array();
                foreach($getuserdata as $userbal){
                  $pension_bal = $userbal['pension'];
                  $bonus_bal = $userbal['bonus'];
                  $insurance_bal = $userbal['insurance'];
                  $salary_bal = $userbal['salary'];
                }

                $calculateteam1salary = ($setting_salary/100)*$setting_joining;

                $updatedata = array(
                  'pension' => $pension_bal + $setting_pension,
                  'bonus' => $bonus_bal + $setting_bonus,
                  'insurance' => $insurance_bal + $setting_insurance,
                  'salary' => $salary_bal + $calculateteam1salary,
                );

                $updateuserbalance = $this->db->set($updatedata)->where('id',$referfrom)->update('user',$updatedata);

                if($updateuserbalance == true){
                  $teamBdata = $this->db->where('refer_to',$referfrom)->get('refer')->result_array();
                  
                  if($teamBdata == Array()){
                    $this->session->set_flashdata('error', 'Error In submisstion');
                    redirect(base_url() . 'user/signup');
                  }else{
                    foreach($teamBdata as $teamb){
                      $teambuser = $teamb['refer_from'];
                    }
                    
                    $getteambuserdata = $this->db->where('id',$teambuser)->get('user')->result_array();
  
                    foreach($getteambuserdata as $teambuser){
                      $teamb_salary_bal = $teambuser['salary'];
                      $teamb_userid = $teambuser['id'];
                    }
                    $calculateteam2salary = ($setting_salary/100)*$calculateteam1salary;
                    $updateteambsalary = array(
                      'salary' => $teamb_salary_bal + $calculateteam2salary,
                    );
  
                    $updateuserteambbalance = $this->db->set($updateteambsalary)->where('id',$teamb_userid)->update('user',$updateteambsalary);
  
                    if($updateuserteambbalance == true){
                      $randomid = rand(100000,999999);
                      $createsalarytransaction = array(
                        'order_id' => $randomid,
                        'user_id' => $teamb_userid,
                        'type' => 'Credit',
                        'amount' => $calculateteam2salary,
                      );
                      
                      $create_transaction_salary = $this->db->insert('transaction',$createsalarytransaction);
  
                      if($create_transaction_salary == true){
                        $this->session->set_flashdata('success', 'Signup Successfully!');
                        redirect(base_url() . 'user/signup');
                        session_destroy();
                        unset($_SESSION["razorpay_order_id"]);
                        unset($_SESSION["agree"]);
                        unset($_SESSION["rgister_name"]);
                        unset($_SESSION["rgister_email"]);
                        unset($_SESSION["rgister_number"]);
                        unset($_SESSION["rgister_aadhar"]);
                        unset($_SESSION["rgister_dob"]);
                        unset($_SESSION["rgister_gender"]);
                        unset($_SESSION["rgister_address"]);
                        unset($_SESSION["rgister_country"]);
                        unset($_SESSION["rgister_refer_to"]);
                        unset($_SESSION["rgister_password"]);
                        unset($_SESSION["rgister_image"]);
                      }else{
                        $this->session->set_flashdata('error', 'Error In submisstion');
                        redirect(base_url() . 'user/signup');
                      }
  
                      
                    }else{
                      $this->session->set_flashdata('error', 'Error In submisstion');
                      redirect(base_url() . 'user/signup');
                    }
                  }

                  

                }else{
                  $this->session->set_flashdata('error', 'Error In submisstion');
                  redirect(base_url() . 'user/signup');
                }

              }else{
                $this->session->set_flashdata('error', 'Error In submisstion');
                redirect(base_url() . 'user/signup');
              }
            }else{
              $this->session->set_flashdata('error', 'Error In submisstion');
              redirect(base_url() . 'user/signup');
            }
          }
        }else{
          $this->session->set_flashdata('error', 'Error In submisstion');
          redirect(base_url() . 'user/signup');
        }
      } else {
        $this->session->set_flashdata('error', 'Error In submisstion');
        redirect(base_url() . 'user/signup');
      }
    } else {
      $this->session->set_flashdata('error', 'Error In payment Method');
      redirect(base_url() . 'user/signup');
    }
  }
  public function prepareData($amount, $razorpayOrderId)
  {
    $data = array(
      "key" => "rzp_test_QwQyLEAMfyLG2q",
      "amount" => $amount,
      "name" => "Syc07 - Safe your choice",
      "description" => "Buying a Plan",
      "image" => base_url() . "admin/assets/images/admin_b.jpg",
      "prefill" => array(
        "name"  => $_SESSION['rgister_name'],
        "email"  => $_SESSION['rgister_email'],
        "contact" => $_SESSION['rgister_number'],
      ),
      "notes"  => array(
        "address"  => "Testing",
        "merchant_order_id" => rand(),
      ),
      "theme"  => array(
        "color"  => "Blue"
      ),
      "order_id" => $razorpayOrderId,
    );
    return $data;
  }
}