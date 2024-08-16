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
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from eliteadmin.themedesigner.in/demos/bt4/ecommerce/ui-sweetalert.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 01 Mar 2021 16:24:54 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Elite Admin Template - The Ultimate Multipurpose admin template</title>
    <!--alerts CSS -->
    <link href="assets/node_modules/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<?php for($i=1;$i<=5;$i++){ ?>
<center>
    <i class="ti-trash" onclick="archiveFunction(<?php echo $i; ?>)"></i><?php echo $i; ?>
</center>
<?php } ?>
<span id="warning"></span>
</body>
<script src="assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
<!-- Sweet-Alert  -->
    <script src="assets/node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="assets/node_modules/sweetalert2/sweet-alert.init.js?v=1"></script>

</html>

<script type="text/javascript">
function archiveFunction($a) 
{
  event.preventDefault();
  Swal.fire({
  title: "Are you sure?",
  text: "Once you delete you cannot retrieve it",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Yes, archive it!",
  cancelButtonText: "Cancel",
  closeOnConfirm: false,
  }).then(function(result)
  {
  	if (result.value) 
  	{
    	location.assign("try_action.php?id="+$a+"&delete=2");        // submitting the form when user press yes
  	} 
});
}
</script>

<?php
if(isset($_SESSION['do_alert']))
{ 
?>
<span id="position">change color</span>
<script type="text/javascript">
$var=$('#sa-warning').trigger('click');
document.write($var);
</script>
<?php 
unset($_SESSION['do_alert']);
}
?>