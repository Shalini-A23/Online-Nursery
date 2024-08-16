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
    <link rel="stylesheet" type="text/css"
        href="assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css"
        href="assets/node_modules/datatables.net-bs4/css/responsive.dataTables.min.css">
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
            <p class="loader__label">Plantmore admin</p>
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
                        <h4 class="text-themecolor">Category</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Category</li>
                            </ol>
                            <a href="category_add_edit.php">
                            <button type="button" class="btn btn-info d-none d-lg-block m-l-15"><i class="ti-plus"></i> Create New</button></a>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Info box Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if(!(isset($_GET['id'])))
                                { ?>
                                <form action="category_action.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h5 class="card-title">Add Category</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category Name</label>
                                                    <input type="text" id="firstName" class="form-control" placeholder="Enter your Category Name" required="" name="category_name" pattern="[A-Za-z ]+" title="Alphabets only allowed"> </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <br/>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="1">
                                                        <label class="custom-control-label" for="customRadioInline1">Publish</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="0">
                                                        <label class="custom-control-label" for="customRadioInline2">Draft</label>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h5 class="card-title m-t-20">Image</h5>
                                                <div class="product-img"> <img id="output">
                                                    
                                                    <br/><br>
                                                    <div>
                                                        <input name="file_up" type="file" accept=".jpeg,.png,.jpg,.jfif" class="upload" id="file" onchange="loadFile(event)" required=""> </div>
                                                </div>
                                            </div>

                                            <div class="form-actions m-t-40">
                                                <br><br><br>
                                                <button type="submit" class="btn btn-success" name="submit"> <i class="ti-check"></i> Submit</button>
                                                <a href="category_add_edit.php"><span type="button" class="btn btn-dark">Cancel</span></a>
                                            </div>
                                        </div>

                                    </div>
                                </form>
                                <?php }else{ 
                                    $sql="SELECT * from `".TBL_CATEGORY."` WHERE `id` = '".$_GET['id']."' ";
                                    $result = $database->query($sql);
                                    $row=$database->fetch_array($result);
                                ?>
                                <form action="category_action.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h5 class="card-title">Edit Category</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category Name</label>
                                                    <input type="text" id="firstName" class="form-control" placeholder="Enter your Category Name" required="" name="category_name" value="<?php echo $row['category_name'] ?>" pattern="[A-Za-z ]+" title="Only Alphabets allowed"> </div>
                                                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>" required="">
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <br/>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline1" name="status" class="custom-control-input" value="1" <?php if($row['status']=='1'){?> checked <?php } ?>>
                                                        <label class="custom-control-label" for="customRadioInline1">Publish</label>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline">
                                                        <input type="radio" id="customRadioInline2" name="status" class="custom-control-input" value="0" <?php if($row['status']=='0'){?> checked <?php } ?> >
                                                        <label class="custom-control-label" for="customRadioInline2">Draft</label>
                                                        <input type="hidden" name="page" value="<?php echo $_GET['page'] ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                            <div class="col-md-3">
                                                <h5 class="card-title m-t-20">Image</h5>
                                                <div class="product-img"> <img src="uploads/<?php echo $row['image'] ?>" id="output">
                                                    
                                                    <br/><br>
                                                    <div>
                                                        <input name="file_up" type="file" accept=".jpeg,.png,.jpg,.jfif" class="upload" id="file" onchange="loadFile(event)"> </div>
                                                </div>
                                            </div>

                                            <div class="form-actions m-t-40">
                                                <br><br><br>
                                                <button type="submit" class="btn btn-success" name="update"> <i class="ti-check"></i> Update</button>
                                                <a href="category_add_edit.php"><span type="button" class="btn btn-dark">Cancel</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>

                                   <?php if(!(isset($_GET['id'])))
                                    { ?>
                                    <hr>
                                    <div class="card">
                                        <div class="card-body">
                                        <h5 class="card-title">Brief Category details</h5>
                                        <?php 
                                        if(isset($_SESSION['cannot_delete'])){ ?>
                                        <span id="sa-animation"></span>
                                        <?php unset($_SESSION['cannot_delete']); }
                                        ?>
                                        <div class="table-responsive m-t-40">
                                            <table id="myTable" class="table table-bordered color-table muted-table">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Category Name</th>
                                                <th>Total products</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $sel="SELECT * from `".TBL_CATEGORY."` WHERE `status` != 2";
                                            $result1 = $database->query($sel);
                                            $j=1;
                                            while($row1 = $database->fetch_array($result1))
                                            {  
                                            if($row1['status']=='0'){                 
                                            ?> 
                                            <tr class="table-warning">
                                            <?php }else{ ?>
                                            <tr>
                                            <?php } ?>
                                            <?php
                                            $sel23="SELECT count(*) from `".TBL_PRODUCT."` WHERE `category_id` ='".$row1['id']."' ";
                                            $result23 = $database->query($sel23);
                                            $row23 = $database->fetch_array($result23);
                                            ?>
                                                <td><?php echo $j; ?></td>
                                                <td><?php echo $row1['category_name']; ?></td>
                                                <td><?php echo $row23[0]; ?></td>
                                                <td><img style="height: 50px;" src="uploads/<?php echo $row1['image']; ?>"></td>
                                                <td><?php if($row1['status']=='1'){ ?><a href="category_action.php?active=2&id=<?php echo $row1['id'] ?>"><span class="label label-success">Active</span></a><?php } else{ ?><a href="category_action.php?inactive=2&id=<?php echo $row1['id'] ?>"><span class="label label-warning">Inactive</span></a><?php } ?></td>
                                                <td><a href="category_add_edit.php?edit=2&id=<?php echo $row1['id']; ?>"><i class="ti-pencil" style="color: blue"></i></a>&nbsp;&nbsp;<!--<a onclick="return confirm('Are you sure to DELETE this category?')" href="category_action.php?delete=2&id=<?php echo $row1['id']; ?>"><i class="ti-trash" style="color: red"></i></a>-->
                                                <i class="ti-trash" style="color: red" onclick="archiveFunction(<?php echo $row1['id']; ?>)"></i>
                                                </td>
                                            </tr>
                                            <?php  $j++; } ?>
                                            </tbody>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                            </div>
                            <span id="sa-animation-category"></span>
                            <span id="sa-position-update"></span>
                            <span id="sa-position-delete"></span>
                            <span id="sa-position-insert"></span>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
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
    <script type="text/javascript">
        var loadFile = function(event) {
    var image = document.getElementById('output');
    image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
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
        location.assign("category_action.php?id="+$a+"&delete=2");        // submitting the form when user press yes
    } 
});
}
</script>
<?php
if(isset($_SESSION['do_alert']))
{ 
?>
<script type="text/javascript">
$('#sa-animation-category').trigger('click');
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
<?php
if(isset($_SESSION['inserted']))
{ 
?>
<script type="text/javascript">
$('#sa-position-insert').trigger('click');
</script>
<?php 
unset($_SESSION['inserted']);
}
?>
