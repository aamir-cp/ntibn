<?php ob_start(); /* Template Name: Search */ ?>
<?php get_header(); ?>
<style>
    .dropbtn{background-color:#3498db;color:#fff;padding:10px;font-size:16px;border:none;cursor:pointer;border-radius:7px}.dropbtn:focus,.dropbtn:hover{background-color:#2980b9}.dropdown{position:relative;display:inline-block}.dropdown-content{display:none;position:absolute;background-color:#f1f1f1;min-width:120px;overflow:auto;box-shadow:0 8px 16px 0 rgba(0,0,0,.2);z-index:1}.dropdown-content p{color:#000;padding:4px 4px;text-decoration:none;display:block;border-radius:7px}.dropdown a:hover{background-color:#ddd}.show{display:block}th{text-transform:uppercase;}
    .sdd{margin: 8px 0;display: inline-block;                                    border: 1px solid #ccc;                                    box-shadow: inset 0 1px 3px #ddd;                                    border-radius: 4px;                                    -webkit-box-sizing: border-box;                                    -moz-box-sizing:border-box;                                    box-sizing: border-box;                                    padding-left: 20px;                                   padding-right: 20px;                                    padding-top: 12px;                                    padding-bottom: 12px;}
    .search_btn{margin: 8px 0;display: inline-block;border: 1px solid #ccc;border-radius: 10px;-webkit-box-sizing: border-box;-moz-box-sizing: border-box;box-sizing: border-box;padding-left: 20px;      padding-right: 20px;padding-top: 12px;padding-bottom: 12px;}
    .m-r-10{margin-right: 10px;}
    .firHalf, .secHalf{display:block;float:left;width:48%;margin-right: 2%;}.firHalf * {    float: right;}
    .order-btn-cont{margin:0 auto;display:table;padding:20px 0;}
    .table-responsive{margin-top:10px;}
</style>
<?php 
function userRes(){
    if(is_user_logged_in()){ echo 'show';}else{echo 'hide';}
}
function guestRes(){
    if(is_user_logged_in()){ echo 'hide';}else{echo 'show';}
}
?>
<!--==========================
  search Section
============================-->
<section id="supporters">
    <div class="container">
        <form action="" method="post">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">

                        <div class="col-lg-4 col-md-4 col-sm-12 p-0 m-r-10" style="">
                            <select name="location" class="form-control search-slt sdd" id="exampleFormControlSelect1">
                                <option value="">Location</option>
                                <option value="Darwin">Darwin </option>
                                <option value="Katherine">Katherine </option>
                                <option value="Tennant Creek">Tennant Creek</option>
                                <option value="Alice Springs">Alice Springs</option>
                                <option value="Nhulunbuy">Nhulunbuy</option>
                                <option value="Supply Nation Registered">Supply Nation Registered</option>
                                <option value="Regional Remote Area">Regional Remote Area</option>
                            </select>
                        </div>

                        <div class="col-lg-5 col-md-5 col-sm-12 p-0 m-r-10">

                            <select name="industry" class="form-control search-slt sdd" id="exampleFormControlSelect2">
                                <option value=""><b>Industry Type</b></option>
                                <option value="Agriculture, Forestry and Fishing">Agriculture, Forestry and Fishing</option>
                                <option value="Mining">Mining </option>
                                <option value="Manufacturing">Manufacturing </option>
                                <option value="Electricity, Gas, Water and Waste Services">Electricity, Gas, Water and Waste Services</option>
                                <option value="Construction">Construction</option>
                                <option value="Wholesale Trade">Wholesale Trade</option>
                                <option value="Retail Trade">Retail Trade</option>
                                <option value="Accommodation and Food Services">Accommodation and Food Services</option>
                                <option value="Transport, Postal and Warehousing">Transport, Postal and Warehousing </option>
                                <option value="Information Media and Telecommunication">Information Media and Telecommunication </option>
                                <option value="Financial and Insaurance Services">Financial and Insaurance Services</option>
                                <option value="Rental, Hiring and Real Estate Services">Rental, Hiring and Real Estate Services</option>
                                <option value="Professional, Scientific and Technical Services">Professional, Scientific and Technical Services</option>
                                <option value="Administrative and Support Services">Administrative and Support Services</option>
                                <option value="Public Administration and Safety">Public Administration and Safety</option>
                                <option value="Education and Training">Education and Training </option>
                                <option value="Healthcare and Social Assistance">Healthcare and Social Assistance </option>
                                <option value="Art and Recreational Services">Art and Recreational Services</option>
                                <option value="other Services">other Services</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-12 p-0">
                            <button type="submit" style="" class="btn btn-success wrn-btn search_btn" name="search">Search</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
<div class="clearfix">&nbsp;</div>
<?php if (isset($_POST['search'])){ ?>       
<?php
global $wpdb;
$table = 'search';
$location = $_POST['location'];
$industry = $_POST['industry'];
//$output[] = "";
 //$where = "";
 if(!empty($location) && !empty($industry)){
	  $query = "SELECT * FROM $table WHERE buss_location LIKE '%$location%' AND b_industry LIKE  '%$industry%'";
 }elseif(!empty($location) && empty($industry)){
      $query = "SELECT * FROM $table WHERE buss_location LIKE '%$location%'"; 
 }elseif(empty($location) && !empty($industry)){
	$query = "SELECT * FROM $table WHERE b_industry LIKE  '%$industry%'";
 }?>
       <!--<script> console.log("<?=$query;?>");</script>-->
		
     <?php   $results = $wpdb->get_results ( $query );?>
       <div class="row <?= ( count($results) > 0) ? 'show' : 'hide' ?>">
<h2 class='text-success text-center'>
    <?= count($results) ?> Result<?= ( count($results) > 1) ? 's' : '' ?> found for your query,
    <span class="guest <?php guestRes();?>">Please sign in if you are a member<br/> 
    or order as a guest to purchase the report!</span>
    <span class="user <?php userRes();?>">The search report was sent to your email.</span>
</h2>
           <div class='<?php guestRes();?> order-btn-cont'>
            <div class="firHalf"><a href="<?= site_url() . '/login.php' ?>"><button class="btn btn-success btn-md">Member</button></a></div>
            <div class="secHalf"><a href="<?= site_url() . '/buy_results.php' ?>"><button class="btn btn-info btn-md">Guest</button></a></div>
           </div>
<!--            <div class='<?php userRes();?> order-btn-cont'>
            <div class="center"><a href="<?= site_url() . '/buy_results.php' ?>"><button class="btn btn-info btn-md">Order Now</button></a></div>
           </div>-->
       </div>  
     <?php       if (@count($results) > 0) {
                ?>
       <div class="table-responsive hide">
<?php $output .= "<table class='table table-border'>"?>
<?php $output .= "<tr style=''>"
                        . "<th style='text-align:center;line-height:25px;width:4%;border:1px dotted silver;padding:10px;padding:0;font-size:14px;font-family:sans-serif;text-transform:capitalize;'>id</th>"
                        . "<th style='line-height:25px;width:8%;border:1px dotted silver;padding:10px;padding:0;font-size:14px;font-family:sans-serif;text-transform:capitalize;text-align:left;'>name</th>"
                        . "<th style='line-height:25px;width:12%;border:1px dotted silver;padding:10px;padding:0;font-size:14px;font-family:sans-serif;text-transform:capitalize;text-align:left;'>business name</th>"
                        . "<th style='line-height:25px;width:30%;border:1px dotted silver;padding:10px;padding:0;font-size:14px;font-family:sans-serif;text-transform:capitalize;text-align:left;'>location</th>"
                        . "<th style='line-height:25px;width:15%;border:1px dotted silver;padding:10px;padding:0;font-size:14px;font-family:sans-serif;text-transform:capitalize;text-align:left;'>user email</th>"
                        . "<th style='line-height:25px;width:10%;border:1px dotted silver;padding:10px;padding:0;font-size:14px;font-family:sans-serif;text-transform:capitalize;text-align:left;'>state</th>"
                        . "<th style='line-height:25px;width:10%;border:1px dotted silver;padding:10px;padding:0;font-size:14px;font-family:sans-serif;text-transform:capitalize;text-align:left;'>town</th>"
                        . "</tr>";?>
                <?php
        foreach ( $results as $result ){
                ?>
                <?php $output .= "<tr style=''>";?>
                <?php $output .= "<td style='text-align:center;line-height:25px;border:1px dotted silver;padding:10px;font-size:12px;font-family:sans-serif;text-transform:capitalize;padding:0;'>$result->id</td>";?>
                <?php $output .= "<td style='line-height:25px;border:1px dotted silver;padding:10px;font-size:12px;font-family:sans-serif;text-transform:capitalize;padding:0;'>$result->name</td>";?>
                <?php $output .= "<td style='line-height:25px;border:1px dotted silver;padding:10px;font-size:12px;font-family:sans-serif;text-transform:capitalize;padding:0;'>$result->business_name </td>";?>
                <?php $output .= "<td style='line-height:25px;border:1px dotted silver;padding:10px;font-size:12px;font-family:sans-serif;text-transform:capitalize;padding:0;'>$result->buss_location </td>";?>
                <?php $output .= "<td style='line-height:25px;border:1px dotted silver;padding:10px;font-size:12px;font-family:sans-serif;text-transform:capitalize;padding:0;'>$result->user_email </td>";?>
                <?php $output .= "<td style='line-height:25px;border:1px dotted silver;padding:10px;font-size:12px;font-family:sans-serif;text-transform:capitalize;padding:0;'>$result->user_state </td>";?>
                <?php $output .= "<td style='line-height:25px;border:1px dotted silver;padding:10px;font-size:12px;font-family:sans-serif;text-transform:capitalize;padding:0;'>$result->user_town </td>";?>
                <?php $output .= "</tr>";?>
    <?php  }  ?>
<?php $output .= "</table>";?> 
       </div>
       
<?php 
//MAKING PDF
require_once get_template_directory().'/vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4']); // page size/format by name

  $loc = (($location !='') ? 'Location: '.$location: '');
  $and = (($location !='') ? ' & ': '');
  $and = (( $industry !='') ? ' & ': '');
  $ind = (($industry !='') ? 'Industry: '.$industry: '');
  session_start();
$search_query = $loc.$and.$ind;
$_SESSION['search_query'] = $search_query;

$html = "<div style='clear:both;display:table;margin:15px auto;background:rgb(221,221,221);'><img src='". site_url()."/wp-content/uploads/2019/12/logo-11-1.png' style='display:table;margin:0 auto;'></div><br/><h2 style='font-family:sans-serif;text-transform:capitalize;'>Report based on your search query</h2><h4 style='font-family:sans-serif;margin:15px 0;'>Your search query was: ' $loc $and $ind'</h4><br/>";
$html_new = "<div style='padding:10px;clear:both;display:table;margin:10px auto;background:black;color:white;font-size:11px;font-family:sans-serif;position:absolute;bottom:0;width:90%;left:0;right:0;'>Copyright 2020 &copy; NTIBN.</div>";

if($output != ""){
    $mpdf->WriteHTML($html.$output.$html_new);   
    }

$str = $location.'_'.$industry;
$str = str_replace(' ', '_', $str);
$str = str_replace(',', '', $str);
$filename = date('Y-m-d_H_i_s').$str;

$output = WP_CONTENT_DIR.'/uploads/reports/'.$filename.'.pdf';

$mpdf->Output($output,'F');

 $attachment = $output;
 $mail_attachment = array( $attachment );
 
  $_SESSION['download_report'] = $mail_attachment;
  $_SESSION['download_report_admin'] = site_url().'/wp-content/uploads/reports/'.$filename.'.pdf';
  
if(is_user_logged_in()){ 
    global $current_user;
    wp_get_current_user();
// EMAIL
 $name = $current_user->name;   
  $mail_attachment =  $_SESSION['download_report']; 
$to =  $current_user->user_email;
 $name = $current_user->user_nicename;
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
$uid =  $current_user->id; 
$to = $admin_e;  
$subject = "A search report was sent to a member";
$message = "Hi  Admin,  \r\n  \r\n";
$message .= "A report was sent to $current_user->user_email. attached is the report.  \r\n \r\n";
// $message .= "Attached is the the report.  \r\n";
//$message .= "NTIBN. \r\n";
$headers = array('charset=UTF-8','From: NTIBN <info@ntibn.com.au>');
wp_mail( $to, $subject, $message, $headers, $mail_attachment);
}/////// end sending members and admin email
}else{
    echo "<h2 class='text-danger text-center'>No Results Found!</h2>";
}  ?> 
<?php }//isset serach  ?>        
    </div>
</section>
<!--==========================
  Footer
============================-->
<?php  get_footer(); ?>