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
<?php
@session_start();
if(!isset($_SESSION["compare"]))     {
  $_SESSION["compare"] = array();
}
$maxelements = 3;
if (isset($_GET['compare_id']) && $_GET['compare_id'] <> "") {// if we have url parameter

if (in_array($_GET['compare_id'], $_SESSION["compare"])) { // if product id is already in the array
  $_SESSION["compare"] = array_diff($_SESSION["compare"],array($_GET['compare_id'])) ; // remove it
  $_SESSION["compare"] = array_values($_SESSION["compare"]); //optionally, re-index the array
}

if (count($_SESSION["compare"]) >= $maxelements) {//check the number of array elements
$_SESSION["compare"] = array_slice($_SESSION["compare"],1); // remove the first element if we have 5 already
array_push($_SESSION["compare"],$_GET['compare_id']);//add the current itemid to the array
} else {
array_push($_SESSION["compare"],$_GET['compare_id']);//add the current itemid to the array
}

}
$criteria = (isset($_SESSION["compare"])?implode(", ",$_SESSION["compare"]):"-1");
foreach(array_reverse($_SESSION['compare'],true) as $compare_id)
{
    $sel="SELECT * FROM `".TBL_PRODUCT."` WHERE id='".$compare_id."' ";
    $result = $database->query( $sel );
} 
?>
<?php
if(isset($_GET['remove']))
{
	$key=array_search($_GET['compareid'],$_SESSION['compare']);
	unset($_SESSION['compare'][$key]);
}
?>
<!doctype html>
<html class="no-js" lang="en">

<!-- Mirrored from demo.hasthemes.com/plantmore-preview/plantmore-v5/compare.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 14:50:29 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Compare || Plantmore</title>
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


	<div class="wrapper">
		<?php include('includes/header1.php') ?>
		<!--Breadcrumb Tow Start-->
		<div class="breadcrumb-tow mb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-title">
                            <h1>Compare</h1>
                        </div>
                        <div class="breadcrumb-content breadcrumb-content-tow">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Compare</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--Breadcrumb Tow End-->
		<!--Compare Area Strat-->
		<div class="compare-wrapper mb-120">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<form action="#">           
							<!-- Compare Table -->
							<div class="compare-table table-responsive">
								<table class="table mb-0">
									<tbody>
										<tr>
											<td></td>
											<td class="first-column">Product 01</td>
											<td class="first-column">Product 02</td>
											<td class="first-column">Product 03</td>
										</tr>
										<tr>
											<td class="first-column">Product</td>
											<?php
											foreach(array_reverse($_SESSION['compare'],true) as $compare_id)
                    						{ 
                    							$sel1="SELECT * FROM `".TBL_PRODUCT."` WHERE id='".$compare_id."' ";
                      							$result1 = $database->query( $sel1 );
                      							$row1=$database->fetch_array($result1);
											?>
											<td class="pro-desc"><p><?php echo $row1['product_name'] ?></p></td>
											<?php } ?>
										</tr>
										<tr>
											<td class="first-column">Image</td>
											<?php
											foreach(array_reverse($_SESSION['compare'],true) as $compare_id)
                    						{ 
                      							$sel1="SELECT * FROM `".TBL_PRODUCT."` WHERE id='".$compare_id."' ";
                      							$result1 = $database->query( $sel1 );
                      							$row1=$database->fetch_array($result1);
											?>
											<td class="product-image-title">
												<a href="single-product.php?id=<?php echo $row1['id'] ?>" class="image"><img src="admin/uploads/<?php echo $row1['image'] ?>" alt="Compare Product"></a>
											</td>
											<?php } ?>
										</tr>
										
										<tr>
											<td class="first-column">Price</td>
											<?php
											foreach(array_reverse($_SESSION['compare'],true) as $compare_id)
                    						{ 
                    							$sel1="SELECT * FROM `".TBL_PRODUCT."` WHERE id='".$compare_id."' ";
                      							$result1 = $database->query( $sel1 );
                      							$row1=$database->fetch_array($result1);
											?>
											<td class="pro-price">&#8377;<?php echo $row1['price'] ?></td>
											<?php } ?>
										</tr>
										<tr>
											<td class="first-column">Discount</td>
											<?php
											foreach(array_reverse($_SESSION['compare'],true) as $compare_id)
                    						{ 
                    							$sel1="SELECT * FROM `".TBL_PRODUCT."` WHERE id='".$compare_id."' ";
                      							$result1 = $database->query( $sel1 );
                      							$row1=$database->fetch_array($result1);
											?>
											<td class="pro-color"><?php echo $row1['discount'] ?>%</td>
											<?php } ?>
										</tr>
										<tr>
											<td class="first-column">Price with discount</td>
											<?php
											foreach(array_reverse($_SESSION['compare'],true) as $compare_id)
                    						{ 
                    							$sel1="SELECT * FROM `".TBL_PRODUCT."` WHERE id='".$compare_id."' ";
                      							$result1 = $database->query( $sel1 );
                      							$row1=$database->fetch_array($result1);
											?>
											<td class="pro-color">&#8377;<?php echo ($row1['price']-($row1['discount']*$row1['price'])/100) ?></td>
											<?php } ?>
										</tr>
										<tr>
											<td class="first-column">Stock</td>
											<?php
											foreach(array_reverse($_SESSION['compare'],true) as $compare_id)
                    						{ 
                    							$sel1="SELECT * FROM `".TBL_PRODUCT."` WHERE id='".$compare_id."' ";
                      							$result1 = $database->query( $sel1 );
                      							$row1=$database->fetch_array($result1);
                      							if($row1['stock']!=0)
                      							{
											?>
											<td class="pro-stock" style="color: green"><?php echo $row1['stock'] ?> in Stock</td>
											<?php }else{ ?>
											<td class="pro-stock" style="color: red">Out of Stock</td>
											<?php } ?>
											<?php } ?>
										</tr>
										<tr>
											<td class="first-column">Add to cart</td>
											<?php
											foreach(array_reverse($_SESSION['compare'],true) as $compare_id)
                    						{ 
                    							$sel1="SELECT * FROM `".TBL_PRODUCT."` WHERE id='".$compare_id."' ";
                      							$result1 = $database->query( $sel1 );
                      							$row1=$database->fetch_array($result1);
											?>
											<?php
											if($row1['stock']!=0)
                  							{
                      						?>
											<td class="pro-addtocart"><a href="shop_action.php?id=<?php echo $row1['id'] ?>&add=1"><i class="ti-shopping-cart"></i><span>ADD TO CART</span></a></td>
											<?php }else{ ?>
											<td class="pro-addtocart">Comming Soon</td>
											<?php } ?>

											<?php } ?>
										</tr>
										
										<tr>
											<td class="first-column">Rating</td>
											<?php
											foreach(array_reverse($_SESSION['compare'],true) as $compare_id)
                    						{ 
                    							$sel1="SELECT * FROM `".TBL_PRODUCT."` WHERE id='".$compare_id."' ";
                      							$result1 = $database->query( $sel1 );
                      							$row1=$database->fetch_array($result1);
                      							?>
                      						<td class="pro-ratting">
                      							<?php
                      							$sel3="SELECT SUM(rating)/COUNT(rating) FROM `".TBL_REVIEW."` WHERE product_id='".$row1['id']."' ";
                          						$result3 = $database->query( $sel3 );
                          						while($row3=$database->fetch_array($result3))
												{		
                                					if($row3[0]!='0')
                                					{	
                                  						$i=$row3[0];
                                  						if(number_format((float)$row3[0],1,'.','')=='0.0')
                                  						{
                                    						echo "";
                                  						}else
                                  						{ ?>
                                    						<span><?php echo number_format((float)$row3[0],1,'.','') ?></span>
                                  						<?php 
                                  						}
                                					}
                                					if($row3[0]!=null)
                                					{
                                  						$z=(int)$row3[0];
                                  						for($j=1;$j<=$z;$j++) 
                                  						{?>
                                   							<i class="fa fa-star"></i>
                                  						<?php 
                                  						}
                                  						$b=5-$z;
                                  						if($b!=0)
                                  						{
                                    						$x=$row3[0]-$z;
                                    						if($x==0)
                                    						{
                                    						for($i=0;$i<$b;$i++){ 
                                    						?>
                                      							<i class="fa fa-star-o"></i>
                                    						<?php }
                                    						}else
                                    						{ ?>
                                      							<i class="fa fa-star-half-o"></i>
                                    						<?php 
                                    						}
                                  						} 
                                					}
                            						else
                                					{
                                						echo "No rating";
                                					}
                            					}
                            					?>
											
											</td>
											<?php } ?>
										</tr>
										<tr>
											<td class="first-column">Remove</td>
											<?php
											foreach(array_reverse($_SESSION['compare'],true) as $compare_id)
                    						{ 
                    							$sel1="SELECT * FROM `".TBL_PRODUCT."` WHERE id='".$compare_id."' ";
                      							$result1 = $database->query( $sel1 );
                      							$row1=$database->fetch_array($result1);
											?>
											<td class="pro-remove"><a href="compare.php?remove=1&compareid=<?php echo $row1['id'] ?>"><i class="fa fa-trash-o" style="color: red"></i></a></td>
											<?php } ?>
										</tr>
									</tbody>
								</table>
							</div>
						</form> 
					</div>
				</div>
			</div>
		</div>
		<!--Compare Area End-->
		
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
</body>

<!-- Mirrored from demo.hasthemes.com/plantmore-preview/plantmore-v5/compare.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 14:50:33 GMT -->
</html>
