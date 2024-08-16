<?php 
$page_id="blog";
error_reporting (E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
include_once 'assets/libs/class.commen.php';
session_start();
$session= new Session();
 global $database, $db;     
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Blog || Plantmore</title>
    <meta name="description" content="">
    <meta name="robots" content="noindex, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, follow" />
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="img/logo-icon1.png">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Linearicon CSS-->
    <link rel="stylesheet" href="css/linearicons.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Animate CSS-->
    <link rel="stylesheet" href="css/animate.css">
    <!-- Owl Carousel CSS-->
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <!-- Slick CSS-->
    <link rel="stylesheet" href="css/slick.css">
    <!-- Meanmenu CSS-->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- Easyzoom CSS-->
    <link rel="stylesheet" href="css/easyzoom.css">
    <!-- Venobox CSS-->
    <link rel="stylesheet" href="css/venobox.css">
    <!-- Jquery Ui CSS-->
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- Nice Select CSS-->
    <link rel="stylesheet" href="css/nice-select.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Modernizr Js -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <?php include('includes/header1.php') ?>
        <!--Breadcrumb Tow Start-->
        <div class="breadcrumb-tow mb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-title">
                            <h1>Blog</h1>
                        </div>
                        <div class="breadcrumb-content breadcrumb-content-tow">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li class="active">Blog</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumb Tow End-->
        <!--Blog Area Start-->
        <div class="blog-area white-bg pt-0 pb-0 mb-70">
            <div class="container">
                <div class="row">
                    <!--Blog Post Start-->
                    <div class="col-lg-9">
                        <?php 
                            $results_per_page=2;
                            if(!isset($_GET['blog_id']))
                            {
                        	   $sql6="SELECT * FROM `".TBL_BLOG."` WHERE `status`=1 ORDER BY created_date DESC";
                            }
                            if(isset($_GET['month']) && isset($_GET['year']))
                            {
                                $sql6="SELECT DISTINCT EXTRACT(MONTH FROM created_date),EXTRACT(YEAR FROM created_date) FROM tbl_blog WHERE EXTRACT(MONTH FROM created_date)='".$_GET['month']."' AND EXTRACT(YEAR FROM created_date)='".$_GET['year']."' ORDER BY created_date DESC";
                            }
                            if(isset($_GET['blog_id']))
                            {
                                $sql6="SELECT * FROM `".TBL_BLOG."` WHERE `id`='".$_GET['blog_id']."' ";
                            }
                            if(isset($_POST['search']))
                            {
                                $sql6="SELECT * FROM `".TBL_BLOG."` WHERE `status`=1 AND blog_title LIKE '%".$_POST['content']."%' ORDER BY created_date DESC";
                            }
                            $result6 = $database->query($sql6);  
                            $number_of_result = mysqli_num_rows($result6); 
                            $number_of_page = ceil ($number_of_result / $results_per_page); 
                            if (!isset ($_GET['page']) ) 
                            {  
                                $page = 1;  
                            } 
                            else 
                            {  
                                $page = $_GET['page'];  
                            } 
                            $page_first_result = ($page-1) * $results_per_page; 
                            if(!isset($_GET['blog_id']))
                            {
                                $sel="SELECT * FROM `".TBL_BLOG."` WHERE `status`=1 ORDER BY created_date DESC LIMIT " . $page_first_result . ',' . $results_per_page;
                            }
                            if(isset($_GET['blog_id']))
                            {
                                $sel="SELECT * FROM `".TBL_BLOG."` WHERE `id`='".$_GET['blog_id']."' ";
                            }
                            if(isset($_POST['search']))
                            {
                                $sel="SELECT * FROM `".TBL_BLOG."` WHERE `status`=1 AND blog_title LIKE '%".$_POST['content']."%' ORDER BY created_date DESC";
                            }
                            if(isset($_GET['month']) && isset($_GET['year']))
                            {
                                $sel="SELECT DISTINCT EXTRACT(MONTH FROM created_date),EXTRACT(YEAR FROM created_date),blog_title, blog_description, image, created_date FROM tbl_blog WHERE EXTRACT(MONTH FROM created_date)='".$_GET['month']."' AND EXTRACT(YEAR FROM created_date)='".$_GET['year']."' ORDER BY created_date DESC";
                            }
                            $result = $database->query($sel);  
                            $j=1;
                            while($row = $database->fetch_array($result))
                            {
                         ?>
                        <div class="blog_area">
                            <article class="blog_single">
                                <header class="entry-header">
                                   
                                    <h2 class="entry-title">
                                        <a href="single-blog.html"><?php echo $row['blog_title']; ?></a>
                                    </h2>
                                    <span class="post-author">
                                    <span class="post-by"> Posts by : </span> admin </span>
                                    <span class="post-separator">|</span>
                                    <span class="blog-post-date"><i class="fas fa-calendar-alt"></i>On <?php $date=date_create($row['created_date']); echo date_format($date,"F d"); ?>, <?php echo date_format($date,"Y"); ?> [<?php echo date_format($date,"h:i:s A"); ?>]</span>
                                </header>
                                <div class="post-thumbnail img-full">
                                    <a href="single-blog.html">
                                        <img src="admin/uploads/<?php  echo $row['image']; ?>" alt="" style="height: 500px;">
                                    </a>
                                </div>
                                <div class="postinfo-wrapper">
                                    <div class="post-info">
                                        <div class="entry-summary">
                                            <p><?php echo $row['blog_description'] ?></p>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                            </article>
                        </div>
                        <?php  $j++; } ?>  
                        <div class="row">
                            <div class="col-12">
                                <!--Pagination Start-->
                                <div class="product-pagination">
                                    <ul>
                                      <?php 
                                          for($page = 1; $page<= $number_of_page; $page++) 
                                          { ?> 
                                        <li <?php if($page==$_GET['page']){?> class="active" <?php } ?> ><a href = "blog.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>
                                        <?php
                                          }?>
                                    </ul>
                                </div>
                                <!--Pagination End-->
                            </div>
                        </div>
                    </div>
                    <!--Blog Post End-->
                    <!--Blog Sidebar Start-->
                    <div class="col-lg-3">
                        <div class="blog_sidebar">
                            <div class="row_products_side">
                                <div class="product_left_sidbar">
                                    <div class="product-filter mb-35">
                                      <h5>Search </h5>
                                      <div class="search__sidbar">
                                         <div class="input_form">
                                                <form action="" method="post">
                                                <input type="text" placeholder="Type to search..." style="width: 220px; height: 40px;" id="search" name="content">
                                                &nbsp;&nbsp;<button name="search" style="padding: 5px; background-color: #abd373;"><i class="fa fa-search"></i></button>
                                                </form>
                                         </div>
                                      </div>
                                    </div>
                                    <div class="product-filter  mb-35">
                                      <h5>Blog Archives </h5>
                                        <div class="blog_Archives__sidbar">
                                            <ul>
                                                <?php 
                                                $sql="SELECT DISTINCT EXTRACT(YEAR FROM created_date) FROM `".TBL_BLOG."` ORDER BY created_date DESC";
                                                $result1 = $database->query( $sql );
                                                while($row1 = $database->fetch_array($result1))
                                                {
                                                    $sql2="SELECT DISTINCT EXTRACT(MONTH FROM created_date) FROM `".TBL_BLOG."` ORDER BY created_date DESC";
                                                    $result2 = $database->query( $sql2 );
                                                    while($row2 = $database->fetch_array($result2))
                                                    {
                                                ?>
                                                <li>
                                                    <a href="blog.php?month=<?php echo $row2[0] ?>&year=<?php echo $row1[0] ?>"><?php echo date('F',mktime(0,0,0,$row2[0],10)) ?>&nbsp;<?php echo $row1[0] ?></a>&nbsp;(1)</li>
                                                <?php } } ?>
                                            </ul>
                                      </div>
                                    </div>
                                    <div class="product-filter  mb-35">
                                        <h5>Recent Posts</h5>
                                        <div class="blog_Archives__sidbar">
                                            <ul>
                                                <?php 
                                                $sql3="SELECT * FROM `".TBL_BLOG."` ORDER BY created_date DESC LIMIT 5";
                                                $result3 = $database->query($sql3);
                                                while($row3 = $database->fetch_array($result3))
                                                {
                                                ?>
                                                <li><a href="blog.php?blog_id=<?php echo $row3['id'] ?>"><?php echo $row3['blog_title'] ?></a></li>
                                                <?php } ?>            
                                            </ul>
                                      </div>
                                    </div>
                                    <div class="product-filter  mb-35">
                                        <div class="sidebar-banner single-banner">
                                            <div class="banner-img">
                                                <a href="#"><img src="img/banner/shop-sidebar.jpg" alt=""></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Blog Sidebar End-->
                </div>
            </div>
        </div>
        <!--Blog Area End-->
         <div id="brand">
      <?php include('includes/brand.php') ?>
    </div>
        <?php include('includes/footer.php'); ?>
        <!-- Modal Area Strat -->
        <div class="modal fade" id="open-modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
              </div>
              <div class="modal-body">
                <div class="row fetch">

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Area End -->
    </div>
    <!--Jquery 1.12.4-->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <!--Popper-->
    <script src="js/popper.min.js"></script>
    <!--Bootstrap-->
    <script src="js/bootstrap.min.js"></script>
    <!--Imagesloaded-->
    <script src="js/imagesloaded.pkgd.min.js"></script> 
    <!--Isotope-->
    <script src="js/isotope.pkgd.min.js"></script>
    <!--Waypoints-->
    <script src="js/waypoints.min.js"></script>
    <!--Counterup-->
    <script src="js/jquery.counterup.min.js"></script>
    <!--Carousel-->
    <script src="js/owl.carousel.min.js"></script>
    <!--Slick-->
    <script src="js/slick.min.js"></script>
    <!--Meanmenu-->
    <script src="js/jquery.meanmenu.min.js"></script>
    <!--Easyzoom-->
    <script src="js/easyzoom.min.js"></script>
    <!--Nice Select-->
    <script src="js/jquery.nice-select.min.js"></script>
    <!--ScrollUp-->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!--Wow-->
    <script src="js/wow.min.js"></script>
    <!--Venobox-->
    <script src="js/venobox.min.js"></script>
    <!--Jquery Ui-->
    <script src="js/jquery-ui.js"></script>
    <!--Countdown-->
    <script src="js/jquery.countdown.min.js"></script>
    <!--Plugins-->
    <script src="js/plugins.js"></script>
    <!--Main Js-->
    <script src="js/main.js"></script>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
    $('#open-modal').on('show.bs.modal', function (e) {
        var rowid = $(e.relatedTarget).data('id');
        $.ajax({
            type : 'post',
            url : 'fetch_data.php', //Here you will fetch records 
            data :  'rowid='+ rowid, //Pass $id
            success : function(data){
            $('.fetch').html(data);//Show fetched data from database
            }
        });
     });
});
</script>