<link rel="stylesheet" href="<?php echo base_url()?>assest/css/main_new.css">
</head>

<style>
.activeimage,
.adopt_pet_main_new .bottom_images .cardimage img:hover {
  opacity: .5;
}
.buy_now{
  background:#1876bf !important;
  color:white !important;
  padding:1rem !important;
  border:1px solid #1876bf !important;
  outline:none !important;
  text-decoration:none !important;
  border-radius:6px !important;
  transition:.5s;
  width:8rem !important;
  font-size:15px !important;
}
.buy_now:hover{
  color:#1876bf !important;
  background:transparent !important;
}
.adopt_pet_main_new .right h1:after{
  background-color:#1876bf !important;
}
</style>

<?php 

if(!isset($_SESSION['user_id'])){
  $buyNow = '<a href="'.base_url().'user/login" class="buy_now">Buy Now</a>';
}else{
  $buyNow = '<a href="'.base_url().'user/buy-product/'.@$blog->id.'"><button class="buy_now">Buy Now</button></a>';
}

?>

<div class="adopt_pet_main_new">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="<?php echo base_url()?>upload/products/<?php echo @$blog->image ?>" id="getdynamicimae"
          alt="adopt pet">

        <div class="bottom_images" id="bottomImage">
          <div class="cardimage">

            <img src="<?php echo base_url()?>upload/products/<?php echo @$blog->image ?>" alt="adopt pet">
          </div>
          <?php for ($i = 1; $i < 5; $i++) {
                        $img = "image$i";
                        if (@$blog->$img != NULL) {  ?>
          <div class="cardimage">

            <img src="<?php echo base_url()?>upload/products/<?php echo @$blog->$img ?>" alt="adopt pet">
          </div>

          <?php }
                    } ?>

        </div>
      </div>
      <div class="col-md-6">
        <div class="right">
          <h1><?php echo @$blog->name ?></h1>
          <h5>Price: <span class="declar">Rs. <?php echo @$blog->discounted_price ?> (<del>Rs.
                <?php echo @$blog->original_price ?></del>)</span></h5>
          <h5>Net <?php echo @$blog->net_content ?>: <?php echo @$blog->net_content_2 ?></h5>
          <?php echo $buyNow?>
        </div>
      </div>
    </div>

    <div class="about">
      <h3>More Information About Product:</h3>
      <hr>
      <p><?php echo @$blog->about ?></p>
    </div>
  </div>


</div>

<script type='text/javascript'>
$(document).ready(function() {
  $('#bottomImage div img').on('click', function() {
    var thisBtn = $(this);
    console.log(thisBtn);
    thisBtn.addClass('activeimage').removeClass('activeimage');
    var btnText = thisBtn.text();
    var btnValue = thisBtn.attr('src');
    document.getElementById('getdynamicimae').src = btnValue;
    console.log(btnText);
    console.log(btnValue);
  });

});
// baseURL variable
</script>