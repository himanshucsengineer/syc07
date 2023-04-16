<?php
class Newpost extends CI_controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('vendorAuth')) {
            redirect('admin/login');
        }
        $this->load->model('admin/news/Catemodel');
        $this->load->model('admin/news/Newpostmodel');
    }

    public function index()
    {

        $data['fetch_category'] = $this->Catemodel->fetch_data();

        $this->load->view('admin/template/header');
        $this->load->view('admin/template/sidebar');
        $this->load->view('admin/template/topbar');
        $this->load->view('admin/news/newpost', $data);
        $this->load->view('admin/template/footer');
    }


    public function post()
    {
        $this->load->model('admin/news/newpostmodel');
        $this->input->post('formSubmit');


        if (!empty($_FILES['images']['name'])) {
            $File_name = '';
            $config['upload_path'] = APPPATH . '../upload/news';
            $config['file_name'] = $File_name;
            $config['overwrite'] = TRUE;
            $config["allowed_types"] = 'jpeg|jpg|png';
            $config["max_size"] = '';
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('images')) {
                $this->data['error'] = $this->upload->display_errors();
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/news/newpost');
            } else {
                $dataimage_return = $this->upload->data();
                $imageurl =$dataimage_return['file_name'];
            }
        }

        $link = $this->input->post('link');
        $link = str_replace(' ', '-', $link);



        $datas = array(
            'head' => $this->input->post('heading'),
        
            // 'm_desc' => $this->input->post('mdesc'),
            // 'm_key' => $this->input->post('mkey'),
            'content' => $this->input->post('content'),
            'cate' => $this->input->post('category'),
            'link' => $link,
            //'tag' => $this->input->post('tags'),

            'image' => $imageurl,
        );
        if ($this->newpostmodel->newpost($datas)) {
            $this->session->set_flashdata('success', 'Post Published');
            redirect(base_url() . 'admin/news/newpost');
        } else {
            $this->session->set_flashdata('error', 'Error In Updating Please Try Again');
            redirect(base_url() . 'admin/news/newpost');
        }
    }
}
