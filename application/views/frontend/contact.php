<link rel="stylesheet" href="<?php echo base_url()?>assest/css/contact.css">
</head>
<?php $setting_data = $this->db->get('websetting')->result_array();

  foreach($setting_data as $setting){
    $webemail = $setting['email'];
    $webnumber = $setting['number'];
    $webaddress = $setting['address'];
  }

?>
<body>
  <?php $this->load->view('frontend/template/navbar')?>

  <div class="contact_top">
    <div class="container">
      <h2>Contact Us</h2>
      <p>Let's connect With Experts</p>
    </div>
  </div>

  <div class="contact_form">
    <div class="container">
      <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
            unset($_SESSION['success']);
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            unset($_SESSION['error']);
            
        }
        ?>
      <form action="<?php echo base_url()?>frontend/contact/insert_data" method="post">
        <div class="row justify-content-center">
          <div class="col-md-12 contact_main_form">
            <div class="row">
              <div class="col-md-6">
                <label for="">Name:</label>
                <input type="text" name="name" placeholder="Enter Your Name">
              </div>
              <div class="col-md-6">
                <label for="">Email:</label>
                <input type="email" name="email" placeholder="Enter Your Email">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="">Phone:</label>
                <input type="number" name="mob" placeholder="Enter Your Number">
              </div>
              <div class="col-md-6">
                <label for="">Subject:</label>
                <input type="text" name="sub" placeholder="Enter Subject">
              </div>
            </div>
            <label for="">Message:</label>
            <textarea name="msg" id="" cols="30" rows="5" placeholder="Message Here...."></textarea>
            <button>Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="contact_deeee">
    <div class="container">
      <div class="contact_main_details">
        <div class=" contact_main_details_card ">
          <div class=" contact_main_details_card_inner ">
            <i class="fas fa-phone"></i>
            <h2>Contact Us</h2>
            <p><span class="bllbb">Phone:</span> +91 <?php echo $webnumber?></p>

            <p><span class="bllbb">Email:</span> <?php echo $webemail?></p>
          </div>
        </div>
        <!-- <div class=" contact_main_details_card">
          <div class=" contact_main_details_card_inner ">
            <i class="fas fa-map-marker-alt"></i>
            <h2>Address</h2>
            <p><span class="bllbb">Bada Engineering Pvt. Ltd.</span></p>
            <p>Corporate Office - Plot no 1031 Adrash Nagar Behind Krishna Hospital Samastipur (848101)</p>
          </div>
        </div> -->
      </div>
    </div>
  </div>