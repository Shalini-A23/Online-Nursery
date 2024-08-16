<?php
error_reporting (E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
include_once 'assets/libs/class.commen.php';
session_start();
$session= new Session();
global $database, $db; 
$product_id=$_GET['id'];
if(!isset($_SESSION['user_id']))
{
	$_SESSION['failure']='Login to proceed';
	header('Location: login-register.php');
}
if(isset($_GET['id']) && isset($_GET['add']))
{
  
	$sql="INSERT INTO `".TBL_ORDER."`(`product_id`,`quantity`,`date_ordered`,`user_id`,`status`) VALUES ('".$product_id."',1,'".date("Y/m/d")."','".$_SESSION['user_id']."',1)";
	$result = $database->query($sql); 
  	if($result) 
  	{
    	header("Location:cart.php");   
  	}
}
if(isset($_POST['id']) && isset($_POST['add_wid_quantity']))
{
	$quantity=$_POST['quantity'];
	$sql="INSERT INTO `".TBL_ORDER."`(`product_id`,`quantity`,`date_ordered`,`user_id`,`status`) VALUES ('".$_POST['id']."','".$quantity."','".date("Y/m/d")."','".$_SESSION['user_id']."',1)";
  echo $sql;
	$result = $database->query($sql); 
  	if($result) 
  	{
    	header("Location:cart.php");   
  	}
}
if(isset($_GET['id']) && isset($_GET['wishlist']))
{
	$sql="INSERT INTO `".TBL_WISHLIST."`(`user_id`,`product_id`) VALUES ('".$_SESSION['user_id']."','".$product_id."')";
	$result = $database->query($sql); 
  	if($result) 
  	{
    	header("Location:http://localhost:8080".$_GET['page']);   
  	}
}
if(isset($_GET['id']) && isset($_GET['remove_wishlist']))
{
	$sql="DELETE FROM `".TBL_WISHLIST."` WHERE product_id='".$_GET['id']."' ";
	$result = $database->query($sql); 
  	if($result) 
  	{
    	header("Location:http://localhost:8080".$_GET['page']);   
  	}
}
?>