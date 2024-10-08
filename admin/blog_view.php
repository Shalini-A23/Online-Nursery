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
    <!-- Popup CSS -->
    <link href="assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- page css -->
    <link href="dist/css/pages/user-card.css" rel="stylesheet">
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
                        <h4 class="text-themecolor">View Blog</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Gallery</li>
                            </ol>
                            <a href="blog_add_edit.php">
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="ti-plus"></i> Create New</button>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                
                <div class="card-columns el-element-overlay">
                    <?php 
                    $sel="SELECT * from `".TBL_BLOG."` WHERE `status` != 2";
                    $result = $database->query($sel);  
                    $j=1;
                    while($row = $database->fetch_array($result))
                    {                   
                    ?>
                    <div class="card">
                        <div class="el-card-item">
                            <div class="el-card-avatar el-overlay-1">
                                <img src="uploads/<?php echo $row['image'] ?>" alt="user" />
                                <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><a class="btn default bg-info" href="blog_add_edit.php?id=<?php echo $row['id'] ?>&page=1"><i class="ti-pencil"></i></a></li>
                                            <li><!--<a onclick="return confirm('Are you sure to DELETE this blog?')" class="btn default bg-danger" href="blog_action.php?id=<?php echo $row['id'] ?>&delete=4"><i class="ti-trash"></i></a>--><a class="btn default bg-danger"><i class="ti-trash" onclick="archiveFunction(<?php echo $row['id']; ?>)"></i></a></li>
                                            <li><?php if($row['status']=='1'){ ?><a class="btn bg-success" href="blog_action.php?active=4&id=<?php echo $row['id'] ?>">Active</a><?php } else{ ?><a class="btn bg-warning" href="blog_action.php?inactive=4&id=<?php echo $row['id'] ?>">Inactive</a><?php } ?></li>
                                        </ul>
                                    </div>
                            </div>
                            <div class="el-card-content">
                                <h3 class="box-title"><b><?php echo $row['blog_title'] ?></b></h3><small><?php $date=date_create($row['created_date']); echo date_format($date,"F d"); ?>, <?php echo date_format($date,"Y"); ?> [<?php echo date_format($date,"h:i:s a"); ?>]</small><br><small><?php echo $row['blog_description'] ?></small>
                                <br/> </div>
                        </div>
                    </div>
                    <?php $j++; } ?>
                </div>
                <span id="sa-position-update"></span>
                <span id="sa-position-delete"></span>
                <span id="sa-position-insert"></span>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <?php include('includes/right-side-bar.php') ?>
                <!-- ============================================================== -->
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
    <!-- Magnific popup JavaScript -->
    <script src="assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="assets/node_modules/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    <!-- Sweet-Alert  -->
    <script src="assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="assets/node_modules/sweetalert2/sweet-alert.init.js?v=2"></script>
</body>

</html>
<script type="text/javascript">
function archiveFunction($a) 
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
        location.assign("blog_action.php?id="+$a+"&delete=4");        // submitting the form when user press yes
    } 
});
}
</script>
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