<?php
error_reporting (E_ALL ^ E_NOTICE);
include_once '../assets/libs/class.database.php';
include_once '../assets/libs/class.session.php';
include_once '../assets/libs/functions.php';
include_once '../assets/libs/tables.config.php';
include_once '../assets/libs/class.commen.php';
session_start();
$session= new Session();
global $database, $db; 
date_default_timezone_set('Asia/Kolkata');
//check whether stripe token is not empty
if(!empty($_POST['stripeToken'])){
    //get token, card and user info from the form
    $token  = $_POST['stripeToken'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $card_num = $_POST['card_num'];
    $card_cvc = $_POST['cvc'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year = $_POST['exp_year'];

    //include Stripe PHP library
    require_once('init.php');
    
    //set api key
    $stripe = array(
      "secret_key"      => "sk_test_51IclaTSCbS5QonPJmh9D3tYUEJvDcbYmRAM98zye7dWWxrVfnOcmRaeA6MV9QxYee5wzJSUyDG00dtC1aNFpSuMH00z0vXeinW",
      "publishable_key" => "pk_test_51IclaTSCbS5QonPJTs1P1tHzOZooO7QzlyNueDeVhS8vSnhy7Xg82O7fjmHFukIyZ0k3YN58LX7rKEjcBe9vJRFi00fUOQIQ0e"
    );
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
    
    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $email,
        'source'  => $token
    ));
    
    //item information
    $itemName = "Product 01";
    $itemNumber = "PS123456";
    $itemPrice = floatval(500.00);
    $currency = "INR";
    $orderID = "SKA92712382139";
    
    //charge a credit or a debit card
    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $_SESSION['total_price'].'00',
        'currency' => $currency,
        'description' => 'Ordered '.$_SESSION['j'].' products',
        'metadata' => array(
            'order_id' => $orderID
        )
    ));
    
    //retrieve charge details
    $chargeJson = $charge->jsonSerialize();

    //check whether the charge is successful
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson
['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
        //order details 
        $amount = $chargeJson['amount'];
        $balance_transaction = $chargeJson['balance_transaction'];
        $currency = $chargeJson['currency'];
        $status = $chargeJson['status'];
        $date = date("Y-m-d H:i:s");
        
        //include database config file
        //insert tansaction data into the database
        $sql = 
"INSERT INTO tbl_transaction(user_id,name,total_amount,txn_id,status,date_paid,`address`,`pincode`,`phone`,state,city,district) VALUES('".$_SESSION['user_id']."','".$_SESSION['name']."','".$_SESSION['total_price']."','".$balance_transaction."','1','".$date."','".$_SESSION['address']."','".$_SESSION['pincode']."','".$_SESSION['phone']."','".$_SESSION['state']."','".$_SESSION['city']."','".$_SESSION['district']."')";
        $result = $database->query($sql);

    $sql10="SELECT id FROM `".TBL_TRANSACTION."` WHERE txn_id='".$balance_transaction."' ";
    $result10 = $database->query($sql10); 
    $row10 = $database->fetch_array($result10);
    if($result10)
    {
        $sql5="INSERT INTO tbl_transaction_details(transaction_id,name_on_card,card_num) VALUES('".$row10[0]."','".$name."','".$card_num."') ";
        $result5 = $database->query($sql5); 
    }

  foreach(array_combine($_SESSION['product_id'],$_SESSION['quantity']) as $product_id=>$quantity)
  {
    $sql0="SELECT stock FROM `".TBL_PRODUCT."` WHERE id='".$product_id."' ";
    $result0 = $database->query($sql0); 
    $row0 = $database->fetch_array($result0);
    $stock=abs($row0[0]-$quantity);

    $sql01="UPDATE `".TBL_PRODUCT."` SET `stock`='".$stock."' WHERE id='".$product_id."' ";
    $result01 = $database->query($sql01);
  }
  foreach($_SESSION['order_id'] as $order_id)
  {
    $sql03="SELECT id FROM `".TBL_TRANSACTION."` WHERE txn_id='".$balance_transaction."' ";
    $result03 = $database->query($sql03); 
    $row03 = $database->fetch_array($result03);

    $sql02="UPDATE `".TBL_ORDER."` SET `transaction_id`='".$row03[0]."' WHERE id='".$order_id."' ";
    $result02 = $database->query($sql02);

    $sql11="UPDATE `".TBL_ORDER."` SET `status`=2 WHERE user_id='".$_SESSION['user_id']."' and `status`=1 and transaction_id='".$row03[0]."' ";
    $result11 = $database->query($sql11); 
  }
  

        //if order inserted successfully
        if($result && $status == 'succeeded'){
            $statusMsg = "<h2>The transaction was successful.</h2>
<h4>Order ID: {$result}</h4>";

        }else{
            $statusMsg = "Transaction has been failed";
        }
    }else{
        $statusMsg = "Transaction has been failed";
    }
}else{
    $statusMsg = "Form submission error.......";
}
unset($_SESSION['total_price']);
unset($_SESSION['j']);
unset($_SESSION['order_id']);
unset($_SESSION['product_id']);
unset($_SESSION['quantity']);
unset($_SESSION['total_product']);
unset($_SESSION['phone']);
unset($_SESSION['address']);
unset($_SESSION['pincode']);
unset($_SESSION['name']);
unset($_SESSION['state']);
unset($_SESSION['city']);
unset($_SESSION['district']);
//show success or error message
$_SESSION['done']='safd';
header('Location: ../my-account.php#orders');
?>