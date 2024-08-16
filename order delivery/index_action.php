<?php 
error_reporting (E_ALL ^ E_NOTICE);
include_once '../assets/libs/class.database.php';
include_once '../assets/libs/class.session.php';
include_once '../assets/libs/functions.php';
include_once '../assets/libs/tables.config.php';
session_start();
$session= new Session();
global $database, $db;   

if(isset($_GET['delivered']))
{
	$sql1="UPDATE tbl_transaction SET status='3' WHERE id='".$_GET['trans_id']."' ";
    $sql2="UPDATE tbl_order SET status='3' WHERE transaction_id='".$_GET['trans_id']."' ";
    $result1 = $database->query($sql1);  
    $result2 = $database->query($sql2); 
    if ($result1 && $result2) 
  	{
    	$_SESSION['updated'] = "Your Message will post";
    	header("Location:index.php");   
  	} 
}
?>