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
$category_name=$_POST['category_name'];
$status=$_POST['status'];
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
  //$data = base64_encode($img); 
  file_put_contents($path, $img);
  $sql="INSERT INTO `".TBL_CATEGORY."`(`category_name`,`image`,`status`) VALUES ('".$category_name."','".$name."','".$status."')";
  $result = $database->query( $sql );  
  if ($result) 
  {
    $_SESSION['inserted'] = "Your Message will post";
    header("Location:category_add_edit.php");   
  }
}
if(isset($_POST['update']))
{ 
  if($type==null)
  {
    $sql="UPDATE `".TBL_CATEGORY."` SET `category_name`='".$category_name."',`status`='".$status."' WHERE `id`='".$_POST['id']."' ";
  }else
  {
    $img = file_get_contents($tmp_name);  
    //$data = base64_encode($img); 
    file_put_contents($path, $img);
    $sql="UPDATE `".TBL_CATEGORY."` SET `category_name`='".$category_name."',`image`='".$name."',`status`='".$status."' WHERE `id`='".$_POST['id']."' ";
  }
  $result = $database->query( $sql );  
  if ($result) 
  {
    if($_POST['page']=='')
    {
   	  $_SESSION['updated'] = "Your Message will post";
   	  header("Location:category_add_edit.php");   
    }
    else
    {
      $_SESSION['updated'] = "Your Message will post";
      header("Location:category_view.php");   
    }
  }
}
if(isset($_GET['delete']))
{
  $sql="SELECT COUNT(*) from `".TBL_PRODUCT."` WHERE `category_id` = '".$_GET['id']."' ";
  $result = $database->query($sql);
  $row=$database->fetch_array($result);
  if($row[0]==0)
  {
    $qry_update="DELETE FROM  `".TBL_CATEGORY."` WHERE id='".$_GET['id']."'";
    $result_upload = $database->query( $qry_update ); 
    if($result_upload >0)
    {
      if($_GET['delete']=='4')
      {
        $_SESSION['deleted'] = "Update successfully!";
        header("Location:category_view.php");  
      }
      else
      {
        $_SESSION['deleted'] = "Update successfully!";
        header("Location:category_add_edit.php"); 
      }      
    }
  }
  else
  {
    if($_GET['delete']=='4')
    {
      $_SESSION['do_alert'] = "Update failed!";
      header("Location:category_view.php");  
    }
    else
    {
      $_SESSION['do_alert'] = "Update failed!";
      header("Location:category_add_edit.php");
    }  
  }
}
if(isset($_GET['active']))
{ 
  $sql="UPDATE `".TBL_CATEGORY."` SET `status`='0' WHERE `id`='".$_GET['id']."' ";
  $result = $database->query( $sql );  
  $sql1="UPDATE `".TBL_PRODUCT."` SET `status`='0' WHERE `category_id`='".$_GET['id']."' ";
  $result1 = $database->query( $sql1 );  
  if ($result) 
  {
    $_SESSION['alerts'] = "Your Message will post";
    if($_GET['active']=='4')
    {
      header("Location:category_view.php");  
    }
    else
    {
      header("Location:category_add_edit.php"); 
    }       
  }
}
if(isset($_GET['inactive']))
{ 
  $sql="UPDATE `".TBL_CATEGORY."` SET `status`='1' WHERE `id`='".$_GET['id']."' ";
  //echo $sql;exit;
  $result = $database->query( $sql );  
  $sql1="UPDATE `".TBL_PRODUCT."` SET `status`='1' WHERE `category_id`='".$_GET['id']."' ";
  $result1 = $database->query( $sql1 ); 
  if ($result) 
  {
    $_SESSION['alerts'] = "Your Message will post";
    if($_GET['inactive']=='4')
    {
      header("Location:category_view.php");  
    }
    else
    {
      header("Location:category_add_edit.php"); 
    }       
  }
}
/*if(isset($_POST['update']))
{ 
  if($_POST['file_up']==" ")
  {
    $sql="UPDATE `".TBL_BLOG."` SET `blog_title`='".$blog_title."',`blog_description`='".$blog_description."' WHERE `id`='".$_POST['id']."' ";
    echo $sql;exit;
  }
  else
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
    //$data = base64_encode($img); 
    file_put_contents($path, $img);
    $sql="UPDATE `".TBL_BLOG."` SET `blog_title`='".$blog_title."',`image`='".$name."',`blog_description`='".$blog_description."' WHERE `id`='".$_POST['id']."' ";
    echo $sql;exit;
  }
  $result = $database->query( $sql );  
  if ($result) 
  {
    $_SESSION['alerts'] = "Your Message will post";
    header("Location:blog.php");   
  }
}*/
?>