<link rel="stylesheet" href="<?php echo base_url()?>assest/css/about.css">
</head>

<body>
  <?php $this->load->view('frontend/template/navbar')?>


<style>

@import url(https://fonts.googleapis.com/css?family=Raleway:400,100,300,500,700,900);

html {
  background-color: #ECEEF4;
  font-family: "Raleway", sans-serif;
}



.form__name {
  color: #B9BAC5;
  padding: 10px;
  font-size: 1.5rem;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-weight: 700;
  margin-top: 60px;
}

.form__container {
  width: 100%;
  min-height: 300px;
  background-color: #fff;
  border: 1px solid #DADDE8;
  border-radius: 5px;
  padding: 30px;
  margin-bottom: 100px;
}

.personal--form {
  color: #A4A9C5;
  font-size: 0.7rem;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  font-weight: 700;
  padding: 10px 55px;
  margin-top: 10px;
}
.personal--form .last {
  margin-left: 40px;
}
.personal--form .first, .personal--form .last, .personal--form .email {
  display: inline-block;
}
.personal--form .first label, .personal--form .last label, .personal--form .email label {
  margin-bottom: 10px;
}
.personal--form .first label, .personal--form .first input, .personal--form .last label, .personal--form .last input, .personal--form .email label, .personal--form .email input {
  display: block;
  min-width: 250px;
}
.personal--form .email {
  margin-top: 20px;
}
.personal--form .email input {
  width: 540px;
}

.shipping--form {
  color: #A4A9C5;
  font-size: 0.7rem;
  letter-spacing: 0.5px;
  text-transform: uppercase;
  font-weight: 700;
  padding: 10px 55px;
  margin-top: 10px;
}
.shipping--form .row.two, .shipping--form .row.three {
  margin-top: 20px;
}
.shipping--form .address-two, .shipping--form .state, .shipping--form .country {
  margin-left: 40px;
}
.shipping--form .address, .shipping--form .address-two, .shipping--form .city, .shipping--form .state, .shipping--form .zip, .shipping--form .country {
  display: inline-block;
}
.shipping--form .address label, .shipping--form .address-two label, .shipping--form .city label, .shipping--form .state label, .shipping--form .zip label, .shipping--form .country label {
  margin-bottom: 10px;
}
.shipping--form .address label, .shipping--form .address input, .shipping--form .address-two label, .shipping--form .address-two input, .shipping--form .city label, .shipping--form .city input, .shipping--form .state label, .shipping--form .state input, .shipping--form .zip label, .shipping--form .zip input, .shipping--form .country label, .shipping--form .country input {
  display: block;
  min-width: 250px;
}

.form__question {
  padding: 10px 55px;
  color: #646E8A;
}
.form__question p {
  display: inline-block;
  margin-left: 10px;
  font-weight: 500;
  vertical-align: middle;
}
.form__question input[type=checkbox] {
  cursor: pointer;
  display: inline-block;
  vertical-align: middle;
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  width: 20px;
  height: 20px;
  background-color: transparent;
  border-radius: 3px;
  border: 2px solid #646E8A;
  transition: background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
}
.form__question input[type=checkbox]:checked {
  background-color: #18C2C0;
}

input {
  font-size: 0.8rem;
  font-weight: 700;
  letter-spacing: 0.5px;
  background: transparent;
  border: 1px solid #A4A9C5;
  border-radius: 3px;
  outline: none;
  padding: 10px;
  transition: border-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
  color: #18C2C0;
}
input:-webkit-autofill {
  -webkit-box-shadow: 0 0 0px 1000px white inset;
  -webkit-text-fill-color: #18C2C0;
}
input:focus {
  border-color: #18C2C0;
}
input::-moz-placeholder {
  font-weight: 500;
  color: #646E8A;
}
input:-ms-input-placeholder {
  font-weight: 500;
  color: #646E8A;
}
input::placeholder {
  font-weight: 500;
  color: #646E8A;
}

.form__confirmation {
  padding: 10px 55px;
}

.confirm {
  font-size: 12px;
  text-transform: uppercase;
  font-weight: 700;
  letter-spacing: 1px;
  background-color: #18C2C0;
  border: 1px solid #DADDE8;
  color: #fff;
  padding: 18px;
  border-radius: 5px;
  outline: none;
  transition: background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
  position: relative;
  left: 80%;
}
.confirm:hover {
  background-color: #15aeac;
}
.confirm:active {
  background-color: #139b99;
}

.box {
  cursor: default;
  -webkit-user-select: none;
     -moz-user-select: none;
      -ms-user-select: none;
          user-select: none;
  display: inline-block;
  font-size: 1.5rem;
  font-weight: 400;
  height: 40px;
  width: 40px;
  line-height: 35px;
  border-radius: 50px;
  border: 2px solid #646E8A;
  text-align: center;
  color: #646E8A;
}
.box.billing {
  line-height: 30px;
}

section {
  margin-top: 50px;
}
section:nth-child(1) {
  margin-top: 0px;
}

.sections span {
  color: #646E8A;
  text-transform: uppercase;
  font-weight: 500;
  letter-spacing: 1px;
  margin-left: 15px;
}

</style>

<?php 
       if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
       $url = "https://";   
  else  
       $url = "http://";   
  // Append the host(domain name, ip) to the URL.   
  $url.= $_SERVER['HTTP_HOST'];   
  
  // Append the requested resource location to the URL   
  $url.= $_SERVER['REQUEST_URI'];    
  $product_id = basename($url);
?>
<?php 

$user_data = $this->db->where('id',$_SESSION['user_id'])->get('user')->result_array();

foreach($user_data as $user){
  $user_name = $user['name'];
  $user_email = $user['email'];
  $user_number = $user['number'];
  $user_id = $user['id'];
}


?>

  <div class="container">
    <div class="form__name">Shipping and Billing Form</div>
    <form class="form--name" action="<?php echo base_url()?>buyproduct/pay" method="post">
    <div class="form__container">
        <section class="form__personal">
            <div class="sections">
                <div class="box">1</div><span>Personal Information</span>
            </div>
            <div class="personal--form">
               
                    <div class="first">
                        <label for="firstname">Name</label>
                        <input placeholder="e.g. Richard" id="firstname" name="name" type="text" value="<?php echo $user_name?>" readonly/>
                    </div>
                    <div class="last">
                        <label for="firstname"> Number</label>
                        <input placeholder="e.g. Bovell" id="firstname" type="text" name="number" value="<?php echo $user_number?>" readonly/>
                    </div>
                    <div class="email">
                        <label for="firstname">Email</label>
                        <input placeholder="e.g. rb@apple.com" id="firstname" type="email" name="email" value="<?php echo $user_email?>" readonly/>
                    </div>

            </div>
        </section>
        <section class="form__billing">
            <div class="sections">
                <div class="box billing">2</div><span>Billing Address</span>
            </div>
            <div class="shipping--form">
                    <div class="row one">
                        <div class="address">
                            <label for="address-one">Address Line 1</label>
                            <input placeholder="e.g. 1 Infinite Loop" id="address-one" type="text" name="address1" required/>
                        </div>
                        <div class="address-two">
                            <label for="address-two">Address Line 2</label>
                            <input id="address-two" type="text"  name="address2" required/>
                        </div>
                    </div>
                    <div class="row two">
                        <div class="city">
                            <label for="city">City</label>
                            <input placeholder="e.g. Cupertino" id="city" type="text" required name="city"/>
                        </div>
                        <div class="state">
                            <label for="state">State / Province / Region</label>
                            <input placeholder="e.g. California" id="state" type="text" required name="state"/>
                        </div>
                    </div>
                    <div class="row three">
                        <div class="zip">
                            <label for="zip">Zip / Postal Code</label>
                            <input placeholder="e.g. 95014" id="zip" type="text" required name="zip"/>
                        </div>
                        <div class="country">
                            <label for="country">Country</label>
                            <input placeholder="e.g. U.S.A" id="country" type="text" required name="country"/>
                        </div>
                    </div>
            </div>
        </section>
        <section class="form__shipping">
            <div class="sections">
                <div class="box">3</div><span>Shipping Address</span>
            </div>
            <div class="shipping--form">
                    <div class="row one">
                        <div class="address">
                            <label for="address-one">Address Line 1</label>
                            <input placeholder="" id="address-one" type="text" required name="ship_address1"/>
                        </div>
                        <div class="address-two">
                            <label for="address-two">Address Line 2</label>
                            <input id="address-two" type="text" required name="ship_address2" />
                        </div>
                    </div>
                    <div class="row two">
                        <div class="city">
                            <label for="city">City</label>
                            <input placeholder="" id="city" type="text" required name="ship_city"/>
                        </div>
                        <div class="state">
                            <label for="state">State / Province / Region</label>
                            <input placeholder="" id="state" type="text" required name="ship_state" />
                        </div>
                    </div>
                    <div class="row three">
                        <div class="zip">
                            <label for="zip">Zip / Postal Code</label>
                            <input placeholder="" id="zip" type="text" required name="ship_zip" />
                        </div>
                        <div class="country">
                            <label for="country">Country</label>
                            <input placeholder="" id="country" type="text" required name="ship_country" />
                        </div>
                    </div>
            </div>
            <input type="hidden" name="user_id" value="<?php echo $user_id?>">
            <input type="hidden" name="product_id" value="<?php echo $product_id?>">
        </section>
        <div class="form__confirmation">
            <button class="confirm">Checkout</button>
        </div>
    </div>
</form>
</div>