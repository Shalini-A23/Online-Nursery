
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
  
<!-- Mirrored from iqonic.design/themes/posdash/html/backend/auth-sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 16:44:39 GMT -->
<head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Plantmore</title>
      <link rel="icon" type="image/png" sizes="16x16" href="assets/images/logo-icon1.png">
      <!-- Favicon -->
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
                                 <h2 class="mb-2">Sign Up</h2> 
                                 <p>Create your Plantmore.com Account</p>
                                 <p><?php if(isset($_SESSION['failure'])){ ?>
                        <span style="color: red"><?php echo $_SESSION['failure']; unset($_SESSION['failure']) ?></span>
                        <?php } ?></p>
                                 <form action="register_action.php" method="post">
                                    <div class="row">
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="text" placeholder="Name" name="name" pattern="[A-Za-z ]+" required="" autocomplete="off">
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="text" placeholder="Email" name="username" pattern="[A-Za-z0-9._-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Enter a valid email id" required="" autocomplete="off">
                                          </div>
                                       </div>
                                       <div class="col-lg-8">
                                          <div class="floating-label form-group">
                                             <input class="floating-input form-control" type="text" placeholder="Phone" name="phone" pattern="[6-9]{1}[0-9]{9}" title="Enter a valid mobile number" required="" autocomplete="off">
                                          </div>
                                       </div>
                                       <div class="col-lg-8">
                                        <p>Select District: </p>
                                          <div class="floating-label form-group">
                                             <select name="district" class="floating-input form-control" required="">
                                                        <?php
                                                        $se="SELECT * from `".TBL_DISTRICT."` WHERE `status` = 1";
                                                        $resultt = $database->query($se);
                                                        while($roww = $database->fetch_array($resultt))
                                                        {  
                                                        ?>
                                                        <option value="<?php echo $roww['name'] ?>"><?php echo $roww['name'] ?></option>
                                                        <?php }
                                                        ?>
                                                    </select>
                                          </div>
                                       </div>
                                       <div class="col-lg-12">
                                          <div class="custom-control custom-checkbox mb-3">
                                             <input type="checkbox" class="custom-control-input" id="customCheck1" required="">
                                             <label class="custom-control-label" for="customCheck1">I agree with the terms of use</label>
                                          </div>
                                       </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="register">Sign Up</button>
                                    <p class="mt-3">
                                       Already have an Account <a href="login.php" class="text-primary">Sign In</a>
                                    </p>
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

<!-- Mirrored from iqonic.design/themes/posdash/html/backend/auth-sign-up.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 16:44:39 GMT -->
</html>