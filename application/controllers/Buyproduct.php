<?php

require_once(APPPATH . "libraries/razorpay/razorpay-php/Razorpay.php");

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

class Buyproduct extends CI_Controller
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
  public function pay(){

    $rozarpaysetting = $this->db->get('rozarpay')->result_array();

    foreach($rozarpaysetting as $rozarpaykeys){
      $key_id = $rozarpaykeys['key_id'];
      $secret_key = $rozarpaykeys['secret'];
    }


    $api = new Api($key_id, $secret_key);

    $product_id = $this->input->post('product_id');

    
    $product_data = $this->db->where('id',$product_id)->get('products')->result_array();


    foreach($product_data as $proo){
      $product_amount = $proo['discounted_price'];
    }

    

    /**
     * You can calculate payment amount as per your logic
     * Always set the amount from backend for security reasons
     */
    $_SESSION['user_name_pro'] = $this->input->post('name');
    $_SESSION['pro_number'] = $this->input->post('number');
    $_SESSION['pro_email'] = $this->input->post('email');

    $_SESSION['pro_address1'] = $this->input->post('address1');
    $_SESSION['pro_address2'] = $this->input->post('address2');
    $_SESSION['pro_city'] = $this->input->post('city');
    $_SESSION['pro_state'] = $this->input->post('state');
    $_SESSION['pro_zip'] = $this->input->post('zip');
    $_SESSION['pro_country'] = $this->input->post('country');
    $_SESSION['pro_ship_address1'] = $this->input->post('ship_address1');
    $_SESSION['pro_ship_address2'] = $this->input->post('ship_address2');
    $_SESSION['pro_ship_city'] = $this->input->post('ship_city');
    $_SESSION['pro_ship_state'] = $this->input->post('ship_state');
    $_SESSION['pro_ship_zip'] = $this->input->post('ship_zip');
    $_SESSION['pro_ship_country'] = $this->input->post('ship_country');
    $_SESSION['pro_user_id'] = $this->input->post('user_id');
    $_SESSION['pro_product_id'] = $product_id;




    // $settingdata = $this->db->get('schemesetting')->result_array();
    // foreach($settingdata as $setting){
    //   $setting_joining = $setting['joining'];
    // }
   

    $_SESSION['payable_amount'] = $product_amount;
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
    $this->load->view('otherpay', array('data' => $data));
  }
  /**
   * This function verifies the payment,after successful payment
   */
  public function verify(){
    $success = true;
    $error = "payment_failed";
    // if (empty($this->input->post('razorpay_payment_id')) === false) {
    //   $api = new Api($key_id, $secret_key);
    //   try {
    //     $attributes = array(
    //       'razorpay_order_id' => $_SESSION['razorpay_order_id'],
    //       'razorpay_payment_id' => $this->input->post('razorpay_payment_id'),
    //       'razorpay_signature' => $this->input->post('razorpay_signature')
    //     );
    //     $api->utility->verifyPaymentSignature($attributes);
    //   } catch (SignatureVerificationError $e) {
    //     $success = false;
    //     $error = 'Razorpay_Error : ' . $e->getMessage();

        
    //   }
    // }
    
    if ($success === true) {

      $orderdata = array(
        'user_id' => $_SESSION['pro_user_id'],
        'product_id' => $_SESSION['pro_product_id'],
        'address1' => $_SESSION['pro_address1'],
        'address2' => $_SESSION['pro_address2'],
        'city' => $_SESSION['pro_city'],
        'state' => $_SESSION['pro_state'],
        'zip' => $_SESSION['pro_zip'],
        'country' => $_SESSION['pro_country'],
        'ship_address1' => $_SESSION['pro_ship_address1'],
        'ship_address2' => $_SESSION['pro_ship_address2'],
        'ship_city' => $_SESSION['pro_ship_city'],
        'ship_state' => $_SESSION['pro_ship_state'],

        'ship_zip' => $_SESSION['pro_ship_zip'],
        'ship_country' => $_SESSION['pro_ship_country'],
      );
      $create_order = $this->db->insert('orders',$orderdata);

      if ($create_order == true) {
        $fetchorders = $this->db->order_by('id','desc')->limit(1)->get('orders')->result_array();
        foreach($fetchorders as $order){
          $orderId = $order['id'];
        }

        $transaction = array(
          'transaction_id' => $_SESSION['razorpay_order_id'],
          'user_id' => $_SESSION['pro_user_id'],
          'order_id' => $orderId,
          'amount' => $_SESSION['payable_amount'],
        );
        
        $create_transaction = $this->db->insert('order_transaction',$transaction);
        
        
        if($create_transaction == true){

          $referdata = $this->db->where('refer_to',$_SESSION['pro_user_id'])->get('refer')->result_array();
          
          if($referdata == Array()){
            $this->session->set_flashdata('error', 'Order Successfully Placed!');
            redirect(base_url() . 'user/my-orders');
          }else{
            foreach($referdata as $refer){
              $referfrom = $refer['refer_from'];

              $settingdata = $this->db->get('schemesetting')->result_array();

              foreach($settingdata as $setting){
                // $setting_joining = $setting['joining'];
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

                $calculateteam1salary = ($setting_salary/100)*$product_amount;

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
                        $this->session->set_flashdata('success', 'Order Succussfully Placed!');
                        redirect(base_url() . 'user/my-orders');
                        session_destroy();
                        // unset($_SESSION["razorpay_order_id"]);
                        // unset($_SESSION["agree"]);
                        // unset($_SESSION["rgister_name"]);
                        // unset($_SESSION["rgister_email"]);
                        // unset($_SESSION["rgister_number"]);
                        // unset($_SESSION["rgister_aadhar"]);
                        // unset($_SESSION["rgister_dob"]);
                        // unset($_SESSION["rgister_gender"]);
                        // unset($_SESSION["rgister_address"]);
                        // unset($_SESSION["rgister_country"]);
                        // unset($_SESSION["rgister_refer_to"]);
                        // unset($_SESSION["rgister_password"]);
                        // unset($_SESSION["rgister_image"]);
                      }else{
                        $this->session->set_flashdata('error', 'Error In submisstion');
                        redirect(base_url() . 'user/buy-product/'.$product_id);
                      }
  
                      
                    }else{
                      $this->session->set_flashdata('error', 'Error In submisstion');
                      redirect(base_url() . 'user/buy-product/'.$product_id);
                    }
                  }
                }else{
                  $this->session->set_flashdata('error', 'Error In submisstion');
                  redirect(base_url() . 'user/buy-product/'.$product_id);

                }

              }else{
                $this->session->set_flashdata('error', 'Error In submisstion');
                redirect(base_url() . 'user/buy-product/'.$product_id);
              }
            }
  
            // $referto = $userId;
  
            // $referarray = array(
            //   'refer_from' => $referfrom,
            //   'refer_to' => $referto,
            // );
  
            // $create_refer = $this->db->insert('refer',$referarray);
  
            // if($create_refer == true){
              
            // }else{
            //   $this->session->set_flashdata('error', 'Error In submisstion');
            //   redirect(base_url() . 'user/signup');
            // }
          }
        }else{
          $this->session->set_flashdata('error', 'Error In submisstion');
          redirect(base_url() . 'user/buy-product/'.$product_id);

        }
      } else {
        $this->session->set_flashdata('error', 'Error In submisstion');
        redirect(base_url() . 'user/buy-product/'.$product_id);

      }
    } else {
      $this->session->set_flashdata('error', 'Error In payment Method');
      redirect(base_url() . 'user/signup');

    }
  }

  public function prepareData($amount, $razorpayOrderId)
  {
    $data = array(
      "key" => $key_id,
      "amount" => $amount,
      "name" => "Paramount07",
      "description" => "Buying a Plan",
      "image" => base_url() . "assest/images/paramount.png",
      "prefill" => array(
        "name"  => "Himanshu Goyal",
        "email"  => "himanshugoyal@gmail.com",
        "contact" => "2345678900",
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