<?php 
error_reporting (E_ALL ^ E_NOTICE);
include_once '../assets/libs/class.database.php';
include_once '../assets/libs/class.session.php';
include_once '../assets/libs/functions.php';
include_once '../assets/libs/tables.config.php';
session_start();
$session= new Session();
global $database, $db;if(!isset($_SESSION['admin_id']))
{
    header('Location: login.php');
}          
$blog_title=$_POST['blog_title'];
$blog_description=$_POST['blog_description'];
$file_name = $_FILES['file_up']['name']; 
$t = explode(".",$file_name);
$type = end($t);
$tmp_name = $_FILES["file_up"]["tmp_name"];
$date = new DateTime();
$date = $date->getTimestamp();
$name = $date.".".$type;
$path="uploads/".$name;
if(isset($_POST['submit']))
{ 
  $img = file_get_contents($tmp_name);  
  file_put_contents($path, $img);
  $sql="INSERT INTO `".TBL_BLOG."`(`blog_title`,`image`,`blog_description`,`created_by`) VALUES ('".$blog_title."','".$name."','".$blog_description."',1)";
  
  $result = $database->query( $sql );  
  if ($result) 
  {
    $_SESSION['inserted'] = "Your Message will post";
    header("Location:blog_add_edit.php");   
  }
}
if(isset($_POST['update']))
{ 
  if($type==null)
  {
    $sql="UPDATE `".TBL_BLOG."` SET `blog_title`='".$blog_title."',`blog_description`='".$blog_description."' WHERE `id`='".$_POST['id']."' ";
  }
  else
  {
    $img = file_get_contents($tmp_name);  
    //$data = base64_encode($img); 
    file_put_contents($path, $img);
    $sql="UPDATE `".TBL_BLOG."` SET `blog_title`='".$blog_title."',`image`='".$name."',`blog_description`='".$blog_description."' WHERE `id`='".$_POST['id']."' ";
  }
  $result = $database->query( $sql );  
  if ($result) 
  {
    if($_POST['page']=='1')
    {
      $_SESSION['updated'] = "Your Message will post";
      header("Location:blog_view.php");
    }
    else
    {
      $_SESSION['updated'] = "Your Message will post";
      header("Location:blog_add_edit.php");
    }  
  }
}
if(isset($_GET['delete']))
{
    
  $qry_update="DELETE FROM  `".TBL_BLOG."` WHERE id='".$_GET['id']."'";
  $result_upload = $database->query( $qry_update ); 
  if($result_upload >0)
  {
    if($_GET['delete']=='4')
    {
      $_SESSION['deleted'] = "Update successfully!";
      header("Location:blog_view.php");  
    }
    else
    {
      $_SESSION['deleted'] = "Update successfully!";
      header("Location:blog_add_edit.php"); 
    }      
  }
}
if(isset($_GET['active']))
{ 
  $sql="UPDATE `".TBL_BLOG."` SET `status`='0' WHERE `id`='".$_GET['id']."' ";
  //echo $sql;exit;
  $result = $database->query( $sql );  
  if ($result) 
  {
    $_SESSION['alerts'] = "Your Message will post";
    if($_GET['active']=='4')
    {
      header("Location:blog_view.php");  
    }
    else
    {
      header("Location:blog_add_edit.php"); 
    }       
  }
}
if(isset($_GET['inactive']))
{ 
  $sql="UPDATE `".TBL_BLOG."` SET `status`='1' WHERE `id`='".$_GET['id']."' ";
  //echo $sql;exit;
  $result = $database->query( $sql );  
  if ($result) 
  {
    $_SESSION['alerts'] = "Your Message will post";
    if($_GET['inactive']=='4')
    {
      header("Location:blog_view.php");  
    }
    else
    {
      header("Location:blog_add_edit.php"); 
    }       
  }
}
?>