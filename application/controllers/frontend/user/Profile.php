<?php
class Profile extends CI_controller
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
        $this->load->view('frontend/user/profile');
        $this->load->view('frontend/user/common/footer');
    }




    public function update_profile(){
        $this->load->model('frontend/Signupmodel');
        $this->input->post('formSubmit');

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('number', 'Number', 'required');
        $this->form_validation->set_rules('gender', 'Address', 'required');

        $this->form_validation->set_rules('dob', 'Name', 'required');
        $this->form_validation->set_rules('address', 'Email', 'required');
        $this->form_validation->set_rules('country', 'Number', 'required');
        
        if ($this->form_validation->run()) {

            $data = array(
                'name' => $this->input->post('name'),
                'email' => $this->input->post('email'),
                'number' => $this->input->post('number'),
                'gender' => $this->input->post('gender'),
                'dob' => $this->input->post('dob'),
                'address' => $this->input->post('address'),
                'country' => $this->input->post('country'),
            );

            $id = $_SESSION['user_id'];

            if ($this->Signupmodel->update_pro($data, $id)) {
                $this->session->set_flashdata('error', 'Error In Submission');
                redirect(base_url().'user/profile');
            } else {
                $this->session->set_flashdata('success', 'Profile Updated');
                redirect(base_url().'user/profile');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url().'user/profile');
        }
    }


    public function change_password(){
        $this->load->model('frontend/Signupmodel');
        $this->input->post('formSubmit');

        $this->form_validation->set_rules('old_pass', 'Name', 'required');
        $this->form_validation->set_rules('new_pass', 'Email', 'required');
        $this->form_validation->set_rules('confirm_pass', 'Number', 'required');
        
        if ($this->form_validation->run()) {
            $id = $_SESSION['user_id'];

            $user_data = $this->db->where('id',$id)->get('user')->result_array();
            foreach($user_data as $user){
                $oldPass = $user['password'];
            }

            if($this->input->post('new_pass') == $this->input->post('confirm_pass')){
                if($oldPass == $this->input->post('old_pass')){
                    $data = array(
                        'password' => $this->input->post('confirm_pass'),
                    );
                    if ($this->Signupmodel->update_pro($data, $id)) {
                        $this->session->set_flashdata('error', 'Error In Submission');
                        redirect(base_url().'user/profile');
                    } else {
                        $this->session->set_flashdata('success', 'Password Updated');
                        redirect(base_url().'user/profile');
                    }
                }else{
                    $this->session->set_flashdata('error', 'Incorrect Old password!');
                    redirect(base_url().'user/profile');
                }
            }else{
                $this->session->set_flashdata('error', 'Password Not Matched!');
                redirect(base_url().'user/profile');
            }
        } else {
            $this->session->set_flashdata('error', 'Please Fill All The Fields');
            redirect(base_url().'user/profile');
        }
    }
}