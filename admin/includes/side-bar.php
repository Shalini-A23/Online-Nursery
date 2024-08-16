<?php 
$page_id = "gallery_m";
error_reporting (E_ALL ^ E_NOTICE);
include_once '..//assets/libs/class.database.php';
include_once '..//assets/libs/class.session.php';
include_once '..//assets/libs/functions.php';
include_once '..//assets/libs/tables.config.php';
include_once '..//assets/libs/class.commen.php';
session_start();
$session= new Session();
global $database, $db;
 
?>
<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                            <?php
                            $sql01="SELECT name,image from `".TBL_ADMIN."` WHERE id='".$_SESSION['admin_id']."' ";
                            $result01 = $database->query($sql01);
                            $row01 = $database->fetch_array($result01);
                            ?>
                        <div><img src="uploads/<?php echo $row01['image'] ?>" alt="user-img" class="img-circle"></div>
                        <div class="dropdown">
                            
                            <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $row01[0] ?><span class="caret"></span></a>
                            <div class="dropdown-menu animated flipInY">
                                <!-- text-->
                                <a href="profile.php" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                                <!-- text-->
                                <a href="register.php" class="dropdown-item"><i class="ti-plus"></i> Add new admin</a>
                                <!-- text-->
                                <div class="dropdown-divider"></div>
                                <!-- text-->
                                <a class="dropdown-item" onclick="deleteFunction()"><i class="ti-shift-left"></i> Logout</a>
                                <!-- text-->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <div class="hide-menu text-center">
                                <div id="eco-spark"></div>
                                <?php 
                                $sql1="SELECT SUM(total_amount) from `".TBL_TRANSACTION."`";
                                $result1 = $database->query($sql1);
                                $row1 = $database->fetch_array($result1);
                                ?>
                                <small>TOTAL EARNINGS - Till <?php echo date('F') ?> <?php echo date('Y') ?></small>
                                <h4>&#8377;<?php echo number_format($row1[0]) ?></h4>
                            </div>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="icon-graph"></i><span class="hide-menu">Dashboard</span></a></li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-plus"></i><span class="hide-menu">Add</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="category_add_edit.php">Category</a></li>
                                <li><a href="product_add_edit.php">Products</a></li>
                            </ul>
                        </li>
                        
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-eye"></i><span class="hide-menu">View</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="category_view.php">Category</a></li>
                                <li><a href="javascript:void(0)" class="has-arrow waves-effect waves-dark" aria-expanded="false">Product</a>
                                    <ul aria-expanded="false" class="collapse">
                                        <li><a href="product_view.php">Quick View</a></li>
                                        <li><a href="single_product_view.php">Detailed View</a></li>
                                    </ul>
                                </li>
                            </ul>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-list"></i><span class="hide-menu">Category</span><span class="badge badge-pill badge-cyan ml-auto"><?php $sql="SELECT COUNT(*) FROM `".TBL_CATEGORY."` "; $result1 = $database->query($sql); $row1=$database->fetch_array($result1); echo $row1[0] ?></span></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <?php 
                                $sel="SELECT * from `".TBL_CATEGORY."` WHERE `status` != 2";
                                $result = $database->query($sel);
                                $j=1;
                                while($row = $database->fetch_array($result))
                                {  
                                ?>
                                <li><a href="product_view.php?id=<?php echo $row['id'] ?>"><?php echo $row['category_name'] ?></a></li>
                                <?php  
                                $j++; } ?>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-pencil-alt"></i><span class="hide-menu">Blog</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="blog_add_edit.php">Add</a></li>
                                <li><a href="blog_view.php">View</a></li>
                            </ul>
                        </li> 

                        <li> <a class="waves-effect waves-dark" href="user_feedback.php" aria-expanded="false"><i class="ti-comment-alt"></i><span class="hide-menu">User Feedback</span></a></li>

                        <li> <a class="waves-effect waves-dark" href="user_query.php" aria-expanded="false"><i class="ti-email"></i><span class="hide-menu">User query</span></a></li> 

                        <li> <a class="waves-effect waves-dark" href="order_add_edit.php" aria-expanded="false"><i class="ti-layers"></i><span class="hide-menu">Orders</span></a></li>

                        <li> <a class="waves-effect waves-dark" href="transaction_add_edit.php" aria-expanded="false"><i class="ti-wallet"></i><span class="hide-menu">Transactions</span></a></li>
                        
                        <li> <a class="waves-effect waves-dark" href="delivery_center.php" aria-expanded="false"><i class="ti-truck"></i><span class="hide-menu">Delivery Center</span></a></li>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
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
        location.assign("login_action.php?logout=0");        // submitting the form when user press yes
    } 
});
}
</script>