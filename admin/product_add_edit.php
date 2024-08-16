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
    <title>Plantmore Admin</title>
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
        <?php  include('includes/side-bar.php') ?>
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
                        <h4 class="text-themecolor">Products</h4>
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
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <?php if(!(isset($_GET['id'])))
                                { ?>
                                <form action="product_action.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h5 class="card-title">Add Product</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product Name</label>
                                                    <input type="text" id="firstName" class="form-control" placeholder="Product name" name="product_name" required="" pattern="[A-Za-z0-9\-\&\.\, ]+"> 
                                                </div> 
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Stock</label>
                                                    <input type="text" id="stock" class="form-control" placeholder="Stock" name="stock" required="" pattern="[0-9]+"> 
                                                </div> 
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category</label>
                                                    <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="category_id">
                                                        <?php
                                                        $se="SELECT * from `".TBL_CATEGORY."` WHERE `status` != 2";
                                                        $resultt = $database->query($se);
                                                        $j=1;
                                                        while($roww = $database->fetch_array($resultt))
                                                        {  
                                                        ?>
                                                        <option value="<?php echo $roww['id'] ?>"><?php echo $roww['category_name'] ?></option>
                                                        <?php
                                                        $j++; }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
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
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Actual Price</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i>&#8377;</i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="price" aria-label="price" aria-describedby="basic-addon1" name="price" required="" pattern="[0-9]+">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Discount</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon2"><i class="ti-cut"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon2" name="discount" required="" pattern="[0-9]+">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Actual Price _ times of user price</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i>Increase</i></span>
                                                        </div>
                                                        <select name="mul" class="form-control">
                                                            <?php
                                                            for($a=1;$a<=5;$a++){
                                                            if($a==1){
                                                            ?>
                                                            <option value="<?php echo $a ?>">No increase</option>
                                                            <?php }else{ ?>
                                                            <option value="<?php echo $a ?>">Increase by <?php echo $a ?></option>
                                                            <?php } } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="card-title m-t-40">Product Description</h5>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="4" placeholder="Type product description here..." name="product_description" required="" pattern="[A-Za-z0-9\-\&\,\. ]+"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h5 class="card-title m-t-20">Image 1</h5>
                                                <div class="product-img"> <img id="output">
                                                    
                                                    <br/><br>
                                                    <div>
                                                        <input name="file_up" type="file" accept=".jpeg,.png,.jpg,.jfif,.webp" class="upload" id="file" onchange="loadFile(event)" required=""> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <h5 class="card-title m-t-20">Image 2</h5>
                                                <div class="product-img"> <img id="output1">
                                                    
                                                    <br/><br>
                                                    <div>
                                                        <input name="file_up1" type="file" accept=".jpeg,.png,.jpg,.jfif,.webp" class="upload" id="file" onchange="loadFile1(event)" required=""> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <h5 class="card-title m-t-20">Image 3</h5>
                                                <div class="product-img"> <img id="output2">
                                                    
                                                    <br/><br>
                                                    <div>
                                                        <input name="file_up2" type="file" accept=".jpeg,.png,.jpg,.jfif,.webp" class="upload" id="file" onchange="loadFile2(event)" required=""> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-actions m-t-40">
                                                <br><br><br>
                                                <button type="submit" class="btn btn-success" name="submit"> <i class="ti-check"></i> Submit</button>
                                                <a href="product_add_edit.php"><span type="button" class="btn btn-dark">Cancel</span></a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                                <?php }else{ 
                                    $sql="SELECT * from `".TBL_PRODUCT."` WHERE `id` = '".$_GET['id']."' ";
                                    $result = $database->query($sql);
                                    $row=$database->fetch_array($result);
                                ?>
                                <form action="product_action.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <h5 class="card-title">Edit Product</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Product Name</label>
                                                    <input type="text" id="firstName" class="form-control" placeholder="Product name" name="product_name" value="<?php echo $row['product_name'] ?>" pattern="[A-Za-z0-9\-\&\,\. ]+" required=""> 
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Stock</label>
                                                    <input type="text" id="stock" class="form-control" placeholder="Stock" name="stock" required="" value="<?php echo $row['stock'] ?>" pattern="[0-9]+"> 
                                                    <input type="hidden" name="page" value="<?php echo $_GET['page'] ?>">
                                                </div> 
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">Category</label>
                                                    <select class="form-control" data-placeholder="Choose a Category" tabindex="1" name="category_id">
                                                        <?php
                                                        $se="SELECT * from `".TBL_CATEGORY."` WHERE `status` != 2";
                                                        $resultt = $database->query($se);
                                                        $j=1;
                                                        while($roww = $database->fetch_array($resultt))
                                                        {  
                                                        ?>
                                                        <option value="<?php echo $roww['id'] ?>" <?php if($roww['id']==$row['category_id']){?> selected=""<?php } ?> ><?php echo $roww['category_name'] ?></option>
                                                        <?php
                                                        $j++; }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--/span-->
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
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <!--/row-->
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Price</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i>&#8377;</i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="price" aria-label="price" aria-describedby="basic-addon1" name="price" value="<?php echo $row['real_price'] ?>">
                                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>" pattern="[0-9]+" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Discount</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon2"><i class="ti-cut"></i></span>
                                                        </div>
                                                        <input type="text" class="form-control" placeholder="Discount" aria-label="Discount" aria-describedby="basic-addon2" name="discount" value="<?php echo $row['discount'] ?>" pattern="[0-9]+" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Actual Price _ times of user price</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1"><i>Increase</i></span>
                                                        </div>
                                                        <select name="mul" class="form-control">
                                                            <?php
                                                            for($a=1;$a<=5;$a++){
                                                            if($a==1){
                                                            ?>
                                                            <option value="<?php echo $a ?>">No increase</option>
                                                            <?php }else{ ?>
                                                            <option value="<?php echo $a ?>" <?php if(($row['real_price']*$a)==$row['price']){?>selected=""<?php } ?>>Increase by <?php echo $a ?></option>
                                                            <?php } } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <h5 class="card-title m-t-40">Product Description</h5>
                                        <div class="row">
                                            <div class="col-md-12 ">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="4" placeholder="Type product description here..." name="product_description" pattern="[A-Za-z0-9\-\&\,\. ]" value="<?php echo $row['product_description'] ?>" required=""><?php echo $row['product_description'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/row-->
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-3">
                                                <h5 class="card-title m-t-20">Image 1</h5>
                                                <div class="product-img"> <img id="output" src="uploads/<?php echo $row['image'] ?>">
                                                    
                                                    <br/><br>
                                                    <div>
                                                        <input name="file_up" type="file" accept=".jpeg,.png,.jpg,.jfif,.webp" class="upload" id="file" onchange="loadFile(event)"> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <h5 class="card-title m-t-20">Image 2</h5>
                                                <div class="product-img"> <img id="output1" src="uploads/<?php echo $row['image1'] ?>">
                                                    
                                                    <br/><br>
                                                    <div>
                                                        <input name="file_up1" type="file" accept=".jpeg,.png,.jpg,.jfif,.webp" class="upload" id="file" onchange="loadFile1(event)"> </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <h5 class="card-title m-t-20">Image 3</h5>
                                                <div class="product-img"> <img id="output2" src="uploads/<?php echo $row['image2'] ?>">
                                                    
                                                    <br/><br>
                                                    <div>
                                                        <input name="file_up2" type="file" accept=".jpeg,.png,.jpg,.jfif,.webp" class="upload" id="file" onchange="loadFile2(event)"> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-actions m-t-40">
                                                <br><br><br>
                                                <button type="submit" class="btn btn-success" name="update"> <i class="ti-check"></i> Update</button>
                                                <a href="product_add_edit.php"><span type="button" class="btn btn-dark">Cancel</span></a>
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
                                        <h5 class="card-title">Brief Blog details</h5>
                                        <div class="table-responsive m-t-40">
                                            <table id="myTable" class="table table-bordered color-table muted-table">
                                            <thead>
                                            <tr>
                                                <th>S.No</th>
                                                <th>Category</th>
                                                <th>Product</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Discount</th>
                                                <th>Total cost</th>
                                                <th>Stock</th>
                                                <th>Status</th>
                                                <th>&nbsp;&nbsp;&nbsp;Action&nbsp;&nbsp;&nbsp;</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php 
                                            $sel="SELECT * from `".TBL_PRODUCT."` WHERE `status` != 2";
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
                                                <td><?php echo $j; ?></td>
                                                <td><?php 
                                                $sl="SELECT `category_name` from `".TBL_CATEGORY."` WHERE `id` = '".$row1['category_id']."' ";
                                                $resul = $database->query($sl);
                                                $ro = $database->fetch_array($resul);
                                                echo $ro[0];
                                                 ?></td>
                                                <td><?php echo $row1['product_name']; ?></td>
                                                <td><img style="height: 50px;" src="uploads/<?php echo $row1['image']; ?>"></td>
                                                <td>&#8377;<?php echo $row1['price']; ?></td>
                                                <td><?php echo $row1['discount'] ?>%</td>
                                                <td>&#8377;<?php $sub=($row1['discount']*$row1['price'])/100; $price=$row1['price']-$sub; echo $price ?></td>
                                                <td><?php echo $row1['stock'] ?></td>
                                                <td><?php if($row1['status']=='1'){ ?><a href="product_action.php?active=2&id=<?php echo $row1['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI'] ?>"><span class="label label-success">Active</span></a><?php } else{ ?><a href="product_action.php?inactive=2&id=<?php echo $row1['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI'] ?>"><span class="label label-warning">Inactive</span></a><?php } ?></td>
                                                <td><a href="single_product_view.php?id=<?php echo $row1['id']; ?>"><i class="ti-eye" style="color: grey" title="view"></i></a>
                                                <?php 
                                                $sql="SELECT COUNT(*) from `".TBL_ORDER."` WHERE `product_id` = '".$row1['id']."' ";
                                                $result = $database->query($sql);
                                                $row=$database->fetch_array($result);
                                                if($row[0]==0)
                                                {
                                                ?>&nbsp;&nbsp;
                                                    <a href="product_add_edit.php?edit=2&id=<?php echo $row1['id']; ?>"><i class="ti-pencil" style="color: blue"></i></a>
                                                <?php } ?>
                                                &nbsp;&nbsp;<!--<a onclick="return confirm('Are you sure to DELETE this product?')" href="product_action.php?delete=2&id=<?php echo $row1['id']; ?>"><i class="ti-trash" style="color: red"></i></a>-->
                                                <a href=""><i class="ti-trash" style="color: red" onclick="archiveFunction(<?php echo $row1['id']; ?>)"></i></a></td>
                                            </tr>
                                            <?php  $j++; } ?>
                                            </tbody>
                                            </table>
                                        </div>
                                        </div>
                                    </div>
                                    <?php } ?>

                            </div>
                            <span id="sa-animation-product"></span>
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
var loadFile1 = function(event) {
  var image1 = document.getElementById('output1');
  image1.src = URL.createObjectURL(event.target.files[0]);
};
var loadFile2 = function(event) {
  var image2 = document.getElementById('output2');
  image2.src = URL.createObjectURL(event.target.files[0]);
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
        location.assign("product_action.php?id="+$a+"&delete=2&page=<?php echo $_SERVER['REQUEST_URI'] ?>");        // submitting the form when user press yes
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