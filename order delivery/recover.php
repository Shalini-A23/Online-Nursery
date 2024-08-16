

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
<!doctype html>
<html lang="en">
  
<!-- Mirrored from iqonic.design/themes/posdash/html/backend/auth-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 16:44:39 GMT -->
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Plantmore</title>
      
      <!-- Favicon -->
      <link rel="shortcut icon" href="http://iqonic.design/themes/posdash/html/assets/images/favicon.ico" />
      <link rel="stylesheet" href="css/backend-plugin.min.css">
      <link rel="stylesheet" href="css/backende209.css?v=1.0.0">
      <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <link rel="stylesheet" href="vendor/remixicon/fonts/remixicon.css">  </head>
  <body class=" ">
    <!-- loader Start -->
    <div id="loading">
          <div id="loading-center">
          </div>
    </div>
    <!-- loader END -->
    
      <div class="wrapper" style="background-color: lightblue">
      <section class="login-content">
         <div class="container">
            <div class="row align-items-center justify-content-center height-self-center">
               <div class="col-lg-8">
                  <div class="card auth-card">
                     <div class="card-body p-0">
                        <div class="d-flex align-items-center auth-content">
                           <div class="col-lg-7 align-self-center">
                              <div class="p-3">
                                 <h2 class="mb-2">Reset Password</h2>
                                 <p>Enter your email address and we'll send you an email with instructions to reset your password.</p>
                                 <p><?php if(isset($_SESSION['failure'])){ ?>
                        <span style="color: red"><?php echo $_SESSION['failure']; unset($_SESSION['failure']) ?></span>
                        <?php } ?></p>
                                 <form action="login_action.php" method="post">
                                    <div class="row">
                                      <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="text" placeholder="Name" name="name" autocomplete="off"  required="" pattern="[A-Za-z ]+">
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="text" name="username" placeholder="Email Id" autocomplete="off" required="" pattern="[A-Za-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,}$">
                                          </div>
                                       </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="recover">Reset</button>
                                 </form>
                              </div>
                           </div>
                           <div class="col-lg-5 content-right">
                              <img src="images/login/01.png" class="img-fluid image-right" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      </div>
    
    <!-- Backend Bundle JavaScript -->
    <script src="js/backend-bundle.min.js"></script>
    
    <!-- Table Treeview JavaScript -->
    <script src="js/table-treeview.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script src="js/customizer.js"></script>
    
    <!-- Chart Custom JavaScript -->
    <script async src="js/chart-custom.js"></script>
    
    <!-- app JavaScript -->
    <script src="js/app.js"></script>
  </body>

<!-- Mirrored from iqonic.design/themes/posdash/html/backend/auth-recoverpw.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 16:44:39 GMT -->
</html>