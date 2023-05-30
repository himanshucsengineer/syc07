<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.4/swiper-bundle.css"
  integrity="sha512-wbWvHguVvzF+YVRdi8jOHFkXFpg7Pabs9NxwNJjEEOjiaEgjoLn6j5+rPzEqIwIroYUMxQTQahy+te87XQStuA=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/8.4.4/swiper-bundle.min.js"
  integrity="sha512-k2o1KZdvUi59PUXirfThShW9Gdwtk+jVYum6t7RmyCNAVyF9ozijFpvLEWmpgqkHuqSWpflsLf5+PEW6Lxy/wA=="
  crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="<?php echo base_url()?>assest/css/home.css">
</head>

<?php $latestnews = $this->db->order_by('id','desc')->limit(4)->get('news_newpost')->result_array();?>

<body>
  <?php $this->load->view('frontend/template/navbar')?>

  <!-- start of hero -->

  <div class="home_slider_main">
    <section class="hero-slider hero-style">
      <div class="swiper-container">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="slide-inner slide-bg-image"
              data-background="<?php echo base_url()?>assest/images/home_slider1.png">
              <div class="container">
                <div data-swiper-parallax="300" class="slide-title">
                  <h2>Solution to a better life</h2>
                </div>
                <div data-swiper-parallax="400" class="slide-text">
                  <p>Safe Your Choice was formed to provide every person with the opportunity to create financial
                    freedom
                    while living an amazing lifestyle</p>
                </div>
                <div class="clearfix"></div>
                <div data-swiper-parallax="500" class="slide-btns">
                  <a href="<?php echo base_url()?>user/signup" class="theme-btn-s2">Register now</a>
                </div>
              </div>
            </div>
            <!-- end slide-inner -->
          </div>
          <!-- end swiper-slide -->
          <div class="swiper-slide">
            <div class="slide-inner slide-bg-image"
              data-background="<?php echo base_url()?>assest/images/home_slider2.png">
              <div class="container">
                <div data-swiper-parallax="300" class="slide-title">
                  <h2>Solution to a better life</h2>
                </div>
                <div data-swiper-parallax="400" class="slide-text">
                  <p>Safe Your Choice was formed to provide every person with the opportunity to create financial
                    freedom
                    while living an amazing lifestyle</p>
                </div>
                <div class="clearfix"></div>
                <div data-swiper-parallax="500" class="slide-btns">
                  <a href="<?php echo base_url()?>user/signup" class="theme-btn-s2">Register now</a>
                </div>
              </div>
            </div>
            <!-- end slide-inner -->
          </div>
          <!-- end swiper-slide -->
          <div class="swiper-slide">
            <div class="slide-inner slide-bg-image"
              data-background="<?php echo base_url()?>assest/images/home_slider3.png">
              <div class="container">
                <div data-swiper-parallax="300" class="slide-title">
                  <h2>Solution to a better life</h2>
                </div>
                <div data-swiper-parallax="400" class="slide-text">
                  <p>Safe Your Choice was formed to provide every person with the opportunity to create financial
                    freedom
                    while living an amazing lifestyle</p>
                </div>
                <div class="clearfix"></div>
                <div data-swiper-parallax="500" class="slide-btns">
                  <a href="<?php echo base_url()?>user/signup" class="theme-btn-s2">Register now</a>
                </div>
              </div>
            </div>
            <!-- end slide-inner -->
          </div>
        </div>
        <!-- end swiper-wrapper -->
        <!-- swipper controls -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
    </section>
  </div>



  <div class="home_about">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h2>Welcome to Paramount07</h2>
          <p>Paramount07 is a Professional Affilate marketing Platform. Here we will provide you only
            interesting content, which you will like very much. We're dedicated to providing you the best of Affilate
            marketing, with a focus on dependability and refer and earn , pension, bonus, insurance. </p>
          <p> We're working to turn our passion for Affilate marketing into a booming online website.</p>
          <p>We hope you enjoy our Affilate marketing as much as we enjoy offering them to you.</p>


          <a href="<?php echo base_url()?>about-us"><button>Know More</button></a>
        </div>
        <div class="col-md-6">
          <img src="<?php echo base_url()?>assest/images/home_about.jpg">
        </div>
      </div>
    </div>
  </div>

  <div class="get_in_touch_section">
    <div class="container">
      <h2>Need to know More or have any query?</h2>
      <div class="text-center">
        <a href="<?php echo base_url()?>contact-us"><button>Contact us</button></a>
      </div>

    </div>
  </div>

  <div class="home_third_section">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="card">
            <div class="home_third_section_flex">
              <div class="left">
                <h3 class="third_section_heading">Our Misssion</h3>
                <p class="third_section_text">Our Mission is that we will provide a solution to everyone to get earning
                  at their home. and this Free time earning will help people in thier need. and We are an innovative and
                  reliable partner to our customers. We want to achieve mutual success in the global market hand in hand
                  with the customer. Trust is our commitment. We represent reliable value to our owners, employees, and
                  partners.</p>
              </div>
              <div class="right">
                <h3 class="third_section_heading">Our Goal</h3>
                <p class="third_section_text">Our Goal is that we can provide a solution to everyone where a user can
                  create a network to the world wide. and connect with them and hand to hand they can earn some money
                  using their network. and celebrate every moment with the team and enjoy. So we want to create a family
                  to world wide in which everyone has the individual role to achive something.</p>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="our_products">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h3>Our Products</h3>
          <p>We launch products every year or with in 6 months. you can simply buy that products by cicking on bleow
            link.</p>
          <a href="<?php echo base_url()?>products"><button>View Products</button></a>
        </div>
      </div>
    </div>
  </div>

  <!-- <div class="home_blog_main">
    <div class="container">
      <div class="heading_flex">
        <div class="left">
          <h3>Latest Blogs</h3>
        </div>
        <div class="right">
          <button>Read More</button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <img src="<?php echo base_url()?>assest/images/about_bg.jpg" alt="">
          <div class="blog_heading_section">
            <a>this is testing blog this is testing blog</a>
          </div>
          <div class="blog_text_section">
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the
              1500s, when an unknown printer
              took a</p>
          </div>
        </div>
        <div class="col-md-3">
          <img src="<?php echo base_url()?>assest/images/about_bg.jpg" alt="">
          <div class="blog_heading_section">
            <a>this is testing blog this is testing blog</a>

          </div>
          <div class="blog_text_section">
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the
              1500s, when an unknown printer
              took a</p>
          </div>
        </div>
        <div class="col-md-3">
          <img src="<?php echo base_url()?>assest/images/about_bg.jpg" alt="">
          <div class="blog_heading_section">
            <a>this is testing blog this is testing blog</a>

          </div>
          <div class="blog_text_section">
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the
              1500s, when an unknown printer
              took a</p>
          </div>
        </div>
        <div class="col-md-3">
          <img src="<?php echo base_url()?>assest/images/about_bg.jpg" alt="">
          <div class="blog_heading_section">
            <a>this is testing blog this is testing blog</a>
          </div>
          <div class="blog_text_section">
            <p>Lorem Ipsum has been the industry's standard dummy text ever since the
              1500s, when an unknown printer
              took a</p>
          </div>
        </div>
      </div>
    </div>
  </div> -->

  

  <div class="home_blog_main">
    <div class="container">
      <div class="heading_flex">
        <div class="left">
          <h3>Latest News</h3>
        </div>
        <div class="right">
          <a href="<?php echo base_url()?>news"><button>Read More</button></a>
        </div>
      </div>
      <div class="row">
        <?php foreach($latestnews as $news){?>
        <a href="<?php echo base_url()?>watch-news/<?php echo $news['link']?>">
          <div class="col-md-3">
            <img src="<?php echo base_url()?>upload/news/<?php echo $news['image']?>" alt="">
            <div class="blog_heading_section">
              <a><?php echo $news['head']?></a>
            </div>
            <div class="blog_text_section">
              <p><?php echo substr($news['content'],0,180)?> ... <a
                  href="<?php echo base_url()?>watch-news/<?php echo $news['link']?>">Read More</a></p>
            </div>
          </div>
        </a>
        <?php }?>

      </div>
    </div>
  </div>








  <script>
  // HERO SLIDER
  var menu = [];
  jQuery('.swiper-slide').each(function(index) {
    menu.push(jQuery(this).find('.slide-inner').attr("data-text"));
  });
  var interleaveOffset = 0.5;
  var swiperOptions = {
    loop: true,
    speed: 1000,
    parallax: true,
    autoplay: {
      delay: 6500,
      disableOnInteraction: false,
    },
    watchSlidesProgress: true,
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
    },

    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    on: {
      progress: function() {
        var swiper = this;
        for (var i = 0; i < swiper.slides.length; i++) {
          var slideProgress = swiper.slides[i].progress;
          var innerOffset = swiper.width * interleaveOffset;
          var innerTranslate = slideProgress * innerOffset;
          swiper.slides[i].querySelector(".slide-inner").style.transform =
            "translate3d(" + innerTranslate + "px, 0, 0)";
        }
      },

      touchStart: function() {
        var swiper = this;
        for (var i = 0; i < swiper.slides.length; i++) {
          swiper.slides[i].style.transition = "";
        }
      },

      setTransition: function(speed) {
        var swiper = this;
        for (var i = 0; i < swiper.slides.length; i++) {
          swiper.slides[i].style.transition = speed + "ms";
          swiper.slides[i].querySelector(".slide-inner").style.transition =
            speed + "ms";
        }
      }
    }
  };

  var swiper = new Swiper(".swiper-container", swiperOptions);

  // DATA BACKGROUND IMAGE
  var sliderBgSetting = $(".slide-bg-image");
  sliderBgSetting.each(function(indx) {
    if ($(this).attr("data-background")) {
      $(this).css("background-image", "url(" + $(this).data("background") + ")");
    }
  });
  </script>