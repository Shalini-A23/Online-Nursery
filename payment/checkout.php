<?php
error_reporting (E_ALL ^ E_NOTICE);
include_once '../assets/libs/class.database.php';
include_once '../assets/libs/class.session.php';
include_once '../assets/libs/functions.php';
include_once '../assets/libs/tables.config.php';
session_start();
$session= new Session();
global $database, $db; 
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Checkout || Plantmore</title>
	<meta name="description" content="">
	<meta name="robots" content="noindex, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, follow" />
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="../img/logo-icon1.png">
    <!--All Css Here-->
    
    <!-- Bootstrap CSS-->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<!-- Linearicon CSS-->
    <link rel="stylesheet" href="../css/linearicons.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

	<!-- Animate CSS-->
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Owl Carousel CSS-->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<!-- Slick CSS-->
	<link rel="stylesheet" href="../css/slick.css">
	<!-- Meanmenu CSS-->
	<link rel="stylesheet" href="../css/meanmenu.min.css">
	<!-- Easyzoom CSS-->
	<link rel="stylesheet" href="../css/easyzoom.css">
	<!-- Venobox CSS-->
	<link rel="stylesheet" href="../css/venobox.css">
	<!-- Jquery Ui CSS-->
	<link rel="stylesheet" href="../css/jquery-ui.css">
	<!-- Nice Select CSS-->
	<link rel="stylesheet" href="../css/nice-select.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="../style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="../css/responsive.css">
	<!-- Modernizr Js -->
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>
	<!-- Stripe JavaScript library -->
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
//set your publishable key
Stripe.setPublishableKey('pk_test_51IclaTSCbS5QonPJTs1P1tHzOZooO7QzlyNueDeVhS8vSnhy7Xg82O7fjmHFukIyZ0k3YN58LX7rKEjcBe9vJRFi00fUOQIQ0e');

//callback to handle the response from stripe
function stripeResponseHandler(status, response) {
    if (response.error) {
        //enable the submit button
        $('#payBtn').removeAttr("disabled");
        //display the errors on the form
        $(".payment-errors").html(response.error.message);
    } else {
        var form$ = $("#paymentFrm");
        //get token id
        var token = response['id'];
        //insert the token into the form
        form$.append("<input type='hidden' name='stripeToken' value='" 
+ token + "' />");
        //submit form to the server
        form$.get(0).submit();
    }
}
$(document).ready(function() {
    //on form submit
    $("#paymentFrm").submit(function(event) {
        //disable the submit button to prevent repeated clicks
        $('#payBtn').attr("disabled", "disabled");
        
        //create single-use token to charge the user
        Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
        }, stripeResponseHandler);
        
        //submit from callback
        return false;
    });
});
</script>
</head>
<body style="border: 12px solid grey;">
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="../http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div class="wrapper" >
    <!--Breadcrumb Tow Start-->
    <div style="background-color: #e5e5e5"><br><br><a href="../cart.php">
    <i class="fa fa-close" style="position: absolute; right: 40px; font-size: 30px; top: 40px; color: red"></i></a>
		<h1 style="font-weight: bolder; text-align: center">CHECKOUT</h1><br><br>
  </div><br><br><br>
		<!--Breadcrumb Tow End-->
		<!--Checkout Area Strat-->
		<div class="checkout-area mb-80">
		    <div class="container">
		        <div class="row">
		            <div class="col-lg-6 col-12">
		            	<?php if(!isset($_GET['mode'])){ ?>
		                <form action="submit.php" method="POST" id="paymentFrm">
		                    <div class="checkbox-form">
		                        <h3>Payment</h3>
		                        <div class="row">
		                            <div class="col-md-12">
		                                <div class="checkout-form-list">
		                                    <label>Card Number <span class="required">*</span></label>
		                                    <input placeholder="Card Number" type="text" required="" name="card_num" size="20" autocomplete="off" class="card-number">
		                                    <?php
		                                    $sql0="SELECT username FROM `".TBL_USER."` WHERE id='".$_SESSION['user_id']."' ";
    										$result0 = $database->query($sql0); 
    										$row0 = $database->fetch_array($result0);
		                                    ?>
		                                    <input type="hidden" name="email" value="<?php echo $row0[0] ?>">
		                                </div>
		                            </div>
		                            <div class="col-md-6">
		                                <div class="checkout-form-list">
		                                    <label>Expiration Date</label>
		                                    <input type="text" name="exp_month" size="2" class="card-expiry-month" style="width: 50px;" placeholder="MM" />
        									<span> / </span>
        									<input type="text" name="exp_year" size="4" class="card-expiry-year" style="width: 100px;" placeholder="YYYY"/>
		                                </div>
		                            </div>
		                            <div class="col-md-6">
		                                <div class="checkout-form-list">
		                                    <label>CVV Code<span class="required">*</span></label>
		                                    <input placeholder="CVV" type="password" required="" size="3" autocomplete="off" class="card-cvc" name="cvc">
		                                </div>
		                            </div>
		                            <div class="col-md-8">
                                        <div class="checkout-form-list">
                                            <label>Name on the card <span class="required">*</span></label>
		                                    <input type="text" placeholder="Name" required="" name="name">
                                        </div>
		                            </div>
		                            <div class="col-md-12">
                                       <div class="order-button-payment">
                                        <input value="Make payment" type="submit" name="payment">
                                        </div>
		                            </div>
		                        </div>
		                    </div>
		                </form>
		            	<?php }else{ ?>
		            	<form action="submit1.php" method="POST">
		                    <div class="checkbox-form">
		                        <h3>Cash on Delivery</h3><br><br>
		                        <div class="row">
		                            <div class="col-md-12">
		                                <div class="checkout-form-list">
		                                    <label>Cash on delivery is a type of transaction where the recipient pays for a good at the time of delivery rather than using credit card. Cash on delivery is also referred to as collect on delivery since delivery may allow for carsh, check or electronic payment.<span class="required">*</span></label><br><br><br><br><br>
		                                </div>
		                            </div>
		                            <div class="col-md-12">
                                       <div class="order-button-payment">
                                        <input value="Make Order" type="submit" name="order">
                                        </div>
		                            </div>
		                        </div>
		                    </div><br>
		            	</form>
		            	<?php } ?>
		            </div>
		            <div class="col-lg-6 col-12">
		                <div class="your-order">
		                    <h3>Your order</h3>
		                    <div class="your-order-table table-responsive">
		                        <table class="table">
		                            <thead>
		                                <tr>
                                            <th>S.No</th>
		                                    <th class="cart-product-name">Product</th>
		                                    <th class="cart-product-total">Total</th>
		                                </tr>
		                            </thead>
		                            <tbody>
                                        <?php 
                                        $sql="SELECT * from `".TBL_ORDER."` WHERE `status` = 1 AND user_id='".$_SESSION['user_id']."' ";
                                        $result = $database->query($sql);
                                        $j=1;
                                        $_SESSION['product_id']=array();
                                        $_SESSION['quantity']=array();
                                        $_SESSION['order_id']=array();
                                        while($row = $database->fetch_array($result))
                                        {  ?>
		                                <tr class="cart_item">
                                          <td><?php echo $j; $_SESSION['j']=$j; ?></td>
                                          <?php 
                                          $sql1="SELECT * from `".TBL_PRODUCT."` WHERE `id` ='".$row['product_id']."' AND `status`=1 ";
                                          $result1 = $database->query($sql1);
                                          while($row1 = $database->fetch_array($result1))
                                          {
                                          ?>
		                                  <td class="cart-product-name"><?php echo $row1['product_name'] ?><strong class="product-quantity"> × <?php  echo $row['quantity']?></strong></td>
		                                  <td class="cart-product-total"><span class="amount">&#8377;<?php echo ($row1['price']-($row1['discount']*$row1['price'])/100)*$row['quantity'] ?></span></td> 
                                          <?php 
                                          
                                          $_SESSION['product_id'][]=$row['product_id'];
                                          $_SESSION['quantity'][]=$row['quantity'];
                                          $_SESSION['order_id'][]=$row['id'];
                                          
                                          ?>
		                                </tr>
                                        <?php $j++; } };
                                         ?>
		                            </tbody>
		                            <tfoot>
		                                <tr class="order-total">
		                                    <th>Order Total</th>
		                                    <td><strong><span class="amount">&#8377;<?php echo $_SESSION['total_price'] ?></span></strong></td>
		                                </tr>
		                            </tfoot>
		                        </table>
		                    </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		<!--Checkout Area End-->
  </body>





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

<!-- Mirrored from demo.hasthemes.com/plantmore-preview/plantmore-v5/checkout.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 14:50:29 GMT -->
</html>
