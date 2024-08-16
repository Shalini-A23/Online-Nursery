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
if(isset($_POST['send']))
{
	$sql="INSERT INTO `".TBL_FEEDBACK."`(`name`,`feedback`) VALUES('".$_POST['name']."','".$_POST['feedback']."')";
	$result = $database->query($sql);
	if($result) 
  	{
    	$_SESSION['feedback_sent'] = "Your Message will post";
    	header("Location: index.php");   
  	}
}
?>