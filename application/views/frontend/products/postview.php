<link rel="stylesheet" href="<?php echo base_url()?>assest/css/main_new.css">
</head>

<style>
.activeimage,
.adopt_pet_main_new .bottom_images .cardimage img:hover {
  opacity: .5;
}
</style>

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