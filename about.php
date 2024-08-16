<?php 
$page_id="blog";
error_reporting (E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
include_once 'assets/libs/class.commen.php';
session_start();
$session= new Session();
global $database, $db;    
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>About Us || Plantmore</title>
	<meta name="description" content="">
	<meta name="robots" content="noindex, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, follow" />
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="img/logo-icon1.png">
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
	<div class="wrapper">
		<?php include('includes/header1.php') ?>
    <!--Breadcrumb Tow Start-->
		<div class="breadcrumb-tow">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-title">
                            <h1>About Us</h1>
                        </div>
                        <div class="breadcrumb-content breadcrumb-content-tow">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li class="active">About Us</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--Breadcrumb Tow End-->
		<!--About Us Area Start-->
		<div class="about-us-area">
		    <div class="container-fluid p-0">
		        <div class="row no-gutters">
		            <div class="col-md-12 col-lg-6">
		                <div class="about-us-img img-full">
		                    <img src="img/product/product3.jpg" alt="">
		                </div>
		            </div>
		            <div class="col-md-12 col-lg-6">
		                <div class="about-us-content">
		                    <h2><strong>PLANT ZONE: </strong> <br><strong>Online Plant Shopping</strong></h2>
		                    <p>For over 25 years, we are helping customers to celebrate their special moments by delivering fresh flowers and plants. Our mission is to offer our customers a wow experience through continuours innovation of premium products and services by using world class technology and processes.The brand is one stop shop for all grandening needs, be it buying flowers, plants, accessories not only in India but across the globe.</p>
                        <p>We have about 1000 products with good quality and free delivery. Daily there will be huge amount of new araivals</p>
		                    <a href="shop.php" class="about-btn">Shop Now</a>
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--About Us Area End-->
		<!--Fun Factor Area Start-->
		<div class="fun-factor-area">
		    <div class="container-fluid p-0">
		        <div class="row no-gutters">
                    <!--Single Fun Factor Start-->
		            <div class="col-lg-3 col-md-6">
		                <div class="fun-factor-wrap">
		                    <div class="fun-factor-icon">
		                        <img src="img/icon/fun-fact1.png" alt="">
		                    </div>
		                    <div class="fun-facttor-content">
		                        <div class="fun-facttor-number">
                              <?php
                              $sql1="SELECT COUNT(*) from `".TBL_USER."` WHERE `status` = 1";
                              $result1 = $database->query($sql1);
                              $row1 = $database->fetch_array($result1);
                              ?>
		                            <h2><span class="counter"><?php echo $row1[0] ?></span></h2>
		                        </div>
		                        <div class="fun-facttor-title">
		                            <h5>happy customers</h5>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <!--Single Fun Factor End-->
                    <!--Single Fun Factor Start-->
		              
		            <!--Single Fun Factor End-->
                    <!--Single Fun Factor Start-->
		            <div class="col-lg-3 col-md-6">
		                <div class="fun-factor-wrap">
		                    <div class="fun-factor-icon">
		                        <img src="img/icon/fun-fact3.png" alt="">
		                    </div>
		                    <div class="fun-facttor-content">
		                        <div class="fun-facttor-number">
		                            <h2><span class="countr">24/7</span></h2>
		                        </div>
		                        <div class="fun-facttor-title">
		                            <h5>Dedicated service</h5>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <!--Single Fun Factor End-->
                    <!--Single Fun Factor Start-->
		            <div class="col-lg-3 col-md-6">
		                <div class="fun-factor-wrap">
		                    <div class="fun-factor-icon">
		                        <img src="img/icon/fun-fact4.png" alt="">
		                    </div>
		                    <div class="fun-facttor-content">
		                        <div class="fun-facttor-number">
                              <?php
                              $sql="SELECT COUNT(*) from `".TBL_ORDER."` WHERE `status` = 2";
                              $result = $database->query($sql);
                              $row = $database->fetch_array($result);
                              
                              ?>
		                            <h2><span class="counter"><?php echo $row[0] ?></span></h2>
		                        </div>
		                        <div class="fun-facttor-title">
		                            <h5>ORDERS DELIVERED</h5>
		                        </div>
		                    </div>
		                </div>
		            </div>
		            <!--Single Fun Factor End-->
                <div class="col-lg-3 col-md-6">
                    <div class="fun-factor-wrap">
                        <div class="fun-factor-icon">
                            <img src="img/icon/fun-fact2.png" alt="">
                        </div>
                        <div class="fun-facttor-content">
                            <div class="fun-facttor-number">
                              <?php
                              $sql2="SELECT COUNT(*) from `".TBL_PRODUCT."` WHERE `status` = 1";
                              $result2 = $database->query($sql2);
                              $row2 = $database->fetch_array($result2);
                              
                              ?>
                                <h2><span class="counter"><?php echo $row2[0] ?></span></h2>
                            </div>
                            <div class="fun-facttor-title">
                                <h5>DAILY ARRIVALS</h5>
                            </div>
                        </div>
                    </div>
                </div>

		        </div>
		    </div>
		</div>
		<!--Fun Factor Area End-->
		<!--Skill Area Start-->
		<div class="skill-area mb-110">
		    <div class="container-fluid p-0">
		        <div class="row no-gutters">
		            <div class="col-md-12 col-lg-6">
                        <div class="skrill-here">
                            <h2>WE OFFER OUR BEST</h2>
                            <div class="ht-single-about">
                                <div class="skill-bar">
                                    <div class="skill-bar-item">
                                        <span>HAPPY CUSTOMER</span>
                                        <div class="progress">
                                        	<?php
                                        	$sql11="SELECT COUNT(*) from `".TBL_ORDER."` WHERE `status` = 2";
                              				$result11 = $database->query($sql11);
                              				$row11 = $database->fetch_array($result11);
                              				$sql12="SELECT COUNT(*) from `".TBL_ORDER."` WHERE `status` = 0";
                              				$result12 = $database->query($sql12);
                              				$row12 = $database->fetch_array($result12);
                              				$sql13="SELECT COUNT(*) from `".TBL_ORDER."`";
                              				$result13 = $database->query($sql13);
                              				$row13 = $database->fetch_array($result13);
                              				$per=(($row11[0]-$row12[0])/$row13[0])*100;

                                        	?>
                                            <div class="progress-bar" data-progress="<?php echo (int)$per ?>%" style="width: <?php echo (int)$per ?>%;">
                                                <span class="text-top"><?php echo (int)$per; ?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill-bar-item">
                                        <span>CUSTOMERS ACTIVE</span>
                                        <div class="progress">
                                        	<?php
                                        	$sql14="SELECT COUNT(*) from `".TBL_USER."` WHERE `status` = 1";
                              				$result14 = $database->query($sql14);
                              				$row14 = $database->fetch_array($result14);
                              				$sql15="SELECT COUNT(*) from `".TBL_USER."`";
                              				$result15 = $database->query($sql15);
                              				$row15 = $database->fetch_array($result15);
                              				$per2=($row14[0]/$row15[0])*100;
                                        	?>
                                            <div class="progress-bar" data-progress="<?php echo (int)$per2; ?>%" style="width: <?php echo (int)$per2; ?>%;">
                                                <span class="text-top"><?php echo (int)$per2; ?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="skill-bar-item">
                                        <span>ORDERS DELIVERED</span>
                                        <div class="progress">
                                        	<?php
                              				$per1=($row11[0]/$row13[0])*100;
                                        	?>
                                            <div class="progress-bar" data-progress="<?php echo (int)$per1 ?>%" style="width: <?php echo (int)$per1 ?>%;">
                                                <span class="text-top"><?php echo (int)$per1; ?>%</span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
		            <div class="col-md-12 col-lg-6">
		                <div class="skill-img img-full">
		                    <img src="img/product/product11.jpg" alt="">
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Skill Area End-->
		
		 <div id="brand">
      <?php include('includes/brand.php') ?>
    </div><?php include('includes/footer.php') ?>
		<!-- Modal Area Strat -->
        <div class="modal fade" id="open-modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
              </div>
              <div class="modal-body">
                <div class="row fetch">

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Area End -->
	</div>
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
</body>
<script type="text/javascript">
$(document).ready(function(){
    $('#open-modal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'fetch_data.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetch').html(data);//Show fetched data from database
            }
        });
     });
});
</script>
</html>
