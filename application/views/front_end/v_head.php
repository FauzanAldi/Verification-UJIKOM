<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       	<link rel="icon" href="<?php echo base_url('front/img/favicon-brand.png') ?>" type="image/png">
        <title>VERIFICATION UJIKOM</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url('front/css/bootstrap.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('front/vendors/linericon/style.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('front/css/font-awesome.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('front/vendors/owl-carousel/owl.carousel.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('front/vendors/lightbox/simpleLightbox.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('front/vendors/nice-select/css/nice-select.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('front/vendors/animate-css/animate.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('front/vendors/popup/magnific-popup.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('datatable/css/jquery.dataTables.css'); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url('datatable/css/dataTables.bootstrap4.css');?>">
        <!-- main css -->
        <link rel="stylesheet" href="<?php echo base_url('front/css/style.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('front/css/responsive.css') ?>">
    </head>
    <body data-spy="scroll" data-target="#mainNav" data-offset="70">
        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu" id="mainNav">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						<a class="navbar-brand logo_h" href="<?php echo base_url() ?>"><img style="width: 50px; height: 50px;" src="<?php echo base_url('front/img/favicon.png') ?>" alt="">Verifikasi Uji Kompetensi</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<!-- <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="#feature">FEATURES</a></li> 
								<li class="nav-item"><a class="nav-link" href="#video">VIDEO</a>
								<li class="nav-item"><a class="nav-link" href="#price">PRICING</a>
								<li class="nav-item"><a class="nav-link" href="#screen">SCREENS</a>
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="elements.html">Elements</a></li>
									</ul>
								</li> 
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
									<ul class="dropdown-menu">
										<li class="nav-item"><a class="nav-link" href="blog.html">Blog</a></li>
										<li class="nav-item"><a class="nav-link" href="single-blog.html">Blog Details</a></li>
									</ul>
								</li>  -->
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url() ?>">Home</a></li>
								<li class="nav-item"><a class="nav-link" href="<?php echo site_url().'/login' ?>">Administrator</a></li>
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
        
       <?php $this->load->view($content);  ?>

       
        
        <!--================ start footer Area  =================-->	
        <footer class="footer-area">
            <div class="container">
               <div class="row footer-bottom  justify-content-between " style="padding: 20px 20px 20px 20px;">
                    <p class="col-lg-8 col-md-8 footer-text m-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved 
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                    <div class="col-lg-4 col-md-4 footer-social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                    </div>
                </div>
            </div>
        </footer>
		<!--================ End footer Area  =================-->
        
        
        
        
        
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="<?php echo base_url('front/js/jquery-3.2.1.min.js') ?>"></script>
        <script src="<?php echo base_url('front/js/popper.js') ?>"></script>
        <script src="<?php echo base_url('front/js/bootstrap.min.js') ?>"></script>
        <script src="<?php echo base_url('front/js/stellar.js') ?>"></script>
        <script src="<?php echo base_url('front/vendors/lightbox/simpleLightbox.min.js') ?>"></script>
        <script src="<?php echo base_url('front/vendors/nice-select/js/jquery.nice-select.min.js') ?>"></script>
        <script src="<?php echo base_url('front/vendors/isotope/imagesloaded.pkgd.min.js') ?>"></script>
        <script src="<?php echo base_url('front/vendors/isotope/isotope-min.js') ?>"></script>
        <script src="<?php echo base_url('front/vendors/owl-carousel/owl.carousel.min.js') ?>"></script>
        <script src="<?php echo base_url('front/js/jquery.ajaxchimp.min.js') ?>"></script>
        <script src="<?php echo base_url('front/vendors/counter-up/jquery.waypoints.min.js') ?>"></script>
        <script src="<?php echo base_url('front/vendors/counter-up/jquery.counterup.js') ?>"></script>
        <script src="<?php echo base_url('front/js/mail-script.js') ?>"></script>
        <script src="<?php echo base_url('front/vendors/popup/jquery.magnific-popup.min.js') ?>"></script>
        <script src="<?php echo base_url('front/js/theme.js') ?>"></script>
        <script type="text/javascript" charset="utf8" src="<?php echo base_url('datatable/js/jquery.dataTables.min.js') ?>"></script>
        <script type="text/javascript">
          $('.datatable').dataTable(); 
        </script>
    </body>
</html>