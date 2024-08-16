<?php
error_reporting (E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
session_start();
$session= new Session();
global $database, $db; 
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login-Register || Plantmore</title>
	<meta name="description" content="">
	<meta name="robots" content="noindex, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, follow" />
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="img/logo-icon1.png">
    <!--All Css Here-->
    
    <!-- Bootstrap CSS-->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Linearicon CSS-->
    <link rel="stylesheet" href="css/linearicons.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Animate CSS-->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Owl Carousel CSS-->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<!-- Slick CSS-->
	<link rel="stylesheet" href="css/slick.css">
	<!-- Meanmenu CSS-->
	<link rel="stylesheet" href="css/meanmenu.min.css">
	<!-- Easyzoom CSS-->
	<link rel="stylesheet" href="css/easyzoom.css">
	<!-- Venobox CSS-->
	<link rel="stylesheet" href="css/venobox.css">
	<!-- Jquery Ui CSS-->
	<link rel="stylesheet" href="css/jquery-ui.css">
	<!-- Nice Select CSS-->
	<link rel="stylesheet" href="css/nice-select.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="css/responsive.css">
	<!-- Modernizr Js -->
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div class="wrapper">
		<?php include('includes/header1.php') ?>
    <!--Breadcrumb Tow Start-->
		<div class="breadcrumb-tow mb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-title">
                            <h1>Login - Register</h1>
                        </div>
                        <div class="breadcrumb-content breadcrumb-content-tow">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Login-Register</li>
                            </ul>
                            <?php if(isset($_SESSION['failure'])) { ?>
                            <ul>
                              <li style="color: red"><?php echo('<span style="color: red;">'.$_SESSION['failure']."</span>\n"); unset($_SESSION['failure']); ?></li>
                            </ul>
                          <?php } ?>
                          <?php if(isset($_SESSION['success'])) { ?>
                            <ul>
                              <li style="color: green"><?php echo('<span style="green: red;">'.$_SESSION['success']."</span>\n"); unset($_SESSION['success']); ?></li>
                            </ul>
                          <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--Breadcrumb Tow End-->
		<!--Login Register Area Strat-->
		<div class="login-register-area mb-80">
		    <div class="container">
		        <div class="row">
                    <!--Login Form Start-->
                <?php if(!isset($_GET['forget_pass'])){ ?>
		            <div class="col-md-6 col-sm-6">
		                <div class="customer-login-register">
		                    <div class="form-login-title">
		                        <h2>Login</h2>
		                    </div>
		                    <div class="login-form">
		                        <form action="login-register_action.php" method="post">
		                            <div class="form-fild">
                                    <p><label>Email address <span class="required">*</span></label></p>
                                    <input name="username" value="<?php if(isset($_COOKIE["username_user"])) { echo $_COOKIE["username_user"]; } ?>" type="text" name="username" required="" pattern="[A-Za-z0-9._]+@[a-z0-9.-]+\.[a-z]{2,}" title="Enter a valid email id">
                                </div>
                                <div class="form-fild">
                                    <p><label>Password <span class="required">*</span></label></p>
                                    <input name="password" value="" type="password" name="password" required="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" title="Must contain atleast one number, uppercase, lowercase letter and atleast 8 characters" id="pass">
                                    <br>
                                      <input type="checkbox" style="width: 12px; height: 12px;" onclick="show()">&nbsp;Show password</i>
                                </div>
                                
                                    <a href="login-register.php?forget_pass=1" style="text-align: right; position: absolute; left: 40px; color: brown">Lost your password?</a>
                                
		                            <div class="login-submit" style="text-align: right;">

		                                <button type="submit" class="form-button" name="login">Login</button>
		                                <label>
		                                    <span>
                                      <input type="checkbox" style="width: 12px; height: 12px;" name="remember">&nbsp;Remember me</span>
		                                </label>
                                    
		                            </div>
		                            
		                        </form>
		                    </div>
		                </div>
		            </div>
                <?php } ?>
                <?php if(isset($_GET['forget_pass'])){ ?>
                <div class="col-md-6 col-sm-6">
                    <div class="customer-login-register">
                        <div class="form-login-title">
                            <h2>Recover Password</h2>
                        </div>
                        <div class="register-form">
                            <form action="login-register_action.php" method="post">
                                <div class="form-fild">
                                    <?php if(isset($_SESSION['login'])){ echo "<script>alert('Login using your new password... To login check your mail for password');</script>"; unset($_SESSION['login']); } ?>
                                    <p><label>Name <span class="required">*</span></label></p>
                                    <input name="name" value="" type="text" required="" pattern="[A-Za-z ]+" title="Only alphabets allowed">
                                </div>
                                <div class="form-fild">
                                    <p><label>Email address <span class="required">*</span></label></p>
                                    <input name="username" value="" type="text" name="username" required="" pattern="[A-Za-z0-9._]+@[a-z0-9.-]+\.[a-z]{2,}" title="Enter a valid email id">
                                </div>
                                <div class="login-submit">
                                    <button type="submit" class="form-button" name="recover">Recover</button>
                                    
                                </div>
                                <div class="lost-password">
                                    <a href="login-register.php" style="position: absolute; left: 55px;">Login</a>
                                    <a href="login-register.php" style="position: absolute; right: 40px;">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php } ?>
		            <!--Login Form End-->
		            <!--Register Form Start-->
		            <div class="col-md-6 col-sm-6">
		                <div class="customer-login-register register-pt-0">
		                    <div class="form-register-title">
		                        <h2>Register</h2>
		                    </div>
		                    <div class="register-form">
		                        <form action="login-register_action.php" method="post">
		                            <div class="form-fild">
                                    <?php if(isset($_SESSION['success'])){ echo "<script>alert('Registered Successfully... To login check your mail for password');</script>"; unset($_SESSION['success']); } ?>
                                    <?php if(isset($_SESSION['login'])){ echo "<script>alert('Login using your new password... To login check your mail for password');</script>"; unset($_SESSION['login']); } ?>
                                    <?php if(isset($_SESSION['forget'])){ echo "<script>alert('Check your mail for new password');</script>"; unset($_SESSION['forget']); } ?>
                                    <p><label>Name <span class="required">*</span></label></p>
		                                <input name="name" value="" type="text" required="" pattern="[A-Za-z ]+" title="Only alphabets allowed">
		                            </div>

                                <div class="form-fild">
                                    <p><label>Email address <span class="required">*</span></label></p>
                                    <input value="" type="text" name="username" required="" pattern="[A-Za-z0-9._]+@[a-z0-9.-]+\.[a-z]{2,}" title="Enter a valid email id">
                                </div>
		                            <div class="register-submit" style="text-align: right;">
		                                <button type="submit" class="form-button" name="register">Register</button>
		                            </div>
		                        </form>
		                    </div>
		                </div>
		            </div>
		            <!--Register Form End-->
		        </div> 
		    </div>
		</div>
		<!--Login Register Area End-->
		
		<?php include('includes/footer.php') ?>
    <!-- Modal Area Strat -->
        <div class="modal fade" id="open-modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <!--Modal Img-->
                    <div class="col-md-5">
                        <!--Modal Tab Content Start-->
                        <div class="tab-content product-details-large" id="myTabContent">
                          <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="img/single-product/large/single-product1.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                          <div class="tab-pane fade" id="single-slide2" role="tabpanel" aria-labelledby="single-slide-tab-2">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="img/single-product/large/single-product2.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                          <div class="tab-pane fade" id="single-slide3" role="tabpanel" aria-labelledby="single-slide-tab-3">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="img/single-product/large/single-product3.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                          <div class="tab-pane fade" id="single-slide4" role="tabpanel" aria-labelledby="single-slide-tab-4">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="img/single-product/large/single-product4.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                          <div class="tab-pane fade" id="single-slide5" role="tabpanel" aria-labelledby="single-slide-tab-4">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="img/single-product/large/single-product5.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                          <div class="tab-pane fade" id="single-slide6" role="tabpanel" aria-labelledby="single-slide-tab-4">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="img/single-product/large/single-product6.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                        </div>
                        <!--Modal Content End-->
                        <!--Modal Tab Menu Start-->
                        <div class="single-product-menu">
                            <div class="nav single-slide-menu owl-carousel" role="tablist">
                                <div class="single-tab-menu img-full">
                                    <a class="active" data-toggle="tab" id="single-slide-tab-1" href="#single-slide1"><img src="img/single-product/small/single-product1.jpg" alt=""></a>
                                </div>
                                <div class="single-tab-menu img-full">
                                    <a data-toggle="tab" id="single-slide-tab-2" href="#single-slide2"><img src="img/single-product/small/single-product2.jpg" alt=""></a>
                                </div>
                                <div class="single-tab-menu img-full">
                                    <a data-toggle="tab" id="single-slide-tab-3" href="#single-slide3"><img src="img/single-product/small/single-product3.jpg" alt=""></a>
                                </div>
                                <div class="single-tab-menu img-full">
                                    <a data-toggle="tab" id="single-slide-tab-4" href="#single-slide4"><img src="img/single-product/small/single-product4.jpg" alt=""></a>
                                </div>
                                <div class="single-tab-menu img-full">
                                    <a data-toggle="tab" id="single-slide-tab-5" href="#single-slide5"><img src="img/single-product/small/single-product5.jpg" alt=""></a>
                                </div>
                                <div class="single-tab-menu img-full">
                                    <a data-toggle="tab" id="single-slide-tab-6" href="#single-slide6"><img src="img/single-product/small/single-product6.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <!--Modal Tab Menu End-->
                    </div>
                    <!--Modal Img-->
                    <!--Modal Content-->
                    <div class="col-md-7">
                        <div class="modal-product-info">
                            <h1>Sit voluptatem</h1>
                            <div class="modal-product-price">
                               <span class="old-price">$74.00</span>
                               <span class="new-price">$69.00</span>
                           </div>
                           <a href="single-product.php" class="see-all">See all features</a>
                           <div class="add-to-cart quantity">
                                <form class="add-quantity" action="#">
                                     <div class="modal-quantity">
                                         <input type="number" value="1">
                                     </div>
                                    <div class="add-to-link">
                                        <button class="form-button" data-text="add to cart">add to cart</button>
                                    </div>
                                </form>
                           </div>
                           <div class="cart-description">
                               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus.</p>
                           </div>
                            <div class="social-share">
                               <h3>Share this product</h3>
                               <ul class="socil-icon2">
                                   <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                   <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                   <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                   <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                   <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                               </ul>
                            </div>
                        </div>
                    </div>
                    <!--Modal Content-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Area End -->
	</div>





    <!--All Js Here-->
    
	<!--Jquery 1.12.4-->
	<script src="js/vendor/jquery-1.12.4.min.js"></script>
	<!--Popper-->
	<script src="js/popper.min.js"></script>
	<!--Bootstrap-->
	<script src="js/bootstrap.min.js"></script>
	<!--Imagesloaded-->
	<script src="js/imagesloaded.pkgd.min.js"></script> 
	<!--Isotope-->
	<script src="js/isotope.pkgd.min.js"></script>
	<!--Waypoints-->
	<script src="js/waypoints.min.js"></script>
	<!--Counterup-->
	<script src="js/jquery.counterup.min.js"></script>
	<!--Carousel-->
	<script src="js/owl.carousel.min.js"></script>
	<!--Slick-->
	<script src="js/slick.min.js"></script>
	<!--Meanmenu-->
	<script src="js/jquery.meanmenu.min.js"></script>
	<!--Easyzoom-->
	<script src="js/easyzoom.min.js"></script>
	<!--Nice Select-->
	<script src="js/jquery.nice-select.min.js"></script>
	<!--ScrollUp-->
	<script src="js/jquery.scrollUp.min.js"></script>
	<!--Wow-->
	<script src="js/wow.min.js"></script>
	<!--Venobox-->
	<script src="js/venobox.min.js"></script>
	<!--Jquery Ui-->
	<script src="js/jquery-ui.js"></script>
	<!--Countdown-->
	<script src="js/jquery.countdown.min.js"></script>
	<!--Plugins-->
	<script src="js/plugins.js"></script>
	<!--Main Js-->
	<script src="js/main.js"></script>
<script type="text/javascript">
  function show()
        {
            var s=document.getElementById("pass");
            if(s.type === "password")
            {
                s.type ="text";
            }
            else
            {
                s.type="password";
            } 
        }
</script>
</body>

<!-- Mirrored from demo.hasthemes.com/plantmore-preview/plantmore-v5/login-register.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 14:50:33 GMT -->
</html>
