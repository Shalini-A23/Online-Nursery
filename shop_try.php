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
    <div class="shop-area mb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-2 order-lg-2">
                    <!--Product Category Widget Start-->
                    <div class="shop-sidebar">
                        <h4>Product Categories</h4>
                        <div class="categori-checkbox">
                                <ul>
                                    <?php 
                                    $sel="SELECT * from `".TBL_CATEGORY."` WHERE `status` != 2";
                                    $result = $database->query($sel);
                                    while($row = $database->fetch_array($result))
                                    {
                                    ?> 

                                    <li><input class="common_selector category" type="checkbox" value="<?php echo $row['id'] ?>"><a href="shop_try.php?id=<?php echo $row['id'] ?>&page=1"><?php echo $row['category_name'] ?></a><span class="count">
                                      (
                                        <?php
                                        $sql="SELECT COUNT(*) FROM `".TBL_PRODUCT."` where `category_id`='".$row['id']."' "; 
                                        $result1 = $database->query($sql); 
                                        $row1=$database->fetch_array($result1); 
                                        echo $row1[0];
                                        ?>
                                      )
                                    </span></li>
                                    <?php  } ?>
                                </ul>
                        </div>
                    </div>
                    <!--Product Category Widget End-->
                    <!--Color Category Widget Start-->
                    <div class="shop-sidebar">
                        <h4>Discount</h4>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <?php
                                    $sql2="SELECT count(*) FROM `".TBL_PRODUCT."` where `discount`<='90' and `discount`>='61' "; 
                                    $result2 = $database->query($sql2); 
                                    $row2=$database->fetch_array($result2);
                                    $sql3="SELECT count(*) FROM `".TBL_PRODUCT."` where `discount`<='60' and `discount`>='31' "; 
                                    $result3 = $database->query($sql3); 
                                    $row3=$database->fetch_array($result3);
                                    $sql4="SELECT count(*) FROM `".TBL_PRODUCT."` where `discount`<='30' and `discount`>='0' "; 
                                    $result4 = $database->query($sql4); 
                                    $row4=$database->fetch_array($result4);
                                    ?>
                                    <li><input name="product-categori" type="checkbox"><a href="shop_try.php?discount1=90&discount2=61&page=1">90% - 61%</a><span class="count">(<?php echo $row2[0] ?>)</span></li>
                                    <li><input name="product-categori" type="checkbox"><a href="shop_try.php?discount1=60&discount2=31&page=1">60% - 31%</a><span class="count">(<?php echo $row3[0] ?>)</span></li>
                                    <li><input name="product-categori" type="checkbox"><a href="shop_try.php?discount1=30&discount2=0&page=1">30% - 0%</a><span class="count">(<?php echo $row4[0] ?>)</span></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!--Color Category Widget End-->
                    <!--Price Filter Widget Start-->
                    <div class="shop-sidebar">
                        <h4>Filter by price</h4>
                        <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <label>Price : </label>
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price"/>
                                    </div>
                                    <button type="button">Filter</button> 
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
                                <li>
                                    <div class="rc-product-thumb img-full">
                                        <a href="single-product.php"><img src="img/product/product12.jpg" alt=""></a>
                                    </div>
                                    <div class="rc-product-content">
                                        <h6><a href="single-product.php">Condimentum posuere</a></h6>
                                        <div class="rc-product-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rc-product-price">
                                                <span class="price">$72.00</span>
                                            </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="rc-product-thumb img-full">
                                        <a href="single-product.php"><img src="img/product/product12.jpg" alt=""></a>
                                    </div>
                                    <div class="rc-product-content">
                                        <h6><a href="single-product.php">Condimentum posuere</a></h6>
                                        <div class="rc-product-review">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="rc-product-price">
                                                <span class="price">$72.00</span>
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
                    <!--Product Tags Widget Start-->
                    <div class="shop-sidebar">
                        <h4>Product Tags</h4>
                        <div class="product-tag">
                            <ul>
                                <li><a href="#">blouse</a></li>
                                <li><a href="#">clothes</a></li>
                                <li><a href="#">fashion</a></li>
                                <li><a href="#">handbag</a></li>
                                <li><a href="#">laptop</a></li>
                            </ul>
                        </div>
                    </div>
                    <!--Product Tags Widget End-->
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
                                         <select class="wide" name="choose">
                                             <option data-display="Select">Nothing</option>
                                             <option value="Relevance">Relevance</option>
                                             <option value="Name, A to Z">Name, A to Z</option>
                                             <option value="Name, Z to A">Name, Z to A</option>
                                             <option value="Price, low to high">Price, low to high</option>
                                             <option value="Price, high to low">Price, high to low</option>
                                         </select>
                                     </div>
                                     <p class="show-product">Showing <?php echo $page_first_result+1 ?>–<?php echo $page_first_result+$results_per_page ?> of <?php echo $number_of_result ?> results</p>
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
                                      <?php 
                                            if(isset($_GET['id'])){
                                            $sql1="SELECT * from `".TBL_PRODUCT."` WHERE `status` = 1 and `category_id`='".$_GET['id']."' LIMIT " . $page_first_result . ',' . $results_per_page;
                                            }
                                            elseif(isset($_GET['discount1']) && isset($_GET['discount2'])){
                                            $sql1="SELECT * from `".TBL_PRODUCT."` WHERE `status` = 1 and `discount`<='".$_GET['discount1']."' and `discount`>='".$_GET['discount2']."' LIMIT " . $page_first_result . ',' . $results_per_page;
                                            }
                                            else{
                                            $sql1="SELECT * from `".TBL_PRODUCT."` WHERE `status` = 1 LIMIT " . $page_first_result . ',' . $results_per_page;
                                            }
                                            $result1 = $database->query($sql1);
                                            while($row1 = $database->fetch_array($result1))
                                            {  
                                            ?>
                                        <div class="product-list-item mb-40">

                                            <div class="row">
                                                
                                                <!--Single List Product Start-->
                                                <div class="col-md-4">
                                                    <div class="single-product">
                                                        <div class="product-img img-full">
                                                            <a href="single-product.php">
                                                                    <img src="admin/uploads/<?php echo $row1['image'] ?>" alt="">
                                                                </a>
                                                                <span class="onsale">Sale!</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="product-content shop-list">
                                                        <h2><a href="single-product.php"><?php echo $row1['product_name'] ?></a></h2>
                                                        <div class="product-reviews">
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o"></i>
                                                            </div>
                                                            <div class="product-description">
                                                                <p><?php echo $row1['product_description'] ?></p>
                                                            </div>
                                                            <div class="product-price">
                                                                <div class="price-box">
                                                                    <span class="price"><?php if($row1['discount']!='0'){ ?>&#8377;<?php echo $row1['price'] ?><?php } ?></span>
                                                                    <span class="regular-price">&#8377;<?php $sub=($row1['discount']*$row1['price'])/100; $price=$row1['price']-$sub; echo $price ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="product-list-action">
                                                               <div class="add-btn">
                                                                    <a href="#">Add To Cart</a>
                                                                </div>
                                                                <ul>
                                                                    <li><a href="#open-modal" data-toggle="modal" title="Quick view"><i class="fa fa-search"></i></a></li>
                                                                    <li><a href="#" title="Whishlist"><i class="fa fa-heart-o"></i></a></li>
                                                                    <li><a href="#" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                                                </ul>
                                                            </div>
                                                    </div>
                                                </div>
                                                <!--Single List Product End-->

                                            </div>
                                            
                                        </div>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <!--Pagination Start-->
                                <div class="product-pagination">
                                    <ul>
                                      <?php 
                                          for($page = 1; $page<= $number_of_page; $page++) 
                                          { ?> 
                                        <li <?php if($page==$_GET['page']){?> class="active" <?php } ?> ><a href = "shop_try.php?page=<?php echo $page ?>"><?php echo $page ?></a></li>
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
                    <?php                   
                    $sql1="SELECT * from `".TBL_PRODUCT."` WHERE `status` = 1 and `id`='".$_GET['id']."' ";
                    $result1 = $database->query($sql1);
                    $row1 = $database->fetch_array($result1);
                    ?> 
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
                            <h1>Product 001</h1>
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
  <script type="text/javascript">
/*    var sliderrange = $('#slider-range');
var amountprice = $('#amount');
$(function() {
    sliderrange.slider({
        range: true,
        <?php 
        $sql5="SELECT MIN(price) FROM `".TBL_PRODUCT."` "; 
        $result5 = $database->query($sql5); 
        $row5=$database->fetch_array($result5); 
        $sql6="SELECT MAX(price) FROM `".TBL_PRODUCT."` "; 
        $result6 = $database->query($sql6); 
        $row6=$database->fetch_array($result6); 
        ?>
        min: <?php echo $row5[0]?> ,
        max: <?php echo $row6[0]?> ,
        values: [0, <?php echo $row6[0]?>],
        slide: function(event, ui) {
            amountprice.val("Rs." + ui.values[0] + " - Rs." + ui.values[1]);
        }
    });
    amountprice.val("Rs." + sliderrange.slider("values", 0) +
        " - Rs." + sliderrange.slider("values", 1));
});*/

  </script>

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

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var minimum_price = $('#hidden_minimum_price').val();
        var maximum_price = $('#hidden_maximum_price').val();
        var category = get_filter('category');
        var ram = get_filter('ram');
        var storage = get_filter('storage');

        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, minimum_price:minimum_price, maximum_price:maximum_price, category:category, ram:ram, storage:storage},
            success:function(data){
                $('.filter_data').html(data);

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
    });

    $('#price_range').slider({
        range:true,
        min:1000,
        max:65000,
        values:[1000, 65000],
        step:500,
        stop:function(event, ui)
        {
            $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
            $('#hidden_minimum_price').val(ui.values[0]);
            $('#hidden_maximum_price').val(ui.values[1]);
            filter_data();
        }
    });

});
</script>
</body>

</html>
