<?php 
error_reporting (E_ALL ^ E_NOTICE);
include_once '../assets/libs/class.database.php';
include_once '../assets/libs/class.session.php';
include_once '../assets/libs/functions.php';
include_once '../assets/libs/tables.config.php';
session_start();
$session= new Session();
global $database, $db;         
$username=$_POST['username'];
$password=$_POST['password'];

if(isset($_POST['login']))
{
	$sql="SELECT id,status FROM `".TBL_ADMIN."` where `username`='".$username."' AND `password`='".$password."' ";
	$result = $database->query($sql);  
	$row = $database->fetch_array($result);

	if(mysqli_num_rows($result)==1) 
	{
      if($row['status']==1)
  {
    if(isset($_POST['remember']))
    {
      if(!empty($_POST["remember"])) 
      {
        setcookie ("username_admin",$username,time()+ 3600);
        echo "Cookies Set Successfuly";
      } 
      else 
      {
        setcookie("username_admin","");
        echo "Cookies Not Set";
      }
    }
		$_SESSION['admin_id']=$row[0];
		header('Location: profile.php');
	}
	else
	{

    $_SESSION['failure']='Account not exist';
    header('Location: login.php');
	}
  }
  else
  {
        $_SESSION['failure']='Incorrect username or password';
    header('Location: login.php');
  }
}
if(isset($_GET['logout']))
{
	unset($_SESSION['admin_id']);
	header('Location: login.php');
}
if(isset($_POST['recover']))
{
  $sql="SELECT username FROM `".TBL_ADMIN."` where `name`='".$_POST['name']."' AND `username`='".$_POST['username']."' AND status=1 ";
  $result = $database->query($sql);  
  $row = $database->fetch_array($result);
  if(mysqli_num_rows($result)==1) 
  {
    $name=$_POST['name'];
    $to =$_POST['username'];
    $subject = 'Request for password change - plantzmore';
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
      $sql="UPDATE `".TBL_ADMIN."` SET `password`='".$a."' WHERE username='".$to."' ";
      $result = $database->query( $sql );
      if ($result) 
      {
        $_SESSION['forget']='1';
        header("Location:login.php");  
      }
    } 
    else
    {
      $_SESSION['failure']='Wrong Email id';
      header("Location:login.php");  
    }
  }
  else
  {
    $_SESSION['failure']='Incorrect Email id';
    header("Location:login.php");  
  }
}
?>