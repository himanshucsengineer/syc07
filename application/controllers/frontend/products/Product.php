<?php
class Product extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Productmodel');
         $this->load->helper('url');
    }

    public function index()
    {

        $data['blogs'] = $this->Productmodel->fetch(); 
        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');

        $this->load->view('frontend/products/product',$data);
        $this->load->view('frontend/template/footer');
    }

    function fetch()
    {
     $output = '';
     $this->load->model('frontend/Productmodel');
     $data = $this->Productmodel->fetch_data($this->input->post('limit'), $this->input->post('start'));
     if($data->num_rows() > 0)
     {
      foreach($data->result() as $row)
      {
       $output .= '<div class="card">
                        <div class="inner_card">
                            <a href="'.base_url().'product/'.$row->link.'"><img src="'.base_url().'upload/products/'.$row->image.'" alt="dog image"> </a>
                            <h3>Name: '.$row->name.'</h3>
                            <p>Price: Rs. '.$row->discounted_price.' (<del>Rs.'.$row->original_price.'</del>) Incl of all taxes</p>
                            <p style="margin-bottom:1.5rem;">Net '.$row->net_content.': '.$row->net_content_2.'</p>
                            
                        </div>
                    </div>';
      }
     }
     echo $output;
    }
}