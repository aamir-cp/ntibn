<?php require('./../../../wp-load.php'); ?><?php
 $name = $_POST['name'];

    $position = $_POST['position'];
    $email_user = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $user_phone = $_POST['user_phone'];
    $user_mobile = $_POST['user_mobile'];
    $user_fax = $_POST['user_fax'];
    $user_town = $_POST['user_town'];
    $user_state = $_POST['user_state'];
    $user_postal = $_POST['user_postal'];
    $user_postcode = $_POST['user_postcode'];
 $user_id = $current_user->id;  
    
//print_r($email_user);

    
//    $id_check = false;
//$user_id = wp_create_user( $name, $password, $email_user);
//if($user_id)
//{
//    $id_check = true;
//}
////
////if (!is_wp_error( $user_id )) {
//// Set the nickname
// wp_update_user(
//array(
//'ID'          =>    $user_id,
//'nickname'    =>    $_POST['name']
//)
//);

update_user_meta( $user_id, 'name', $name );
update_user_meta( $user_id, 'business_name', $business_name );
wp_set_password($user_password, $user_id);
//update_user_meta( $user_id, 'title', $title );
update_user_meta( $user_id, 'position', $position );
update_user_meta( $user_id, 'user_email', $email );
update_user_meta( $user_id, 'user_phone', $user_phone );
update_user_meta( $user_id, 'user_mobile', $user_mobile );
update_user_meta( $user_id, 'user_fax', $user_fax );
update_user_meta( $user_id, 'user_postal', $user_postal );
update_user_meta( $user_id, 'user_town', $user_town );
update_user_meta( $user_id, 'user_state', $user_state );
update_user_meta( $user_id, 'user_postcode', $user_postcode );

//
//
//
//$user = new WP_User( $user_id );
//$user->add_role( 'subscriber' );
//PAYMENT PROCEDURE

//echo $id_check;
//if($id_check == 1){ header('Location: '. site_url().'/registered.php');}

$to = $email_user; 
$subject = "NTIBN Membership";
$body = "Hi $name,<br/><br/><br/> Your NTIBN profile has been updated.<br><br>Sincerely NTIBN.";
$headers = array('Content-Type: text/html; charset=UTF-8','From: NTIBN <info@ntibn.com.au>');
 
wp_mail( $to, $subject, $body, $headers );
//wp_die();