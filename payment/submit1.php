<?php
error_reporting (E_ALL ^ E_NOTICE);
include_once '../assets/libs/class.database.php';
include_once '../assets/libs/class.session.php';
include_once '../assets/libs/functions.php';
include_once '../assets/libs/tables.config.php';
include_once '../assets/libs/class.commen.php';
session_start();
$session= new Session();
global $database, $db; 
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['order']))
{
	$unique=uniqid();
	$sql = "INSERT INTO tbl_transaction(user_id,name,total_amount,txn_id,status,date_paid,`address`,`pincode`,`phone`,state,city,district) VALUES('".$_SESSION['user_id']."','".$_SESSION['name']."','".$_SESSION['total_price']."','".$unique."','2','".date("Y-m-d H:i:s")."','".$_SESSION['address']."','".$_SESSION['pincode']."','".$_SESSION['phone']."','".$_SESSION['state']."','".$_SESSION['city']."','".$_SESSION['district']."')";
        $result = $database->query($sql);

  foreach(array_combine($_SESSION['product_id'],$_SESSION['quantity']) as $product_id=>$quantity)
  {
    $sql0="SELECT stock FROM `".TBL_PRODUCT."` WHERE id='".$product_id."' ";
    $result0 = $database->query($sql0); 
    $row0 = $database->fetch_array($result0);
    $stock=abs($row0[0]-$quantity);

    $sql01="UPDATE `".TBL_PRODUCT."` SET `stock`='".$stock."' WHERE id='".$product_id."' ";
    $result01 = $database->query($sql01);
  }
  foreach($_SESSION['order_id'] as $order_id)
  {
    $sql03="SELECT id FROM `".TBL_TRANSACTION."` WHERE txn_id='".$unique."' ";
    $result03 = $database->query($sql03); 
    $row03 = $database->fetch_array($result03);

    $sql02="UPDATE `".TBL_ORDER."` SET `transaction_id`='".$row03[0]."' WHERE id='".$order_id."' ";
    $result02 = $database->query($sql02);

    $sql11="UPDATE `".TBL_ORDER."` SET `status`=2 WHERE user_id='".$_SESSION['user_id']."' and `status`=1 and transaction_id='".$row03[0]."' ";
    $result11 = $database->query($sql11); 
  }
  unset($_SESSION['total_price']);
unset($_SESSION['j']);
unset($_SESSION['order_id']);
unset($_SESSION['product_id']);
unset($_SESSION['quantity']);
unset($_SESSION['total_product']);
unset($_SESSION['phone']);
unset($_SESSION['address']);
unset($_SESSION['pincode']);
unset($_SESSION['name']);
//show success or error message
$_SESSION['done']='safd';
header('Location: ../my-account.php#orders');
}
?>