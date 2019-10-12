<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assetsHome/images/logo-134x128.png" type="image/x-icon">
  <meta name="description" content="">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic&amp;subset=latin">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:400,700">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
  <link rel="stylesheet" href="assetsHome/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assetsHome/tether/tether.min.css">
  <link rel="stylesheet" href="assetsHome/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assetsHome/dropdown/css/style.css">
  <link rel="stylesheet" href="assetsHome/animate.css/animate.min.css">
  <link rel="stylesheet" href="assetsHome/theme/css/style.css">
  <link rel="stylesheet" href="assetsHome/mobirise/css/mbr-additional.css" type="text/css">
  <link rel="stylesheet" href="/css/styleHome.css" type="text/css">
  <title>E-learning STKIP PGRI SUMBAR</title>
</head>
<body>
  <section id="menu-2">

    <nav class="navbar navbar-dropdown bg-color transparent">
      <div class="container">

        <div class="mbr-table">
          <div class="mbr-table-cell">

            <div class="navbar-brand">
              <a href="#" class="navbar-logo"><img src="assetsHome/images/logo-134x128.png" alt=""></a>
              <a class="navbar-caption" href="#">STKIP PGRI SUMATERA BARAT</a>
            </div>

          </div>
          <div class="mbr-table-cell">

            <button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
              <div class="hamburger-icon"></div>
            </button>

            <ul class="nav-dropdown collapse pull-xs-right nav navbar-nav navbar-toggleable-sm" id="exCollapsingNavbar">
              <li class="nav-item"><a class="nav-link link" href="{{ url('/') }}">HOME</a></li>
              <li class="nav-item"><a class="nav-link link" href="{{url('visi-misi')}}" >VISI & MISI</a></li>
              <li class="nav-item"><a class="nav-link link" href="#">ABOUT</a></li>
          </ul>
            <button hidden="" class="navbar-toggler navbar-close" type="button" data-toggle="collapse" data-target="#exCollapsingNavbar">
                        <div class="close-icon"></div>
                    </button>

          </div>
        </div>

      </div>
    </nav>

  </section>

  <section class="engine"></section><section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-section-with-arrow mbr-after-navbar" id="header1-1" style="background-image: url(assetsHome/images/images.jpg);">

  <div class="mbr-overlay" style="opacity: 0.9; background-color: rgb(0, 0, 0);"></div>

  <div class="mbr-table-cell">

    <div class="container">
      <div class="row">
        <div class="mbr-section col-md-10">

          <h1 class="mbr-section-title display-1">Selamat Datang &nbsp;</h1>
          <p class="mbr-section-lead lead">Di E-learning Program Studi Pendidikan Informatika STKIP PGRI Sumatera Barat</p>
          <div class="mbr-section-btn"><a class="btn btn-lg btn-primary" href="{{url('/login')}}"><b>Login</b></a> <a class="btn btn-lg btn-danger" href="{{url('/register')}}" ><b>Register</b></a> </div>
        </div>
      </div>
    </div>
  </div>

  <div class="mbr-arrow mbr-arrow-floating" aria-hidden="true"><a href="#testimonials2-5"><i class="mbr-arrow-icon"></i></a></div>

</section>
<section class="mbr-section" id="testimonials2-5" style="background-color: rgb(255, 255, 255); padding-top: 40px; padding-bottom: 80px;">
@yield('main')
</section>
<section class="mbr-footer footer4 mbr-section mbr-section-md-padding" id="contacts4-4" style="background-color: rgb(46, 46, 46); padding-top: 50px; padding-bottom: 50px;">

  <div class="container">
    <div class="mbr-contacts row">
      <div class="col-sm-8">
        <div class="row">
          <div class="col-sm-6">
            <p><strong>Alamat</strong><br>
              Jalan Gajah Mada N0.20, Kampus II<br>
              Gunung Pagilun<br><br><br>
              <strong>Contacts</strong><br>
              Telp : (0751) 7053506<br>
            </div>
            <div class="col-sm-6"><p class="mbr-contacts__text"><strong>Links</strong></p><ul class="mbr-contacts__list"><li><a class="text-white" target="_blank" href="http://informatika.stkip-pgri-sumbar.ac.id">Website </a></li><li><a class="text-white" href="#" target="_blank">Email(pendidikaninformatikastkip@gmail.com)</a></li><li><a class="text-white" target="_blank" href="http://facebook.com/pendidikaninformatika">Facebook</a></li></ul></div>
          </div>
        </div>
        <div class="col-sm-4">

          <form action="{{url('/save/request')}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
              <label class="form-control-label" for="contacts4-4-name">Name<span class="form-asterisk">*</span></label>
              <input type="text" class="form-control input-sm input-inverse" name="nama" required="" data-form-field="Name" id="contacts4-4-name">
            </div>
            <div class="form-group">
              <label class="form-control-label" for="contacts4-4-email">Email<span class="form-asterisk">*</span></label>
              <input type="email" class="form-control input-sm input-inverse" name="email" required="" data-form-field="Email" id="contacts4-4-email">
            </div>

            <div class="form-group">
              <label class="form-control-label" for="contacts4-4-message">Message</label>
              <textarea class="form-control input-sm input-inverse" name="pesan" data-form-field="Message" rows="4" id="contacts4-4-message"></textarea>
            </div>
            <div class="mbr-buttons mbr-buttons--right btn-inverse"><button type="submit" class="btn btn-sm btn-black">Contact us</button></div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <footer class="mbr-small-footer mbr-section mbr-section-nopadding" id="footer1-6" style="background-color: rgb(50, 50, 50); padding-top: 1.75rem; padding-bottom: 1.75rem;">

    <div class="container">
      <p class="text-xs-center">Copyright (c) 2018 Herisvan Hendra</p>
    </div>
  </footer>


  <script src="assetsHome/web/assets/jquery/jquery.min.js"></script>
  <script src="assetsHome/tether/tether.min.js"></script>
  <script src="assetsHome/bootstrap/js/bootstrap.min.js"></script>
  <script src="assetsHome/smooth-scroll/smooth-scroll.js"></script>
  <script src="assetsHome/dropdown/js/script.min.js"></script>
  <script src="assetsHome/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assetsHome/viewport-checker/jquery.viewportchecker.js"></script>
  <script src="assetsHome/jarallax/jarallax.js"></script>
  <script src="assetsHome/theme/js/script.js"></script>
  
  <input name="animation" type="hidden">
  <div id="scrollToTop" class="scrollToTop mbr-arrow-up"><a style="text-align: center;"><i class="mbr-arrow-up-icon"></i></a></div>
</body>
</html>