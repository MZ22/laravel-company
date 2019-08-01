
<!doctype html>
<html lang="en">
  <head>
	  <meta charset="utf-8">
	  <title>Gestion entreprise</title>
	  <meta content="width=device-width, initial-scale=1.0" name="viewport">
	  <meta content="" name="keywords">
	  <meta content="" name="description">

	  <!-- Favicons -->
	  <link href="/img/favicon.png" rel="icon">
	  <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">

	  <!-- Google Fonts -->
	  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900" rel="stylesheet">

	  <!-- Bootstrap CSS File -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">

	  <!-- Libraries CSS Files -->
	  <link href="/libfront/nivo-slider/css/nivo-slider.css" rel="stylesheet">
	  <link href="/libfront/owlcarousel/owl.carousel.css" rel="stylesheet">
	  <link href="/libfront/owlcarousel/owl.transitions.css" rel="stylesheet">
	  <link href="/libfront/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	  <link href="/libfront/animate/animate.min.css" rel="stylesheet">
	  <link href="/libfront/venobox/venobox.css" rel="stylesheet">

	  <!-- Nivo Slider Theme -->
	  <link href="/css/nivo-slider-theme.css" rel="stylesheet">

	  <!-- Main Stylesheet File -->
	  <link href="/css/stylefront.css" rel="stylesheet">

	  <!-- Responsive Stylesheet File -->
	  <link href="/css/responsive.css" rel="stylesheet">

	  <!-- =======================================================
	    Theme Name: eBusiness
	    Theme URL: https://bootstrapmade.com/ebusiness-bootstrap-corporate-template/
	    Author: BootstrapMade.com
	    License: https://bootstrapmade.com/license/
	  ======================================================= -->


  </head>

  <body data-spy="scroll" data-target="#navbar-example">

  <div id="preloader"></div>

	<!-- @include('layout.partials.nav') -->

  <header>
    <!-- header-area start -->
    <div id="sticker" class="header-area">
      <div class="container-block">
        <div class="row">
          <div class="col-12 col-12">

            <!-- Navigation -->
              <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <a class="navbar-brand page-scroll sticky-logo" href="index.html">
                      <h1><span>e</span>Business</h1>
                      <!-- Uncomment below if you prefer to use an image logo -->
                      <!-- <img src="img/logo.png" alt="" title=""> -->
                    </a>
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                  <div class="navbar-nav">
                    <a class="nav-item nav-link" href="/">Accueil</a>
                    <a class="nav-item nav-link promos" href="/product-list">Produits</a>  
                    <a class="nav-item nav-link" href="#about">A propos</a>
                    <a class="nav-item nav-link" href="#services">Services</a>
                    <a class="nav-item nav-link" href="#team">Equipe</a>
                    <a class="nav-item nav-link" href="#portfolio">Portfolio</a>
                  </div>
                </div>
              </nav>
            <!-- END: Navigation -->
          </div>
        </div>
      </div>
    </div>
    <!-- header-area end -->
  </header>
  <!-- header end -->


    <section id="main-front">
    		@yield('title')
       
         	@yield('contentfront')
     
    </section>

    <!--footer start-->

	<!-- Start Footer bottom Area -->
  <footer>
    <div class="footer-area">
      <div class="container">
        <div class="row">
          <div class="col-4">
            <div class="footer-content">
              <div class="footer-head">
                <div class="footer-logo">
                  <h2><span>e</span>Business</h2>
                </div>

                <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis.</p>
                <div class="footer-icons">
                  <ul>
                    <li>
                      <a href="#"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-google"></i></a>
                    </li>
                    <li>
                      <a href="#"><i class="fa fa-pinterest"></i></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-4">
            <div class="footer-content">
              <div class="footer-head">
                <h4>information</h4>
                <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
                </p>
                <div class="footer-contacts">
                  <p><span>Tel:</span> +123 456 789</p>
                  <p><span>Email:</span> contact@example.com</p>
                  <p><span>Working Hours:</span> 9am-5pm</p>
                </div>
              </div>
            </div>
          </div>
          <!-- end single footer -->
          <div class="col-4">
            <div class="footer-content">
              <div class="footer-head">
                <h4>Instagram</h4>
                <div class="flicker-img">
                  <a href="#"><img src="/img/portfolio/1.jpg" alt=""></a>
                  <a href="#"><img src="/img/portfolio/2.jpg" alt=""></a>
                  <a href="#"><img src="/img/portfolio/3.jpg" alt=""></a>
                  <a href="#"><img src="/img/portfolio/4.jpg" alt=""></a>
                  <a href="#"><img src="/img/portfolio/5.jpg" alt=""></a>
                  <a href="#"><img src="/img/portfolio/6.jpg" alt=""></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-area-bottom">
      <div class="container">
        <div class="row">
          <div class="col-12 col-12 col-12">
            <div class="copyright text-center">
              <p>
                &copy; Copyright <strong>eBusiness</strong>. All Rights Reserved
              </p>
            </div>
            <div class="credits">
              <!--
                All the links in the footer should remain intact.
                You can delete the links only if you purchased the pro version.
                Licensing information: https://bootstrapmade.com/license/
                Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=eBusiness
              -->
              Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
    <!--footer end-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <!-- JavaScript Libraries -->
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

  <script src="/libfront/owlcarousel/owl.carousel.min.js"></script>
  <script src="/libfront/venobox/venobox.min.js"></script>
  <script src="/libfront/knob/jquery.knob.js"></script>
  <script src="/libfront/wow/wow.min.js"></script>
  <script src="/libfront/parallax/parallax.js"></script>
  <script src="/libfront/easing/easing.min.js"></script>
  <script src="/libfront/nivo-slider/js/jquery.nivo.slider.js" type="text/javascript"></script>
  <script src="/libfront/appear/jquery.appear.js"></script>
  <script src="/libfront/isotope/isotope.pkgd.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="/contactformfront/contactform.js"></script>

  <script src="/js/main.js"></script>

  </body>
</html>
