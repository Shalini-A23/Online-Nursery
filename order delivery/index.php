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
    <title>Plantmore</title>
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
        <?php
        $sql90="SELECT district from `".TBL_DELIVERY_ADMIN."` WHERE status=1 AND id='".$_SESSION['delivery_admin_id']."' ";
                $result90 = $database->query($sql90);
                $row90 = $database->fetch_array($result90);
        ?>
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Bread crumb and right sidebar toggle -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">ORDERS - <?php echo $row90['district'] ?></h4>
                    </div>
                </div>
                <!-- End Bread crumb and right sidebar toggle -->
                
                <?php 
                

                $sql9="SELECT * from `".TBL_TRANSACTION."` WHERE status!=3 and district='".$row90['district']."' ";
                $result9 = $database->query($sql9);
                $j=1;
                while($row9 = $database->fetch_array($result9))
                { ?>
                    
                <tr>
                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">DATE: <span style="color: grey"><?php $date=date_create($row9['date_paid']); echo date_format($date,'d-m-Y') ?></span></h5>
                                <h5 class="card-title">ORDER ID: <span style="color: grey"><?php echo $row9['id'] ?></span></h5>
                                <h5 class="card-title" style="position: absolute; top: 35px; right: 300px;">NAME: <span style="color: grey"><?php echo $row9['name'] ?></span><br><br>
                                    <a onclick="deliveredFunction('<?php echo $row9['id'] ?>')">
                                    <span class="btn btn-success" name="submit">Order Delivered</span>
                                    </a>
                                </h5>
                                <div class="table-responsive m-t-30">
                                    <table class="table product-overview">
                                        <thead>
                                            <tr style="background-color: #e5e5e5">
                                                <th>S.No</th>
                                                <th>Photo</th>
                                                <th>Product Name</th>
                                                <th>Quantity</th>
                                                <th>Price</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                    $sql19="SELECT * from `".TBL_ORDER."` WHERE `transaction_id` ='".$row9['id']."'";
                    $result19 = $database->query($sql19);
                    $i=1;
                    while($row19 = $database->fetch_array($result19))
                    { 
                        $sql2="SELECT * from `".TBL_PRODUCT."` WHERE `id` ='".$row19['product_id']."' ";
                        $result2 = $database->query($sql2);
                        
                        while($row2 = $database->fetch_array($result2))
                        {
                ?>
                                                <td><?php echo $i; ?></td>
                                                <td>
                                                    <img src="../admin/uploads/<?php echo $row2['image'] ?>" alt="iMac" width="80">
                                                </td>
                                                <td><?php echo $row2['product_name'] ?></td>
                                                <td><?php echo $row19['quantity'] ?></td>
                                                <td>&#8377;<?php echo ($row2['price']-($row2['discount']*$row2['price'])/100)*$row19['quantity'] ?></td>
                                            </tr>
                                            <?php 
                                             } $i++; } ?>
                                        </tbody>
                                        <h5 class="card-title">TOTAL PRICE: <span style="color: grey">&#8377;<?php echo $row9['total_amount'] ?></span></h5>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $j++; }  ?>
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
<script type="text/javascript">
function deliveredFunction($a) 
{
  event.preventDefault();
  Swal.fire({
  title: "Are you sure that you delivered this order?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#00c292",
  confirmButtonText: "Yes, Delivered",
  cancelButtonText: "Cancel",
  closeOnConfirm: false,
  }).then(function(result)
  {
    if (result.value) 
    {
        location.assign("index_action.php?delivered=1&trans_id="+$a);        // submitting the form when user press yes
    } 
});
}
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