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
if(!isset($_SESSION['delivery_admin_id']))
{
    header('Location: login.php');
}   
date_default_timezone_set('Asia/Kolkata');
?>
<!DOCTYPE html>
<html lang="en">

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
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link href="dist/css/pages/ecommerce.css" rel="stylesheet">
     <!--alerts CSS -->
    <link href="assets/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="skin-default fixed-layout">
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
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
         <?php include('includes/header.php') ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include('includes/side-bar.php') ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Profile</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Profile</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                    $sql="SELECT * from `".TBL_DELIVERY_ADMIN."` WHERE `id` = '".$_SESSION['delivery_admin_id']."' ";
                                    $result = $database->query($sql);
                                    $row=$database->fetch_array($result); 
                                    ?>
                                <center class="m-t-30"> 
                                <div class="product-img">
                                    <img src="uploads/<?php echo $row['image'] ?>" id="output" class="img-circle">
                                    <form action="profile_action.php" method="post" id="upload_image" enctype="multipart/form-data" name="upload_image">
                                     <div class="pro-img-overlay"><input name="file_up" type="file" accept=".jpeg,.png,.jpg,.jfif" class="upload" id="file_up" onchange="loadFile(event)" required="" ></div>   
                                     <input type="hidden" name="admin_id" value="<?php echo $row['id'] ?>">
                                    </form>
                                </div>
                                    
                                    <h4 class="card-title m-t-10"><?php echo $row['name'] ?></h4>

                                    <h6 class="card-subtitle">Date Joined: <?php $date=date_create($row['date_created']); echo date_format($date,"dS F Y");  ?></h6>
                                    <div class="row text-center justify-content-md-center">
                                        <?php
                                        $sql1="SELECT COUNT(*) from `".TBL_DELIVERY_ADMIN."` WHERE status=1 ";
                                        $result1 = $database->query($sql1);
                                        $row1=$database->fetch_array($result1); 
                                        ?>
                                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="icon-people"></i> <font class="font-medium"><?php echo $row1[0] ?></font></a></div>
                                    </div>
                                </center>
                            </div>
                            <div>
                                <hr> </div>

                            <div class="card-body"> <small class="text-muted">Email address </small>
                                <h6><?php echo $row['username'] ?></h6> <small class="text-muted p-t-30 db">Phone</small>
                                <h6>+91 <?php echo $row['phone'] ?></h6> <small class="text-muted p-t-30 db">Address</small>
                                <h6><?php echo $row['address'] ?></h6><small class="text-muted p-t-30 db">Delivery Center</small>
                                <h6><?php echo $row['district']; ?></h6>
                            </div>
                        </div>
                            <center><a href="profile_action.php?deactivate=1"><span type="button" class="btn btn-dark">Deactivate account</span></a></center>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-7">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#password" role="tab">Password Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                
                                <div class="tab-pane active" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material" action="profile_action.php" method="post">
                                            <div class="form-group">
                                                <label class="col-md-12">Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control form-control-line" name="name" value="<?php echo $row['name'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Phone No</label>
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control form-control-line" name="phone" value="<?php echo $row['phone'] ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Address</label>
                                                <div class="col-md-12">
                                                    <textarea rows="5" class="form-control form-control-line" name="address" value="<?php echo $row['address'] ?>"><?php echo $row['address'] ?></textarea>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" name="update">Update Profile</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="password" role="tabpanel">
                                    <div class="card-body">
                                        <?php if(!isset($_GET['change_pass'])){ ?>
                                        <form class="form-horizontal form-material" action="profile_action.php" method="post">
                                            <h3>Verify its you</h3><hr>
                                            <div class="form-group">
                                                <label class="col-md-12">Enter password</label>
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control form-control-line" name="pass">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" name="next">Next</button>
                                                </div>
                                            </div>
                                            <?php if(isset($_SESSION['wrng_pass']))
                                            { 
                                                echo '<script>alert("Wrong Password")</script>';
                                                unset($_SESSION['wrng_pass']);
                                            }
                                            ?>
                                        </form>
                                        <?php } ?>
                                        <?php if(isset($_GET['change_pass'])){ ?>
                                        <form class="form-horizontal form-material" action="profile_action.php" method="post">
                                            <h3>Change password</h3><hr>
                                            <div class="form-group">
                                                <label class="col-md-12">Enter new password</label>
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control form-control-line" name="password" id="aa">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-12">Confirm password</label>
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control form-control-line" name="cpassword" id="bb">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="checkbox" onclick="show()">&nbsp;Show password
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <button class="btn btn-success" name="new_pass">Change</button>
                                                </div>
                                            </div>
                                        </form>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <?php include('includes/right-side-bar.php') ?><!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <?php include('includes/footer.php') ?>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
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
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/custom.min.js"></script>
    <script src="assets/node_modules/jquery-sparkline/jquery.sparkline.min.js"></script>
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/ecommerce/pages-profile.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 16:27:01 GMT -->
</html>
<script type="text/javascript">
        var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
};
$("#file_up").change(function() {
    $("#upload_image").submit();
});
function show()
        {
            var s=document.getElementById("aa");
            var s1=document.getElementById("bb");
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
<!-- Sweet-Alert  -->
    <script src="assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="assets/node_modules/sweetalert2/sweet-alert.init.js?v=2"></script>