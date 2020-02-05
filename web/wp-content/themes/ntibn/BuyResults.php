<?php /* Template Name: BuyResults */ session_start();
if ( is_user_logged_in() ) { 
    global $current_user;
    wp_get_current_user();
 }
 $price = '10';
?>
<?php get_header(); ?>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<?php if (have_posts()):while (have_posts()):the_post(); ?>
<?php //echo $_SESSION['download_report'][0].' is the file to download!';?>
<section id="supporters">
<div class="container">


<div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
<div class="card card-signin my-5">
    
<div class="card-body">
<h5 class="card-title text-center"> <b>BUY Search results</b></h5>
<form class="form-signin" id="payment-form" method="post">
    
<div class="form-group">
<label>Email:</label>
<input type="email" required="required" data-stripe="email"  name="user_email" id="user_email" placeholder="Email" class="form-control" value="<?=is_user_logged_in()?get_the_author_meta('email', $user->ID):''?>"/>
</div>

<div class="form-group">
<label>Holder Name: </label>
<input type="text" name="card_holder_name" id="card_holder_name" placeholder="Holder Name" class="form-control" value="<?=is_user_logged_in()?get_the_author_meta('nickname', $user->ID):''?>"/>
</div>


<div class="form-group">
<label>Card Number: </label>
<input type="text" id="card_number" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" name="card_number" id="number" maxlength="20" data-stripe="number" placeholder="Card Number" class="form-control">
</div>

<div class="form-group">
<label>CCV: </label>
<input type="text" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" name="cvv" id="cvv" size="4" maxlength="3" minlength="3" data-stripe="cvc" placeholder="CVC" class="form-control">
</div>

<b> Amount: $<?=$price;?> </b>

<br>
<br>
<div class="container-fluid">
<div class="row form-inline">
<div class="form-group col-md-3 col-xs-3">
<label>Expiry Date: </label>
</div>
<div class="form-group col-md-3 col-xs-3">
<label>Month: </label>
<select name="exp_month" id="exp_month" class="form-control" data-stripe="exp_month">
<option value="01">Jan</option>
<option value="02">Feb</option>
<option value="03">Mar</option>
<option value="04">Apr</option>
<option value="05">May</option>
<option value="06">Jun</option>
<option value="07">Jul</option>
<option value="08">Aug</option>
<option value="09">Sep</option>
<option value="10">Oct</option>
<option value="11">Nov</option>
<option value="12">Dec</option>

</select>
</div>
<div class="form-group col-md-3 col-xs-3">
<label>Year: </label>
<select class="form-control" name="exp_year" id="exp_year" data-stripe="exp_year">

<option value="2020" selected="">2020</option>
<option value="2021">2021</option>
<option value="2022">2022</option>
<option value="2023">2023</option>
<option value="2024">2024</option>
<option value="2025">2025</option>
<option value="2026">2026</option>
<option value="2027">2027</option>
<option value="2028">2028</option>
<option value="2029">2029</option>
<option value="2030">2030</option>
</select>
</div>
</div>
</div>
<?php $paid_for_name = $_SESSION['search_query'];?>
<hr class="my-4">
<input type="hidden" name="transaction_id" id="transaction_id" value=""/>
<!--<input type="hidden" name="user_type" id="user_type" value="<?=is_user_logged_in()?'Member':'Guest'?>"/>-->
<input type="hidden" name="search_price" id="search_price" value="<?=$price;?>"/>
<input type="hidden" name="paid_for" id="paid_for" value="Search Report"/>
<input type="hidden" name="paid_for_name" id="paid_for_name" value="<?=$paid_for_name;?>"/>
<input type="hidden" name="date_paid" id="date_paid" value="<?=date("Y-m-d")?>"/>
<div class="response text-center"><div class="form-group"><span class="payment-errors b text-danger"></span></div></div>
<button id="thebutton" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Buy</button>
</form>

</div>
</div>
</div>


</div>

</section>

<?php endwhile;
endif; ?>
<?php include('skey.php');?>
<script type="text/javascript">
/**********
 * STRIPE 
 **********/
$ = jQuery;
var jq = $.noConflict();
jq(document).ready(function () {
// This identifies your website in the createToken call below
Stripe.setPublishableKey('<?=$stripe['publishable_key'];?>');
 
var stripeResponseHandler = function(status, response) {
var form = jq('#payment-form');
 
if (response.error) {
// Show the errors on the form
form.find('.payment-errors').text(response.error.message);
//form.find('button').prop('disabled', false);
} else {
// token contains id, last4, and card type
var token = response.id;
// Insert the token into the form so it gets submitted to the server
form.append(jq('<input type="hidden" name="stripeToken" />').val(token));
// and re-submit
//form.get(0).submit();

// Serialize the form
var data=jq('#payment-form').serialize(); 
console.log(data);
// Send form to server with POST method

	jq.ajax({
		type: "POST",
		url: '<?=get_template_directory_uri()."/buysearch_process.php"?>',
		data: data,
		success: function(response){
                    
//                    alert(data);
//                    console.log(response);
			form.find('button').prop('disabled', false);
                        if(response != 0){
                             jq('.payment-errors').html('Payment Successful.<br/> Search restults were sent to your provided email address.');
                             jq('.payment-errors').removeClass('text-danger').addClass('text-success');
                             jq('#transaction_id').val(response);
                             jq('form')[0].reset();
                             jq('#thebutton').prop('disabled', true);
                        }else{
                             jq('.payment-errors').html('Payment Failed!');
                        }                       
		},  error: function(e) {       
        console.log(e);
		//alert('error: '+e);
  }
	});


// Prevent page from refreshing
return false;

}
};
// ONCLICK RESPONSE 

jq('#thebutton').on('click', function(e) {
var form = jq('#payment-form');
// alert('test');
// Disable the submit button to prevent repeated clicks
//form.find('button').prop('disabled', true);
 
Stripe.card.createToken(form, stripeResponseHandler);
 
// Prevent the form from submitting with the default action
return false;

});


});//doc read
</script>
<?php get_footer(); ?>