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
$uname=$_POST['uname'];
$address=$_POST['address'];
$phone=$_POST['phone'];
$pincode=$_POST['pincode'];
$state=$_POST['state'];
$city=$_POST['city'];
$district=$_POST['district'];

$file_name = $_FILES['file_up']['name']; 
$t = explode(".",$file_name);
$type = end($t);
$tmp_name = $_FILES["file_up"]["tmp_name"];
$date = new DateTime();
$date = $date->getTimestamp();
$name = $date.".".$type;
$path="admin/uploads/".$name;

if(!isset($_SESSION['user_id']))
{
	$_SESSION['failure']='Login to proceed';
	header('Location: login-register.php');
}

if(isset($_POST['update']))
{
  header("Location: my-account.php?update=2");   
}
if(isset($_POST['change_pass']))
{
  header("Location: my-account.php?change_pass=2");   
}
if(isset($_POST['change']))
{
  header("Location: my-account.php?change=2");   
}
if(isset($_POST['next']))
{
    $sql="SELECT * FROM `".TBL_USER."` where `password`='".$_POST['pass']."' and id='".$_SESSION['user_id']."' ";
    $result = $database->query($sql);  
    if(mysqli_num_rows($result)==1) 
    {
      header("Location: my-account.php?change=2&next=2");
    }
    else
    {
      $_SESSION['wrng_pass']='Incorrect username or password';
      header('Location: my-account.php?change=2');
    }   
}
if(isset($_POST['new_pass']))
{
    if($_POST['password']==$_POST['cpassword'])
    {
      $sql="UPDATE `".TBL_USER."` SET `password`='".$_POST['password']."' WHERE id='".$_SESSION['user_id']."' ";
      $result = $database->query($sql);  
      if($result) 
      {
        session_destroy();
        session_start();
        $_SESSION['success']='** Login with new password to continue...';
        header("Location: login-register.php");
      }
      else
      {
        header('Location: my-account.php?change=2');
      }
    }
    else
    {
      $_SESSION['wrng_cpass']='wrong password';
      header('Location: my-account.php?change=2&next=2');
    }   
}
if(isset($_POST['cancel']))
{
  header("Location: my-account.php");   
}
if(isset($_POST['save']))
{ 
  if($type==null)
  {
    $sql="UPDATE `".TBL_USER."` SET `name`='".$uname."',`pincode`='".$pincode."',`phone`='".$phone."',`address`='".$address."',`state`='".$state."',`district`='".$district."',`city`='".$city."' WHERE `id`='".$_SESSION['user_id']."' ";
  }
  else
  {
    $img = file_get_contents($tmp_name);  
    file_put_contents($path, $img);
    $sql="UPDATE `".TBL_USER."` SET `name`='".$uname."',`phone`='".$phone."',`address`='".$address."',`image`='".$name."',`state`='".$state."',`district`='".$district."',`city`='".$city."' WHERE `id`='".$_SESSION['user_id']."' ";
  }
  //echo $sql; exit;
  $result = $database->query( $sql );  
  if ($result) 
  {
    header("Location:my-account.php");   
  }
}
if(isset($_POST['send_pass']))
{
  $sql1="SELECT * FROM `".TBL_USER."` WHERE `id`='".$_SESSION['user_id']."' ";
  $result1 = $database->query( $sql1); 
  $row1=$database->fetch_array($result1);

  $name=$row1['name'];
  $to =$row1['username'];
  $subject = 'New password - plantzmore';
  $from = 'plantzmore@gmail.com';
 
  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  include('php_mail.php');
  // Create email headers
  $headers .= 'From: '.$from."\r\n".
    'X-Mailer: PHP/' . phpversion();
  // Compose a simple HTML email message
  $message = '<html><body>';
  $message .= 'Dear '.$name.',';
  $a=randomPassword();
  $message .= '<p>Your Password is <b>'.$a.'</b>. Do not share it with anyone by anymeans. This is confidential and to be used by you only.</p><p>And it is recommended to change password after login.</p>';
  $message .= '</body></html>';
  if(mail($to, $subject, $message, $headers))
  {
      $sql="UPDATE `".TBL_USER."` SET `password`='".$a."' WHERE id='".$_SESSION['user_id']."' ";
      $result = $database->query( $sql );
      if ($result) 
      {
        session_destroy();
        session_start();
        $_SESSION['login']=1;
        header("Location:login-register.php");  
      }
  } 
  else
  {
    $_SESSION['failure']='Wrong Email id';
  }
}
if(isset($_GET['rating']))
{
   $sql="INSERT INTO `".TBL_REVIEW."` (`product_id`,`user_id`,`rating`,`order_id`) VALUES('".$_GET['product_id']."','".$_SESSION['user_id']."','".$_GET['rate']."','".$_GET['order_id']."') ";
      $result = $database->query( $sql );
      if ($result) 
      {
        header("Location: my-account.php");  
      } 
}
if(isset($_GET['change_rating']))
{
   $sql="UPDATE `".TBL_REVIEW."` SET `rating`='".$_GET['rate']."' WHERE product_id='".$_GET['product_id']."' and user_id='".$_SESSION['user_id']."' and order_id='".$_GET['order_id']."' ";
      $result = $database->query( $sql );
      if ($result) 
      {
        header("Location: my-account.php");  
      } 
}
if(isset($_POST['add_review']))
{
   $sql="UPDATE `".TBL_REVIEW."` SET `review`='".$_POST['review']."' WHERE `id`='".$_POST['review_id']."' ";
   $result = $database->query( $sql );
   if ($result) 
   {
    header("Location: my-account.php");  
   } 
}
?>