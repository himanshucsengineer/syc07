<style>
* {
  margin: 0px;
  padding: 0px;
  ;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

.container {
  display: grid;
  grid-template-columns: 1fr 2fr;
  background-color: red;
  background: linear-gradient(to bottom, rgb(6, 108, 100), rgb(14, 48, 122));
  /* width: 800px; */
  height: 550px;
  /* margin: 10% auto; */
  padding: 0px;
  border-radius: 5px;
}

.content-holder {
  text-align: center;
  color: white;
  font-size: 14px;
  font-weight: lighter;
  letter-spacing: 2px;
  margin-top: 15%;
  padding: 50px;
}

.content-holder h2 {
  font-size: 34px;
  margin: 20px auto;
}

.content-holder p {
  margin: 30px auto;
}

.content-holder button {
  border: none;
  font-size: 15px;
  padding: 10px;
  border-radius: 6px;
  background-color: white;
  width: 150px;
  margin: 20px auto;
}


.box-2 {
  background-color: white;

  margin: 5px;
}

.login-form-container {
  text-align: center;
  margin-top: 10%;
  padding: 1rem;
}

.login-form-container h1 {
  color: black;
  font-size: 24px;
  padding: 20px;
}

.input-field {
  box-sizing: border-box;
  font-size: 14px;
  padding: 10px;
  border-radius: 7px;
  border: 1px solid rgb(168, 168, 168);
  width: 100%;
  outline: none;
  margin-bottom: 1rem;
  outline: none;
}

.login-button {
  box-sizing: border-box;
  color: white;
  font-size: 14px;
  padding: 13px;
  border-radius: 7px;
  border: none;
  width: 250px;
  outline: none;
  background-color: rgb(56, 102, 189);
}



.button-2 {
  display: none;
}





.signup-form-container {
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -60%);
  text-align: center;
  display: none;
  width: 100%;
  padding: 1rem;
}


.signup-form-container h1 {
  color: black;
  font-size: 24px;
  padding: 20px;
}

.signup-button {
  box-sizing: border-box;
  color: white;
  font-size: 14px;
  padding: 13px;
  border-radius: 7px;
  border: none;
  width: 250px;
  outline: none;
  background-color: rgb(56, 189, 149);
}

.login_signup_form {
  width: 100%;
  height: auto;
  padding: 4rem 0rem;
}

@media screen and (max-width: 600px) {
  .container {
    display: grid;
    grid-template-columns: none;
  }

  .login_signup_form {
    padding: 0rem;
    margin-top: -4rem;
  }
}
</style>


<?php
        if ($this->session->flashdata('success')) {
            echo '<div class="alert alert-success">' . $this->session->flashdata('success') . '</div>';
        } else if ($this->session->flashdata('error')) {
            echo '<div class="alert alert-danger">' . $this->session->flashdata('error') . '</div>';
        }
        ?>
<div class="login_signup_form">
  <div class="container">
    <!--Data or Content-->

    <div class="box-1">
      <div class="content-holder">
        <h2>Hello!</h2>

        <button class="button-1" onclick="signup()">Sign up</button>
        <button class="button-2" onclick="login()">Login</button>
      </div>
    </div>


    <!--Forms-->
    <div class="box-2">
      <div class="login-form-container">
        <h1>Login Form</h1>
        <form action="<?php echo base_url()?>frontend/signup/login" method="post">
          <div class="row">
            <div class="col-md-12">
              <input type="text" name="email" placeholder="Email" class="input-field">
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <input type="password" name="password" placeholder="Password" class="input-field">
            </div>
          </div>
          <button class="login-button">Login</button>
        </form>
      </div>


      <!--Create Container for Signup form-->
      <div class="signup-form-container">
        <h1>Sign Up Form</h1>
        <form action="<?php echo base_url()?>frontend/signup/create" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-6">
              <input type="text" name="name" placeholder="Full Name" class="input-field">
            </div>
            <div class="col-md-6">
              <input type="email" name="email" placeholder="Email" class="input-field">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <input type="number" name="number" placeholder="Number" class="input-field">
            </div>
            <div class="col-md-6">
              <input type="text" name="aadhar" placeholder="Adhar card Number" class="input-field">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <input type="date" name="dob" placeholder="" class="input-field">
            </div>
            <div class="col-md-6">
              <select class="input-field" name="gender">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Others</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <input type="file" name="images" placeholder="Email" class="input-field">
            </div>
            <div class="col-md-6">
              <textarea name="address" id="" cols="30" rows="1" class="input-field"
                placeholder="Enter Address"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <select class="input-field" name="country">
                <option value="">Select Country</option>
                <option value="India">India</option>
              </select>
            </div>
            <div class="col-md-6">
              <input type="text" name="refer" placeholder="Reffral Code" class="input-field">
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <input type="password" name="password" placeholder="Password" class="input-field">
            </div>
            <div class="col-md-6">
              <input type="text" name="confirm_password" placeholder="Confirm Password" class="input-field">
            </div>
          </div>
          <button class="signup-button">Next</button>
        </form>
      </div>



    </div>
  </div>






  <script>
  function signup() {
    document.querySelector(".login-form-container").style.cssText = "display: none;";
    document.querySelector(".signup-form-container").style.cssText = "display: block;";
    document.querySelector(".container").style.cssText =
      "background: linear-gradient(to bottom, rgb(56, 189, 149),  rgb(28, 139, 106));";
    document.querySelector(".button-1").style.cssText = "display: none";
    document.querySelector(".button-2").style.cssText = "display: block";

  };

  function login() {
    document.querySelector(".signup-form-container").style.cssText = "display: none;";
    document.querySelector(".login-form-container").style.cssText = "display: block;";
    document.querySelector(".container").style.cssText =
      "background: linear-gradient(to bottom, rgb(6, 108, 224),  rgb(14, 48, 122));";
    document.querySelector(".button-2").style.cssText = "display: none";
    document.querySelector(".button-1").style.cssText = "display: block";

  }
  </script>