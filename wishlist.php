<?php
error_reporting (E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
session_start();
$session= new Session();
global $database, $db; 
if(!isset($_SESSION['user_id']))
{
    header('Location: login.php');
} 
?>
<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.hasthemes.com/plantmore-preview/plantmore-v5/wishlist.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 14:50:26 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Wishlist || Plantmore</title>
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
                            <h1>Wishlist</h1>
                        </div>
                        <div class="breadcrumb-content breadcrumb-content-tow">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Wishlist</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--Breadcrumb Tow End-->
		<!--Wishlist Area Strat-->
		<div class="shop-product" style="padding-left: 200px;padding-right: 200px;">
                            <div id="myTabContent-2" class="tab-content">
                                <div id="grid" class="tab-pane fade show active">
                                    <div class="product-grid-view">
                                        <div class="row filter_data">
    <?php
    $query34 = "SELECT * FROM `tbl_wishlist` WHERE user_id='".$_SESSION['user_id']."' ORDER BY id DESC ";
  $result34 = $database->query($query34);
  while($row34 = $database->fetch_array($result34))
  {
  	$query = "SELECT * FROM `tbl_product` WHERE id='".$row34['product_id']."' ";
  $result = $database->query($query);
  while($row = $database->fetch_array($result))
  {
    ?>
   <div class="col-md-4">
    <!--Single Product Start-->
    <div class="single-product mb-25">
      <div class="product-img img-full">
        <a href="single-product.php?id=<?php echo $row['id'] ?>">
        <img src="admin/uploads/<?php echo $row['image'] ?>" alt="">
        </a>
        <?php if($row['discount']!='0'){ ?>
<span class="onsale"><?php echo $row['discount']?>%</span> <?php } ?>
    <?php if($row['discount']=='0'){ ?>
<span class="onsale">Sale!</span><?php } ?>

   <div class="product-action"> 
          <ul>
            <input type="hidden" name="id" id="id" value="<?php echo $row['id'] ?>">
            <li><a href="#open-modal" data-toggle="modal" title="Quick view" class="open" id="id" data-id="<?php echo $row['id'] ?>"><i class="fa fa-search"></i></a></li>
            <li>
  <?php $query1 = "SELECT * FROM `tbl_product` JOIN `tbl_wishlist` on tbl_product.id='".$row['id']."' AND tbl_wishlist.product_id='".$row['id']."' and tbl_wishlist.user_id='".$_SESSION['user_id']."' ";
  $result1 = $database->query($query1);
  $row1 = $database->fetch_array($result1); 
    if($row1['product_id']!=null) 
    { ?>
      <a href="shop_action.php?remove_wishlist=1&id=<?php echo $row['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI'] ?>" title="Whishlist"><i class="fa fa-heart"></i></a>
   <?php }
    else
    { ?>
      <a href="shop_action.php?wishlist=1&id=<?php echo $row['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI'] ?>" title="Whishlist"><i class="fa fa-heart-o"></i></a>
    <?php } ?>

    </li>
            <!--<li><a href="#" title="Compare"><i class="fa fa-refresh"></i></a></li>-->
          </ul>
        </div>
      </div>
      <div class="product-content">
      <h2><a href="single-product.php?id=<?php echo $row['id'] ?>"><?php echo $row['product_name'] ?></a></h2>
        <div class="product-price">
          <div class="price-box">
  <?php if($row['discount']!='0'){ ?>
  <span class="price">&#8377;<?php echo $row['price'] ?></span> <?php } ?>

  <span class="regular-price">&#8377;<?php echo ($row['price']-($row['discount']*$row['price'])/100) ?></span>
          </div>         
         <?php if($row['stock']!='0'){  ?>
         <div class="add-to-cart">
           <a href="shop_action.php?id=<?php echo $row['id'] ?>&add=1">Add To Cart</a>
          </div>
      <?php    }else{ ?> 
<div class="add-to-cart">
             <a style="color: red">Out of Stock</a>
          </div>
         <?php } ?> 
</div>
      </div>
    </div>
  <!--Single Product End-->
  </div>
<?php } } ?>
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--List view-->
                                <div id="list" class="tab-pane fade">
                                    <div class="product-list-view filter_data1">
                                      
                                          
                                    </div>
                                </div>
                                <!--Pagination Start-->
                                <div class="product-pagination">
                                    <ul>
                                      <?php 
                                          for($page = 1; $page<= $number_of_page; $page++) 
                                          { ?> 
                                        <li <?php if($page==$_GET['page']){?> class="active" <?php } ?> ><a href = "shop.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>
                                        <?php
                                          }?>
                                    </ul>
                                </div>
                                <!--Pagination End-->
                            </div>
                        </div>
		<!--Wishlist Area End-->
		
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

<!-- Mirrored from demo.hasthemes.com/plantmore-preview/plantmore-v5/wishlist.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 14:50:29 GMT -->
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