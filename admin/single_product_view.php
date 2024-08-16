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
global $database, $db;if(!isset($_SESSION['admin_id']))
{
    header('Location: login.php');
}                
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
    <!-- chartist CSS -->
    <link href="dist/css/pages/ecommerce.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
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
                        <h4 class="text-themecolor">Products - <b>
                            <?php 
                            if(isset($_GET['id']))
                            {
                                $sel1="SELECT `category_name` from `".TBL_CATEGORY."` WHERE `id`='".$_GET['id']."' ";
                                $result1 = $database->query($sel1);
                                $row1 = $database->fetch_array($result1);
                                echo $row1[0];
                            }
                            ?></b></h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Products</li>
                            </ol>
                            <a href="product_add_edit.php">
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="ti-plus"></i> Create New</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box Content -->
                <!-- ============================================================== -->
                <?php
                if(isset($_GET['id']))
                {
                    $sql1="SELECT * from `".TBL_PRODUCT."` WHERE `id` = '".$_GET['id']."' ";
                    $result1 = $database->query($sql1);
                    $row1=$database->fetch_array($result1); 
                ?>

                <div class="row">
                    <!-- Column -->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class=""><?php echo $row1['product_name'] ?><br><hr></h3>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="white-box text-center product-img" style="margin-top: 40px;">

                                            <img src="uploads/<?php echo $row1['image'] ?>" class="img-responsive">

                                            <div class="pro-img-overlay">
                                            <?php 
                                                $sql101="SELECT COUNT(*) from `".TBL_ORDER."` WHERE `product_id` = '".$row1['id']."' ";
                                                $result101 = $database->query($sql101);
                                                $row101=$database->fetch_array($result101);
                                                if($row101[0]==0)
                                                {
                                                ?>
                                                <a href="product_add_edit.php?id=<?php echo $row1['id'] ?>&page=3" class="bg-info"><i class="ti-marker-alt"></i></a>
                                            <?php } ?>
                                                <!--<a onclick="return confirm('Are you sure to DELETE this product?')" href="product_action.php?delete=4&id=<?php echo $row1['id'] ?>" class="bg-danger"><i class="ti-trash"></i></a>-->
                                                <a class="btn default bg-danger"><i class="ti-trash" onclick="archiveFunction(<?php echo $row1['id']; ?>,'<?php echo $_SERVER['REQUEST_URI']; ?>')"></i></a>
                                                 <?php if($row1['status']=='1'){ ?><a href="product_action.php?active=2&id=<?php echo $row1['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI']; ?>" style="background-color: #00c292">&starf;</a><?php } else{ ?><a href="product_action.php?inactive=2&id=<?php echo $row1['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI']; ?>" style="background-color: #fec107">&starf;</a><?php } ?>
                                            </div>  

                                          </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-6">
                                        <h4 class="box-title m-t-40"><b>Product description</b></h4>
                                        <p><?php echo $row1['product_description'] ?></p>
                                        
                                        <h2 class="m-t-40"><?php if($row1['discount']!=0){ ?><strike style="text-decoration:line-through; color:pink">&#8377;<?php echo $row1['price'] ?></strike> <small class="text-success">(<?php echo $row1['discount'] ?>% off)</small><?php } ?><br>&#8377;<?php $sub=($row1['discount']*$row1['price'])/100; $price=$row1['price']-$sub; echo $price ?></h2>

                                        <h3 class="box-title m-t-40">Key Highlights</h3>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check text-success"></i> Sturdy structure</li>
                                            <li><i class="fa fa-check text-success"></i> Designed to foster easy portability</li>
                                            <li><i class="fa fa-check text-success"></i> Perfect furniture to flaunt your wonderful collectibles</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        </div>
            
                    </div>

                <?php
                }
                if(!isset($_GET['id']))
                {
                    $sql1="SELECT * from `".TBL_PRODUCT."`";
                    $result1 = $database->query($sql1);
                    while($row1=$database->fetch_array($result1)){                 
                ?>
                <div class="row">
                    <!-- Column -->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class=""><?php echo $row1['product_name'] ?><br><hr></h3>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-6">
                                        <div class="white-box text-center product-img" style="margin-top: 40px;">

                                            <img src="uploads/<?php echo $row1['image'] ?>" class="img-responsive">
                                            <div class="pro-img-overlay">
                                            <?php 
                                                $sql101="SELECT COUNT(*) from `".TBL_ORDER."` WHERE `product_id` = '".$row1['id']."' ";
                                                $result101 = $database->query($sql101);
                                                $row101=$database->fetch_array($result101);
                                                if($row101[0]==0)
                                                {
                                                ?>
                                            <a href="product_add_edit.php?id=<?php echo $row1['id'] ?>&page=2" class="bg-info"><i class="ti-marker-alt"></i></a>
                                            <?php } ?>
                                                <!--<a onclick="return confirm('Are you sure to DELETE this product?')" href="product_action.php?delete=4&id=<?php echo $row1['id'] ?>" class="bg-danger"><i class="ti-trash"></i></a>-->

                                                <a class="btn default bg-danger"><i class="ti-trash" onclick="archiveFunction(<?php echo $row1['id']; ?>,'<?php echo $_SERVER['REQUEST_URI']; ?>')"></i></a>
                                                <?php if($row1['status']=='1'){ ?><a href="product_action.php?active=2&id=<?php echo $row1['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI']; ?>" style="background-color: #00c292">&starf;</a><?php } else{ ?><a href="product_action.php?inactive=2&id=<?php echo $row1['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI']; ?>" style="background-color: #fec107">&starf;</a><?php } ?>
                                            </div>  

                                          </div>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-6">
                                        <h4 class="box-title m-t-40"><b>Product description</b></h4>
                                        <p><?php echo $row1['product_description'] ?></p>
                                        
                                        <h2 class="m-t-40"><?php if($row1['discount']!=0){ ?><strike style="text-decoration:line-through; color:pink">&#8377;<?php echo $row1['price'] ?></strike> <small class="text-success">(<?php echo $row1['discount'] ?>% off)</small><?php } ?><br>&#8377;<?php $sub=($row1['discount']*$row1['price'])/100; $price=$row1['price']-$sub; echo $price ?></h2>

                                        
                                        <h3 class="box-title m-t-40">Key Highlights</h3>
                                        <ul class="list-unstyled">
                                            <li><i class="fa fa-check text-success"></i> Sturdy structure</li>
                                            <li><i class="fa fa-check text-success"></i> Designed to foster easy portability</li>
                                            <li><i class="fa fa-check text-success"></i> Perfect furniture to flaunt your wonderful collectibles</li>
                                        </ul>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        </div>
            
                    </div>
                    <!-- Column -->
                <?php } } ?>
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
            <span id="sa-position-delete"></span>
            <span id="sa-animation-product"></span>
            <span id="sa-position-update"></span>
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
    <!-- Sweet-Alert  -->
    <script src="assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="assets/node_modules/sweetalert2/sweet-alert.init.js?v=2"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
</body>
</html>
<script type="text/javascript">
function archiveFunction($a,$b) 
{
  event.preventDefault();
  Swal.fire({
  title: "Are you sure to DELETE this category?",
  text: "Once you delete you cannot retrieve it",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, delete it!",
  cancelButtonText: "Cancel",
  closeOnConfirm: false,
  }).then(function(result)
  {
    if (result.value) 
    {
        location.assign("product_action.php?id="+$a+"&page="+$b+"&delete");        // submitting the form when user press yes
    } 
});
}
</script>
<?php
if(isset($_SESSION['do_alert']))
{ 
?>
<script type="text/javascript">
$('#sa-animation-product').trigger('click');
</script>
<?php 
unset($_SESSION['do_alert']);
}
?>
<?php
if(isset($_SESSION['deleted']))
{ 
?>
<script type="text/javascript">
$('#sa-position-delete').trigger('click');
</script>
<?php 
unset($_SESSION['deleted']);
}
?>
<?php
if(isset($_SESSION['updated']))
{ 
?>
<script type="text/javascript">
$('#sa-position-update').trigger('click');
</script>
<?php 
unset($_SESSION['updated']);
}
?>