<style>
  .thunbnail_image {
    height: 86px;
    width: 100px;
    margin-top: -11px;
  }

  .btn-circle {
    width: 30px;
    height: 30px;
    text-align: center;
    padding: 6px 0;
    font-size: 12px;
    line-height: 1.428571429;
    border-radius: 15px;
  }

  .btn-circle.btn-lg {
    width: 186px;
    height: 44px;
    padding: 10px 13px;
    font-size: 16px;
    line-height: 1.33;
    border-radius: 8px;
  }

  .note-editable {
    min-height: 180px !important;
    height: auto !important;
  }
</style>


<?php $setting_data = $this->db->get('rozarpay')->result_array();


  foreach($setting_data as $setting){
    $number = $setting['key_id'];
    $email = $setting['secret'];
  }

?>


<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container">
      <!--START Page-Title -->

      <div class="row">
        <div class="col-sm-12">
          <div class="col-md-8">
            <h4 class="page-title">Rozarpay Settings </h4>
            <hr>
          </div>


        </div>
      </div>
      <!--END Page-Title -->
      <div class="row">
        <div class="col-sm-12">
          <?php
          if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
            unset($_SESSION['success']);
          } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            unset($_SESSION['error']);
          }
          ?>
        </div>
      </div>
     
        <form action="<?php echo base_url()?>admin/rozarpaysetting/update_websetting" method="post">
      <div class="row">
        <div class="col-sm-12 m-t-20">
          <div class="card-box">

            <div class="form-group">
              <label>Key Id <sup>*</sup></label>
              <input type="text" class="form-control required_validation_for_product" value="<?php echo $email ?>" name="key" placeholder="Enter Key Id" />
            </div>

            <div class="form-group">
              <label>secret Key </label>
              <input type="text" class="form-control required_validation_for_product" name="secret" id="email" placeholder="secret KEY" value="<?php echo  $number?>" />
            </div>

            <div class="form-group">
              <input type="submit" name="formSubmit" value="Update" class="btn btn-info">
            </div>
          </div>




          <!--END ADD Shipping SECTION -->

        </div>


      </div>
      <?php echo form_close(); ?>



      
    </div>
  </div>
</div>
<!--Delete-->




