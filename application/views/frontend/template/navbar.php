


<?php if(isset($_SESSION['user_id'])){
  $user_data = $this->db->where('id',$_SESSION['user_id'])->get('user')->result_array();

  foreach($user_data as $user){
    $user_name = $user['name'];

  }

}  
  
?>


<?php
if (!isset($_SESSION["user_id"])) {
  $myaccount = '<li class=" nav-item">
      <a href="'.base_url().'user/login" class="nav-link"><button class="signup_button">login / signup</button></a>
  </li>
';
} else {
  $myaccount = '<li class=" nav-item dropdown" style="margin-top:7px;">
    <a class=" dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Mr. '.$user_name.'
  </a>
  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="'.base_url().'user/profile">My Profile</a>
    <a class="dropdown-item" href="'.base_url().'user/change-password">Change Password</a>
    <a class="dropdown-item" href="'.base_url().'logout">Logout</a>
  </div>
</li>';
}
?>
<?php
if (isset($_SESSION["user_id"])) {
  $myprofile = '<a href="' . base_url() . 'user/profile"><button class="but">My Profile</button></a>';
  $changepassword = '<a href="' . base_url() . 'user/change-password"><button class="but">Change Passwords</button></a>';
  $logout = '<a href="' . base_url() . 'logout"><button class="but">Logout</button></a>';
}
?>


  <style>
  .dropdown {
    position: relative;
    display: inline-block;
  }

  .dropdown-content {

    display: none;
    position: absolute;
    background-color: #011950;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
    padding: 0px !important;
    margin: 0px !important;
  }

  .dropdown-content a {
    color: #ffffff !important;

    padding: 0px !important;
    margin: 0px !important;
    text-decoration: none;
    display: block;
    padding: .7rem !important;
  }

  .dropdown-content a:hover {
    background-color: #ffffff;
    color: #011950 !important;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  @media only screen and (max-width: 600px) {
    .header_top .flex_top_first .left_first {
      width: 100%;
    }

    .header_top .flex_top_first .right_first {
      display: none;
    }

    .header_top .flex_top_first .left_first .top_secont_flex .left_second {
      width: 65%;
    }

    .header_top .flex_top_first .left_first .top_secont_flex .right_second {
      width: 35%;
      font-size: 15px;
    }

    .navbar {
      padding: .5rem 0rem;
    }
  }







  @media only screen and (max-width: 600px) {

    .side {
      display: block !important;
    }
  }

  .side {
    display: none;
  }

  .bs-canvas-overlay {
    opacity: 0;
    z-index: -1;
    background-color: rgba(0, 0, 0, .5);
  }

  .bs-canvas-overlay.show {
    opacity: 0.85;
    z-index: 150;
  }

  .bs-canvas {
    top: 0;
    width: 0;
    z-index: 160;
    overflow-x: hidden;
    overflow-y: auto;
  }

  .bs-canvas-left {
    left: 0;
  }

  .bs-canvas-right {
    right: 0;
  }

  .bs-canvas-anim {
    transition: all .2s ease-out;
    -webkit-transition: all .2s ease-out;
    -moz-transition: all .2s ease-out;
    -ms-transition: all .2s ease-out;
  }

  .but {
    width: 100%;
    height: auto;
    padding-top: .8rem;
    padding-bottom: .8rem;
    border-bottom: 1px solid #e6e6e6;
    border-top: none;
    border-right: none;
    background-color: #fff;
    border-left: none;
    color: #030303 !important;
    text-align: left !important;
    padding-left: 1.5rem;
    font-size: 18px;
    outline: none !important;
    transition: .5s;

  }

  .buu {
    width: 100%;
    height: auto;
    padding-top: .7rem;
    padding-bottom: .7rem;
    border-bottom: 1px solid #e6e6e6;
    border-top: none;
    border-right: none;
    background-color: #fff;
    border-left: none;
    color: rgb(239, 69, 84) !important;
    text-align: left !important;
    padding-left: 1.5rem;
    font-size: 18px;
    outline: none !important;
    transition: .5s;

  }

  .but:hover {
    background-color: #f2f2f2;


  }

  .buu:hover {
    background-color: #f2f2f2;
    color: #012169 !important;

  }

  .butt {
    width: 100%;
    height: auto;
    padding-top: .7rem;
    padding-bottom: .7rem;
    border-bottom: 1px solid #e9e9e9;
    border-top: none;
    border-right: none;
    background-color: #f9f9f9;
    border-left: none;
    color: #030303 !important;
    text-align: left !important;
    padding-left: 1.5rem;
    font-size: 18px;
    outline: none !important;
    transition: .5s;

  }

  .butt:hover {
    background-color: #f2f2f2;


  }

  .side {
    border: 1px solid #e9e9e9 !important;
    background-color: white !important;
    color: #011950 !important;
    font-size: 1.1rem;
  }

  .clc {
    font-size: 3rem !important;
    color: #000;
    font-weight: 100 !important;
    margin-right: 15px;
  }
  </style>



<?php $setting_data = $this->db->get('websetting')->result_array();

  foreach($setting_data as $setting){
    $webemail = $setting['email'];
    $webnumber = $setting['number'];
  }

?>


  <div class="bs-canvas-overlay bs-canvas-anim  position-fixed w-100 h-100"></div>

  <!-- Off-canvas sidebar markup, left/right or both. -->
  <div id="bs-canvas-left" class="bs-canvas bs-canvas-anim bs-canvas-left position-fixed bg-light h-100">
    <div class="bs-canvas-content  ">
      <button type="button" class="bs-canvas-close close clc" aria-label="Close"><span
          aria-hidden="true">&times;</span></button>

      <?php echo $myprofile?>
      <a href="<?php echo base_url();?>"><button class="but">Home</button></a>

      <a href="<?php echo base_url();?>products"><button class="but">Products</button></a>
      <a href="<?php echo base_url();?>news"><button class="but">News</button></a>
      <!-- <a href="<?php echo base_url(); ?>blogs"><button class="but">Blogs</button></a> -->
      <a href="<?php echo base_url(); ?>gallary"><button class="but">Our Gallary</button></a>
      <a href="<?php echo base_url(); ?>about-us"><button class="but">About us</button></a>
      <a href="<?php echo base_url(); ?>contact-us"><button class="but">Contact Us</button></a>
      <?php echo $changepassword?>
      <?php echo $logout?>

    </div>
  </div>
  <div class="header_top">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <p><i class="fas fa-phone"></i> +91 <?php echo $webnumber?> | <i class="far fa-envelope"></i> <?php echo $webemail?>
          </p>
        </div>
        <div class="col-md-6">
          <!--p class="sisis">An ISO 9001:2008 & Certified JAS-ANZ Company</p-->
        </div>
      </div>
    </div>
  </div>
  <header class="header-area bg-white main_header">
    <div class="navbar-area ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <nav class="navbar cucuc navbar-expand-lg">
              <div class="logo">
                <a class="custom-logo-link " rel="home" href="<?php echo base_url()?>"><img width="150" height="60"
                    src="<?php echo base_url()?>assest/images/paramount.png" alt="" class="custom-logo"></a>
                <a class="navbar-brand" href="#" rel="home"></a>
              </div>
              <div class="bs-offset-main bs-canvas-anim ">
                <button class="side" data-toggle="canvas" data-target="#bs-canvas-left" aria-expanded="false"
                  aria-controls="bs-canvas-left">&#9776;</button>
              </div>
              <div id="navbarSupportedContent" class="collapse navbar-collapse sub-menu-bar">
                <ul id="nav" class="navbar-nav ml-auto " style="float:left;">
                  <li class=" nav-item">
                    <a href="<?php echo base_url()?>" class="nav-link">Home</a>
                  </li>
                  <li class=" nav-item">
                    <a href="<?php echo base_url()?>products" class="nav-link">Products</a>
                  </li>
                  <li class=" nav-item">
                    <a href="<?php echo base_url()?>news" class="nav-link">News</a>
                  </li>
                
                  <li class=" nav-item">
                    <a href="<?php echo base_url()?>gallary" class="nav-link">Our Gallary</a>
                  </li>

                  <li class=" nav-item">
                    <a href="<?php echo base_url()?>about-us" class="nav-link">About Us</a>
                  </li>

                  <li class=" nav-item">
                    <a href="<?php echo base_url()?>contact-us" class="nav-link">Contact Us</a>
                  </li>
                  
                  

                  <?php echo $myaccount?>
                </ul>
              </div>
            </nav> <!-- navbar -->
          </div>
        </div> <!-- row -->
      </div> <!-- container -->
    </div> <!-- navbar area -->
  </header>
  <!--Header End-->


  <script>
  jQuery(document).ready(function($) {
    var bsDefaults = {
        offset: false,
        overlay: true,
        width: '280px'
      },
      bsMain = $('.bs-offset-main'),
      bsOverlay = $('.bs-canvas-overlay');

    $('[data-toggle="canvas"][aria-expanded="false"]').on('click', function() {
      var canvas = $(this).data('target'),
        opts = $.extend({}, bsDefaults, $(canvas).data()),
        prop = $(canvas).hasClass('bs-canvas-right') ? 'margin-right' : 'margin-left';

      if (opts.width === '100%')
        opts.offset = false;

      $(canvas).css('width', opts.width);
      if (opts.offset && bsMain.length)
        bsMain.css(prop, opts.width);

      $(canvas + ' .bs-canvas-close').attr('aria-expanded', "true");
      $('[data-toggle="canvas"][data-target="' + canvas + '"]').attr('aria-expanded', "true");
      if (opts.overlay && bsOverlay.length)
        bsOverlay.addClass('show');
      return false;
    });

    $('.bs-canvas-close, .bs-canvas-overlay').on('click', function() {
      var canvas, aria;
      if ($(this).hasClass('bs-canvas-close')) {
        canvas = $(this).closest('.bs-canvas');
        aria = $(this).add($('[data-toggle="canvas"][data-target="#' + canvas.attr('id') + '"]'));
        if (bsMain.length)
          bsMain.css(($(canvas).hasClass('bs-canvas-right') ? 'margin-right' : 'margin-left'), '');
      } else {
        canvas = $('.bs-canvas');
        aria = $('.bs-canvas-close, [data-toggle="canvas"]');
        if (bsMain.length)
          bsMain.css({
            'margin-left': '',
            'margin-right': ''
          });
      }
      canvas.css('width', '');
      aria.attr('aria-expanded', "false");
      if (bsOverlay.length)
        bsOverlay.removeClass('show');
      return false;
    });
  });
  </script>