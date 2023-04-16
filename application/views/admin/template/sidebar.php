<style>
.active {
  background-color: #0073aa;
  color: white;
}

.active a:hover {
  background-color: #0073aa !important;
  color: white !important;
}

a:hover {
  color: #0073aa !important;
}

li a {
  color: white !important;
  transition: .5s;
}

.fas {
  color: white !important;
}

li {
  transition: .5s;
}

li:hover {
  background-color: black !important;

}

.side {
  background-color: #23282d !important;

}
</style>

<?php if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'ON') {
  $url = "https://";
} else {
  $url = "http://";
}
$url .= $_SERVER['HTTP_HOST'];
$url .= $_SERVER['REQUEST_URI'];


$parts = basename($url);




?>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">
    <div id="col-navigation" class="side">
      <!-- Sidebar -->
      <ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->


        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item <?php echo ($parts == 'welcome') ? "active" : "" ?>">
          <a class="nav-link  " href="<?php echo base_url(); ?>welcome">
            <i class="fas fa-fw fa-tachometer-alt" style="color:white; font-size:1.5rem;"></i>
            <span>Dashboard</span></a>
          <span class="sr-only">
            (current)
          </span>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">



        <!-- Divider -->
        <!--    <hr class="sidebar-divider">

    <! -- Heading -->
        <div class="sidebar-heading">
          Update Website
        </div>







        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#gallary" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Gallary</span>
          </a>
          <div id="gallary" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/gallary/categary"
                style="font-size:1.3rem; ">Categary</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/gallary/newpost"
                style="font-size:1.3rem; ">Add Gallary</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/gallary/allpost"
                style="font-size:1.3rem; ">All Gallary</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>













        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#news" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>News</span>
          </a>
          <div id="news" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/news/newpost" style="font-size:1.3rem; ">
                New Post</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/news/allpost" style="font-size:1.3rem; ">
                All Post</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/news/category"
                style="font-size:1.3rem; ">Category</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>
        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePagesss"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Blogs</span>
          </a>
          <div id="collapsePagesss" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin//blog/newpost"
                style="font-size:1.3rem; ">New Post</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/blog/allpost"
                style="font-size:1.3rem; ">All Post</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/blog/category"
                style="font-size:1.3rem;">Category</a>
              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>

        <li class="nav-item ">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Breed" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Products</span>
          </a>
          <div id="Breed" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="py-2 collapse-inner rounded">
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/products/newpost"
                style="font-size:1.3rem; "> Add Product</a>
              <a class="collapse-item " href="<?php echo base_url(); ?>admin/products/allpost"
                style="font-size:1.3rem; "> All Products</a>

              <div class="collapse-divider"></div>
            </div>
          </div>
        </li>
        <li class="nav-item <?php echo ($parts == 'initialamount') ? "active" : "" ?>">
          <a class="nav-link " href="<?php echo base_url(); ?>admin/initialamount"><i
              class="fas fa-fw fa-table"></i><span>Update Initial Amount</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
        <div class="sidebar-heading">
          User Data
        </div>
        <li class="nav-item <?php echo ($parts == 'user') ? "active" : "" ?>">
          <a class="nav-link " href="<?php echo base_url(); ?>admin/user"><i
              class="fas fa-fw fa-table"></i><span>Users</span></a>
        </li>
        <li class="nav-item <?php echo ($parts == 'contactdata') ? "active" : "" ?>">
          <a class="nav-link " href="<?php echo base_url(); ?>admin/contactdata"><i
              class="fas fa-fw fa-table"></i><span>Contact Data</span></a>
        </li>
        <!-- <li class="nav-item <?php echo ($parts == 'donation') ? "active" : "" ?>">
          <a class="nav-link " href="<?php echo base_url(); ?>admin/donation"><i
              class="fas fa-fw fa-table"></i><span>Donate Data</span></a>
        </li> -->
        <hr class="sidebar-divider">

        <!-- Sidebar Toggler (Sidebar) -->


      </ul>
    </div>

    <!-- End of Sidebar -->