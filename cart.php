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

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Cart || Plantmore</title>
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
                            <h1>Shopping Cart</h1>
                        </div>
                        <div class="breadcrumb-content breadcrumb-content-tow">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Shopping Cart</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--Breadcrumb Tow End-->
		<!--Shopping Cart Area Strat-->
		<div class="Shopping-cart-area mb-110">
		    <div class="container">
		        <div class="row">
		            <div class="col-12">
		                <form action="#">
		                    <div class="table-content table-responsive">
		                        <table class="table">
		                            <thead>
		                                <tr>
		                                    <th>S.No</th>
		                                    <th class="plantmore-product-thumbnail">images</th>
		                                    <th class="cart-product-name">Product</th>
		                                    <th class="plantmore-product-price">Price</th>
                                        <th>Discount</th>
		                                    <th class="plantmore-product-quantity">Quantity</th>
		                                    <th class="plantmore-product-subtotal">Total</th>
                                        <th class="plantmore-product-remove">remove</th>
		                                </tr>
		                            </thead>
		                            <tbody>
                                    <?php 
                                    $sql="SELECT * from `".TBL_ORDER."` WHERE `status` =1 AND user_id='".$_SESSION['user_id']."' ";
                                    $result = $database->query($sql);
                                    $j=1;
                                    while($row = $database->fetch_array($result))
                                    {  ?>
		                                <tr>
		                                    <td><?php echo $j ?></td>
                                        <?php 
                                        $sql1="SELECT * from `".TBL_PRODUCT."` WHERE `id` ='".$row['product_id']."' AND `status`=1 ";
                                        $result1 = $database->query($sql1);
                                        while($row1 = $database->fetch_array($result1))
                                        {
                                        ?>
		                                    <td class="plantmore-product-thumbnail"><img src="admin/uploads/<?php echo $row1['image'] ?>" alt="" style="height: 100px; width: 100px;"></td>
		                                    <td class="plantmore-product-name"><?php echo $row1['product_name'] ?></td>
		                                    <td class="plantmore-product-price"><span class="amount">&#8377;<?php echo $row1['price'] ?></span></td>
                                        <td><?php echo $row1['discount'] ?>%</td>
		                                    <td class="plantmore-product-quantity"><a style="text-decoration: none;color: black; font-weight: bold; background-color: #e5e5e5" href="cart_action.php?id=<?php echo $row['id'] ?>&quantity=<?php echo $row['quantity'] ?>&mode=plus&product_id=<?php echo $row['product_id'] ?>">&#43;</a>&nbsp;&nbsp;&nbsp;<?php echo $row['quantity']; ?>&nbsp;&nbsp;&nbsp;<a style="text-decoration: none;color: black; font-weight: bold; background-color: #e5e5e5" href="cart_action.php?id=<?php echo $row['id'] ?>&quantity=<?php echo $row['quantity'] ?>&mode=minus">&#8722;</a></td>
		                                    <td class="product-subtotal"><span class="amount">&#8377;<?php echo ($row1['price']-($row1['discount']*$row1['price'])/100)*$row['quantity'] ?></span></td>
                                        <td class="plantmore-product-remove"><a href="cart_action.php?id=<?php echo $row['id'] ?>&mode=delete"><i class="fa fa-times"></i></a></td>
		                                </tr>
                                  <?php
                                   $total_price+=round(($row1['price']-($row1['discount']*$row1['price'])/100)*$row['quantity']);
                                   $_SESSION['total_price']=$total_price;
                                   $_SESSION['total_product']=$j;
                                   $j++; } } ?>
		                            </tbody>
		                        </table>
		                    </div>
		                    <div class="row">
		                        <div class="col-12">
		                            <div class="coupon-all">
		                                <!--<div class="coupon">
		                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
		                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
		                                </div>-->
		                                <div class="coupon2">
		                                    <a href="cart.php" style="background-color: #333; color: white; padding: 15px">Update Cart</a>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="row">
		                        <div class="col-md-5 ml-auto">
		                            <div class="cart-page-total">
		                                <h2>Cart totals</h2>
		                                <ul>
		                                    <li>Total <span>&#8377;<?php echo $total_price; ?></span></li>
		                                </ul>
		                                <a href="#checkout" data-toggle="modal" title="Quick view">Place Order</a>
		                            </div>
		                        </div>
		                    </div>
		                </form>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Shopping Cart Area End-->
<!-- Modal Area Strat -->
        <div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-hidden="true" style="width: 1200px;">
          <div class="modal-dialog" role="document">
            <div class="modal-content" style="width: 800px;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
              </div>
              <div class="modal-body">
                <div class="row fetch">
                    <!--Modal Content-->
                    <div class="tab-content dashboard-content">
 
    <a href="my-account.php"><h3>Order Details</h3></a>
    <div class="login">
        <div class="account-login-form">

                                                <form action="cart_action.php" method="post">
                                                  <?php
                                                  $sql="SELECT * FROM`".TBL_USER."` WHERE `id`='".$_SESSION['user_id']."' ";
                                                  $result1 = $database->query( $sql ); 
                                                  $row1=$database->fetch_array($result1);
                                                  ?>
                                                  <table>
                                                    <tr>
                                                      <td><label>Name</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row1['name'] ?>" name="name" required="" pattern="[A-Za-z ]+"></td>
                                                    </tr>
                                                    <tr>
                                                    <tr>
                                                      <td><label>Email id</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row1['username'] ?>" readonly name="email"></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>Address</label>
                                                      <td><textarea style="width: 300px; color: black;" name="address" required="" pattern="[A-Za-z0-9\.\,\-\/ ]+" value="<?php echo $row1['address'] ?>"><?php echo $row1['address'] ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>State</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row1['state'] ?>" name="state" readonly></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>District</label>
                                                      <td><select name="district" >
                                                        <?php
                                                        $se="SELECT * from `".TBL_DISTRICT."` WHERE `status` = 1";
                                                        $resultt = $database->query($se);
                                                        while($roww = $database->fetch_array($resultt))
                                                        {  
                                                        ?>
                                                        <option value="<?php echo $roww['name'] ?>" <?php if($roww['name']==$row1['district']){?> selected=""<?php } ?>><?php echo $roww['name'] ?></option>
                                                        <?php }
                                                        ?>
                                                    </select></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>City</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row1['city'] ?>" name="city"></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>Pincode</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row1['pincode'] ?>" name="pincode" pattern="[1-9][0-9]{2}\s?[0-9]{3}"></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>Phone</label>
                                                      <td><input name="phone" type="text" style="width: 300px; color: black;" value="<?php echo $row1['phone'] ?>" required="" pattern="[6-9]{1}[0-9]{9}" title="Enter a valid mobile number"></td>
                                                    </tr>
                                                    <tr><td><hr style="width:300%; color: red; background-color: grey"></td></tr>
                                                    <tr><td><h4 style="font-weight: bold">Mode of Payment</h4><br></td></tr>
                                                    <tr>
                                                      <td><input type="radio" name="payment_mode" value="online" style="width: 15px; height: 15px" checked="">&nbsp;Online Payment</td>
                                                      <td><input type="radio" name="payment_mode" value="cod" style="width: 15px; height: 15px">&nbsp;Cash on Delivery</td>
                                                    </tr>
                                                    <tr>
                                                      <td style="text-align: right;"><div class="button-box">
                                                            <button type="submit" class="default-btn" name="payment">Proceed to payment</button>
                                                          </div></td>  
                                                    </tr>

                                                  </table>

                                                </form>                             
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