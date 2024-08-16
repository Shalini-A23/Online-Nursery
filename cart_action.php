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
$quantity=$_GET['quantity'];
$id=$_GET['id'];
if(!isset($_SESSION['user_id']))
{
	$_SESSION['failure']='Login to proceed';
	header('Location: login-register.php');
}
if(isset($_GET['id']) && $_GET['mode']=='plus')
{
  $sql1="SELECT stock from `".TBL_PRODUCT."` WHERE `id` ='".$_GET['product_id']."' AND `status`=1 ";
  $result1 = $database->query($sql1);
  $row1 = $database->fetch_array($result1);
  if($quantity!=$row1[0])
  {
	  $quantity=$quantity + 1;
	  $sql="UPDATE `".TBL_ORDER."` SET `quantity`='".$quantity."' WHERE user_id='".$_SESSION['user_id']."' AND id='".$id."' ";
	  $result = $database->query($sql); 
  	if($result) 
  	{
    	header("Location:cart.php");   
  	}
  }
  else
  {
    header("Location:cart.php"); 
  }
}
if(isset($_GET['id']) && $_GET['mode']=='minus')
{
	if($quantity>1)
	{
		$quantity=$quantity - 1;
		$sql="UPDATE `".TBL_ORDER."` SET `quantity`='".$quantity."' WHERE user_id='".$_SESSION['user_id']."' AND id='".$id."' ";
		$result = $database->query($sql); 
  		if($result) 
  		{
    		header("Location:cart.php");   
  		}
  	}
  	else
  	{
  		header("Location:cart.php"); 
  	}
}
if(isset($_GET['id']) && $_GET['mode']=='delete')
{
	$sql="UPDATE `".TBL_ORDER."` SET `status`=0 WHERE user_id='".$_SESSION['user_id']."' AND id='".$id."' ";
	$result = $database->query($sql); 
  	if($result) 
  	{
    	header("Location:cart.php");   
  	}
}

if(isset($_POST['payment']))
{
  $_SESSION['address']=$_POST['address'];
  $_SESSION['pincode']=$_POST['pincode'];
  $_SESSION['phone']=$_POST['phone'];
  $_SESSION['name']=$_POST['name'];
  $_SESSION['state']=$_POST['state'];
  $_SESSION['district']=$_POST['district'];
  $_SESSION['city']=$_POST['city'];
  
  if($_POST['payment_mode']=='online')
  {
    header("Location:payment/checkout.php"); 
  } 
  else
  {
    header("Location:payment/checkout.php?mode=cod"); 
  } 
}
?>