  <!-- ======= Header ======= -->

  <?php 
    $user_id = $_SESSION['user_id'];
    $user_data = $this->db->where('id',$user_id)->get('user')->result_array();

    foreach($user_data as $value){
      $user_id = $value['id'];
      $user_name = $value['name'];
      $user_image = $value['image'];
    }

  ?>
  <style>
.logo img {
  max-height: 50px;
}
  </style>
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="<?php echo base_url()?>" class="logo d-flex align-items-center">
        <img src="<?php echo base_url()?>assest/images/logo2.jpeg" width="100px" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->



    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">


        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="<?php echo base_url()?>upload/user_image/<?php echo $user_image ?>" alt="Profile"
              class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><?php echo $user_name?></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url()?>user/profil">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url()?>logout">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->