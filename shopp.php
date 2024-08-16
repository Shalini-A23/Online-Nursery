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
  <title>Shop Right Sidebar || Plantmore</title>
  <meta name="description" content="">
  <meta name="robots" content="noindex, follow" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, follow" />
  <!-- Place favicon.ico in the root directory -->
  <link rel="shortcut icon" type="image/x-icon" href="img/logo-icon1.png">
    <!--All Css Here-->
    
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
  <style type="text/css">
    .label-input input {
  width: 120px;
}
  </style>
</head>
<body>
  <!--[if lt IE 8]>
  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
  <![endif]-->

  <div class="wrapper">
    <?php include('includes/header1.php') ?>
    <!--Shop Area Start-->
    <?php 
    if(isset($_SESSION['order']))
    {
      echo '<script>alert("Your order is placed")</script>';
      unset($_SESSION['order']);
    }
    ?>
    <div class="shop-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-2">
                    <!--Product Category Widget Start-->
                    <div class="shop-sidebar">
                        <h4>Search</h4>
                          <input type="text" placeholder="Type to search..." style="width: 220px; height: 40px;" id="search" class="common_selector">
                          &nbsp;&nbsp;<button id="button" style="padding: 5px; background-color: #abd373;"><i class="fa fa-search"></i></button>
                        <br><br>
                        <h4>Product Categories</h4>
                        <div class="categori-checkbox">
                                <ul>
                                    <?php 
                                    $sel="SELECT * from `".TBL_CATEGORY."` WHERE `status` != 2";
                                    $result = $database->query($sel);
                                    $j=1;
                                    while($row = $database->fetch_array($result))
                                    {
                                    ?> 

                                    <li><input name="product-categori" class="common_selector category" type="checkbox" value="<?php echo $row['id'] ?>"><a href="shop.php?id=<?php echo $row['id'] ?>&page=1"><?php echo $row['category_name'] ?></a><span class="count">
                                      (
                                        <?php
                                        $sql="SELECT COUNT(*) FROM `".TBL_PRODUCT."` where `category_id`='".$row['id']."' "; 
                                        $result1 = $database->query($sql); 
                                        $row1=$database->fetch_array($result1); 
                                        echo $row1[0];
                                        ?>
                                      )
                                    </span></li>
                                    <?php $j++; } ?>
                                </ul>
                        </div>
                    </div>
                    <!--Product Category Widget End-->
                    <!--Color Category Widget Start-->
                    <div class="shop-sidebar">
                        <h4>Filter by Discount</h4>
                        <div class="price-filter">
                                <div id="discount-range" ></div>
                                <div class="price-slider-amount">
                                <?php 
                                $sqlo="SELECT MIN(discount) FROM `".TBL_PRODUCT."` where discount>0 "; 
                                $resulto = $database->query($sqlo); 
                                $rowo=$database->fetch_array($resulto); 
                                $sqlo1="SELECT MAX(discount) FROM `".TBL_PRODUCT."` "; 
                                $resulto1 = $database->query($sqlo1); 
                                $rowo1=$database->fetch_array($resulto1); 
                                ?>
                                    <div class="label-input">
                                        <label>Discount :</label>
                                        <span id="discount_show"><?php echo $rowo[0] ?>% - <?php echo $rowo1[0] ?>%</span>
                                        <input type="hidden" id="hidden_minimum_discount" value="0">
                                        <input type="hidden" id="hidden_maximum_discount" value="<?php echo $rowo1[0] ?>">
                                    </div>
                                    
                                </div>
                            </div>
                    </div>
                    
                    <!--Color Category Widget End-->
                    <!--Price Filter Widget Start-->
                    <div class="shop-sidebar">
                        <h4>Filter by price</h4>
                        <div class="price-filter">
                                <div id="slider-range" ></div>
                                <div class="price-slider-amount">
                                <?php 
                                $sql15="SELECT MIN(price) FROM `".TBL_PRODUCT."` "; 
                                $result15 = $database->query($sql15); 
                                $row15=$database->fetch_array($result15); 
                                $sql16="SELECT MAX(price) FROM `".TBL_PRODUCT."` "; 
                                $result16 = $database->query($sql16); 
                                $row16=$database->fetch_array($result16); 
                                ?>
                                    <div class="label-input">
                                        <label>Price :</label>
                                        <span id="price_show">Rs. <?php echo $row15[0] ?> - Rs. <?php echo $row16[0] ?></span>
                                        <input type="hidden" id="hidden_minimum_price" value="0">
                                        <input type="hidden" id="hidden_maximum_price" value="<?php echo $row16[0] ?>">
                                    </div>
                                    
                                </div>
                            </div>
                    </div>
                    <!--Price Filter Widget End-->
                    <!--Recent Product Widget Start-->
                    <div class="shop-sidebar">
                        <h4>Top Rated Products</h4>
                        <div class="rc-product">
                            <ul>
                                <li>
                                    <div class="rc-product-thumb img-full">
                                        <a href="single-product.php"><img src="img/product/product13.jpg" alt=""></a>
                                    </div>
                                    <div class="rc-product-content">
                                        <h6><a href="single-product.php">Ornare sed consequat</a></h6>
                                        <div class="rc-product-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rc-product-price">
                                                <span class="price">$66.00</span>
                                            </div>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                    <!--Recent Product Widget End-->
                    <!--Banner Widget Start-->
                    <div class="shop-sidebar">
                            <div class="sidebar-banner single-banner">
                            <div class="banner-img">
                                <a href="#"><img src="img/banner/shop-sidebar.jpg" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <!--Banner Widget End-->
                </div>
                <div class="col-lg-9 order-1 order-lg-1">
                    <div class="shop-layout">
                           <!--Breadcrumb One Start-->
                            <div class="breadcrumb-one mb-120">
                                <div class="breadcrumb-img">
                                    <img src="img/page-banner/shop-banner-1.jpg" alt="">
                                </div>
                                <div class="breadcrumb-content">
                                    <ul>
                                        <li><a href="index.php">Home</a></li>
                                        <li class="active">Shop Right Sidebar</li>
                                    </ul>
                                </div>
                            </div>
                           <!--Breadcrumb One End-->
                        <!--Grid & List View Start-->
                        <div class="shop-topbar-wrapper d-md-flex justify-content-md-between align-items-center" id="myTable">
                            <div class="grid-list-option">
                                 <ul class="nav">
                                      <li>
                                        <a class="active" data-toggle="tab" href="#grid"><i class="fa fa-th-large"></i></a>
                                      </li>
                                      <li>
                                        <a data-toggle="tab" href="#list"><i class="fa fa-th-list"></i></a>
                                      </li>
                                    </ul>
                             </div>
                             <!--Toolbar Short Area Start-->
                             <div class="toolbar-short-area d-md-flex align-items-center">
                                     <div class="toolbar-shorter ">
                                        <label>Sort By:</label>
                                         <select class="wide" name="sort" id="sort">
                                             <option value="asc">Name, A to Z</option>
                                             <option value="desc">Name, Z to A</option>
                                             <option value="ASC">Price, low to high</option>
                                             <option value="DESC">Price, high to low</option>
                                         </select>
                                     </div>
                                     <p class="show-product">Showing results</p>
                              </div>
                             <!--Toolbar Short Area End-->
                        </div>
                        <!--Grid & List View End-->
                        <!--Shop Product Start-->
                        <div class="shop-product">
                            <div id="myTabContent-2" class="tab-content">
                                <div id="grid" class="tab-pane fade show active">
                                    <div class="product-grid-view">
                                        <div class="row filter_data">
                                            
                                            
                                        </div>
                                    </div>
                                </div>
                                <!--List view-->
                                <div id="list" class="tab-pane fade">
                                    <div class="product-list-view">
                                        <div class="product-list-item mb-40">
                                            <div class="row filter_data1">
                                                
                                                
                                            </div>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <!--Pagination Start-->
                                <div class="product-pagination">
                                    <ul>
                                      <?php 
                                          for($page = 1; $page<= $number_of_page; $page++) 
                                          { ?> 
                                        <li <?php if($page==$_GET['page']){?> class="active" <?php } ?> ><a href = "shop.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>
                                        <?php
                                          }?>
                                    </ul>
                                </div>
                                <!--Pagination End-->
                            </div>
                        </div>
                        <!--Shop Product End-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Shop Area End-->
    
       <div id="brand">
      <?php include('includes/brand.php') ?>
    </div><?php include('includes/footer.php') ?>
    <!-- Modal Area Strat -->
        <div class="modal fade" id="open-modal" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
              </div>
              <div class="modal-body">
                <div class="row">
                    <!--Modal Img-->
                    <div class="col-md-5">
                        <!--Modal Tab Content Start-->
                        <div class="tab-content product-details-large" id="myTabContent">
                          <div class="tab-pane fade show active" id="single-slide1" role="tabpanel" aria-labelledby="single-slide-tab-1">
                              <!--Single Product Image Start-->
                              <div class="single-product-img img-full">
                                <img src="img/single-product/large/single-product1.jpg" alt="">
                              </div>
                              <!--Single Product Image End-->
                          </div>
                          
                        </div>
                        <!--Modal Content End-->
                    </div>
                    <!--Modal Img-->
                    <!--Modal Content-->
                    <div class="col-md-7">
                        <div class="modal-product-info">
                            <h1 id="edit-product-name">ID - <?php echo $_GET['id'] ?></h1>
                            <div class="modal-product-price">
                               <span class="old-price">$74.00</span>
                               <span class="new-price">$69.00</span>
                           </div>
                           <a href="single-product.php" class="see-all">See all features</a>
                           <div class="add-to-cart quantity">
                                <form class="add-quantity" action="#">
                                     <div class="modal-quantity">
                                         <input type="number" value="1">
                                     </div>
                                    <div class="add-to-link">
                                        <button class="form-button" data-text="add to cart">add to cart</button>
                                    </div>
                                </form>
                           </div>
                           <div class="cart-description">
                               <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco,Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus.</p>
                           </div>
                            
                        </div>
                    </div>
                    <!--Modal Content-->
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal Area End -->
  </div>
    <!--All Js Here-->
    
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
<style>
#loading
{
 text-align:center; 
 background: url('loader.gif') no-repeat center; 
 height: 150px;
}
</style>

<script>

$(document).ready(function(){

    filter_data();
    filter_data1();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var minimum_discount = $('#hidden_minimum_discount').val();
        var maximum_discount = $('#hidden_maximum_discount').val();
        var category = get_filter('category');
        var search=$("#search").val();
        var sort=$("#sort").val();
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, category:category, minimum_discount:minimum_discount, maximum_discount:maximum_discount,search:search,sort:sort},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }
     $('#sort').on('change', function(){
      filter_data();
      filter_data1();
     }); 
    $("#button").click(function(){
      filter_data();
      filter_data1();
    });
    $('#search').keyup(function(e) {
      if(e.keyCode == 13) {
        filter_data();
        filter_data1();
      }
    });
    function filter_data1()
    {
        $('.filter_data1').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data1';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var minimum_discount = $('#hidden_minimum_discount').val();
        var maximum_discount = $('#hidden_maximum_discount').val();
        var category = get_filter('category');
        var search=$("#search").val();
        var sort=$("#sort").val();
        $.ajax({
            url:"fetch_data1.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, category:category, minimum_discount:minimum_discount, maximum_discount:maximum_discount, search:search,sort:sort},
            success:function(data){
                $('.filter_data1').html(data);
            }
        });
    }
    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }
    $('.common_selector').click(function(){
        filter_data();
        filter_data1();
    });

    $('#slider-range').slider({
        <?php 
        $sql25="SELECT MIN(price) FROM `".TBL_PRODUCT."` "; 
        $result25 = $database->query($sql25); 
        $row25=$database->fetch_array($result25); 
        $sql26="SELECT MAX(price) FROM `".TBL_PRODUCT."` "; 
        $result26 = $database->query($sql26); 
        $row26=$database->fetch_array($result26); 
        ?>
        range:true,
        min:<?php echo $row25[0]?>,
        max:<?php echo $row26[0]?>,
        values: [0, <?php echo $row26[0]?>],
        
        stop:function(event, ui)
        {
            $('#price_show').html("Rs. " + ui.values[0] + ' - Rs. ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
            filter_data1();
        }
    });
    $('#discount-range').slider({
        <?php 
        $sql35="SELECT MIN(discount) FROM `".TBL_PRODUCT."` WHERE discount >0 "; 
        $result35 = $database->query($sql35); 
        $row35=$database->fetch_array($result35); 
        $sql36="SELECT MAX(discount) FROM `".TBL_PRODUCT."` "; 
        $result36 = $database->query($sql36); 
        $row36=$database->fetch_array($result36); 
        ?>
        range:true,
        min:<?php echo $row35[0]?>,
        max:<?php echo $row36[0]?>,
        values: [0, <?php echo $row36[0]?>],
        
        stop:function(event, ui)
        {
            $('#discount_show').html(ui.values[0] + '% - ' + ui.values[1] + '%');
            $('#hidden_minimum_discount').val(ui.values[0]);
            $('#hidden_maximum_discount').val(ui.values[1]);
            filter_data();
            filter_data1();
        }
    });
});
     
</script>

</body>

</html>