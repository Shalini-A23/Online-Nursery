<?php 
error_reporting (E_ALL ^ E_NOTICE);
include_once 'assets/libs/class.database.php';
include_once 'assets/libs/class.session.php';
include_once 'assets/libs/functions.php';
include_once 'assets/libs/tables.config.php';
session_start();
$session= new Session();
global $database, $db;          
$username=$_POST['username'];
$password=$_POST['password'];

if(isset($_POST['register']))
{ 
  $sql="SELECT * FROM `".TBL_USER."` where `username`='".$_POST['username']."' ";
  $result = $database->query($sql);  
  if(mysqli_num_rows($result)!=1) 
  {
    
    $name=$_POST['name'];
    $to =$_POST['username'];
    $subject = 'Registered successfully - plantzmore';
    $from = 'ashaaone2345@gmail.com';
 
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
      $sql="INSERT INTO `".TBL_USER."`(`name`,`username`,`password`,`image`) VALUES ('".$_POST['name']."','".$username."','".$a."','user.jpg')";
      $result = $database->query( $sql );
      if ($result) 
      {
        $_SESSION['success']='Registered Successfuly';
        header("Location:login-register.php");   
      }
    } 
    else
    {
      $_SESSION['failure']='Wrong Email';
      header("Location:login-register.php"); 
    }
  }
  else
  {
    $_SESSION['failure']='Email id already exists';
    header("Location:login-register.php"); 
  }
}
if(isset($_POST['login']))
{
	  $sql="SELECT id FROM `".TBL_USER."` where `username`='".$username."' AND `password`='".$password."' ";
  	$result = $database->query($sql);  
  	$row = $database->fetch_array($result);
  	if(mysqli_num_rows($result)==1) 
  	{
      if(isset($_POST['remember']))
      {
        if(!empty($_POST["remember"])) 
        {
          setcookie ("username_user",$username,time()+ 3600);
          echo "Cookies Set Successfuly";
        } 
        else 
        {
          setcookie("username_user","");
          echo "Cookies Not Set";
        }
      }
  		$_SESSION['user_id']=$row[0];
  		header('Location: shop.php');
  	}
  	else
  	{
  		$_SESSION['failure']='Incorrect username or password';
  		header('Location: login-register.php');
  	}
}
if(isset($_GET['logout']))
{
	unset($_SESSION['user_id']);
	header('Location: login-register.php');
}
if(isset($_POST['recover']))
{
  $sql="SELECT username FROM `".TBL_USER."` where `name`='".$_POST['name']."' AND `username`='".$_POST['username']."' ";
  $result = $database->query($sql);  
  $row = $database->fetch_array($result);
  if(mysqli_num_rows($result)==1) 
  {
    $sql1="SELECT * FROM `".TBL_USER."` WHERE `id`='".$_SESSION['user_id']."' ";
    $result1 = $database->query( $sql1); 
    $row1=$database->fetch_array($result1);

    $name=$_POST['name'];
    $to =$_POST['username'];
    $subject = 'Request for password change - plantzmore';
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
      $sql="UPDATE `".TBL_USER."` SET `password`='".$a."' WHERE username='".$to."' ";
      $result = $database->query( $sql );
      if ($result) 
      {
        $_SESSION['forget']='1';
        header("Location:login-register.php");  
      }
    } 
    else
    {
      $_SESSION['failure']='Wrong Email id';
      header("Location:login-register.php");  
    }
  }
  else
  {
    $_SESSION['failure']='Wrong Email id';
    header("Location:login-register.php");  
  }
}
?>