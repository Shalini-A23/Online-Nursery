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

  <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="swiper.min.css">
    <link rel="stylesheet" type="text/css" href="swiper_style.css">
    <script type="text/javascript" href="js/swiper_script.js"></script>

	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Single Product || Plantmore</title>
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
  <script type="text/javascript">
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 40;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>
  <style type="text/css">
    .img-magnifier-container {
  position:relative;
}

.img-magnifier-glass {
  position: absolute;
  border: 3px solid #000;
  border-radius: 50%;
  cursor: none;
  width: 200px;
  height: 200px;
}

  </style>
</head>
<body>
	<!--[if lt IE 8]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div class="wrapper">
		<?php include('includes/header1.php') ?>
    <!--Breadcrumb One Start-->
		<div class="breadcrumb-one mb-120">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumb-img">
                            <img src="img/page-banner/product-banner.jpg" alt="">
                        </div>
                        <div class="breadcrumb-content">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="shop.php">Shop</a></li>
                                <li class="active">Single Product</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!--Breadcrumb One End-->
		<!--Single Product Area Start-->
		<div class="single-product-area mb-115">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12 col-lg-5">
		                <!--<div class="product-details-img-tab">-->
                      <?php 
                        $sql="SELECT * from `".TBL_PRODUCT."` WHERE `status` = 1 and `id`='".$_GET['id']."' ";
                        $result = $database->query($sql);
                        while($row = $database->fetch_array($result))
                        {
                          $_SESSION['category_id']=$row['category_id'];
                        ?>
                    <div class="product-details-img-tab">
                        <!--Product Tab Content Start-->
                        <div class="tab-content single-product-img">
                              <div class="tab-pane fade show active" id="product1">
                                  <div class="product-large-thumb img-full">
                                     <div class="img-magnifier-container">
                                        <a href="admin/uploads/<?php echo $row['image'] ?>">
                                            <img src="admin/uploads/<?php echo $row['image'] ?>" alt="" id="myimage">
                                        </a>
                                        <a href="admin/uploads/<?php echo $row['image'] ?>" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-search"></i></a>
                                     </div>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="product2">
                                  <div class="product-large-thumb img-full">
                                     <div class="easyzoom easyzoom--overlay">
                                        <a href="admin/uploads/<?php echo $row['image1'] ?>"> 
                                          <img src="admin/uploads/<?php echo $row['image1'] ?>" alt="">
                                        </a>
                                        <a href="admin/uploads/<?php echo $row['image1'] ?>" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-search"></i></a>
                                     </div>
                                  </div>
                              </div>
                              <div class="tab-pane fade" id="product3">
                                  <div class="product-large-thumb img-full">
                                     <div class="easyzoom easyzoom--overlay">
                                        <a href="admin/uploads/<?php echo $row['image2'] ?>">
                                          <img src="admin/uploads/<?php echo $row['image2'] ?>" alt="">
                                        </a>
                                        <a href="admin/uploads/<?php echo $row['image2'] ?>" class="popup-img venobox" data-gall="myGallery"><i class="fa fa-search"></i></a>
                                     </div>
                                  </div>
                              </div>
                              
                            
                            </div>
                        <!--Product Tab Content End-->
                        <!--Product Tab Menu Start-->
                        <div class="product-menu">
                            <div class="nav product-tab-menu">
                                  <div class="product-details-img">
                                    <a class="active" data-toggle="tab" href="#product1"><img src="admin/uploads/<?php echo $row['image'] ?>" alt=""></a>
                                  </div>
                                  <div class="product-details-img">
                                    <a data-toggle="tab" href="#product2"><img src="admin/uploads/<?php echo $row['image1'] ?>" alt=""></a>
                                  </div>
                                  <div class="product-details-img">
                                    <a data-toggle="tab" href="#product3"><img src="admin/uploads/<?php echo $row['image2'] ?>" alt=""></a>
                                  </div>
                                  
                                </div>
                        </div>
                        <!--Product Tab Menu End-->
                    </div>
		            </div>
		            <div class="col-md-12 col-lg-7">
                        <!--Product Details Content Start-->
		                <div class="product-details-content">
		                    <h2><?php echo $row['product_name'] ?></h2>
		                    <div class="single-product-reviews">
                          <?php 
                          $sel3="SELECT SUM(rating)/COUNT(rating) FROM `".TBL_REVIEW."` WHERE product_id='".$_GET['id']."' ";
                          $result3 = $database->query( $sel3 );
                          while($row3=$database->fetch_array($result3))
                          {
                          ?>
                                <?php
                                if($row3[0]!='0')
                                {
                                  $i=$row3[0];
                                  if(number_format((float)$row3[0],1,'.','')=='0.0')
                                  {
                                    echo "";
                                  }else
                                  { ?>
                                    <span><?php echo number_format((float)$row3[0],1,'.','') ?></span>
                                  <?php }
                                }
                                if($row3[0]!=null)
                                {
                                  $z=(int)$row3[0];
                                  for($j=1;$j<=$z;$j++) 
                                  {?>
                                   <i class="fa fa-star"></i>
                                  <?php 
                                  }
                                  $b=5-$z;
                                  if($b!=0)
                                  {
                                    $x=$row3[0]-$z;
                                    if($x==0)
                                    {
                                    for($i=0;$i<$b;$i++){  
                                    ?>
                                      <i class="fa fa-star-o"></i>
                                    <?php }
                                    }else
                                    { ?>
                                      <i class="fa fa-star-half-o"></i>
                                    <?php 
                                    }
                                  } 
                                }
                                else
                                {
                                  for($j=1;$j<=5;$j++) 
                                  {?>
                                   <i class="fa fa-star-o"></i>
                                  <?php 
                                  }
                                }
                            }
                            ?>
                                <?php 
                                $sel11="SELECT COUNT(*) FROM `".TBL_REVIEW."` where review!='' AND product_id='".$_GET['id']."' ";
                                $result11 = $database->query( $sel11 );
                                $row11=$database->fetch_array($result11);
                                ?>
                                <?php if($row11[0]!='0'){ ?>
                                <a class="review-link" href="#open">(<?php echo $row11[0] ?> customer review)</a>
                                <?php } 
                                if(number_format((float)$i,1,'.','')=='0.0')
                                  {
                                  ?>
                                  <span style="color: grey">(No rating)</span>
                                  <?php } ?>
                            </div>
                            <div class="single-product-price">
                                <?php if($row['discount']!=0){ ?><span class="price new-price">&#8377;<?php echo $row['price'] ?></span><span style="color: mediumseagreen">(<?php echo $row['discount'] ?>% off)</span><br><?php } ?>
                                <span class="regular-price">&#8377;<?php $sub=($row['discount']*$row['price'])/100; $price=$row['price']-$sub; echo $price ?></span>
                            </div>
                            <div class="product-description">
                                <p><?php echo $row['product_description'] ?></p>
                            </div>
                            <?php if($row['stock']!='0'){ ?>
                            <p class="stock in-stock"><?php echo $row['stock'] ?> in stock</p>
                            <div class="single-product-quantity">
                                <form class="add-quantity" action="shop_action.php" method="post">
                                     <div class="product-quantity">
                                         <input type="number" min="1" max="<?php echo $row['stock'] ?>" name="quantity" value="1">
                                     </div>
                                    <div class="add-to-link">
                                        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                                        <button class="product-btn" data-text="add to cart" name="add_wid_quantity">add to cart</button>
                                    </div>
                                </form>
                           </div>
                            <?php }else{ ?>
                            <p style="color:red"><i class="fa fa-close"></i>&nbsp;OUT OF STOCK</p>
                            <?php } ?>
                            
                           
                            <div class="wishlist-compare-btn">
                           <?php
                           $query1 = "SELECT * FROM `tbl_product` JOIN `tbl_wishlist` on tbl_product.id='".$row['id']."' AND tbl_wishlist.product_id='".$row['id']."' and tbl_wishlist.user_id='".$_SESSION['user_id']."' ";
                           $result1 = $database->query($query1);
                           $row1 = $database->fetch_array($result1);
                           if($row1['product_id']==null)
                           {
                           ?>
                                <a href="shop_action.php?id=<?php echo $row['id'] ?>&wishlist=1&page=<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" class="wishlist-btn">Add to Wishlist</a>
                          <?php }else{ ?>
                                <a href="shop_action.php?id=<?php echo $row['id'] ?>&remove_wishlist=1&page=<?php echo htmlspecialchars($_SERVER['REQUEST_URI']) ?>" class="wishlist-btn" style="background-color: tomato; color: white">Wishlist</a>
                          <?php } ?>
                                <a href="compare.php?compare_id=<?php echo $row['id'] ?>" class="add-compare">Compare</a>
                            </div>
                            <div class="product-meta" id="open">
                                <span class="posted-in">
                                        Category: 
		                                <a href="#"><?php
                                    $sql1="SELECT * from `".TBL_CATEGORY."` WHERE `id` = '".$row['category_id']."' ";
                                    $result1 = $database->query($sql1);
                                    $row1=$database->fetch_array($result1); 
                                    echo $row1['category_name'] ?></a>
		                            </span>
                            </div>
		                </div>
                  <?php } ?>
		                <!--Product Details Content End-->
		            </div>
		        </div>
		    </div>
		</div>
		<!--Single Product Area End-->
		<!--Product Description Review Area Start-->
		<div class="product-description-review-area mb-100">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		                <div class="product-review-tab">
		                    <!--Review And Description Tab Menu Start-->
		                    <ul class="nav dec-and-review-menu">
                              <li>
                                <a class="active" data-toggle="tab" href="#description">Description</a>
                              </li>
                              <?php if($row11[0]!='0'){ ?>
                              <li>
                                <a data-toggle="tab" href="#reviews">Reviews (<?php echo $row11[0] ?>)</a>
                              </li>
                             <?php } ?>
                            </ul>
		                    <!--Review And Description Tab Menu End-->
		                    <!--Review And Description Tab Content Start-->
		                    <div class="tab-content product-review-content-tab" id="myTabContent-4">
                              <div class="tab-pane fade active show" id="description">
                                  <div class="single-product-description">
                                     <?php
                                     $sel10="SELECT product_description FROM `".TBL_PRODUCT."` WHERE id='".$_GET['id']."' ";
                                     $result10 = $database->query( $sel10 );
                                     $row10=$database->fetch_array($result10);
                                     ?>
                                     <p><?php echo $row10[0] ?></p>
                                  </div>
                              </div>
                              <?php if($row11[0]!='0')
                                                        { ?>
                              <div class="tab-pane fade" id="reviews">
                                  <div class="review-page-comment">
                                    <h2><?php echo $row11[0] ?> review </h2>
                                    <ul>
                                        <?php 
                                        $sel3="SELECT * FROM `".TBL_REVIEW."` WHERE product_id='".$_GET['id']."' ";
                                        $result3 = $database->query( $sel3 );
                                        while($row3=$database->fetch_array($result3))
                                        {
                                        ?>
                                        <li>
                                            <div class="product-comment">
                                                <img src="img/icon/author.png" alt="">
                                                <div class="product-comment-content">
                                                    <div class="product-reviews">
                                                        <?php 
                                                        
                                                          for($j=1;$j<=$row3['rating'];$j++) 
                                                          {?>
                                                              <i class="fa fa-star"></i>
                                                          <?php 
                                                          }
                                                          $b=5-$row3['rating'];
                                                          for($a=0;$a<$b;$a++)
                                                          { ?>
                                                            <i class="fa fa-star-o"></i>
                                                          <?php 
                                                          } 
                                                          ?>
                                                        <!--<i class="fa fa-star-half-o"></i>
                                                        <i class="fa fa-star-o"></i>-->
                                                    </div>
                                                    <p class="meta">
                                                    <?php
                                                    $sel13="SELECT name FROM `".TBL_USER."` WHERE id='".$row3['user_id']."' ";
                                                    $result13 = $database->query( $sel13 );
                                                    $row13=$database->fetch_array($result13)
                                                    ?>
                                                        <strong><?php echo $row13[0] ?></strong> - <span><?php $date=date_create($row['created_date']); echo date_format($date,"F d"); ?>, <?php echo date_format($date,"Y") ?></span>
                                                    <div class="description">
                                                        <p><?php echo $row3['review'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                                        <?php } ?>
                                    </ul>
                                  </div>
                              </div>
                            <?php } ?>
                            </div>
		                    <!--Review And Description Tab Content End-->
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
		<!--Product Description Review Area Start-->
		<!--Also Like Product Start-->
		<div class="also-like-product" id="like">
		    <div class="container">
		        <div class="row">
		            <!--Section Title Start-->
                    <div class="col-12">
                        <div class="section-title text-center mb-35">
                            <h3>You may also like…</h3>
                        </div>
                    </div>
                    <!--Section Title End-->
		        </div>
		        <div class="row swiper-container" id="swiper-container">
		            <div class="product-slider-activ swiper-wrapper">
                    <?php 
                    $sel2="SELECT * FROM `".TBL_PRODUCT."` WHERE category_id='".$_SESSION['category_id']."' ";
                    $result2 = $database->query( $sel2 );
                    while($row2=$database->fetch_array($result2)) 
                    {
                    ?>
		                <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 swiper-slide" style="height: 410px;">
		                    <!--Single Product Start-->
		                    <div class="single-product mb-25 imgBx" style="height: 390px; margin-top: 10px;">
		                        <div class="product-img img-full">
		                            <a href="single-product.php?id=<?php echo $row2['id'] ?>">
		                                <img src="admin/uploads/<?php echo $row2['image'] ?>" alt="">
		                            </a>
		                            <div class="product-action">
		                                <ul>
		                                    <li><a href="#open-modal" data-toggle="modal" title="Quick view" class="open" id="id" data-id="<?php echo $row2['id'] ?>"><i class="fa fa-search"></i></a></li>
		                                    <li>
                                            <?php 
                                            $query1 = "SELECT * FROM `tbl_product` JOIN `tbl_wishlist` on tbl_product.id='".$row2['id']."' AND tbl_wishlist.product_id='".$row2['id']."' and tbl_wishlist.user_id='".$_SESSION['user_id']."' ";
                                            $result1 = $database->query($query1);
                                            $row1 = $database->fetch_array($result1);
                                            if($row1['product_id']!=null)
                                            { ?>
                                                <a href="shop_action.php?remove_wishlist=1&id=<?php echo $row2['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI'].'#like' ?>" title="Whishlist"><i class="fa fa-heart"></i></a>
                                            <?php }
                                            else
                                            { ?>
                                                <a href="shop_action.php?wishlist=1&id=<?php echo $row2['id'] ?>&page=<?php echo $_SERVER['REQUEST_URI'].'#like' ?>" title="Whishlist"><i class="fa fa-heart-o"></i></a>
                                            <?php } ?>

                                            </li>
                                            <li><a href="compare.php?compare_id=<?php echo $row2['id'] ?>" title="Compare"><i class="fa fa-refresh"></i></a></li>
		                                </ul>
		                            </div>
		                        </div>
		                        <div class="product-content">
		                            <h2><a href="single-product.php"><?php echo $row2['product_name'] ?></a></h2>
		                            <div class="product-price">
		                                <div class="price-box">
                                      <?php if($row2['discount']!='0'){ ?>
                                      <span class="price">&#8377;<?php echo $row2['price'] ?></span>
                                      <?php } ?>
                                      <span class="regular-price">&#8377;<?php echo ($row2['price']-($row2['discount']*$row2['price'])/100) ?></span>
                                    </div>   
		                                <div class="add-to-cart">
		                                    <a href="shop_action.php?id=<?php echo $row2['id'] ?>&add=1">Add To Cart</a>
		                                </div>
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
		<!--Also Like Product End-->
    
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
                <div class="row fetch">

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

<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage", 2.0);
</script>
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
</body>

</html>
<script type="text/javascript" src="js/swiper.min.js"></script>
  <script>

  var swiper = new Swiper('#swiper-container', {
  effect: 'coverflow',
  loop: false,
  centeredSlides: true,
  slidesPerView: 'auto',
  initialSlide: <?php echo (mysqli_num_rows($result2)/2); ?>,
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