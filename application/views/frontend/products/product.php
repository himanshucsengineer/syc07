<link rel="stylesheet" href="<?php echo base_url()?>assest/css/main_new.css">
</head>


<div class="news_main product_top">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h3>Get all products list</h3>
      </div>
      <div class="col-md-6">
        <p><a href="<?php echo base_url() ?>"><span class="acc">Home</a></span> / <a
            href="<?php echo base_url() ?>products">products</a></p>
      </div>
    </div>
  </div>
</div>




<div class="breed_new">
  <div class="container">
    <div class="flex" id="load_data">
    </div>
    <div class="row justify-content-center">
      <div class="load_msg_data">
        <div class="text-center" id="load_data_message"></div>
      </div>
    </div>
    <div class="load_more">
      <button id="loadmore">Load More</button>
    </div>
  </div>
</div>


<script>
$(function() {
  // bind change event to select
  $('#dynamic_select').on('change', function() {
    var url = $(this).val(); // get selected value
    if (url) { // require a URL
      window.location = 'breed/' + url; // redirect
    }
    return false;
  });
});
</script>


<script>
$(document).ready(function() {

  var limit = 6;
  var start = 0;
  var action = 'inactive';

  function lazzy_loader(limit) {

    for (var count = 0; count < limit; count++) {

      output =
        '<div class="row justify-content-center"><div class="col-md-3"><div class="loader"></div></div></div>';
    }
    $('#load_data_message').html(output);
  }

  lazzy_loader(limit);

  function load_data(limit, start) {
    $.ajax({
      url: "<?php echo base_url(); ?>frontend/products/product/fetch",
      method: "POST",
      data: {
        limit: limit,
        start: start
      },
      cache: false,
      success: function(data) {
        if (data == '') {
          $('#load_data_message').html('<h3>No More Result Found</h3>');
          action = 'active';
        } else {
          $('#load_data').append(data);
          $('#load_data_message').html("");
          action = 'inactive';
        }
      }
    })
  }

  if (action == 'inactive') {
    action = 'active';
    load_data(limit, start);
  }

  $('#loadmore').click(function() {
    if ($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive') {
      lazzy_loader(limit);
      action = 'active';
      start = start + limit;
      setTimeout(function() {
        load_data(limit, start);
      }, 500);
    }
  });

});
</script>