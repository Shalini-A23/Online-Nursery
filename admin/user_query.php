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
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Plantmore Admin</title>
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- page css -->
    <link href="dist/css/pages/inbox.css" rel="stylesheet">
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
                        <h4 class="text-themecolor">User Query</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">User Query</li>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="card-body inbox-panel">
                                        <ul class="list-group list-group-full">
                                            <?php
                                            $sql="SELECT * from `".TBL_QUERY."` WHERE status=1 ORDER BY id DESC ";
                                            $result = $database->query($sql);
                                            ?>
                                            <li class="list-group-item <?php if(!isset($_GET['starred'])){ ?>active<?php } ?>"> <a href="user_query.php"><i class="mdi mdi-gmail"></i> Inbox </a><span class="badge badge-success ml-auto"><?php echo mysqli_num_rows($result) ?></span></li>
                                            <li class="list-group-item <?php if(isset($_GET['starred'])){ ?>active<?php } ?>">
                                                <a href="user_query.php?starred=1"> <i class="mdi mdi-star"></i> Starred </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                
                                    <?php if(!isset($_GET['single-message']) && !isset($_GET['reply']) && !isset($_GET['starred'])){ ?>
                                    <div class="card-body p-t-0">
                                        <div class="card b-all shadow-none">
                                            <div class="inbox-center table-responsive">
                                                <table class="table table-hover no-wrap">
                                                    <tbody>
                                                        <?php 
                                                        $sql="SELECT * from `".TBL_QUERY."` ORDER BY id DESC ";
                                                        $result = $database->query($sql);
                                                        while($row = $database->fetch_array($result))
                                                        {  ?>
                                                        <?php
                                                        if($row['status']!='2')
                                                        { ?>
                                                        <tr style="background-color: silver" class="unread">
                                                        <?php }else{
                                                        ?>
                                                        <tr class="unread">
                                                        <?php } ?>
                                                            <td style="width:40px" class="hidden-xs-down">
                                                                <?php
                                                                if($row['starred']==0)
                                                                {
                                                                ?>
                                                                <a href="user_query_action.php?star=1&query_id=<?php echo $row['id'] ?>"><i class="ti-star" style="font-size: 15px;"></i></a>
                                                                <?php }else{ ?> 
                                                                <a href="user_query_action.php?unstar=1&query_id=<?php echo $row['id'] ?>"><span style="color:green; font-size: 20px;">&starf;</span></a>
                                                                <?php } ?>
                                                            </td>
                                                            <td class="hidden-xs-down"><?php echo $row['name'] ?></td>
                                                            <td class="max-texts"> <a href="user_query.php?query_id=<?php echo $row['id'] ?>&single-message=1" /> <?php echo $row['subject'] ?></td>
                                                            <td class="text-right">
                                            <?php 
                                            $curnt_year=date('Y');
                                            $year=date_create($row['date']);
                                            $diff_year=date_format($year,"Y");
                                            if($diff_year==$curnt_year)
                                            {
                                                $curnt_month=date('m');
                                                $month=date_create($row['date']);
                                                $diff_month=date_format($month,"m");
                                                if($diff_month==$curnt_month)
                                                {
                                                    $curnt_date=date('d');
                                                    $date=$row['date'];
                                                    $diff_date=date('d',strtotime($date)); 
                                                    $diff_d=$curnt_date-$diff_date; 
                                                    if($diff_d=='0')
                                                    {
                                                        $curnt_time=date('H');
                                                        $time=date_create($row['time']);
                                                        $diff_time=date_format($time,"H");
                                                        $diff_t=$curnt_time-$diff_time;
                                                        if($diff_t=='0')
                                                        {
                                                            $curnt_min=date('i');
                                                            $min=date_create($row['time']);
                                                            $diff_min=date_format($time,"i");
                                                            $diff_m=$curnt_min-$diff_min;
                                                            if($diff_m=='0')
                                                            {
                                                                echo "Just now";
                                                            }
                                                            else
                                                            {
                                                                if(abs($diff_m)=='1'){
                                                                echo abs($diff_m).' minute ago';
                                                                }else{
                                                                echo abs($diff_m).' minutes ago'; 
                                                                }
                                                            }
                                                        }  
                                                        else
                                                        {
                                                            if(abs($diff_t)=='1'){
                                                            echo abs($diff_t).' hour ago';
                                                            }else{
                                                            echo abs($diff_t).' hours ago'; 
                                                            }
                                                        }
                                                    } 
                                                    else
                                                    {
                                                        if(abs($diff_d)=='1'){
                                                        echo abs($diff_d).' day ago';
                                                        }else{
                                                        echo abs($diff_d).' days ago'; 
                                                        }
                                                    }
                                                }else
                                                {
                                                    $d=date_create($row['date']);
                                                    echo date_format($d,'F d');
                                                }
                                            }else
                                            {
                                                $d=date_create($row['date']);
                                                echo date_format($d,'Y');
                                            }
                                                    ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if(isset($_GET['starred'])){ ?>
                                    <div class="card-body p-t-0">
                                        <div class="card b-all shadow-none">
                                            <div class="inbox-center table-responsive">
                                                <table class="table table-hover no-wrap">
                                                    <tbody>
                                                        <?php 
                                                        $sql="SELECT * from `".TBL_QUERY."` WHERE starred=1 ORDER BY id DESC ";
                                                        $result = $database->query($sql);
                                                        while($row = $database->fetch_array($result))
                                                        {  ?>
                                                        <?php
                                                        if($row['status']!='2')
                                                        { ?>
                                                        <tr style="background-color: silver" class="unread">
                                                        <?php }else{
                                                        ?>
                                                        <tr class="unread">
                                                        <?php } ?>
                                                            <td style="width:40px" class="hidden-xs-down">
                                                                <?php
                                                                if($row['starred']==0)
                                                                {
                                                                ?>
                                                                <a href="user_query_action.php?star=1&query_id=<?php echo $row['id'] ?>"><i class="ti-star" style="font-size: 15px;"></i></a>
                                                                <?php }else{ ?> 
                                                                <a href="user_query_action.php?unstar=1&query_id=<?php echo $row['id'] ?>"><span style="color:green; font-size: 20px;">&starf;</span></a>
                                                                <?php } ?>
                                                            </td>
                                                            <td class="hidden-xs-down"><?php echo $row['name'] ?></td>
                                                            <td class="max-texts"> <a href="user_query.php?query_id=<?php echo $row['id'] ?>&single-message=1" /> <?php echo $row['subject'] ?></td>
                                                            <td class="text-right">
                                            <?php 
                                            $curnt_year=date('Y');
                                            $year=date_create($row['date']);
                                            $diff_year=date_format($year,"Y");
                                            if($diff_year==$curnt_year)
                                            {
                                                $curnt_month=date('m');
                                                $month=date_create($row['date']);
                                                $diff_month=date_format($month,"m");
                                                if($diff_month==$curnt_month)
                                                {
                                                    $curnt_date=date('d');
                                                    $date=$row['date'];
                                                    $diff_date=date('d',strtotime($date)); 
                                                    $diff_d=$curnt_date-$diff_date; 
                                                    if($diff_d=='0')
                                                    {
                                                        $curnt_time=date('H');
                                                        $time=date_create($row['time']);
                                                        $diff_time=date_format($time,"H");
                                                        $diff_t=$curnt_time-$diff_time;
                                                        if($diff_t=='0')
                                                        {
                                                            $curnt_min=date('i');
                                                            $min=date_create($row['time']);
                                                            $diff_min=date_format($time,"i");
                                                            $diff_m=$curnt_min-$diff_min;
                                                            if($diff_m=='0')
                                                            {
                                                                echo "Just now";
                                                            }
                                                            else
                                                            {
                                                                if(abs($diff_m)=='1'){
                                                                echo abs($diff_m).' minute ago';
                                                                }else{
                                                                echo abs($diff_m).' minutes ago'; 
                                                                }
                                                            }
                                                        }  
                                                        else
                                                        {
                                                            if(abs($diff_t)=='1'){
                                                            echo abs($diff_t).' hour ago';
                                                            }else{
                                                            echo abs($diff_t).' hours ago'; 
                                                            }
                                                        }
                                                    } 
                                                    else
                                                    {
                                                        if(abs($diff_d)=='1'){
                                                        echo abs($diff_d).' day ago';
                                                        }else{
                                                        echo abs($diff_d).' days ago'; 
                                                        }
                                                    }
                                                }else
                                                {
                                                    $d=date_create($row['date']);
                                                    echo date_format($d,'F d');
                                                }
                                            }else
                                            {
                                                $d=date_create($row['date']);
                                                echo date_format($d,'Y');
                                            }
                                                    ?>
                                                            </td>
                                                        </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if(isset($_GET['single-message'])){ ?>
                                    <?php 
                                    $sql1="SELECT * from `".TBL_QUERY."` WHERE id='".$_GET['query_id']."' ";
                                    $result1 = $database->query($sql1);
                                    while($row1 = $database->fetch_array($result1))
                                    {
                                    ?>
                                    <div class="col-lg-9 col-md-8 bg-light border-left"> 
                                    <div class="card-body p-t-0">
                                        <div class="card b-all shadow-none">
                                            <div class="card-body">
                                                <h3 class="card-title m-b-0"><?php echo $row1['subject']; ?>
                                                </h3><span style="font-size: 11px; color: grey"><?php $da=date_create($row1['date']); $ti=date_create($row1['time']); echo date_format($da,'d-m-Y').'&nbsp;&nbsp;'; echo date_format($ti,'h:i:s A'); ?></span>

                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <div class="card-body">
                                                <div class="d-flex m-b-40">
                                                    <div>
                                                        <img src="uploads/user.jpg" alt="user" width="40" class="img-circle" />
                                                    </div>
                                                    <div class="p-l-10">
                                                        <h4 class="m-b-0"><?php echo $row1['name']; ?></h4>
                                                        <small class="text-muted"><?php echo $row1['email-id']; ?></small>
                                                    </div>
                                                </div>
                                                <p><b>Dear Admin,</b></p>
                                                <p><?php echo $row1['message']; ?></p>
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>
                                            <?php if($row1['status']!=2){ ?>
                                            <div class="card-body">
                                                <a href="user_query.php?reply=1&query_id=<?php echo $row1['id'] ?>"><button type="submit" class="btn btn-success" name="reply"> Reply&nbsp;&nbsp;<i class="ti-arrow-right"></i> </button></a>
                                            </div>
                                            <?php }else{ ?> 
                                            <?php 
                                            $sql12="SELECT replied_by,message,`date`,`time` from `".TBL_QUERY_REPLY."` WHERE query_id='".$row1['id']."' ";
                                            $result12 = $database->query($sql12);
                                            $row12 = $database->fetch_array($result12);
                                            $sql13="SELECT name from `".TBL_ADMIN."` WHERE id='".$row12['replied_by']."' ";
                                            $result13 = $database->query($sql13);
                                            $row13 = $database->fetch_array($result13);
                                            ?>
                                            <div class="card-body">
                                                <h3 class="card-title m-b-0" style="color: grey">Replied by - <?php echo $row13['name'] ?></h3><span style="font-size: 11px; color: black"><?php $da1=date_create($row12['date']); $ti1=date_create($row12['time']); echo date_format($da1,'d-m-Y').'&nbsp;&nbsp;'; echo date_format($ti1,'h:i:s A'); ?></span>
                                            </div>
                                            
                                            <div class="card-body">
                                                <div class="d-flex m-b-40">
                                                    <div>
                                                        <img src="uploads/user.jpg" alt="user" width="40" class="img-circle" />
                                                    </div>
                                                    <div class="p-l-10">
                                                        <h4 class="m-b-0"><?php echo $row13['name']; ?></h4>
                                                        <small class="text-muted">plantzmore@gmail.com</small>
                                                    </div>
                                                </div>
                                                <p><b>Dear <?php echo $row1['name']; ?>,</b></p>
                                                <p><?php echo $row12['message']; ?></p>
                                            </div>
                                            <div>
                                                <hr class="m-t-0">
                                            </div>

                                            <?php }  ?>
                                        </div>
                                    </div>
                                    </div>
                                    <?php } } ?>
                                    <?php if(isset($_GET['reply'])){ ?>
                                    
                                    <?php 
                                    $sql2="SELECT * from `".TBL_QUERY."` WHERE id='".$_GET['query_id']."' ";
                                    $result2 = $database->query($sql2);
                                    while($row2 = $database->fetch_array($result2))
                                    {
                                    ?>
                                    <div class="col-xlg-10 col-lg-9 col-md-8 bg-light border-left">
                                    <div class="card-body">
                                        <form action="user_query_action.php" method="post">
                                        <h3 class="card-title">Reply to <?php echo $row2['name'] ?></h3>
                                        <div class="form-group">
                                            <label>To: </label>
                                            <input class="form-control" placeholder="To:" value="<?php echo $row2['email-id'] ?>" readonly name="username">
                                            <input type="hidden" name="name" value="<?php echo $row2['name'] ?>">
                                            <input type="hidden" name="id" value="<?php echo $row2['id'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label>Subject: </label>
                                            <input class="form-control" placeholder="Subject:" value="<?php echo $row2['subject'] ?>" readonly name="subject">
                                        </div>
                                        <div class="form-group">
                                            <label>Message: </label>
                                            <textarea class="textarea_editor form-control" rows="5" placeholder="Enter text ..." name="message" required=""></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-success m-t-20" name="send"><i class="ti-check"></i> Send</button>
                                        
                                        <a href="user_query.php?single-message=1&query_id=<?php echo $_GET['query_id'] ?>"><span class="btn btn-dark m-t-20"><i class="ti-trash"></i> Discard</span></a>
                                        </form>
                                    </div>
                                    </div>

                                <?php } } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
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
    <script src="assets/node_modules/datatables/jquery.dataTables.min-2.php"></script>
    <!-- Data Table changes and image output display -->
    <script src="dist/js/pages/table-date_img-output.js"></script>
    <!--Data table-->
    <script src="assets/node_modules/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/node_modules/datatables.net-bs4/js/dataTables.responsive.min.js"></script>
    <!-- Sweet-Alert  -->
    <script src="assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="assets/node_modules/sweetalert2/sweet-alert.init.js?v=2"></script>
</body>


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/ecommerce/eco-products-orders.php by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 16:23:55 GMT -->
</html>