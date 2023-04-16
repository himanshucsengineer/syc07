<?php
class News extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('frontend/Newsmodel');
    }

    public function index()
    {


        $this->load->view('frontend/template/header');
        $this->load->view('frontend/template/navbar');

        $this->load->view('frontend/news/news');
        $this->load->view('frontend/template/footer');
    }


    function fetch()
    {
     $output = '';
     $this->load->model('frontend/newsmodel');
     $data = $this->newsmodel->fetch_data($this->input->post('limit'), $this->input->post('start'));
     if($data->num_rows() > 0)
     {
      foreach($data->result() as $row)
      {         
                $date = $row->date;
                $old_date_timestamp = strtotime($date);
                $new_date = date('d F y', $old_date_timestamp);  
                $final_date = explode(" ", $new_date);
                $str = $row->content;
                $result = substr($str, 0, 100); 
       $output .= '<div class="flex">
                    <div class="left">
                        <h2>'.$final_date[0].'</h2>
                        <p>'.$final_date[1].' '.$final_date[2].'</p>
                    </div>
                    <div class="right">
                        <h1><a href="'.base_url().'watch-news/'.$row->link.'">'.$row->head.'</a></h1>
                        <p class="category">'.$row->cate.'</p>
                        <p class="content">'.$result.'</p>
                        <a href="'.base_url().'watch-news/'.$row->link.'" class="buy_line">Read more</a>
                    </div>
                </div>';
      }
     }
     echo $output;
    }
}
 