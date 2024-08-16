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
                            $sql01="SELECT name,image from `".TBL_DELIVERY_ADMIN."` WHERE id='".$_SESSION['delivery_admin_id']."' ";
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

                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="ti-layers"></i><span class="hide-menu">Orders</span></a></li>

              
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