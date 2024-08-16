<?php 
$page_id = "gallery_m";
error_reporting (E_ALL ^ E_NOTICE);
include_once '../assets/libs/class.database.php';
include_once '../assets/libs/class.session.php';
include_once '../assets/libs/functions.php';
include_once '../assets/libs/tables.config.php';
include_once '../assets/libs/class.commen.php';
session_start();
$session= new Session();
global $database, $db;  
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/ecommerce/pages-login.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 16:26:59 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo-icon1.png">
    <title>Plantmore Admin </title>
    
    <!-- page css -->
    <link href="dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Plantmore Admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(assets/images/back.jpg);">
            <div class="login-box card" style="margin-left: 200px; margin-top: 20px; background-color: lightgreen; border: 1px solid brown; box-shadow: 1px 2px 15px brown; color: black">
                <div class="card-body">
                    <form class="form-horizontal form-material" action="login_action.php" method="post" id="loginform">
                        <h3 class="text-center m-b-20" style="font-family: cooper">SIGN IN </h3>
                        <?php if(isset($_SESSION['failure'])){ ?>
                        <center style="color: red">*<?php echo $_SESSION['failure']; unset($_SESSION['failure']); ?></center>
                        <?php } ?>
                        <?php if(isset($_SESSION['success'])){ ?>
                        <center style="color: brown">*<?php echo $_SESSION['success']; unset($_SESSION['success']); ?></center>
                        <?php } ?>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Username" name="username" pattern="[A-Za-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter a valid email id" value="<?php if(isset($_COOKIE["username_admin"])) { echo $_COOKIE["username_admin"]; } ?>"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="password" required="" placeholder="Password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,32}" title="Must contain atleast one number, uppercase, lowercase letter and atleast 8 characters" id="password">
                                <i class="ti-eye" style="position: absolute; top: 140px; right: 25px" onclick="show()" id="a"></i>
                                 </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div> 
                                    <div class="ml-auto">
                                        <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="ti-lock"></i> Forgot pwd?</a> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" style="background-color: green" name="login">Log In</button>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" action="login_action.php" method="post">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3 style="font-family: cooper">Recover Password</h3>
                                <p class="text-muted">Enter your Email and instructions will be sent to you! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Name" name="name" pattern="[A-Za-z ]+" title="Enter a valid email id"><br><br>
                                <input class="form-control" type="text" required="" placeholder="Email" name="email" pattern="[A-Za-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter a valid email id"> </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" style="background-color: green; border: 1px solid green" name="recover">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/node_modules/popper/popper.min.js"></script>
    <script src="assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        function show()
        {
            var s=document.getElementById("password");
            if(s.type === "password")
            {
                document.getElementById('a').style.color = "blue";
                s.type ="text";
            }
            else
            {
                document.getElementById('a').style.color = "black";
                s.type="password";
            } 
        }
    </script>
    
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/ecommerce/pages-login.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 16:26:59 GMT -->
</html>