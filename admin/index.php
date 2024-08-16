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
if(!isset($_SESSION['admin_id']))
{
    header('Location: login.php');
}   
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/ecommerce/index.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 16:21:59 GMT -->
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
    <!--alerts CSS -->
    <link href="assets/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="assets/node_modules/morrisjs/morris.css" rel="stylesheet">
    <link href="dist/css/pages/ecommerce.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
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
            <p class="loader__label">Plant More</p>
        </div>
    </div>
    <!-- Main wrapper - style you can find in pages.scss -->
    <div id="main-wrapper">

        <!-- Topbar header - style you can find in pages.scss -->
        <?php include('includes/header.php') ?>
        <!-- End Topbar header -->

        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <?php include('includes/side-bar.php') ?>
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->

        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Dashboard</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- Info box Content -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6"> 
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $sql="SELECT COUNT(id) from `".TBL_ORDER."` WHERE `status` != 3 AND date_ordered='".date('Y-m-d')."' ";
                                $result = $database->query($sql);
                                $row = $database->fetch_array($result);
                                $sql0="SELECT COUNT(id) from `".TBL_ORDER."` WHERE `status` = 2 AND date_ordered='".date('Y-m-d')."' ";
                                $result0 = $database->query($sql0);
                                $row0 = $database->fetch_array($result0);
                                ?>
                                <h4 class="card-title">ORDER RECEIVED</h4>
                                <div class="text-right"> <span class="text-muted">Todays Order</span>
                                    <h1 class="font-light">
                                        <?php if($row0[0]!='0'){ ?>
                                        <?php if((($row0[0]/$row[0])*100)>50){ ?>
                                        <sup><i class="ti-arrow-up text-success"></i></sup>
                                        <?php }else{ ?>
                                        <sup><i class="ti-arrow-down text-primary"></i></sup>
                                        <?php } ?>
                                        <?php echo $row0[0] ?></h1>
                                        <?php }else{ ?>
                                        <sup><?php echo $row0[0] ?></sup>   
                                        <?php } ?>
                                </div>
                                <?php if($row0[0]!='0'){ ?>
                                <span class="text-success"><?php echo round(($row0[0]/$row[0])*100)?>%</span>
                                <?php }else{ ?>
                                <span class="text-success"><?php echo $row0[0] ?>%</span>
                                <?php } ?>
                                <div class="progress">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: <?php if($row0[0]!='0'){ echo (($row0[0]/$row[0])*100); }else{ $row0[0]; } ?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $sql1="SELECT SUM(a.real_price*b.quantity) FROM `".TBL_PRODUCT."` a,`".TBL_ORDER."` b WHERE b.date_ordered='".date('Y-m-d')."' and b.product_id=a.id and b.status=2";
                                $result1 = $database->query($sql1);
                                $row1 = $database->fetch_array($result1);
                                ?>
                                <?php
                                $sql01="SELECT SUM(ABS(ROUND(a.price-(a.discount*a.price)/100)*b.quantity)) FROM `".TBL_PRODUCT."` a,`".TBL_ORDER."` b WHERE b.date_ordered='".date('Y-m-d')."' and b.product_id=a.id and b.status=2";
                                $result01 = $database->query($sql01);
                                $row01 = $database->fetch_array($result01);
                                ?>
                                <h4 class="card-title">PROFIT</h4>
                                <div class="text-right"> <span class="text-muted">Today Profit</span>
                                    <h1 class="font-light"><sup><i class="ti-arrow-up text-primary"></i></sup> &#8377;<?php echo abs($row1[0]-$row01[0]); ?></h1>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <?php
                                $sql2="SELECT count(stock) from `".TBL_PRODUCT."` WHERE `stock` = 0 ";
                                $result2 = $database->query($sql2);
                                $row2 = $database->fetch_array($result2);  

                                $sql20="SELECT count(stock) from `".TBL_PRODUCT."` WHERE `stock` != 0 ";
                                $result20 = $database->query($sql20);
                                $row20 = $database->fetch_array($result20);  
                                ?>
                                <h4 class="card-title">OUT OF STOCK</h4>
                                <div class="text-right"> <span class="text-muted">No. of products</span>
                                    <h1 class="font-light">
                                        <?php if($row2[0]!='0'){ ?>
                                            
                                            <sup><i class="ti-alert text-primary"></i></sup>
                                            
                                            <?php echo $row2[0] ?></h1>
                                        <?php }else{ ?>
                                        <sup><?php echo $row2[0] ?></sup>   
                                        <?php } ?>
                                </div>
                                <?php if($row0[0]!='0'){ ?>
                                <span class="text-success"><?php echo round(($row2[0]/$row20[0])*100)?>%</span>
                                <?php }else{ ?>
                                <span class="text-success"><?php echo $row2[0] ?>%</span>
                                <?php } ?>
                                <div class="progress">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: <?php if($row2[0]=='0'){ echo (($row2[0]/$row20[0])*100); }else{ $row2[0]; } ?>%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">YEARLY SALES</h4>
                                
                                <?php
                                $sql02="SELECT SUM(total_amount) from `".TBL_TRANSACTION."` WHERE `status` != 0 AND EXTRACT(YEAR FROM date_paid)='".date('Y')."' ";
                                $result02 = $database->query($sql02);
                                $row02 = $database->fetch_array($result02);
                                ?>
                                <div class="text-right"> <span class="text-muted">Yearly  Income</span>
                                    <h1 class="font-light"><sup><i class="ti-arrow-up text-inverse"></i></sup>&#8377;<?php echo number_format($row02[0]) ?></h1>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    
                </div>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Stock Details</h5>
                                <div class="table-responsive m-t-30">
                                    <table class="table product-overview" id="myTable">
                                        <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Photo</th>
                                                <th>Product Name</th>
                                                <th>Stock</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $sql9="SELECT * from `".TBL_PRODUCT."` WHERE `stock`=0 ";
                                            $result9 = $database->query($sql9);
                                            $j=1;
                                            while($row9 = $database->fetch_array($result9))
                                            {  ?>
                                            <tr>
                                                <td><?php echo $j; ?></td>
                                                <td>
                                                    <img src="uploads/<?php echo $row9['image'] ?>" alt="iMac" width="80">
                                                </td>
                                                <td><?php echo $row9['product_name'] ?></td>
                                                <td><?php echo $row9['stock'] ?></td>
                                                <td><a href="#responsive-modal" class="text-inverse p-r-10" data-toggle="modal" title="" data-original-title="Edit" id="id" data-id="<?php echo $row9['id']?>"><i class="ti-marker-alt"></i></a></td>
                                            </tr>
                                            <?php $j++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                <!-- sample modal content -->
                                <div id="responsive-modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content fetch">
                                        
                                        </div>
                                    </div>
                                </div><span id="sa-position-update"></span>
                                <!-- /.modal -->
                            
                <!-- charts -->
                
                <!-- End PAge Content -->
                <?php include('includes/right-side-bar.php') ?>
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
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!--morris JavaScript -->
    <script src="assets/node_modules/raphael/raphael-min.js"></script>
    <script src="assets/node_modules/morrisjs/morris.min.js"></script>
    <!--Custom JavaScript -->
    <script src="dist/js/ecom-dashboard.js"></script>
    <!--Data table-->
    <script src="assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="assets/node_modules/sweetalert2/sweet-alert.init.js?v=2"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- Data Table changes and image output display -->
    <script src="dist/js/pages/table-date_img-output.js"></script>
</body>

</html>
<script type="text/javascript">
$(document).ready(function(){
    $('#responsive-modal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'stock.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetch').html(data);//Show fetched data from database
            }
        });
     });
});
</script>
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