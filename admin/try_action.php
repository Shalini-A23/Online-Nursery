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
/*if(isset($_GET['mode']))
{
	$_SESSION['do_alert']='sdfa';
	header('Location: try.php');
}*/
if(isset($_GET['id']))
{
	echo $_GET['id'];
	echo $_GET['delete'];
	exit;
}
?>