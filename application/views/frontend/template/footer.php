<?php $setting_data = $this->db->get('websetting')->result_array();

  foreach($setting_data as $setting){
    $webemail = $setting['email'];
    $webnumber = $setting['number'];
    $webaddress = $setting['address'];
  }

?>



<!--Footer Start-->
<div class="shadow-lg foot">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <h5>Syc07</h5>
        <p>Syc07 (Safe your choice) is a Professional Affilate marketing Platform. Here we will provide you only
          interesting content, which you will like very much. We're dedicated to providing you the best of Affilate
    
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <h5>Important Links</h5>
        <div class="links">
          <a href="<?php echo base_url()?>privacy-policy">Privacy-Policy</a></br>
          <a href="<?php echo base_url()?>refund-policy">Refund & Cancellation</a></br>
          <a href="<?php echo base_url()?>term">Term & Conditions</a></br>
          <a href="<?php echo base_url()?>about-us">About Us</a></br>
          <a href="<?php echo base_url()?>contact-us">Contact us</a></br>

        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <h5>Quick links</h5>
        <div class="links">
          <a href="<?php echo base_url()?>products">Products</a></br>
          <a href="<?php echo base_url()?>news">News</a></br>
          <!-- <a href="<?php echo base_url()?>blogs">Blogs</a></br> -->
          <a href="<?php echo base_url()?>gallary">Gallary</a></br>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <h5>get in touch</h5>
        <div class="subscribe_flex_1">
          <div class="left">
            <input type="email" name="" placeholder="Email">
          </div>
          <div class="right">
            <button>Submit</button>
          </div>
        </div>
        <div class="subscribe_flex_2">
          <div class="left">
            <i class="fas iconnn fa-map-marker-alt"></i>
          </div>
          <div class="right">
            <p>Corporate Office - <?php echo $webaddress?></p>
          </div>
        </div>
        <div class="subscribe_flex_2">
          <div class="left">
            <i class="far iconnn fa-envelope"></i>
          </div>
          <div class="right">
            <p><?php echo $webemail?></p>
          </div>
        </div>
        <div class="subscribe_flex_2">
          <div class="left">
            <i class="fas iconnn fa-phone"></i>
          </div>
          <div class="right">
            <p>+91 <?php echo $webnumber?></p>
          </div>
        </div>
      </div>
    </div>
    <hr class="style2">
    <h6>@2021 Paramount07 ALL RIGHTS RESERVED 
    </h6>
  </div>
</div>
<!--Footer End-->

</body>

</html>