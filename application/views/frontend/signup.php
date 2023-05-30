





<style>
.divider:after,
.divider:before {
content: "";
flex: 1;
height: 1px;
background: #eee;
}
.h-custom {
height: calc(100% - 73px);
}
@media (max-width: 450px) {
.h-custom {
height: 100%;
}
}
</style>



<section class="mt-5 mb-5">
  <div class="container-fluid h-custom">
  <?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
            unset($_SESSION['success']);
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
            unset($_SESSION['error']);
        }
        ?>
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-4 col-xl-4">
        <img src="<?php echo base_url()?>assest/images/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-8 col-xl-8 offset-xl-1">
        <form action="<?php echo base_url()?>frontend/signup/create" method="post" enctype="multipart/form-data">


          <div class="row">
            <div class="col-md-6">
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Name</label>
                <input type="text" name="name" id="form3Example3" class="form-control form-control-lg" placeholder="Enter Full Name" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email address</label>
                <input type="email" name="email" id="form3Example3" class="form-control form-control-lg" placeholder="Enter a valid email address" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Number</label>
                <input type="number" name="number" id="form3Example3" class="form-control form-control-lg" placeholder="Enter Mobile Number" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Date Of Birth</label>
                <input type="date" name="dob" id="form3Example3" class="form-control form-control-lg" placeholder="Enter Date Of Birth" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Gender</label>
                <select name="gender" id="" id="form3Example3" class="form-control form-control-lg">
                  <option value="">Select Gender</option>
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Others</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Aadhar Number</label>
                <input type="text" id="form3Example3" name="aadhar" class="form-control form-control-lg" placeholder="Enter Aadhar Number" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Candidate Photo</label>
                <input type="file" id="form3Example3"  name="images" class="form-control form-control-lg" placeholder="Enter Full Name" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Address</label>
                <input type="text" id="form3Example3" name="address" class="form-control form-control-lg" placeholder="Enter Address" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Country</label>
                <select name="country" id="" id="form3Example3" class="form-control form-control-lg">
                  <option value="">Select Country</option>
                  <option value="india">India</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Reffral Code</label>
                <input type="text" id="form3Example3" name="refer" class="form-control form-control-lg" placeholder="Enter Refferal Code" />
              </div>
            </div>
          </div>


          <div class="row">
            <div class="col-md-6">
              <div class="form-outline mb-3">
                <label class="form-label" for="form3Example4">Password</label>
                <input type="password" id="form3Example4" name="password" class="form-control form-control-lg" placeholder="Enter password" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-outline mb-3">
                <label class="form-label" for="form3Example4">Confirm Password</label>
                <input type="password" id="form3Example4" name="confirm_password" class="form-control form-control-lg" placeholder="Enter confirm password" />
              </div>
            </div>
          </div>
          <div class="text-center text-lg-start mt-4 pt-2">
            <button  class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Next</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="<?php echo base_url()?>user/login"
                class="link-danger">Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>

</section>