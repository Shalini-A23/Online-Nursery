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
if(!isset($_SESSION['admin_id']))
{
    header('Location: login.php');
}    
date_default_timezone_set('Asia/Kolkata'); 
if(isset($_POST['send']))
{ 
  $name=$_POST['name'];
  $to =$_POST['username'];
  $subject = 'Reply - ' .$_POST['subject'];
  $from = 'plantzmore@gmail.com';
 
  // To send HTML mail, the Content-type header must be set
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  // Create email headers
  $headers .= 'From: '.$from."\r\n".
    'X-Mailer: PHP/' . phpversion();
  // Compose a simple HTML email message
  $message = '<html><body>';
  $message .= 'Dear '.$name.',';
  $message .= '<p>'.$_POST['message'].'</p>';
  $message .= '</body></html>';
  if(mail($to, $subject, $message, $headers))
  {
      $sql="UPDATE `".TBL_QUERY."` SET `status`=2 WHERE id='".$_POST['id']."' ";
      $result = $database->query( $sql );
      $sql1="INSERT INTO `".TBL_QUERY_REPLY."`(`query_id`,`message`,`replied_by`) VALUES('".$_POST['id']."','".$_POST['message']."','".$_SESSION['admin_id']."') ";
      $result1 = $database->query( $sql1 );
      if ($result) 
      {
        $_SESSION['success']='Sent';
        header("Location:user_query.php");   
      }
  } 
  else
  {
    $_SESSION['failure']='Wrong Email id';
  }

}
if(isset($_GET['star']))
{
  $sql="UPDATE `".TBL_QUERY."` SET `starred`=1 WHERE id='".$_GET['query_id']."' ";
  $result = $database->query( $sql );
  if ($result) 
  {
    header("Location:user_query.php");   
  }
}
if(isset($_GET['unstar']))
{
  $sql="UPDATE `".TBL_QUERY."` SET `starred`=0 WHERE id='".$_GET['query_id']."' ";
  $result = $database->query( $sql );
  if ($result) 
  {
    header("Location:user_query.php");   
  }
}
?>