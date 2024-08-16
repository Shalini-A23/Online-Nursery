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
$username=$_POST['username'];
$name=$_POST['name'];

if(isset($_POST['register']))
{ 
  $sql12="SELECT * FROM `".TBL_DELIVERY_ADMIN."` where `username`='".$_POST['username']."' ";
  $result12 = $database->query($sql12);  
  if(mysqli_num_rows($result12)!=1) 
  {
    $name=$_POST['name'];
    $to =$_POST['username'];
    $subject = 'Registration Successfull - plantzmore';
    $from = 'plantzmore@gmail.com';
 
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    include('../php_mail.php');
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
  	 $sql="INSERT INTO `".TBL_DELIVERY_ADMIN."`(`username`,`password`,`name`,image,phone,district,date) VALUES ('".$username."','".$a."','".$name."','user.jpg','".$_POST['phone']."','".$_POST['district']."','".date('Y-m-d')."')";
  	 $result = $database->query( $sql );  
  	 if ($result) 
  	 {
        header("Location:confirm-mail.php");   
  	 }
    }
    else
    {
      $_SESSION['failure']='Incorrect email id';
      header("Location:register.php");   
    }
  }
  else
  {
    $_SESSION['failure']='Email id already exists';
    header("Location:register.php"); 
  }
}
?>