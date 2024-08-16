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

<!-- Mirrored from demo.hasthemes.com/plantmore-preview/plantmore-v5/my-account.php by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 14:50:33 GMT -->
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>My Account || Plantmore</title>
	<meta name="description" content="">
	<meta name="robots" content="noindex, follow" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="robots" content="noindex, follow" />
	<!-- Place favicon.ico in the root directory -->
	<link rel="shortcut icon" type="image/x-icon" href="img/logo-icon1.png">
    <!--All Css Here-->
    <link href="admin/dist/css/style.min.css" rel="stylesheet">
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
  <!-- chartist CSS -->
    <link href="admin/assets/node_modules/datatables/jquery.dataTables.min.php" rel="stylesheet" type="text/css" />
    <link href="admin/dist/css/pages/ecommerce.css" rel="stylesheet">
    <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css"
        href="admin/assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="admin/assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
  <!--alerts CSS -->
  <link href="admin/assets/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
  <style type="text/css">
    .default-bt:hover
    {
      background-color: #abd373;
    }
    .default-bt
    {
      background-color: #434343;
      color: white;
    }
  </style>
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
                            <h1>My Account</h1>
                        </div>
                        <div class="breadcrumb-content breadcrumb-content-tow">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li class="active">My Account</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--Breadcrumb Tow End-->
		<!--My Account Area Strat-->
    <?php
    /*if(isset($_SESSION['done']))
    {
      echo "<script>alert('Your order has been placed successfully....')</script>";
      unset($_SESSION['done']);
    }*/
    ?>
    <span id="sa-position-order"></span>
		<div class="my-account white-bg mb-110">
            <div class="container">
                <div class="account-dashboard">
                    <div class="row">
                        <div class="col-md-12 col-lg-2">
                            <!-- Nav tabs -->
                            <ul class="nav flex-column dashboard-list" role="tablist">

                                <li><a class="nav-link active" data-toggle="tab" href="#dashboard">Dashboard</a></li>
                                <li> <a class="nav-link" data-toggle="tab" href="#orders">My Orders</a></li>
                                <!--<li><a class="nav-link" data-toggle="tab" href="#account-details">Order Tracking</a></li>-->
                                <li><a class="nav-link" onclick="deleteFunction()">Logout</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12 col-lg-10">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard-content">
                                <div id="dashboard" class="tab-pane fade show active">
                                    <a href="my-account.php"><h3>User Profile</h3></a>
                                    <div class="login">
                                        <div class="login-form-container">
                                            <div class="account-login-form">
                                                <?php if(!isset($_GET['update']) && !isset($_GET['change_pass']) && !isset($_GET['change'])){ ?>
                                                <form action="my-account_action.php" method="post">
                                                  <?php
                                                  $sel="SELECT * FROM`".TBL_USER."` WHERE `id`='".$_SESSION['user_id']."' ";
                                                  $result = $database->query( $sel ); 
                                                  $row=$database->fetch_array($result);
                                                  ?>
                                                  <table>
                                                    <tr>
                                                      <td><label>Name</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row['name'] ?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                    <tr>
                                                      <td><label>Email id</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row['username'] ?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>Address</label>
                                                      <td><textarea style="width: 300px; color: black;" name="address" required="" pattern="[A-Za-z0-9\.\,\-\/ ]+" readonly><?php echo $row['address'] ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>State</label></td>
                                                      <td><input type="text" style="width: 300px; color: black;" value="Tamil Nadu" readonly></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>District</label>
                                                      <td>
                                                        <select name="district" >
                                                        <?php
                                                        $se="SELECT * from `".TBL_DISTRICT."` WHERE `status` = 1";
                                                        $resultt = $database->query($se);
                                                        while($roww = $database->fetch_array($resultt))
                                                        {  
                                                        ?>
                                                        <option value="<?php echo $roww['name'] ?>" <?php if($roww['name']==$row['district']){?> selected=""<?php } ?>><?php echo $roww['name'] ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>City</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row['city'] ?>" name="city"></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>Pincode</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row['pincode'] ?>" readonly name="pincode" pattern="[6]{1}[0-6]{5}"></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>Phone</label>
                                                      <td><input name="phone" type="text" style="width: 300px; color: black;" value="<?php echo $row['phone'] ?>" required="" pattern="[6-9]{1}[0-9]{9}" title="Enter a valid mobile number" readonly></td>
                                                    </tr>
                                                    <tr>
                                                      <td><div class="button-box">
                                                            <button type="submit" class="default-btn" name="update">Edit</button>
                                                          </div></td>
                                                    </tr>
                                                  </table>
                                                  <div style="position: absolute; top: 150px; right: 140px; width: 260px;">
                                                    <div class="single-product mb-25">
                                                        <div class="product-img img-full">
                                                            <img src="admin/uploads/<?php echo $row['image'] ?>" alt="" width="260px">
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="button-box"><br><br><br>
                                                            <button type="submit" class="default-bt" name="change" style="text-transform: none">Change password</button>
                                                          </div>
                                                          <br><br>
                                                  </div>
                                                  <br>
                                                </form>
                                                <?php } ?>
                                                <?php if(isset($_GET['update'])){ ?>
                                                <form action="my-account_action.php" method="post" enctype="multipart/form-data">
                                                  <?php
                                                  $sql="SELECT * FROM`".TBL_USER."` WHERE `id`='".$_SESSION['user_id']."' ";
                                                  $result1 = $database->query( $sql ); 
                                                  $row1=$database->fetch_array($result1);
                                                  ?>
                                                  <h3>UPDATE</h3>
                                                  <table>
                                                    <tr>
                                                      <td><label>Name</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row1['name'] ?>" name="uname" required="" pattern="[A-Za-z ]+"></td>
                                                    </tr>
                                                    <tr>
                                                    <tr>
                                                      <td><label>Email id</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row1['username'] ?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>Address</label>
                                                      <td><textarea style="width: 300px; color: black;" name="address" required="" pattern="[A-Za-z0-9\.\,\-\/ ]+"><?php echo $row1['address'] ?></textarea></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>State</label></td>
                                                      <td><input type="text" style="width: 300px; color: black;" value="Tamil Nadu" readonly name="state"></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>District</label>
                                                      <td>
                                                        <select name="district" >
                                                        <?php
                                                        $se="SELECT * from `".TBL_DISTRICT."` WHERE `status` = 1";
                                                        $resultt = $database->query($se);
                                                        while($roww = $database->fetch_array($resultt))
                                                        {  
                                                        ?>
                                                        <option value="<?php echo $roww['name'] ?>" <?php if($roww['name']==$row1['district']){?> selected=""<?php } ?>><?php echo $roww['name'] ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                                      </td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>City</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row['city'] ?>" name="city"></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>Pincode</label>
                                                      <td><input type="text" style="width: 300px; color: black;" value="<?php echo $row['pincode'] ?>" name="pincode" pattern="[1-9][0-9]{2}\s?[0-9]{3}"></td>
                                                    </tr>
                                                    <tr>
                                                      <td><label>Phone</label>
                                                      <td><input name="phone" type="text" style="width: 300px; color: black;" value="<?php echo $row1['phone'] ?>" required="" pattern="[6-9]{1}[0-9]{9}" title="Enter a valid mobile number"></td>
                                                    </tr>
                                                    <tr>
                                                      <td><div class="button-box">
                                                            <button type="submit" class="default-btn" name="save">Save</button>
                                                          </div></td>
                                                      <td style="text-align: right;"><div class="button-box">
                                                            <a href="my-account.php"><butto type="submit" class="default-btn">Cancel</butto></a>
                                                          </div></td>   
                                                    </tr>
                                                  </table>
                                                  <div style="position: absolute; top: 230px; right: 140px; width: 260px;">
                                                    <div class="single-product mb-25">
                                                        <div class="product-img img-full">
                                                            <img src="admin/uploads/<?php echo $row1['image'] ?>" alt="" width="260px" id="output">
                                                            <div class="product-action">
                                                                <ul>
                                                                    <li><i class="fa fa-upload" id="OpenImgUpload" style="padding: 10px;"></i></li>
                                                                    <input type="file" id="imgupload" name="file_up" accept=".jpeg,.png,.jpg,.jfif" onchange="loadFile(event)" style="display:none"/> 
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                </form>
                                                <?php } ?>
                                                <?php if(isset($_GET['change_pass'])){ ?>
                                                <form action="my-account_action.php" method="post">
                                                  <?php
                                                  $sql="SELECT * FROM`".TBL_USER."` WHERE `id`='".$_SESSION['user_id']."' ";
                                                  $result1 = $database->query( $sql ); 
                                                  $row1=$database->fetch_array($result1);
                                                  ?>
                                                  <h3>Recover password</h3>
                                                      <br>
                                                      <label>Email id:</label>
                                                      <input type="text" style="width: 300px; color: black;" value="<?php echo $row1['username'] ?>" required="" readonly>
                                                    
                                                    <br>
                                                    <div class="button-box">
                                                            <button type="submit" class="default-btn" name="send_pass" style="text-transform: none">Send New password</button>&nbsp;&nbsp;
                                                            <button type="submit" class="default-btn" name="cancel">Cancel</button>
                                                          </div>
                                                  
                                                </form>
                                                <?php } ?>
                                                <?php if(isset($_GET['change'])){ ?>
                                                <form action="my-account_action.php" method="post">
                                                  <?php if(!isset($_GET['next'])){ ?>
                                                  <h3>Verify its you.. to proceed</h3>
                                                  <?php } ?>
                                                  <?php if(isset($_GET['next'])){ ?>
                                                  <h3>Enter new password</h3>
                                                  <?php } ?>
                                                      <?php if(isset($_SESSION['wrng_pass'])){ ?>

                                                        <p style="color: red">** Type correct password or Try to recover... </p>
                                                        <?php 
                                                        unset($_SESSION['wrng_pass']); } ?>

                                                        <?php if(isset($_SESSION['wrng_cpass'])){ ?>

                                                        <p style="color: red">** Mismatch with password and confirm password </p>
                                                        <?php 
                                                        unset($_SESSION['wrng_cpass']); } ?>

                                                      <br>
                                                      <?php if(!isset($_GET['next'])){ ?>
                                                      <label>Password:</label>
                                                      <input type="password" style="width: 300px; color: black;" required="" name="pass" id="aa"><br>
                                                      <input type="checkbox" id="a" onclick="show()">Show password
                                                      <?php } ?>
                                                      <?php if(isset($_GET['next'])){ ?>
                                                      <table><tr><td>
                                                      <label>New Password:</label>
                                                      <input type="password" style="width: 300px; color: black;" required="" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" title="Must contain atleast one number, uppercase, lowercase letter and atleast 8 characters" id="bb"></td><td>
                                                      <label>Confirm Password:</label>
                                                      <input type="password" style="width: 300px; color: black;" required="" name="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" title="Must contain atleast one number, uppercase, lowercase letter and atleast 8 characters" id="cc">
                                                      </td></tr>
                                                      <tr><td><input type="checkbox" onclick="show1()">Show password</td></tr>
                                                    </table>
                                                      <?php } ?>
                                                    
                                                    <div class="button-box">
                                                            <?php if(!isset($_GET['next'])){ ?>
                                                            <button type="submit" class="default-btn" name="next" style="text-transform: none">Next</button><?php }?>
                                                            <?php if(isset($_GET['next'])){?>
                                                            <button type="submit" class="default-btn" name="new_pass" style="text-transform: none">Change</button>
                                                            <?php } ?>&nbsp;&nbsp;
                                                            <button type="submit" class="default-btn"><a href="my-account.php" style="color: white">Cancel</a></button>
                                                          </div>
                                                  
                                                </form>
                                                <?php } ?>
                                            </div>
                                        </div>
                                  </div>
                                </div>

                                <div id="orders" class="tab-pane fade">
                                  <h3>ORDERS</h3>
                                      <?php 
                                      $sql="SELECT * from `".TBL_TRANSACTION."` WHERE `status` != 0 and user_id='".$_SESSION['user_id']."' ORDER BY id DESC ";
                                      $result = $database->query($sql);
                                      $j=1;
                                      while($row = $database->fetch_array($result))
                                      {  ?>
                                        <h5 style="background-color: #e5e5e5; height: 15px; font-weight: bold;"><?php $date=date_create($row['date_paid']); echo date_format($date,'d-m-Y') ?></h5>
                                        <?php 
                                          $sql1="SELECT * from `".TBL_ORDER."` WHERE `transaction_id` ='".$row['id']."' ORDER BY id DESC ";
                                          $result1 = $database->query($sql1);
                                          while($row1 = $database->fetch_array($result1))
                                          {
                                          ?>
                                          <?php 
                                          $sql2="SELECT * from `".TBL_PRODUCT."` WHERE `id` ='".$row1['product_id']."' ";
                                          $result2 = $database->query($sql2);
                                          while($row2 = $database->fetch_array($result2))
                                          {
                                          ?>
                                        <div class="product-list-item mb-40">
                                            <div class="row">
                                                <!--Single List Product Start-->
                                                <div class="col-md-4">
                                                    <div class="single-product">
                                                        <div class="product-img img-full">
                                                            <a href="single-product.html">
                                                                    <img src="admin/uploads/<?php echo $row2['image'] ?>" alt="">
                                                                </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="product-content shop-list">
                                                        <h2><a href="#"><?php echo $row2['product_name'] ?></a></h2>
                                                        <?php if($row['status']==3)
                                                        { ?>
                                                        <?php
                                                        $sql5="SELECT rating,product_id,user_id FROM `".TBL_REVIEW."` where `product_id`='".$row2['id']."' AND `user_id`='".$_SESSION['user_id']."' and order_id='".$row1['id']."' ";
                                                        $result5 = $database->query($sql5);  
                                                        $row5 = $database->fetch_array($result5);
                                                        if(mysqli_num_rows($result5)==1) 
                                                        {
                                                        ?>
                                                          <div class="product-reviews">
                                                            <label>Your Rating: </label>
                                                          <?php for($j=1;$j<=$row5['rating'];$j++) 
                                                          {?>
                                                              <i class="fa fa-star"></i>
                                                          <?php 
                                                          }
                                                          $b=5-$row5['rating'];
                                                          for($a=0;$a<$b;$a++)
                                                          { ?>
                                                            <i class="fa fa-star-o"></i>
                                                          <?php 
                                                          } 
                                                          ?>
                                                          <div class="product-reviews">
                                                          <label><a href="#change">Change Rating</a> </label>
                                                            <div class="changee" id="change">
                                                            <?php for($i=1;$i<=5;$i++){ ?>
                                                              <a href="my-account_action.php?change_rating=1&rate=<?php echo $i ?>&product_id=<?php echo $row2['id'] ?>&order_id=<?php echo $row1['id'] ?>" style="color: gold"><i class="fa fa-star-o" value="<?php echo $i ?>"></i></a>
                                                            <?php } ?>
                                                            </div>
                                                        </div>
                                                        <?php }else{ ?>
                                                        <div class="product-reviews">
                                                          <label>Give Rating: </label>
                                                            <?php for($i=1;$i<=5;$i++){ ?>
                                                              <a href="my-account_action.php?rating=1&rate=<?php echo $i ?>&product_id=<?php echo $row2['id'] ?>&order_id=<?php echo $row1['id'] ?>" style="color: gold"><i class="fa fa-star-o" value="<?php echo $i ?>"></i></a>
                                                            <?php } ?>
                                                        </div>

                                                        <?php } } ?>
                                                            <div class="product-description">
                                                                <p style="color: blue">
                                                                <?php
                                                                if($row1['status']==3)
                                                                { ?>
                                                                  <span style="color: orange">Order delivered</span>
                                                                <?php }if($row1['status']==2){ ?>
                                                                  <br>Ordered
                                                                <?php }
                                                                ?>
                                                                </p>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box">
                                                                    <span class="pric"><b>Quantity:</b> <?php echo $row1['quantity'] ?></span><br>
                                                                    <span class="regular-price"><b>Price: </b>&#8377;<?php echo ($row2['price']-($row2['discount']*$row2['price'])/100)*$row1['quantity'] ?></span>
                                                                </div>
                                                            </div>
                                                            <?php
                                                                if($row['status']==3)
                                                                { ?>
                                                                  <?php 
                                                                  $sql15="SELECT id,review FROM `".TBL_REVIEW."` where `product_id`='".$row2['id']."' AND `user_id`='".$_SESSION['user_id']."' and order_id='".$row1['id']."' ";
                                                                  $result15 = $database->query($sql15);  
                                                                  $row15 = $database->fetch_array($result15);
                                                                  ?>
                                                            <div class="product-list-action">
                                                              <form action="my-account_action.php" method="post"><br>
                                                                <textarea name="review" cols="50" required="" pattern="[A-Za-z0-9\.\-\, ]+"><?php echo $row15['review'] ?></textarea>
                                                                <input type="hidden" name="review_id" value="<?php echo $row15['id'] ?>">
                                                                <?php if($row15['review']==''){ ?>
                                                                <input type="submit" name="add_review" style="width: 100px; height: 40px; background-color: #abd373; color: white" value="Add review">
                                                              <?php }else{ ?> 
                                                                <input type="submit" name="add_review" style="width: 120px; height: 40px; background-color: #abd373; color: white" value="Update review">
                                                              <?php } ?>
                                                              </form>
                                                            </div>
                                                          <?php } ?>
                                                    </div>
                                                </div>
                                                <!--Single List Product End-->
                                            </div>
                                        </div>
                                        <?php $j++; } } } ?>
                                    </div>

                                <div id="account-details" class="tab-pane fade">
                                    <h3>Account details </h3>
                                    <div class="login">
                                        <div class="login-form-container">
                                            <div class="account-login-form">
                                                <form action="#">
                                                    <p>Already have an account? <a href="#">Log in instead!</a></p>
                                                    <label>Social title</label>
                                                    <div class="input-radio">
                                                        <span class="custom-radio"><input name="id_gender" value="1" type="radio"> Mr.</span>
                                                        <span class="custom-radio"><input name="id_gender" value="1" type="radio"> Mrs.</span>
                                                    </div>
                                                    <label>First Name</label>
                                                    <input name="first-name" type="text">
                                                    <label>Last Name</label>
                                                    <input name="last-name" type="text">
                                                    <label>Email</label>
                                                    <input name="email-name" type="text">
                                                    <label>Password</label>
                                                    <input name="user-password" type="password">
                                                    <label>Birthdate</label>
                                                    <input name="birthday" value="" placeholder="MM/DD/YYYY" type="text">
                                                    <span class="example">
                                                      (E.g.: 05/31/1970)
                                                    </span>
                                                    <span class="custom-checkbox">
                                                        <input name="optin" value="1" type="checkbox">
                                                        <label>Receive offers from our partners</label>
                                                    </span>
                                                    <span class="custom-checkbox">
                                                        <input name="newsletter" value="1" type="checkbox">
                                                        <label>Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em></label>
                                                    </span>
                                                    <div class="button-box">
                                                        <button type="submit" class="default-btn">save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
		                              </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--My Account Area End-->
		
		 <?php include('includes/footer.php') ?>
    
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
  <script type="text/javascript">
    $('#OpenImgUpload').click(function(){ $('#imgupload').trigger('click'); });
  </script>
  <script>
var loadFile = function(event) {
  var image = document.getElementById('output');
  image.src = URL.createObjectURL(event.target.files[0]);
};
function show()
        {
            var s=document.getElementById("aa");
            if(s.type === "password")
            {
                s.type ="text";
            }
            else
            {
                s.type="password";
            } 
        }
function show1()
        {
            var s=document.getElementById("bb");
            var s1=document.getElementById("cc");
            if(s.type === "password" && s1.type === "password")
            {
                s.type ="text";
                s1.type ="text";
            }
            else
            {
                s.type="password";
                s1.type="password";
            } 
        }
</script>
<script type="text/javascript">
  $('.changee').hide()
  $('a[href^="#"]').on('click',function(event){
    $('.changee').hide()
    var target=$(this).attr('href');
    $('.changee'+target).toggle();
  });
</script>
<!-- Data Table changes and image output display -->
    <script src="admin/dist/js/pages/table-date_img-output.js"></script>
    <!--Data table-->
    <script src="admin/assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="admin/assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="admin/assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="admin/assets/node_modules/sweetalert2/sweet-alert.init.js?v=1"></script>
</body>

</html>
<script type="text/javascript">
function deleteFunction() 
{
  event.preventDefault();
  Swal.fire({
  title: "Are you sure to logout?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, Logout!",
  cancelButtonText: "Cancel",
  closeOnConfirm: false,
  }).then(function(result)
  {
    if (result.value) 
    {
        location.assign("login-register_action.php?logout=0");        // submitting the form when user press yes
    } 
});
}
</script>
<?php
if(isset($_SESSION['done']))
{ 
?>
<script type="text/javascript">
$('#sa-position-order').trigger('click');
</script>
<?php 
unset($_SESSION['done']);
}
?>