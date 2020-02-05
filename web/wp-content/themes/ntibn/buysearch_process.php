<?php  session_start(); require('./../../../wp-load.php'); ?><?php 
$statusMsg ='';
//echo ($_SESSION['download_report_admin']);
//die();
//check whether stripe token is not empty
if(!empty($_POST['stripeToken'])){
    //get token, card and user info from the form
    $token  = $_POST['stripeToken'];
    $name = $_POST['card_holder_name'];
    
    $email_user = $_POST['user_email'];
    $card_num = $_POST['card_number'];
    $card_cvc = $_POST['cvv'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year = $_POST['exp_year'];
    $search_price = $_POST['search_price'];
    $paid_for = $_POST['paid_for'];
    $paid_for_name = $_POST['paid_for_name'];
    $transaction_id = $_POST['transaction_id'];
    $date_paid = $_POST['date_paid'];
    
     
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
    $e_price=($search_price*100);
    //item information
    $itemName = "NTIBN Search";
    $itemNumber = "NTIBNR";
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
        $date = date("Y-m-d H:i:s");

 //PAYMENT PROCEDURE
global $wpdb;
$tablename = 'payments';
//$paid_for_name = $_SESSION['search_query'];
$insert_payment = $wpdb->insert($tablename, array(
    'name' => $name,
    'email' => $email_user,
    'payment' => $search_price,
    'paid_for' => $paid_for,
    'paid_for_name' => $paid_for_name,
    'if_report_link' => $_SESSION['download_report_admin'],
    'transaction_id' => $transaction_id,
    'date_paid' => $date_paid
) //array
);//INSERT
              
    if($insert_payment){    echo $transaction_id;
    //EMAIL
  $mail_attachment =  $_SESSION['download_report']; 
$to = $email_user; 
// $to = 'aamir.2k18@gmail.com'; 
$subject = "Your request for NTIBN report";
$message = "Hi  $name,  \r\n  \r\n";
$message .= "Your requested NTIBN report is attached.  \r\n \r\n";
// $message .= "Attached is the the report.  \r\n";
$message .= "NTIBN. \r\n";
$headers = array('charset=UTF-8','From: NTIBN <info@ntibn.com.au>');
wp_mail( $to, $subject, $message, $headers, $mail_attachment);
// wp_mail( $to, $subject, $message, $headers);
//////////////
//email admin
/////////////
$admin_e = get_bloginfo('admin_email');
$to = $admin_e;  
$subject = "A user purchased search report";
$message = "Hi  Admin,  \r\n  \r\n";
$message .= "A purchase was by made by $name. attached is the report.  \r\n \r\n";
// $message .= "Attached is the the report.  \r\n";
//$message .= "NTIBN. \r\n";
$headers = array('charset=UTF-8','From: NTIBN <info@ntibn.com.au>');
wp_mail( $to, $subject, $message, $headers, $mail_attachment);

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