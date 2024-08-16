 <!--alerts CSS -->
  <link href="admin/assets/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
<!--Header Area Start-->
        <header>
            <div class="header-container">
                <div class="header-area header-absolute header-sticky pt-30 pb-30">
                    <div class="container-fluid pl-50 pr-50">
                        <div class="row">
                            <!--Header Logo Start-->
                            <div class="col-lg-3 col-md-3">
                                <div class="logo-area">
                                    <a href="index.php">
                                        <img src="img/logo/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <!--Header Logo End-->
                            <!--Header Menu And Mini Cart Start-->
                            <div class="col-lg-9 col-md-9 text-lg-right">
                                <!--Main Menu Area Start-->
                                <div class="header-menu">
                                    <nav>
                                        <ul class="main-menu">
                                            <li><a href="index.php">home</a></li>
                                            <li><a href="shop.php">Shop</a></li>
                                            <li><a href="portfolio.php">Portfolio</a></li>
                                            <li><a href="blog.php">Blog</a></li>
                                            <li><a href="about.php">About Us</a></li>
                                            <li><a href="contact.php">Contact Us</a></li>
                                            <?php if(!isset($_SESSION['user_id'])){ ?>
                                            <li><a href="login-register.php">Log In</a></li>
                                            <?php } ?>
                                        </ul>
                                    </nav>
                                </div>
                                <!--Main Menu Area End-->
                                <!--Header Option Start--> 
                                <div class="header-option">
                                    <div class="mini-cart-search">
                                        <div class="mini-cart">
                                          <?php if(isset($_SESSION['user_id'])){ ?>
                                            
                                            <a href="cart.php">
                                                <span class="cart-icon">
                                                    <?php if(isset($_SESSION['total_product'])){?>
                                                   <span class="cart-quantity"><?php echo $_SESSION['total_product']; ?></span>
                                               <?php } ?>
                                                </span>
                                                
                                                <span class="cart-title">Your cart <br><strong><?php if(isset($_SESSION['total_price'])){?> &#8377;<?php echo $_SESSION['total_price'];  ?> <?php } ?></strong></span>
                                            </a>
                                          <?php }  ?>
                                           <!--Cart Dropdown Start-->
                                           <!--Cart Dropdown End--> 
                                        </div>
                                        <?php if(isset($_SESSION['user_id'])){ ?>
                                        <div class="currency">
                                            <div class="currency-box">
                                                <?php
                                                $sel="SELECT * FROM`".TBL_USER."` WHERE `id`='".$_SESSION['user_id']."' ";
                                                $result = $database->query( $sel ); 
                                                $row=$database->fetch_array($result);
                                                ?>
                                                <a href="#"><img src="admin/uploads/<?php echo $row['image'] ?>" width="50px"><i class="fa fa-angle-down"></i></a>
                                                <div class="currency-dropdown">
                                                    <ul class="menu-top-menu">
                                                        
                                                        <li style="font-weight: bold; color: green"><?php echo $row['username'] ?></li>
                                                        <li><a href="my-account.php">My Account</a></li>
                                                        <li><a href="wishlist.php">Wishlist</a></li>
                                                        <li><a href="cart.php">Shopping cart</a></li>
                                                        <li><a href="payment/checkout.php">Checkout</a></li>
                                                        <!--<li><a href="compare.php">Compare</a></li>-->
                                                        <li><a onclick="deleteFunction()">Log Out</a></li>
                                                    </ul>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                      <?php } ?>
                                    </div>
                                </div>
                                <!--Header Option End--> 
                            </div>
                            <!--Header Menu And Mini Cart End-->
                        </div>
                        <div class="row">
                            <div class="col-12"> 
                                <!--Mobile Menu Area Start-->
                                <div class="mobile-menu d-lg-none"></div>
                                <!--Mobile Menu Area End-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!--Header Area End-->
<!-- Sweet-Alert  -->
    <script src="admin/assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="admin/assets/node_modules/sweetalert2/sweet-alert.init.js?v=1"></script>
        <script type="text/javascript">
function deleteFunction() 
{
  event.preventDefault();
  Swal.fire({
  title: "Are you sure to logout?",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, Logout!",
  cancelButtonText: "Cancel",
  closeOnConfirm: false,
  }).then(function(result)
  {
    if (result.value) 
    {
        location.assign("login-register_action.php?logout=0");        // submitting the form when user press yes
    } 
});
}
</script>