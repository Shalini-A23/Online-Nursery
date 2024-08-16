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
<div class="Related-product mt-105 mb-100">
            <div class="container">
                <div class="row">
                    <!--Section Title Start-->
                    <div class="col-12">
                        <div class="section-title text-center mb-35">
                            <h3>Recently viewed</h3>
                        </div>
                    </div>
                    <!--Section Title End-->
                </div>
                <div class="row swiper-container">
                    <div class="product-slider-active swiper-wrapper">
                    <div class="col-md-3 col-lg-3 col-sm-4 col-xs-12 swiper-slide">
                            <!--Single Product Start-->
                            <div class="single-product mb-25 imgBx">
                                <div class="product-img img-full">
                                    <a href="single-product.php?id=<?php echo $row9['id'] ?>">
                                        <img src="admin/uploads/<?php echo $row9['image'] ?>" alt="">
                                    </a>
                                    <div class="product-action">
                                        <ul>
                                            <li><a href="#open-modal" data-toggle="modal" title="Quick view" class="open" id="id" data-id="<?php echo $row9['id'] ?>"><i class="fa fa-search"></i></a></li>
                                            <li><a href="#" title="Whishlist"><i class="fa fa-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content details">
                                    <h2><a href="single-product.php">Product name</a></h2>
                                    <div class="product-price">
                                    <div class="price-box">
                                        <div class="single-product-price">
                                <span class="price new-price">&#8377;$22</span>
                                <span class="regular-price">&#8377;$23</span>
                            </div>
                        </div>
                                        <div class="add-to-cart">
                                            <a href="shop_action.php?id=<?php echo $row9['id'] ?>&add=1">Add To Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Single Product End-->
                        </div>
                    </div>
                </div>
            </div>
        </div>