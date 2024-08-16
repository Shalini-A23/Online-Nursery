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

<!-- Mirrored from demo.hasthemes.com/plantmore-preview/plantmore-v5/portfolio.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 14:50:09 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Portfolio || Plantmore</title>
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
                            <h1>Portfolio</h1>
                        </div>
                        <div class="breadcrumb-content breadcrumb-content-tow">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Portfolio</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--Breadcrumb Tow End-->
		<!--Protfolio Menu Start--> 
		<div class="protfolio-menu-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="protfolio-menu">
                            <ul class="protfolio-menu-active">
                                <?php
                                $sql1="SELECT * from `".TBL_CATEGORY."` WHERE `status`=1 ";
                                $result1 = $database->query($sql1);
                                while($row1 = $database->fetch_array($result1))
                                {
                                    $sql2="SELECT * from `".TBL_PRODUCT."` WHERE `category_id`='".$row1['id']."' AND status=1 ";
                                    $result2 = $database->query($sql2);
                                ?>
                                <!--<li><?php echo $row1['category_name'] ?></a><span>(<?php echo mysqli_num_rows($result2) ?>)</span></li>-->
                                <a href="portfolio.php?category_id=<?php echo $row1['id'] ?>" style="color:white"><span style="color: white; background-color: grey; padding: 20px; margin-left: 10px; display:inline-block; margin-top: 10px;"><?php echo $row1['category_name'] ?><span>(<?php echo mysqli_num_rows($result2) ?>)</span></span></a>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--Protfolio Menu End--> 
		<!--Protfolio Item Start-->
		<div class="protfolio-item mb-80">
            <div class="container-fluid">
                <div class="row protfolio-active">
                    <?php
                    if(isset($_GET['category_id']))
                    {
                        $sql3="SELECT * from `".TBL_PRODUCT."` WHERE `category_id`='".$_GET['category_id']."' ";
                    }
                    else
                    {
                        $sql3="SELECT * from `".TBL_PRODUCT."` ORDER BY product_name ASC ";
                    }
                    $result3 = $database->query($sql3);
                    while($row3 = $database->fetch_array($result3))
                    {
                    ?>
                    <!--Single Protfolio Start-->
                    <div class="col-md-6 col-lg-4 col-xl-3 grid-item company">
                        <div class="single-protfolio">
                            <div class="protfolio-img img-full">
                                <img src="admin/uploads/<?php echo $row3['image'] ?>" alt="">
                                <div class="content">
                                    <div class="portfolio-icon" style="width: 200px;">
                                        <a href="#open-modal" data-toggle="modal" title="Quick view" class="open" id="id" data-id="<?php echo $row3['id'] ?>"><i class="fa fa-search"></i></a>
                                        <?php 
                                        $query1 = "SELECT * FROM `tbl_product` JOIN `tbl_wishlist` on tbl_product.id='".$row3['id']."' AND tbl_wishlist.product_id='".$row3['id']."' and tbl_wishlist.user_id='".$_SESSION['user_id']."' ";
                                        $result1 = $database->query($query1);
                                        $row1 = $database->fetch_array($result1);
                                        if($row1['product_id']!=null)
                                        { ?>
                                            <a href="shop_action.php?remove_wishlist=1&id=<?php echo $row3['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI'] ?>" title="Whishlist"><i class="fa fa-heart"></i></a>
                                        <?php } 
                                        else
                                        { ?>
                                            <a href="shop_action.php?wishlist=1&id=<?php echo $row3['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI'] ?>" title="Whishlist"><i class="fa fa-heart-o"></i></a>
                                        <?php } ?>            
                                        <a href="compare.php?compare_id=<?php echo $row3['id'] ?>" title="compare"><i class="fa fa-refresh"></i></a>   
                                    </div>
                                    <div class="title"><?php echo $row3['product_name'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Single Protfolio End-->
                    <?php } ?>
                </div>
            </div>
        </div>
		<!--Protfolio Item End-->
		  <div id="brand">
      <?php include('includes/brand.php') ?>
    </div>


		<?php include('includes/footer.php'); ?>

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
</body>

<!-- Mirrored from demo.hasthemes.com/plantmore-preview/plantmore-v5/portfolio.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 14:50:24 GMT -->
</html>
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