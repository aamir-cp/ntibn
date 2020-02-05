<?php require('./../../../wp-load.php'); ?><?php
 $name = $_POST['name'];
    $business_name = $_POST['business_name'];
    //$joining_date = $date; //member_type  //business_type //user_type // `user_postal`,
    $title = $_POST['title'];
    $position = $_POST['position'];
    $email_user = $_POST['user_email'];
    $user_phone = $_POST['user_phone'];
    $user_mobile = $_POST['user_mobile'];
    $user_fax = $_POST['user_fax'];
    $user_town = $_POST['user_town'];
    $user_state = $_POST['user_state'];
    $user_postal = $_POST['user_postal'];
    $user_postcode = $_POST['user_postcode'];
    $buss_website = $_POST['buss_website'];
    $buss_email = $_POST['buss_email'];
    $buss_mobile = $_POST['buss_mobile'];
    $buss_town = $_POST['buss_town'];
    $buss_state = $_POST['buss_state'];
    $buss_fax = $_POST['buss_fax'];
    $buss_postcode = $_POST['buss_postcode'];
    $tal_name = $_POST['tal_name'];
    $tal_phone = $_POST['tal_phone'];
    $tal_address = $_POST['tal_address'];
    $tal_email = $_POST['tal_email'];
    $abn_entityname = $_POST['abn_entityname'];
//    $abn = $_POST['abn'];
//    $acn = $_POST['acn'];
    $buss_type = $_POST['business_type'];
    @$profit = $_POST['profit'];
    @$indi_owned = $_POST['indi_owned'];
    @$buss_location = $_POST['buss_location'];
    $buss_staff = $_POST['buss_staff'];
    $buss_indistaff = $_POST['buss_indistaff'];
    // core_activity = $_POST['']; 
    $sign_name = $_POST['sign_name'];

    $sign_position = $_POST['sign_position'];
    $sign_bussname = $_POST['sign_bussname'];
    $icn_reg = $_POST['icn_reg'];
    $supply_nation_registered = $_POST['supply_nation_registered'];
    $tal_town = $_POST['tal_town'];
    $tal_state = $_POST['tal_state'];
    $tal_postcode = $_POST['tal_postcode'];
    @$indi_decent = $_POST['indi_decent'];
    $circumstances = $_POST['circumstances'];
    $t_description = $_POST['t_description']; 
    $bank_name = $_POST['bank_name'];
    $payment_type = $_POST['payment_type'];
    $card_holder_name = $_POST['card_holder_name'];
    
    $b_industry = $_POST['b_industry'];
    $principal_place = $_POST['principal_place'];
    $add_line2 = $_POST['add_line2'];
    $date_business_commenced = $_POST['date_business_commenced'];
    $buss_description = $_POST['buss_description'];
    
    $password = $_POST['user_password'];
    
    $signature  = $_POST['signature'];
    
    $add_doc_1  = $_POST['add_doc_1'];
    
    $add_doc_2  = $_POST['add_doc_2'];
    
    $add_doc_3  = $_POST['add_doc_3'];
    
    $talent_signature  = $_POST['talent_signature'];
    $membership_fees  = $_POST['membership_fees'];
    $associate_membership_fees  = $_POST['associate_membership_fees'];
    $cvv  = $_POST['cvv'];
    $card_number  = $_POST['card_number'];
    $expiration_date   = $_POST['exp_month'].'/'.$_POST['exp_year'];
    $transaction_id = $_POST['transaction_id'];
    $paid_for = $_POST['paid_for'];
    $user_type = $_POST['user_type'];
    $date_paid = $_POST['date_paid'];
    $membership_type = $_POST['membership_type'];
    
//print_r($email_user);

    
    $id_check = false;
$user_id = wp_create_user( $name, $password, $email_user);
if($user_id)
{
    $id_check = true;
}
//
//if (!is_wp_error( $user_id )) {
// Set the nickname
 wp_update_user(
array(
'ID'          =>    $user_id,
'nickname'    =>    $_POST['name']
)
);

update_user_meta( $user_id, 'name', $name );
update_user_meta( $user_id, 'business_name', $business_name );
//update_user_meta( $user_id, 'user_password', $user_password );
update_user_meta( $user_id, 'title', $title );
update_user_meta( $user_id, 'position', $position );
//update_user_meta( $user_id, 'user_email', $email );
update_user_meta( $user_id, 'user_phone', $user_phone );
update_user_meta( $user_id, 'user_mobile', $user_mobile );
update_user_meta( $user_id, 'user_fax', $user_fax );
update_user_meta( $user_id, 'user_postal', $user_postal );
update_user_meta( $user_id, 'user_town', $user_town );
update_user_meta( $user_id, 'user_state', $user_state );
update_user_meta( $user_id, 'user_postcode', $user_postcode );
update_user_meta( $user_id, 'buss_website', $buss_website );
update_user_meta( $user_id, 'buss_email', $buss_email );
update_user_meta( $user_id, 'buss_mobile', $buss_mobile );

update_user_meta( $user_id, 'buss_town', $buss_town );
update_user_meta( $user_id, 'buss_state', $buss_state );
update_user_meta( $user_id, 'buss_fax', $buss_fax );
update_user_meta( $user_id, 'buss_postcode', $buss_postcode);
update_user_meta( $user_id, 'tal_name', $tal_name );
update_user_meta( $user_id, 'tal_phone', $tal_phone );
update_user_meta( $user_id, 'tal_address', $tal_address );
update_user_meta( $user_id, 'tal_email', $tal_email );
update_user_meta( $user_id, 'abn_entityname', $abn_entityname);
//update_user_meta( $user_id, 'abn', $abn );
//update_user_meta( $user_id, 'acn', $acn );
update_user_meta( $user_id, 'principal_place', $principal_place );
update_user_meta( $user_id, 'add_line2', $add_line2);

update_user_meta( $user_id, 'date_business_commenced', $date_business_commenced);
update_user_meta( $user_id, 'buss_description', $buss_description);
update_user_meta( $user_id, 'buss_type', $buss_type);

update_user_meta( $user_id, 'profit', $profit );
update_user_meta( $user_id, 'indi_owned', $indi_owned );
update_user_meta( $user_id, 'buss_location', $buss_location );
update_user_meta( $user_id, 'buss_staff', $buss_staff );

update_user_meta( $user_id, 'buss_indistaff', $buss_indistaff );
update_user_meta( $user_id, 'sign_name', $sign_name );
update_user_meta( $user_id, 'sign_position', $sign_position );
update_user_meta( $user_id, 'sign_bussname', $sign_bussname );

update_user_meta( $user_id, 'signature', $signature );
update_user_meta( $user_id, 'add_doc_1', $add_doc_1 );
update_user_meta( $user_id, 'add_doc_2', $add_doc_2 );
update_user_meta( $user_id, 'add_doc_3', $add_doc_3 );
update_user_meta( $user_id, 'talent_signature', $talent_signature );


update_user_meta( $user_id, 'icn_reg', $icn_reg );
update_user_meta( $user_id, 'supply_nation_registered', $supply_nation_registered);
update_user_meta( $user_id, 'tal_town', $tal_town );
update_user_meta( $user_id, 'tal_state', $tal_state );
update_user_meta( $user_id, 'tal_postcode', $tal_postcode );
update_user_meta( $user_id, 'tal_email', $tal_email );
update_user_meta( $user_id, 'indi_decent', $indi_decent );
update_user_meta( $user_id, 'circumstances', $circumstances );
update_user_meta( $user_id, 't_description', $t_description );
update_user_meta( $user_id, 'bank_name', $bank_name );
update_user_meta( $user_id, 'payment_type', $payment_type );
update_user_meta( $user_id, 'card_holder_name', $card_holder_name );
update_user_meta( $user_id, 'cvv', $cvv );
update_user_meta( $user_id, 'b_industry', $b_industry );
update_user_meta( $user_id, 'card_number', $card_number );
update_user_meta( $user_id, 'membership_fees', $membership_fees );
update_user_meta( $user_id, 'membership_type', $membership_type );
update_user_meta( $user_id, 'expiration_date', $expiration_date );
update_user_meta( $user_id, 'transaction_id', $transaction_id );
update_user_meta( $user_id, 'paid_for', $paid_for );
update_user_meta( $user_id, 'user_type', $user_type );
update_user_meta( $user_id, 'date_paid', $date_paid );


$user = new WP_User( $user_id );
$user->add_role( 'subscriber' );
//PAYMENT PROCEDURE
global $wpdb;
$tablename = 'payments';
$wpdb->insert($tablename, array(
    'name' => $name,
    'email' => $email_user,
    'payment' => $membership_fees,
    'paid_for' => $paid_for,
    'paid_for_id' => $user_id,
    'transaction_id' => $transaction_id,
    'date_paid' => $date_paid
    ) //array
);//INSERT
echo $id_check;
//if($id_check == 1){ header('Location: '. site_url().'/registered.php');}

$to = $email_user; 
$subject = "NTIBN Membership";
$body = "Hi $name,<br/><br/><br/> Thanks for registering with NTIBN.<br><br>Sincerely NTIBN.";
$headers = array('Content-Type: text/html; charset=UTF-8','From: NTIBN <info@ntibn.com.au>');
 
wp_mail( $to, $subject, $body, $headers );
//wp_die();