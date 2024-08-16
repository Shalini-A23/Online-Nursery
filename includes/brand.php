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
<?php
@session_start();
if(!isset($_SESSION["lastviewed"]))     {
  $_SESSION["lastviewed"] = array();
}
$maxelements = 10;
if (isset($_GET['id']) && $_GET['id'] <> "") {// if we have url parameter

if (in_array($_GET['id'], $_SESSION["lastviewed"])) { // if product id is already in the array
  $_SESSION["lastviewed"] = array_diff($_SESSION["lastviewed"],array($_GET['id'])) ; // remove it
  $_SESSION["lastviewed"] = array_values($_SESSION["lastviewed"]); //optionally, re-index the array
}

if (count($_SESSION["lastviewed"]) >= $maxelements) {//check the number of array elements
$_SESSION["lastviewed"] = array_slice($_SESSION["lastviewed"],1); // remove the first element if we have 5 already
array_push($_SESSION["lastviewed"],$_GET['id']);//add the current itemid to the array
} else {
array_push($_SESSION["lastviewed"],$_GET['id']);//add the current itemid to the array
}

}
$criteria = (isset($_SESSION["lastviewed"])?implode(", ",$_SESSION["lastviewed"]):"-1");
foreach(array_reverse($_SESSION['lastviewed'],true) as $last)
{
    $sel19="SELECT * FROM `".TBL_PRODUCT."` WHERE id='".$last."' ";
    $result19 = $database->query( $sel19 );
} 
?>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="swiper.min.css">
    <link rel="stylesheet" type="text/css" href="swiper_style.css">
    <script type="text/javascript" href="js/swiper_script.js"></script>
<?php if(($_SESSION['lastviewed'])!=null){ ?>
<!--Related Product Start-->
<div style="background-color: #e5e5e5">

        <div class="Related-product mt-105 mb-100">
            <div class="container">
                <div class="row">
                    <!--Section Title Start-->
                    <div class="col-12">
                        <div class="section-title text-center mb-35">
                          <br><br>
                            <h3>Recently viewed</h3>
                        </div>
                    </div>
                    <!--Section Title End-->
                </div>
                <div class="row swiper-container">
                    <div class="product-slider-activ swiper-wrapper">
                        <?php 
                    foreach(array_reverse($_SESSION['lastviewed'],true) as $last)
                    { 
                      $sel9="SELECT * FROM `".TBL_PRODUCT."` WHERE id='".$last."' ";
                      $result9 = $database->query( $sel9 );
                      $row9=$database->fetch_array($result9);
                    ?>
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 swiper-slide" style="height: 410px;">
                            <!--Single Product Start-->
                            <div class="single-product mb-25 imgBx" style="height: 390px; margin-top: 10px;">
                                <div class="product-img img-full">
                                    <a href="single-product.php?id=<?php echo $row9['id'] ?>">
                                        <img src="admin/uploads/<?php echo $row9['image'] ?>" alt="" >
                                    </a>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" class="open" id="id" data-id="<?php echo $row9['id'] ?>"><i class="fa fa-search"></i></a></li>
                                            <li>
                                            <?php 
                                            $query1 = "SELECT * FROM `tbl_product` JOIN `tbl_wishlist` on tbl_product.id='".$row9['id']."' AND tbl_wishlist.product_id='".$row9['id']."' and tbl_wishlist.user_id='".$_SESSION['user_id']."' ";
                                            $result1 = $database->query($query1);
                                            $row1 = $database->fetch_array($result1);
                                            if($row1['product_id']!=null)
                                            { ?>
                                                <a href="shop_action.php?remove_wishlist=1&id=<?php echo $row9['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI'].'#brand' ?>" title="Whishlist"><i class="fa fa-heart"></i></a>
                                            <?php }
                                            else
                                            { ?>
                                                <a href="shop_action.php?wishlist=1&id=<?php echo $row9['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI'].'#brand' ?>" title="Whishlist"><i class="fa fa-heart-o"></i></a>
                                            <?php } ?>

                                            </li>
                                            <li><a href="compare.php?compare_id=<?php echo $row9['id'] ?>" title="Compare"><i class="fa fa-refresh"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <h2><a href="single-product.php?id=<?php echo $row9['id'] ?>"><?php echo $row9['product_name']; ?></a></h2>
                                    <div class="product-price">
                                        <div class="price-box">
                                            <div class="single-product-price">
                                            <?php if($row9['discount']!=0){ ?>
                                                <span class="price new-price">&#8377;<?php echo $row9['price'] ?></span><?php } ?>
                                                <span class="regular-price">&#8377;<?php $sub=($row9['discount']*$row9['price'])/100; $price=$row9['price']-$sub; echo $price ?></span>
                                            </div>
                                        </div>
                                        <?php if($row9['stock']!='0'){ ?>
                                            <div class="add-to-cart">
                                             <a href="shop_action.php?id=<?php echo $row9['id'] ?>&add=1">Add To Cart</a>
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
                  <?php } ?>

                    </div>
                </div>
            </div>
        </div>
      </div>
        <!-- Add Pagination -->
    
    <?php } ?>
        <!--Related Product End-->
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
<script type="text/javascript" src="js/swiper.min.js"></script>
  <script>

  var swiper = new Swiper('.swiper-container', {
  effect: 'coverflow',
  loop: false,
  centeredSlides: true,
  slidesPerView: 'auto',
  initialSlide: 1,
  keyboardControl: true,
  mousewheelControl: true,
  lazyLoading: true,
  preventClicks: true,
  preventClicksPropagation: true,
  lazyLoadingInPrevNext: true,
    grabCursor: true,
      coverflowEffect: 
      {
        rotate: 40,
        stretch: 0,
        depth: 0,
        modifier: 1,
        slideShadows : true,
      },
      pagination: 
      {
        el: '.swiper-pagination',
      },
});

  </script>