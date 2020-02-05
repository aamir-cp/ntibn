<?php

$statusMsg ='';
//echo '<pre>';
//print_r($_POST);
//exit;
//check whether stripe token is not empty
if(!empty($_POST['stripeToken'])){
    //get token, card and user info from the form
    $token  = $_POST['stripeToken'];
    $name = $_POST['card_holder_name'];
    
    $email = $_POST['user_email'];
    $card_num = $_POST['card_number'];
    $card_cvc = $_POST['cvv'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year = $_POST['exp_year'];
    $membership_fees = $_POST['membership_fees'];
     
    //include Stripe PHP library
    require_once('stripe-php-master/init.php');
    
 //KEY	
 
 include('skey.php');

      
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
    

    
    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $email,
        'source'  => $token
    ));
    $membership_fees=($membership_fees*100);
    //item information
    $itemName = "NTIBN Registration";
    $itemNumber = "NTIBNR";
    $itemPrice = $membership_fees;
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
        echo $transaction_id;
    }else{
        echo $statusMsg = "Transaction failed!";
        
    }
}else{
   // echo $_POST['stripeToken'].'<br/>';
   echo  $statusMsg = "Form submission error!";
   
}

//show success or error message
$statusMsg;?>