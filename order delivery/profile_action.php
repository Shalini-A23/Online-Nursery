<?php 
$page_id = "gallery_m";
error_reporting (E_ALL ^ E_NOTICE);
include_once '../assets/libs/class.database.php';
include_once '../assets/libs/class.session.php';
include_once '../assets/libs/functions.php';
include_once '../assets/libs/tables.config.php';
include_once '../assets/libs/class.commen.php';
session_start();
$session= new Session();
global $database, $db;
if(isset($_POST['update']))
{ 
  $sql="UPDATE `".TBL_DELIVERY_ADMIN."` SET `name`='".$_POST['name']."',`phone`='".$_POST['phone']."',`address`='".$_POST['address']."' WHERE id='".$_SESSION['delivery_admin_id']."' ";
  $result = $database->query( $sql );
  if ($result) 
  {
    header("Location: profile.php");   
  }
}
if(isset($_POST['admin_id']))
{
  $file_name = $_FILES['file_up']['name']; 
  $t = explode(".",$file_name);
  $type = end($t);
  $tmp_name = $_FILES["file_up"]["tmp_name"];
  $date = new DateTime();
  $date = $date->getTimestamp();
  $name = $date.".".$type;
  $path="uploads/".$name;
  $img = file_get_contents($tmp_name);  
  file_put_contents($path, $img);
  $sql="UPDATE `".TBL_DELIVERY_ADMIN."` SET `image`='".$name."' WHERE id='".$_POST['admin_id']."' ";
  $result = $database->query( $sql );
  if ($result) 
  {
    header("Location: profile.php");   
  }
}
if(isset($_POST['next']))
{
    $sql="SELECT * FROM `".TBL_DELIVERY_ADMIN."` where `password`='".$_POST['pass']."' and id='".$_SESSION['delivery_admin_id']."' ";
    $result = $database->query($sql);  
    if(mysqli_num_rows($result)==1) 
    {
      header("Location: profile.php?change_pass=1");
    }
    else
    {
      $_SESSION['wrng_pass']='Incorrect username or password';
      header('Location: profile.php');
    }   
}
if(isset($_POST['new_pass']))
{
    if($_POST['password']==$_POST['cpassword'])
    {
      $sql="UPDATE `".TBL_DELIVERY_ADMIN."` SET `password`='".$_POST['password']."' WHERE id='".$_SESSION['delivery_admin_id']."' ";
      $result = $database->query($sql);  
      if($result) 
      {
        session_destroy();
        session_start();
        $_SESSION['success']='** Login with new password to continue...';
        header("Location: login.php");
      }
      else
      {
        header('Location: profile.php');
      }
    }
    else
    {
      $_SESSION['wrng_cpass']='wrong password';
      header('Location: profile.php');
    }   
}
if(isset($_GET['deactivate']))
{
  $sql="UPDATE `".TBL_DELIVERY_ADMIN."` SET `status`='0',date_left='".date('Y-m-d')."' WHERE id='".$_SESSION['delivery_admin_id']."' ";
  $result = $database->query($sql);  
  if($result) 
  {
    unset($_SESSION['delivery_admin_id']);
    header("Location: login.php");
  }
}
?>