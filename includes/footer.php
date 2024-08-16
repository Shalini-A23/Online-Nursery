<!--Footer Area Start-->
    <footer>
        <div class="footer-container">
            <!--Footer Top Area Start-->
            <div class="footer-top-area black-bg">
                <div class="container" style="height: 180px">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start--->
                            <div class="single-footer-widget mb-40">
                                <div class="footer-title">
                                    <h3>My Account</h3>
                                </div>
                                <ul class="link-widget">
                                    <?php if(!isset($_SESSION['user_id'])){ ?>
                                    <li><a href="login-register.php">Log In</a></li>
                                    <?php } ?>
                                    <li><a href="wishlist.php">Wishlist</a></li>
                                    <li><a href="cart.php">Shopping cart</a></li>
                                    <li><a href="compare.php">Compare</a></li>
                                </ul>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-40">
                                <div class="footer-title">
                                    <h3>Information</h3>
                                </div>
                                <ul class="link-widget">
                                    <li><a href="about.php">About Us</a></li>
                                    <li><a href="contact.php">Contact Us</a></li>
                                    <li><a href="blog.php">Blog</a></li>
                                    <li><a href="portfolio.php">Portfolio</a></li>
                                </ul>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-40">
                                <div class="footer-title">
                                    <h3>Categories</h3>
                                </div>
                                <ul class="link-widget">
                                    <?php
                                    $sql="SELECT * from `".TBL_CATEGORY."` WHERE `status` = 1 ORDER BY id ASC LIMIT 4";
                                    $result = $database->query($sql);
                                    while($row = $database->fetch_array($result))
                                    {
                                    ?>
                                        <li><a href="shop.php?category_id=<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-40">
                                <div class="footer-title">
                                    <h3>.</h3>
                                </div>
                                <ul class="link-widget">
                                    <?php
                                    $sql="SELECT * from `".TBL_CATEGORY."` WHERE `status` = 1 ORDER BY id DESC LIMIT 3";
                                    $result = $database->query($sql);
                                    while($row = $database->fetch_array($result))
                                    {
                                    ?>
                                        <li><a href="shop.php?category_id=<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer Top Area End-->
            <!--Footer Middle Area Start-->
            <div class="footer-middle-area black-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-30">
                                <div class="footer-logo">
                                    <a href="index.html"><img src="img/logo/logo-footer.png" alt=""></a>
                                </div>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>

                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-30">
                                <div class="footer-info">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <p>Address : 23/3, Anna Nagar, 6th Street, Madurai,Tamil Nadu.</p>
                                </div>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-30">
                                <div class="footer-info">
                                    <div class="icon">
                                        <i class="fa fa-envelope-open-o"></i>
                                    </div>
                                    <p>Email: <br>plantzmore@gmail.com</p>
                                </div>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <!--Single Footer Widget Start-->
                            <div class="single-footer-widget mb-30">
                                <div class="footer-info">
                                    <div class="icon">
                                        <i class="fa fa-mobile"></i>
                                    </div>
                                    <p>Phone: <br>(+91) 8899878987</p>
                                </div>
                            </div>
                            <!--Single Footer Widget End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer Middle Area End-->
            <!--Footer Bottom Area Start-->
            <div class="footer-bottom-area black-bg pt-50 pb-50">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <!--Footer Menu End-->
                            <!--Footer Copyright Start-->
                            <div class="footer-copyright">
                  <p class="copyright">&copy; 2021 <strong>Plantmore</strong>.com</p>
                            </div>
                            <!--Footer Copyright End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--Footer Bottom Area End-->
        </div>
    </footer>
    <!--Footer Area End-->