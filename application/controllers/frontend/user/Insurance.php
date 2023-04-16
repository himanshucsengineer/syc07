<?php
class Insurance extends CI_controller
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
        $this->load->view('frontend/user/insurance');
        $this->load->view('frontend/user/common/footer');
    }
}