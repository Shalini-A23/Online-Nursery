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
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home || Plantmore</title>
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
    <!--alerts CSS -->
  <link href="admin/assets/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <style type="text/css">
        .cart-title>strong {
    display: block;
    font-weight: 600;
    margin-top: 6px;
    font-family: sans-serif;
}
.img-fulll:hover
{
    box-shadow: 5px 6px black;
}

</style>
</head>
<body>
    <div class="wrapper">
        <?php include('includes/header.php') ?>
        <!--Slider Area Start-->
        <div class="slider-area">
            <div class="hero-slider owl-carousel">
                <!--Single Slider Start-->
                <div class="single-slider" style="background-image: url(img/slider/home1-slider2.jpg)">   
                    <div class="slider-progress"></div>
                    <div class="container">
                        <div class="hero-slider-content">
                            <h1>Perfect Plants <br> Sale </h1>
                            <div class="slider-border"></div>
                            <p>Happiness is taking a walk in the garden under bright sunshine soon after rain.</p>
                            <div class="slider-btn">
                                <a href="shop.php">Shop Collection <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Single Slider End-->
                <!--Single Slider Start-->
                <div class="single-slider" style="background-image: url(img/slider/home1-slider10.jpg)">   
                    <div class="slider-progress"></div>
                    <div class="container">
                        <div class="hero-slider-content">
                            <h1><?php echo date('Y') ?> Plant Trend</h1>
                            <div class="slider-border"></div>
                            <p>We are all gardeners, planting seeds of intention and watering them with attention in every moment of every day</p>
                            <div class="slider-btn">
                                <a href="#">Shop Collection <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Single Slider End-->
                <!--Single Slider Start-->
                <div class="single-slider" style="background-image: url(img/slider/home1-slider9.jpg)">   
                    <div class="slider-progress"></div>
                    <div class="container">
                        <div class="hero-slider-content">
                            <h1>Just another day <br>with plant</h1>
                            <div class="slider-border"></div>
                            <p>Gardening is the art that uses flowers and plants as paint and the soil and sky as canvas</p>
                            <div class="slider-btn">
                                <a href="#">Shop Collection <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Single Slider End-->
                <!--Single Slider Start-->
                <div class="single-slider" style="background-image: url(img/slider/home1-slider7.jpg)">   
                    <div class="slider-progress"></div>
                    <div class="container">
                        <div class="hero-slider-content">
                            <h1>Enjoy little things</h1>
                            <div class="slider-border"></div>
                            <p>Green is the prime color of the world and that from which its loveliness aries</p>
                            <div class="slider-btn">
                                <a href="#">Shop Collection <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Single Slider End-->
                <!--Single Slider Start-->
                <div class="single-slider" style="background-image: url(img/slider/home1-slider11.jpg)">   
                    <div class="slider-progress"></div>
                    <div class="container">
                        <div class="hero-slider-content">
                            <h1>Gardening is art</h1>
                            <div class="slider-border"></div>
                            <p>We might think we are nurturing our garden, but of course it's our garden that is really nurturing us.</p>
                            <div class="slider-btn">
                                <a href="#">Shop Collection <i class="fa fa-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Single Slider End-->         
        </div>
        <!--Slider Area End-->
        <!--Feature Area Start-->
        <div class="feature-area mt-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6">
                        <!--Single Feature Start-->
                        <div class="single-feature mb-35">
                            <div class="feature-icon">
                                <span class="lnr lnr-rocket"></span>
                            </div>
                            <div class="feature-content">
                                <h3>FREE SHIPPING</h3>
                                <p>ALL ORDER OVER &#8377;100</p>
                            </div>
                        </div>
                        <!--Single Feature End-->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <!--Single Feature Start-->
                        <div class="single-feature mb-35">
                            <div class="feature-icon">
                                <span class="lnr lnr-phone"></span>
                            </div>
                            <div class="feature-content">
                                <h3>24/7 DEDICATED SUPPORT</h3>
                                <p>8899878987</p>
                            </div>
                        </div>
                        <!--Single Feature End-->
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <!--Single Feature Start-->
                        <div class="single-feature mb-35">
                            <div class="feature-icon">
                                <span class="lnr lnr-redo"></span>
                            </div>
                            <div class="feature-content">
                                <h3>MONEY BACK</h3>
                                <p>IF THE ITEM DIDN’T SUIT YOU</p>
                            </div>
                        </div>
                        <!--Single Feature End-->
                    </div>
                </div>
            </div>
        </div> 
        <!--Feature Area End-->
        <!--Our History Area Start-->
        <div class="our-history-area mt-85">
            <div class="container">
                <div class="row">
                    <!--Section Title Start-->
                    <div class="col-12">
                        <div class="section-title text-center mb-35">
                            <h2>Our History</h2>
                            <span>A little story about us</span>
                        </div>
                    </div>
                    <!--Section Title End-->
                </div>
                <div class="row">
                    <div class="col-lg-8 ml-auto mr-auto">
                        <div class="history-area-content text-center">
                            <p><strong>PLANT ZONE: Online Shopping Site</strong></p>
                            <p>For over 25 years, we are helping customers to celebrate their special moments by delivering fresh flowers and plants. Our mission is to offer our customers a wow experience through continuours innovation of premium products and services by using world class technology and processes.The brand is one stop shop for all grandening needs, be it buying flowers, plants, accessories not only in India but across the globe.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Our History Area End-->
        <!--Categories Area Start-->
        <div class="categories-area mt-115">
            <div class="container">
                <div class="row">
                    <!--Section Title Start-->
                    <div class="col-12">
                        <div class="section-title text-center mb-35">
                            <span>The Best collection</span>
                            <h3>Shop By Categories</h3>
                        </div>
                    </div>
                    <!--Section Title End-->
                </div>
            </div>
            <div class="container-fluid pl-50 pr-50">
                <div class="row">
                    <?php //1 4 | 2 8 | 3 7 | 5 4 | 6 8
                    $sel21="SELECT * FROM`".TBL_CATEGORY."` WHERE `status`=1 ORDER BY id ASC LIMIT 0,1";
                    $result21 = $database->query( $sel21 );
                    while($row21 = $database->fetch_array($result21))
                    {
                        $sel22="SELECT * FROM `".TBL_PRODUCT."` WHERE category_id='".$row21['id']."' ";
                        $result22 = $database->query( $sel22 );
                        $row22 = $database->fetch_array($result22); 
                    ?>
                    <div class="cat-1 col-md-4">
                        <div class="categories-img img-full img-fulll mb-30">
                            <a href="shop.php?category_id=<?php echo $row21['id'] ?>"><img src="admin/uploads/<?php echo $row22['image'] ?>" style="height: 610px; border: 5px solid grey" alt=""></a>
                            <div class="categories-content">
                                <h3><?php echo $row21['category_name'] ?></h3>
                                <h4><?php echo mysqli_num_rows($result22); ?> ITEMS</h4>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="cat-2 col-md-8">
                        <div class="row">
                            <?php 
                            $sel23="SELECT * FROM`".TBL_CATEGORY."` WHERE `status`=1 ORDER BY id ASC LIMIT 1,6";
                            $result23 = $database->query( $sel23 );
                            $j=1;
                            while($row23 = $database->fetch_array($result23))
                            {
                                $sel24="SELECT * FROM `".TBL_PRODUCT."` WHERE category_id='".$row23['id']."' ";
                                $result24 = $database->query( $sel24 );
                                $row24 = $database->fetch_array($result24); 
                            ?>
                            <div class="cat-5 col-md-4">
                                <div class="categories-img img-full img-fulll mb-30" <?php if($j==4 || $j==1){ ?>
                                        style="width: 500px; height:290px;"
                                        <?php } ?>
                                        <?php if($j==2){ ?> 
                                        style="position: absolute; right: -200px; top: 0px; height: 290px; width: 290px;"
                                        <?php } ?>
                                        <?php if($j==5){ ?> 
                                        style="height: 290px; width: 675px; position: relative; left: -565px; top: 0px;"
                                        <?php } ?>
                                        <?php if($j==6){ ?> 
                                        style="height: 290px; width: 675px; position: relative; left: -180px; top: 0px;"
                                        <?php } ?>
                                        >
                                    <a href="shop.php?category_id=<?php echo $row23['id'] ?>"><img src="admin/uploads/<?php echo $row23['image'] ?>" alt="" 
                                        <?php if($j==4 || $j==1){ ?>
                                        style="width: 500px; height:290px; border: 5px solid grey;"
                                        <?php } ?>
                                        <?php if($j==5 || $j==6){ ?> 
                                        style="height: 290px; width: 675px; border: 5px solid grey;"
                                        <?php } ?>
                                        <?php if($j==2 || $j==3){ ?> 
                                        style="border: 5px solid grey;"
                                        <?php } ?>
                                        ></a>
                                    <div class="categories-content">
                                        <h3><?php echo $row23['category_name']; ?></h3>
                                        <h4><?php echo mysqli_num_rows($result24); ?> items</h4>
                                    </div>
                                </div>
                            </div>
                            <?php $j++; } ?>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Categories Area End-->
        <!--Product Area Start-->
        <div class="product-area mt-85">
            <div class="container">
                <div class="row">
                    <!--Section Title Start-->
                    <div class="col-12">
                        <div class="section-title text-center mb-35">
                            <span>The Most Trendy</span>
                            <h3>Featured Products</h3>
                        </div>
                    </div>
                    <!--Section Title End-->
                </div>
                <div id="grid" class="tab-pane fade show active">
                    <div class="product-grid-view">
                        <div class="row filter_data">
                            <?php
                            $sel1="SELECT DISTINCT product_id FROM`".TBL_REVIEW."` WHERE `rating`>=3 ORDER BY rating DESC LIMIT 6";
                            $result1 = $database->query( $sel1 );
                            while($row1 = $database->fetch_array($result1))
                            {
                                $sel="SELECT * FROM`".TBL_PRODUCT."` WHERE `status`=1 AND id='".$row1['product_id']."' ";
                                $result = $database->query( $sel );
                                while($row = $database->fetch_array($result))
                                {
                            ?>
                            <div class="col-md-4" id="like">
                                <!--Single Product Start-->
                                <div class="single-product mb-25" style="width: 300px">
                                    <div class="product-img img-full">
                                        <a href="single-product.php?id=<?php echo $row['id'] ?>">
                                            <img src="admin/uploads/<?php echo $row['image']?>" alt="">
                                        </a>
                                        <?php if($row['discount']!='0'){ ?>
                                        <span class="onsale"><?php echo $row['discount'] ?>%</span> <?php } ?>
                                        <?php if($row['discount']=='0'){ ?>
                                        <span class="onsale">Sale!</span><?php } ?>

                                        <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" class="open" id="id" data-id="<?php echo $row['id'] ?>"><i class="fa fa-search"></i></a></li>
                                            <li>
                                            <?php 
                                            $query11 = "SELECT * FROM `tbl_product` JOIN `tbl_wishlist` on tbl_product.id='".$row['id']."' AND tbl_wishlist.product_id='".$row['id']."' and tbl_wishlist.user_id='".$_SESSION['user_id']."' ";
                                            $result11 = $database->query($query11);
                                            $row11 = $database->fetch_array($result11);
                                            if($row11['product_id']!=null)
                                            { ?>
                                                <a href="shop_action.php?remove_wishlist=1&id=<?php echo $row['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI'].'#like' ?>" title="Whishlist"><i class="fa fa-heart"></i></a>
                                            <?php }
                                            else
                                            { ?>
                                                <a href="shop_action.php?wishlist=1&id=<?php echo $row['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI'].'#like' ?>" title="Whishlist"><i class="fa fa-heart-o"></i></a>
                                            <?php } ?>

                                            </li>
                                            <li><a href="compare.php?compare_id=<?php echo $row['id'] ?>" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                    <h2><a href="single-product.php?id=<?php echo $row['id'] ?>"><?php echo $row['product_name'] ?></a></h2>
                                        <div class="product-price">
                                            <div class="price-box">
                                                <?php if($row['discount']!='0'){ ?>
                                                <span class="price">&#8377;<?php echo $row['price'] ?></span> <?php } ?>

                                                <span class="regular-price">&#8377; <?php echo ($row['price']-($row['discount']*$row['price'])/100) ?> </span>
                                            </div>         
                                            <?php if($row['stock']!='0'){ ?>
                                            <div class="add-to-cart">
                                             <a href="shop_action.php?id=<?php echo $row['id'] ?>&add=1">Add To Cart</a>
                                            </div>
                                            <?php }else{ ?>
                                            <div class="add-to-cart">
                                             <a style="color: red">Out of Stock</a>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
                            <?php } } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Product Area End-->
        
        <!--Banner Area Start-->
        <div class="banner-area pt-105">
            <div class="container-fluid pl-50 pr-50">
                <div class="row">
                    <div class="col-md-4">
                        <!--Single Banner Area Start-->
                        <div class="single-banner mb-35">
                            <div class="banner-img">
                                    <img src="img/banner/banner1.jpg" alt="">
                            </div>
                        </div>
                        <!--Single Banner Area End-->
                    </div>
                    <div class="col-md-4">
                        <!--Single Banner Area Start-->
                        <div class="single-banner mb-35">
                            <div class="banner-img">
                                    <img src="img/banner/banner2.jpg" alt="">
                            </div>
                        </div>
                        <!--Single Banner Area End-->
                    </div>
                    <div class="col-md-4">
                        <!--Single Banner Area Start-->
                        <div class="single-banner mb-35">
                            <div class="banner-img">
                                    <img src="img/banner/banner3.jpg" alt="">
                            </div>
                        </div>
                        <!--Single Banner Area End-->
                    </div>
                </div>
            </div>
        </div>
        <!--Banner Area End-->
        <!--Testimonial Area Start-->
        <div class="testimonial-area mt-75">
            <div class="container">
                <div class="row">
                    <!--Section Title Start-->
                    <div class="col-12">
                        <div class="section-title text-center mb-35">
                            <span>We love our clients</span>
                            <h3>What They’re Saying</h3>
                        </div>
                    </div>
                    <!--Section Title End-->
                </div>
                <div class="row testimonial-active owl-carousel">
                    <?php
                    $sel1="SELECT * FROM`".TBL_FEEDBACK."`";
                    $result1 = $database->query( $sel1 );
                    while($row1 = $database->fetch_array($result1))
                    {
                    ?>
                    <div class="col-12">
                        <!--Single Testimonial Start-->
                        <div class="single-testimonial text-center">
                            <div class="testimonial-img">
                                <img src="img/icon/admin.jpg" alt="">
                            </div>
                            <div class="testimonial-content">
                                <p><?php echo $row1['feedback'] ?></p>
                                <div class="testimonial-author">
                                    <h6><?php echo $row1['name'] ?><span>Customer</span></h6>
                                </div>
                            </div>
                        </div>
                        <!--Single Testimonial End-->
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--Testimonial Area End-->
        
        <!--Blog Area Start-->
        <div class="blog-area ml-50 mr-50 mt-105">
            <div class="container">
                <div class="row">
                    <!--Section Title Start-->
                    <div class="col-12">
                        <div class="section-title text-center mb-35">
                            <span>From The Blogs</span>
                            <h3>Our Latest Posts</h3>
                        </div>
                    </div>
                    <!--Section Title End-->
                </div>
                <div class="row">
                    <div class="blog-slider-active">
                        
                        <?php
                        $sel="SELECT * FROM`".TBL_BLOG."` WHERE `status`=1";
            			$result = $database->query( $sel );
            			while($row = $database->fetch_array($result))
                        {
                        ?>
                        <div class="col-md-4">
                            <!--Single Blog Start-->
                            <div class="single-blog">
                                <div class="blog-img img-full">
                                    <a href="blog.php?blog_id=<?php echo $row['id'] ?>">
                                        <img src="admin/uploads/<?php echo $row['image'] ?>" alt="" style="height: 300px;">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <div class="post-date"><?php $date=date_create($row['created_date']); echo date_format($date,"F d"); ?>, <?php echo date_format($date,"Y"); ?></div>
                                    <h3 class="post-title"><a href="blog.php?blog_id=<?php echo $row['id'] ?>"><?php echo $row['blog_title'] ?></a></h3>
                                    <p class="post-description"><?php echo $row['blog_description'] ?></p>
                                    <p class="post-author">
                                       <img src="img/icon/author.png" alt=""> <span>Posted by </span>
                                       <span>admin </span>
                                    </p>
                                </div>
                            </div>
                            <!--Single Blog End-->
                        </div>
                         <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <!--Blog Area End-->
        <!--News Letter Area Start-->
        <div class="news-letter-area mt-120 mb-120">
            <div class="container">
                <div class="row">
                    <!--Section Title Start-->
                    <div class="col-12">
                        <div class="section-title text-center mb-35">
                            <h3>Send Feedback</h3>
                        </div>
                    </div>
                    <!--Section Title End-->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="news-latter-box">
                            <p>Tell about us to improve ourself</p>
                            <div class="news-letter-form text-center">
                                <form action="index_action.php" method="POST">
                                   <div id="mc_embed_signup_scroll">
                                      <div id="mc-form" class="mc-form subscribe-form" >
                                        <input type="text" name="name" placeholder="Type your name here" style="background-color: gainsboro; margin-left: 10px;">
                                        <textarea style="height: 100px; width: 1000px; margin-left: -150px; border: 3px solid gainsboro" placeholder="We need your valuable feedback..." name="feedback"></textarea>
                                        <button id="mc-submit" style="position: absolute; top: 140px;" name="send">Send <i class="fa fa-chevron-right"></i></button>
                                      </div>
                                   </div>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--News Letter Area End-->
         <div id="brand">
      <?php include('includes/brand.php') ?>
    </div>
    

<div id="footer">
    <?php include('includes/footer.php') ?>
</div>
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
<span id="sa-position-sent"></span>
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
    <!-- Sweet-Alert  -->
    <script src="admin/assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="admin/assets/node_modules/sweetalert2/sweet-alert.init.js?v=2"></script>
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
<?php
if(isset($_SESSION['feedback_sent']))
{ 
?>
<script type="text/javascript">
$('#sa-position-sent').trigger('click');
</script>
<?php 
unset($_SESSION['feedback_sent']);
}
?>