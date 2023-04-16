<?php
class Login extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        //  $this->load->model('frontend/Homemodel');
    }

    public function index()
    {
        //     $getsocials['brandslogo'] = $this->Homemodel->fetchaddinventory_api();
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');
        $this->load->view('frontend/login');
        $this->load->view('frontend/template/footer');
    }

    public function login()
    {
        $url = $_SESSION['url'];
        $this->load->model('frontend/Signupmodel');
        $model_data = $this->Signupmodel->fetchModeldata();
        $login_success = 0;
        $user_data = array(
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
        );
        foreach ($model_data as $value) {
            if ((strtolower($value['email']) == strtolower($user_data['email'])) && ($value['pass'] == $user_data['password'])) {

                $_SESSION["email"] = $value["email"];
                $_SESSION["name"] = $value["name"];
                $_SESSION["number"] = $value["number"];
                $_SESSION["add"] = $value["address"];
                $login_success = 1;
                break;
            }
        }
        if ($login_success == 1) {
            redirect(base_url() . 'profile');
        } else {
            $this->session->set_flashdata('error', 'Wrong Email Or Password');
            redirect($url);
        }
    }

    public function signup()
    {
        $this->load->model('frontend/Signupmodel');
        $this->input->post('formSubmit');
        $this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.email]');
        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $name = $this->input->post('name');

            $password = $this->input->post('password');
            if ($this->Signupmodel->signup($email, $name, $password)) {
                $_SESSION["email"] = $this->input->post('email');
                $_SESSION["name"] = $this->input->post('name');

                $this->session->set_flashdata('success', 'Signup Successful');
                redirect(base_url() . 'profile');
            } else {
                $this->session->set_flashdata('error', 'Wrong Email Or Password');
                redirect(base_url());
            }
        } else {
            $this->session->set_flashdata('error', 'This  email already used by someone try with another email');
            redirect(base_url());
        }
    }


    public function update_pro()
    {
        $this->load->model('frontend/Signupmodel');

        $this->input->post('formSubmit');


        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('mob', 'Number', 'required');
        $this->form_validation->set_rules('add', 'Address', 'required');
        if ($this->form_validation->run()) {

            $name = $this->input->post('name');
            $email = $this->input->post('email');
            $number = $this->input->post('mob');
            $addrs = $this->input->post('add');


            if ($this->Signupmodel->update_pro($name, $number, $email, $addrs)) {


                $_SESSION["name"] = $this->input->post('name');
                $_SESSION["email"] = $this->input->post('email');
                $_SESSION["number"] = $this->input->post('number');
                $_SESSION["add"] = $this->input->post('add');
               
                
                $this->session->set_flashdata('error', 'Error In Submission');
            redirect(base_url().'profile');
            } else {
              
                $this->session->set_flashdata('success', 'Your data have been submitted');
            redirect(base_url().'profile');
            }
        } else {
            
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url().'profile');
        }
    }
}
