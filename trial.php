
<?php
/*$name="Shalini A";
    $to ="shaliniash23@gmail.com";
    $subject = 'Registered successfully - plantzmore';
    $from = 'shaliniadevi@gmail.com';
 
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\r\n";
    include('php_mail.php');
    // Create email headers
    $headers .= 'From: '.$from."\r\n".
    'X-Mailer: PHP/' . phpversion();
    // Compose a simple HTML email message
    $message = "hii";

    $a=mail($to, $subject, $message, $headers);
    if($a)
    {
        echo "done";
    }
    else
    {
         echo "not done";
     }  */
     ?>
<?php
$to = "shaliniash23@gmail.com";
$subject = "HTML email";

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>This email contains HTML Tags!</p>
<table>
<tr>
<th>Firstname</th>
<th>Lastname</th>
</tr>
<tr>
<td>John</td>
<td>Doe</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <shaliniadevi@gmail.com>' . "\r\n";


if(mail($to,$subject,$message,$headers))
{
    echo "done";
}
?>

