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
if(isset($_POST['query']))
{
	$sql="INSERT INTO `".TBL_QUERY."`(`name`,`email-id`,`date`,`subject`,`message`) VALUES ('".$_POST['name']."','".$_POST['email-id']."','".date("Y/m/d")."','".$_POST['subject']."','".$_POST['message']."')";
	$result = $database->query($sql); 
  	if($result) 
  	{
  		$_SESSION['query_sent']="Your message will be posted";
    	header("Location:contact.php");   
  	}
}