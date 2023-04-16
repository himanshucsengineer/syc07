<link rel="stylesheet" href="<?php echo base_url()?>assest/css/gallary.css">
</head>

<body>
  <?php $this->load->view('frontend/template/navbar')?>
  <div class="about_brad">
    <div class="container">
      <h2>Gallary</h2>
      <p><a href="<?php echo base_url()?>">Home</a> / Gallary</p>
    </div>
  </div>

  <div class="main_gallary">
    <div class="container">
      <h1>We couldn't fit them all.<sapn class="colo_cng"> Here are selected few...</span></h1>
      <div class="main_portfolio_new">
        <ul id="myTab" role="tablist" class="nav nav-tabs nav-fill nav-pills nab_tab_new">
          <li class="nav-item nab_tab_listvvv my-2">
            <button id="all-tab" data-tid="all" data-toggle="tab" href="#all" role="tab" aria-controls="all"
              aria-selected="true" class="nav-link active">All</button>
          </li>
          <?php foreach($fetch_cate as $value){ $linkk = $value['name'];
          $link = str_replace(' ', '-', $linkk);?>
          <li class="nav-item nab_tab_listvvv my-2">
            <button id="<?php echo $link?>-tab" data-tid="<?php echo $link?>" data-toggle="tab"
              href="#<?php echo $link?>" role="tab" aria-controls="<?php echo $link?>" aria-selected="false"
              class="nav-link "><?php echo $value['name']?></button>
          </li>
          <?php }?>
        </ul>
        <div id="myTabContent" class="tab-content min_tab_content">
          <div id="all" role="tabpanel" aria-labelledby="all-tab" class="tab-pane fade active show">
            <div class="row">
              <?php foreach($fetch_gallary as $value){?>
              <div class="col-md-3 card_padd">
                <a href="#exampleModal" class="view_image"
                  data-id="<?php echo base_url()?>upload/gallary/<?php echo $value['image']?>" data-toggle="modal"><img
                    src="<?php echo base_url()?>upload/gallary/<?php echo $value['image']?>"></a>

              </div>
              <?php }?>
            </div>
          </div>
          <?php foreach($fetch_cate as $cate){ $linkkkk = $cate['name'];
        $linkkkkkk = str_replace(' ', '-', $linkkkk);?>
          <div id="<?php echo $linkkkkkk?>" role="tabpanel" aria-labelledby="<?php echo $linkkkkkk?>-tab"
            class="tab-pane fade  ">
            <div class="row">
              <?php foreach($fetch_gallary as $value){ if($cate['name']==$value['cate']){?>
              <div class="col-md-3 card_padd">
                <a href="#exampleModal" class="view_image"
                  data-id="<?php echo base_url()?>upload/gallary/<?php echo $value['image']?>" data-toggle="modal"><img
                    src="<?php echo base_url()?>upload/gallary/<?php echo $value['image']?>"></a>
              </div>
              <?php }}?>
            </div>
          </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">

        <button type="button" class="close close_buttt" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <img id="myImage" class="img-responsive" src="" alt="">

      </div>
    </div>
  </div>
  </div>
  <script>
  $(document).on("click", ".view_image", function() {
    var myImageId = $(this).data('id');
    $(".modal-content #myImage").attr("src", myImageId);
  });
  </script>