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

$product_name=$_POST['product_name'];
$product_description=$_POST['product_description'];
$category_id=$_POST['category_id'];
$status=$_POST['status'];
$price=$_POST['price'];
$discount=$_POST['discount'];
$stock=$_POST['stock'];
$mul=$_POST['mul'];

$file_name = $_FILES['file_up']['name']; 
$t = explode(".",$file_name);
$type = end($t);
$tmp_name = $_FILES["file_up"]["tmp_name"];
$date = new DateTime();
$date = $date->getTimestamp();
$name = $date.".".$type;
$path="uploads/".$name;

$file_name1 = $_FILES['file_up1']['name']; 
$t1 = explode(".",$file_name1);
$type1 = end($t1);
$tmp_name1 = $_FILES["file_up1"]["tmp_name"];
$date1 = new DateTime();
$date1 = $date1->getTimestamp()-1;
$name1 = $date1.".".$type1;
$path1="uploads/".$name1;

$file_name2 = $_FILES['file_up2']['name']; 
$t2 = explode(".",$file_name2);
$type2 = end($t2);
$tmp_name2 = $_FILES["file_up2"]["tmp_name"];
$date2 = new DateTime();
$date2 = $date2->getTimestamp()-2;
$name2 = $date2.".".$type2;
$path2="uploads/".$name2;
if(isset($_POST['save_stock']))
{
  $sql23="UPDATE `".TBL_PRODUCT."` SET `stock`='".$_POST['stock']."' WHERE `id`='".$_POST['id']."' ";
  $result23 = $database->query( $sql23 );  
  if ($result23) 
  {
    $_SESSION['updated'] = "Your Message will post";
    header('Location: index.php');       
  }
}
if(isset($_POST['submit']) )
{ 
  $img = file_get_contents($tmp_name);  
  file_put_contents($path, $img);

  $img1 = file_get_contents($tmp_name1);  
  file_put_contents($path1, $img1);

  $img2 = file_get_contents($tmp_name2);  
  file_put_contents($path2, $img2);

  $sql="INSERT INTO `".TBL_PRODUCT."`(`product_name`,`category_id`,`status`,`real_price`,`price`,`discount`,`product_description`,`image`,`image1`,`image2`,`stock`) VALUES ('".$product_name."','".$category_id."','".$status."','".$price."','".$mul*$price."','".$discount."','".$product_description."','".$name."','".$name1."','".$name2."','".$stock."')";
  //echo $sql;
  //exit;
  $result = $database->query( $sql );  
  if ($result) 
  {
    $_SESSION['inserted'] = "Your Message will post";
    header("Location:product_add_edit.php");   
  }
}
if(isset($_POST['update']))
{ 
  
  if($type==null && $type1==null && $type2==null)
  {
    $sql="UPDATE `".TBL_PRODUCT."` SET `product_name`='".$product_name."',`category_id`='".$category_id."',`status`='".$status."',`real_price`='".$price."',`price`='".$price*$mul."',`discount`='".$discount."',`stock`='".$stock."' WHERE `id`='".$_POST['id']."' ";
  }
  elseif($type==null && $type1==null)
  {
    $img2 = file_get_contents($tmp_name2);  
    file_put_contents($path2, $img2);
    $sql="UPDATE `".TBL_PRODUCT."` SET `product_name`='".$product_name."',`category_id`='".$category_id."',`status`='".$status."',`real_price`='".$price."',`price`='".$price*$mul."',`discount`='".$discount."',`stock`='".$stock."',`image2`='".$name2."' WHERE `id`='".$_POST['id']."' ";
  }
  elseif($type1==null && $type2==null)
  {
    $img = file_get_contents($tmp_name);  
    file_put_contents($path, $img);
    $sql="UPDATE `".TBL_PRODUCT."` SET `product_name`='".$product_name."',`category_id`='".$category_id."',`status`='".$status."',`real_price`='".$price."',`price`='".$price*$mul."',`discount`='".$discount."',`stock`='".$stock."',`image`='".$name."' WHERE `id`='".$_POST['id']."' ";
  }
  elseif($type2==null && $type==null)
  {
    $img1 = file_get_contents($tmp_name1);  
    file_put_contents($path1, $img1);
    $sql="UPDATE `".TBL_PRODUCT."` SET `product_name`='".$product_name."',`category_id`='".$category_id."',`status`='".$status."',`real_price`='".$price."',`price`='".$price*$mul."',`discount`='".$discount."',`stock`='".$stock."',`image1`='".$name1."' WHERE `id`='".$_POST['id']."' ";
  }
  else
  {
    $img = file_get_contents($tmp_name);  
    file_put_contents($path, $img);

    $img1 = file_get_contents($tmp_name1);  
    file_put_contents($path1, $img1);

    $img2 = file_get_contents($tmp_name2);  
    file_put_contents($path2, $img2);

    $sql="UPDATE `".TBL_PRODUCT."` SET `product_name`='".$product_name."',`category_id`='".$category_id."',`status`='".$status."',`real_price`='".$price."',`price`='".$price*$mul."',`discount`='".$discount."',`image`='".$name."',`image1`='".$name1."',`image2`='".$name2."',`stock`='".$stock."' WHERE `id`='".$_POST['id']."' ";
  }
  //echo $sql;exit;
  $result = $database->query( $sql );  
  if ($result) 
  {
    if($_POST['page']=='1')
    {
 	    $_SESSION['updated'] = "Your Message will post";
 	    header("Location:product_view.php");   
    }
    elseif($_POST['page']=='2')
    {
      $_SESSION['updated'] = "Your Message will post";
      header("Location:single_product_view.php");   
    }
    elseif($_POST['page']=='3')
    {
      $_SESSION['updated'] = "Your Message will post";
      header("Location:single_product_view.php?id=".$_POST['id']);   
    }
    else
    {
      $_SESSION['updated'] = "Your Message will post";
      header("Location:product_add_edit.php"); 
    }
  }
}
if(isset($_GET['delete']))
{
  $sql="SELECT COUNT(*) from `".TBL_ORDER."` WHERE `product_id` = '".$_GET['id']."' ";
  $result = $database->query($sql);
  $row=$database->fetch_array($result);
  if($row[0]==0)
  {
    $qry_update="DELETE FROM  `".TBL_PRODUCT."` WHERE id='".$_GET['id']."'";
    $result_upload = $database->query( $qry_update ); 
    if($result_upload >0)
    {
      $_SESSION['deleted'] = "Update successfully!";
      header("Location:".$_GET['page']);      
    }
  }
  else
  {
    $_SESSION['do_alert'] = "Update failed!";
    header("Location:".$_GET['page']);
  }
}
if(isset($_GET['active']))
{ 
  $sql="UPDATE `".TBL_PRODUCT."` SET `status`='0' WHERE `id`='".$_GET['id']."' ";
  //echo $sql;exit;
  $result = $database->query( $sql );  
  if ($result) 
  {
    $_SESSION['alerts'] = "Your Message will post";
    header("Location:".$_GET['page']);      
  }
}
if(isset($_GET['inactive']))
{ 
  $sql="UPDATE `".TBL_PRODUCT."` SET `status`='1' WHERE `id`='".$_GET['id']."' ";
  //echo $sql;exit;
  $result = $database->query( $sql );  
  if ($result) 
  {
    $_SESSION['alerts'] = "Your Message will post";
    header("Location:".$_GET['page']);     
  }
}
?>