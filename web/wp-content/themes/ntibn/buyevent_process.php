
<?php require('./../../../wp-load.php'); ?><?php

$statusMsg ='';
//check whether stripe token is not empty
if(!empty($_POST['stripeToken'])){
    //get token, card and user info from the form
    $token  = $_POST['stripeToken'];
    $name = $_POST['card_holder_name'];
    global $email_user;
    $email_user = $_POST['user_email']; 
    $card_num = $_POST['card_number'];
    $card_cvc = $_POST['cvv'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year = $_POST['exp_year'];
    $event_price = $_POST['event_price'];
    $paid_for = $_POST['paid_for'];
    $paid_for_id = $_POST['paid_for_id'];
    $transaction_id = $_POST['transaction_id'];
    $date_paid = $_POST['date_paid'];
    global $event;
     $event = $_POST['event'];
     global $location;
     $location = $_POST['location'];
     
    //include Stripe PHP library
    require_once('stripe-php-master/init.php');
    
 //KEY	

include('skey.php');
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
    
    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $email_user,
        'source'  => $token
    ));
    $e_price=($event_price*100);
    //item information
    $itemName = "NTIBN Event";
    $itemNumber = "NTIBNEVEBT";
    $itemPrice = $e_price;
    $currency = "AUD";
    $orderID = "NTIBNR2020";
    
    //charge a credit or a debit card
    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $itemPrice,
        'currency' => $currency,
        'description' => $itemName,
//        'id' => $id,
        'metadata' => array(
            'order_id' => $orderID
        )
    ));
    
    //retrieve charge details
    $chargeJson = $charge->jsonSerialize();

    
    //check whether the charge is successful
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
        //order details 
        $amount = $chargeJson['amount'];
        $balance_transaction = $chargeJson['balance_transaction'];
        $transaction_id = $chargeJson['id'];
        $currency = $chargeJson['currency'];
        $status = $chargeJson['status'];
        $date_paid = date("Y-m-d");

 //PAYMENT PROCEDURE
global $wpdb;
$tablename = 'payments';
echo $insert_payment = $wpdb->insert($tablename, array(
    'name' => $name,
    'email' => $email_user,
    'payment' => $event_price,
    'paid_for' => $paid_for,
    'paid_for_id' => $paid_for_id,
    'paid_for_name' => $event,
    'transaction_id' => $transaction_id,
    'date_paid' => $date_paid
) //array
);//INSERT
              
    if($insert_payment){    echo $transaction_id;
    //SENDING EMAILS TO USERS
  //print_r($email_user);
 
$to = $email_user; 
$subject = "Your payment for event registration on NTIBN";
$body = "Hi $name, <br><br>";
$body .= "Thank you for registering for the $event, details are below:<br/><br/>";
$body .= "Event Name:  $event <br/>";
$body .= "Date: $date_paid<br/>";
$body .= "Location: $location<br/>";
$body .= "Number of Tickets Purchased: 1<br/><br/>";
$body .= "If you have any questions please call 08 89996268<br/><br/><br/>";
$body .= "NTIBN.";


$headers = array('Content-Type: text/html; charset=UTF-8','From: NTIBN <info@ntibn.com.au>');
 
wp_mail( $to, $subject, $body, $headers );


    } else{  echo $wpdb->last_error;}
    }else{
        $statusMsg = "Transaction failed!";
        echo 0;
    }
}else{
    $statusMsg = "Form submission error!";
    echo 0;
}

//show success or error message
$statusMsg;?>