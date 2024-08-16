  <?php 
$page_id = "type_m";
error_reporting (E_ALL ^ E_NOTICE);
include_once '../assets/libs/class.database.php';
include_once '../assets/libs/class.session.php';
include_once '../assets/libs/functions.php';
include_once '../assets/libs/tables.config.php';
include_once '../assets/libs/class.commen.php';
session_start();
$session= new Session();

     if(isset($_GET['id']))
    {
            $id=$_GET['id'];
        $sel="SELECT * FROM `".TBL_CASTE."` WHERE `id` = '".$id."' ";
        $result = $database->query($sel);   
        $row = $database->fetch_array($result);

        }else{

            $sel="SELECT * from `".TBL_CASTE."` WHERE `status` != 2";
            $result = $database->query($sel);   
    }
                
?>
<!DOCTYPE html>
<html lang="en">
    <!-- Mirrored from mannatthemes.com/Matrimony/light/ecommerce/ecommerce-index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2020 16:20:16 GMT -->
    <head>
        <meta charset="utf-8" />
        <title>Matrimony </title>
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <meta content="A premium admin dashboard template by Mannatthemes" name="description" />
        <meta content="Mannatthemes" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="../assets/images/favicon.ico" />
        <link href="../assets/plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
        <!-- App css -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/metisMenu.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <!-- Top Bar Start -->
        <div class="topbar">
            <!-- LOGO -->
            <div class="topbar-left">
                <a href="ecommerce-index.html" class="logo">
                    <span><img src="../assets/images/logo-sm.png" alt="logo-small" class="logo-sm" /> </span><span><img src="../assets/images/logo-dark.png" alt="logo-large" class="logo-lg" /></span>
                </a>
            </div>
            <!--end logo--><!-- Navbar -->
            <nav class="navbar-custom">
                <ul class="list-unstyled topbar-nav float-right mb-0">
                    
                    <li class="dropdown notification-list">
                        <a class="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="dripicons-bell noti-icon"></i> <span class="badge badge-danger badge-pill noti-icon-badge">2</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-lg">
                            <!-- item-->
                            <h6 class="dropdown-item-text">Notifications (18)</h6>
                            <div class="slimscroll notification-list">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item active">
                                    <div class="notify-icon bg-success"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-warning"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-info"><i class="mdi mdi-glass-cocktail"></i></div>
                                    <p class="notify-details">Your item is shipped<small class="text-muted">It is a long established fact that a reader will</small></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                                    <p class="notify-details">Your order is placed<small class="text-muted">Dummy text of the printing and typesetting industry.</small></p>
                                </a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <div class="notify-icon bg-danger"><i class="mdi mdi-message"></i></div>
                                    <p class="notify-details">New Message received<small class="text-muted">You have 87 unread messages</small></p>
                                </a>
                            </div>
                            <!-- All-->
                            <a href="javascript:void(0);" class="dropdown-item text-center text-primary">View all <i class="fi-arrow-right"></i></a>
                        </div>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="../assets/images/users/user-4.jpg" alt="profile-user" class="rounded-circle" /> <span class="ml-1 nav-user-name hidden-sm">Matrimony <i class="mdi mdi-chevron-down"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="dripicons-user text-muted mr-2"></i> Profile</a> <a class="dropdown-item" href="#"><i class="dripicons-wallet text-muted mr-2"></i> My Wallet</a>
                            <a class="dropdown-item" href="#"><i class="dripicons-gear text-muted mr-2"></i> Settings</a> <a class="dropdown-item" href="#"><i class="dripicons-lock text-muted mr-2"></i> Lock screen</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="dripicons-exit text-muted mr-2"></i> Logout</a>
                        </div>
                    </li>
                </ul>
                <!--end topbar-nav-->
                <ul class="list-unstyled topbar-nav mb-0">
                    <li>
                        <button class="button-menu-mobile nav-link waves-effect waves-light"><i class="dripicons-menu nav-icon"></i></button>
                    </li>
                    <li class="hide-phone app-search">
                        <form role="search" class="">
                            <input type="text" placeholder="Search..." class="form-control" /> <a href="#"><i class="fas fa-search"></i></a>
                        </form>
                    </li>
                </ul>
            </nav>
            <!-- end navbar-->
        </div>
        <!-- Top Bar End -->
        <div class="page-wrapper">
            <!-- Left Sidenav -->
            <div class="left-sidenav">
                <div class="main-icon-menu">
                    <nav class="nav">
                        <a href="#MatrimonyAnalytic" class="nav-link" data-toggle="tooltip-custom" data-placement="top" title="" data-original-title="Analytics">
                            <svg
                                class="nav-svg"
                                version="1.1"
                                id="Layer_1"
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                x="0px"
                                y="0px"
                                viewBox="0 0 512 512"
                                style="enable-background: new 0 0 512 512;"
                                xml:space="preserve"
                            >
                                <g>
                                    <path d="M184,448h48c4.4,0,8-3.6,8-8V72c0-4.4-3.6-8-8-8h-48c-4.4,0-8,3.6-8,8v368C176,444.4,179.6,448,184,448z" />
                                    <path class="svg-primary" d="M88,448H136c4.4,0,8-3.6,8-8V296c0-4.4-3.6-8-8-8H88c-4.4,0-8,3.6-8,8V440C80,444.4,83.6,448,88,448z" />
                                    <path
                                        class="svg-primary"
                                        d="M280.1,448h47.8c4.5,0,8.1-3.6,8.1-8.1V232.1c0-4.5-3.6-8.1-8.1-8.1h-47.8c-4.5,0-8.1,3.6-8.1,8.1v207.8
                                        C272,444.4,275.6,448,280.1,448z"
                                    />
                                    <path
                                        d="M368,136.1v303.8c0,4.5,3.6,8.1,8.1,8.1h47.8c4.5,0,8.1-3.6,8.1-8.1V136.1c0-4.5-3.6-8.1-8.1-8.1h-47.8
                                        C371.6,128,368,131.6,368,136.1z"
                                    />
                                </g>
                            </svg>
                        </a>
                       
                    </nav>
                    <!--end nav-->
                </div>
              <?php include 'includes/header.php'; ?>
            </div>
            <!-- end left-sidenav--><!-- Page Content-->
            <div class="page-content">
                <div class="container-fluid">
                    <!-- Page-Title -->
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="page-title-box">
                                <div class="float-right">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Matrimony</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">Ecommerce</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Dashboard</h4>
                            </div>
                            <!--end page-title-box-->
                        </div>
                        <!--end col-->
                    </div>
                
                    <div class="row">
                        <div class="col-12">

                            <div class="card">
                            <div class="card-body">
                                <form action="caste_action.php" method="POST" encJob Type="multipart/form-data">
                                  <input type="hidden" name="id" value="<?php echo( $row['id']); ?>">
                                    <div class="form-body">
                                        <h3 class="card-title">caste</h3>
                                        <hr>
                                        <div class="row p-t-20">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="control-label">caste</label>
                                                    <input type="text" name="caste" value="<?php echo($row['caste']);  ?>" id="name" class="form-control">
                                                    <small class="form-control-feedback"></small> </div>
                                            </div>
                                          
                                        </div>
                                            
                                             </div> 
                                       
                                        
                                    <div class="form-actions">
                                      <?php if(isset($_GET['id']))
                                        { ?>
                                          <button Job Type="submit" name="update" class="btn btn-info"> <i class="fa fa-check"></i> Update</button>
                                      <?php }else 
                                      { ?>
                                        <button Job Type="submit" name="submit" class="btn btn-success"> <i class="fa fa-check"></i> Submit</button>
                                      <?php } ?>
                                          
                                    </div>
                                </form>
                                        </div>
</div>

<?php if(!(isset($_GET['id'])))
                        { ?>
                            <div class="card">
                                <div class="card-body order-list">
                                    <h4 class="header-title mt-0 mb-4">caste</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th class="border-top-0">S.no</th>
                                                    <th class="border-top-0">caste</th>
                                                    <th class="border-top-0">Status</th>
                                                    <th class="border-top-0">Action</th>
                                                </tr>
                                                <!--end tr-->
                                            </thead>
                                             <tbody>
                                    <?php 
                                    $j=1;
                                    while($row = $database->fetch_array($result))
                                                        
                                                        {
                                                              
                                                       ?>                                        
                                    <tr class="responsive-table">
                                        <td><?php echo $j; ?></td>
                                           <td class="p-left-20">
                                            <div class="inner">
                                                <h5><?php echo $row['caste']; ?></h5>
                                            </div>
                                             </td>
                                         <td class=""><?php if($row['status']== 1) { ?><a href="caste_action.php?status=0&id=<?php echo $row['id']; ?>"> 
                               <label class="btn btn-sm btn-success">Active</label></a> <?php } else { ?><a href="caste_action.php?status=1&id=<?php echo $row['id']; ?>"> <label class="btn btn-sm btn-danger">Inactive</label></a> <?php } ?></td>
                                        <td class="actions">
                                            <a class="mr-2" href="caste.php?mode=insert&id=<?php echo $row['id']; ?>"><i class="fas fa-edit text-info font-16"></i></a>
                                            <a class="mr-2" href="caste_action.php?status=2&id=<?php echo $row['id']; ?>"><i class="fas fa-trash-alt text-danger font-16"></i></a>

                                            
                                        </td>
                                    </tr>
                                    <?php  $j++; } ?>
                                    </tbody>
                    <tfoot>
                      <tr>  
                                        <th>S.no</th>
                                        <th>caste</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                                           
                      </tr>
                    </tfoot>
                                        </table>
                                        <!--end table-->
                                    </div>
                                    <!--end /div-->
                                </div>
                                <!--end card-body-->
                            </div>
                            <!--end card-->
                            <?php } ?>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!-- container -->
                <footer class="footer text-center text-sm-left">
                    &copy; 2019 Matrimony <span class="text-muted d-none d-sm-inline-block float-right">Crafted with <i class="mdi mdi-heart text-danger"></i> by Mannatthemes</span>
                </footer>
                <!--end footer-->
            </div>
            <!-- end page content -->
        </div>
        <!-- end page-wrapper --><!-- jQuery  -->
        <script src="../assets/js/jquery.min.js"></script>
        <script src="../assets/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/metisMenu.min.js"></script>
        <script src="../assets/js/waves.min.js"></script>
        <script src="../assets/js/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/moment/moment.js"></script>
        <script src="../assets/plugins/apexcharts/apexcharts.min.js"></script>
        <script src="../assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../assets/pages/jquery.eco_dashboard.init.js"></script>
        <!-- App js -->
        <script src="../assets/js/app.js"></script>
    </body>
    <!-- Mirrored from mannatthemes.com/Matrimony/light/ecommerce/ecommerce-index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 21 Jan 2020 16:20:19 GMT -->
</html>
