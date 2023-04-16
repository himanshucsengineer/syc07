<?php

require_once(APPPATH . "libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Sponsor extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('frontend/Donatemodel');
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
    $api = new Api('rzp_test_If4Pd1l3k6g25g', 'IdgTV3Z597LLTadL1rn2n5n2');
    /**
     * You can calculate payment amount as per your logic
     * Always set the amount from backend for security reasons
     */
    $_SESSION['name'] = $this->input->post('name');
    $_SESSION['email'] = $this->input->post('email');
    $_SESSION['mob'] = $this->input->post('mob');
    $_SESSION['address'] = $this->input->post('add');
    $_SESSION['state'] = $this->input->post('state');
    $_SESSION['city'] = $this->input->post('city');
    $_SESSION['indi'] = $this->input->post('indi');
    $_SESSION['motivate'] = $this->input->post('moti');
    $_SESSION['uniqid'] = $this->input->post('uniqid');
    $_SESSION['p_name'] = $this->input->post('p_name');
    $_SESSION['p_age'] = $this->input->post('p_age');
    $_SESSION['p_color'] = $this->input->post('p_color');
    $_SESSION['p_gender'] = $this->input->post('p_gender');
    $_SESSION['p_image'] = $this->input->post('p_image');
    $_SESSION['p_breed'] = $this->input->post('p_breed');
    $_SESSION['payable_amount'] = $this->input->post('amount');
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
    $this->load->view('sponserpay', array('data' => $data));
  }
  /**
   * This function verifies the payment,after successful payment
   */
  public function verify()
  {
    $success = true;
    $error = "payment_failed";
    if (empty($_POST['razorpay_payment_id']) === false) {
      $api = new Api('rzp_test_If4Pd1l3k6g25g', 'IdgTV3Z597LLTadL1rn2n5n2');
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
      $data = array(
        'order_id' => $_SESSION['razorpay_order_id'],
        'name' => $_SESSION['name'],
        'email' => $_SESSION['email'],
        'number' => $_SESSION['mob'],
        'address' => $_SESSION['address'],
        'state' => $_SESSION['state'],
        'city' => $_SESSION['city'],
        'indi' => $_SESSION['indi'],
        'motivate' => $_SESSION['motivate'],
        'uniqid' => $_SESSION['uniqid'],
        'p_name' => $_SESSION['p_name'],
        'p_age' => $_SESSION['p_age'],
        'p_color' => $_SESSION['p_color'],
        'p_gender' => $_SESSION['p_gender'],
        'p_image' => $_SESSION['p_image'],
        'p_breed' => $_SESSION['p_breed'],
        'amount' => $_SESSION['payable_amount'],
      );
      if ($this->Donatemodel->insert_spondor_data($data)) {
        $this->session->set_flashdata('success', 'Thank You For Your Donation');
        redirect(base_url() . 'sponsor-an-animal');
      } else {
        $this->session->set_flashdata('error', 'Error In submisstion');
        redirect(base_url() . 'sponsor-an-animal');
      }
    } else {
      $this->session->set_flashdata('error', 'Error In payment Method');
      redirect(base_url() . 'sponsor-an-animal');
    }
  }
  public function prepareData($amount, $razorpayOrderId)
  {
    $data = array(
      "key" => "rzp_test_If4Pd1l3k6g25g",
      "amount" => $amount,
      "name" => "Dog Bazar",
      "description" => "Buying a Plan",
      "image" => base_url() . "admin/assets/images/admin_b.jpg",
      "prefill" => array(
        "name"  => $this->input->post('name'),
        "email"  => $this->input->post('email'),
        "contact" => $this->input->post('contact'),
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
