<?php /* get theme options */ $options = get_option('theme_settings'); ?>
<!--==========================
      client Section
    ============================-->
<section id="supporters" class="section-with-bg wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="container">
        <div class="row no-gutters supporters-wrap clearfix">
            <div class="col-lg-4 col-md-4 col-xs-6">
                <div class="supporter-logo">
                    <?php dynamic_sidebar('client_1'); ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-6">
                <div class="supporter-logo">
                    <?php dynamic_sidebar('client_2'); ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-6">
                <div class="supporter-logo">
                    <?php dynamic_sidebar('client_3'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!--==========================
      Contact Section
    ============================-->
<section id="contact" class="section-bg wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <?php dynamic_sidebar('contact_1'); ?>
            </div>
            <div class="col-md-3 contact-info">

                <div class="contact-phone">
                    <?php dynamic_sidebar('contact_2'); ?>
                </div>
            </div>
            <div class="col-md-4 venue-map">
                <?php dynamic_sidebar('contact_3'); ?>
            </div>
            <div class="col-md-1">
                <div class="social-links">
                    <?php if (!empty($options['linkedin'])): ?>
                        <a href="<?= $options['linkedin']; ?>" class="linkedin"
                           target="_blank"><i class="fa fa-linkedin"></i></a>
                       <?php endif; ?>  
                       <?php if (!empty($options['twitter'])): ?>
                        <a href="<?= $options['twitter']; ?>" class="twitter" target="_blank">
                            <i class="fa fa-twitter"></i></a>
                    <?php endif; ?> 
                    <?php if (!empty($options['facebook'])): ?>
                        <a href="<?= $options['facebook']; ?>" class="facebook" target="_blank"><i
                                class="fa fa-facebook"></i></a>
                        <?php endif; ?>  
                        <?php if (!empty($options['instagram'])): ?>
                        <a href="<?= $options['instagram']; ?>" class="instagram" target="_blank"><i
                                class="fa fa-instagram"></i></a>
                        <?php endif; ?> 
                        <?php if (!empty($options['youtube'])): ?>
                        <a href="<?= $options['youtube']; ?>" class="youtube" target="_blank"><i
                                class="fa fa-youtube"></i></a>
                        <?php endif; ?>        
                        <?php if (!empty($options['google_plus'])): ?>
                        <a href="<?= $options['google_plus']; ?>" class="google_plus" target="_blank"><i
                                class="fa fa-google-plus"></i></a>
                        <?php endif; ?>     
                        <?php if (!empty($options['whatsapp'])): ?>
                        <a href="<?= $options['whatsapp']; ?>" class="whatsapp" target="_blank"><i
                                class="fa fa-whatsapp"></i></a>
                        <?php endif; ?>    
                        <?php if (!empty($options['pinterest'])): ?>
                        <a href="<?= $options['pinterest']; ?>" class="pinterest" target="_blank"><i
                                class="fa fa-pinterest"></i></a>
                        <?php endif; ?>         
                </div>
            </div>
        </div>
    </div>
</section><!-- #contact -->

</main>
<!--==========================
Footer
============================-->
<footer>
    <section id="footer" class="section-bg wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 policies-links">
                    <?php
                    $args = array(
                        'theme_location' => 'footer_menu',
                        'menu' => 'footer_menu',
                        'container' => false,
                        'container_class' => '',
                        'container_id' => '',
                        'menu_class' => '',
                        'menu_id' => '',
                        'echo' => true,
                        'fallback_cb' => '',
                        'before' => '',
                        'after' => '',
                        'link_before' => '',
                        'link_after' => '',
                        'items_wrap' => '<ul>%3$s</ul>',
                        'depth' => 1,
                        'walker' => new Walker_Nav_Mobile(), // This controls the display of the Bootstrap Navbar
                        'fallback_cb' => 'Walker::fallback', // For menu fallback
                    );
                    ?>    
<?php wp_nav_menu($args); ?>
                </div>
            </div>
        </div>
    </section>
</footer><!-- #footer -->

<a href="#" class="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>

<div id="mobile-body-overly"></div>
<?php wp_footer(); ?>
<script>
var radioValue;
//  
//$('.Session').click(function(){
//   if(this.value == 'b1' && this.checked){
//       console.log($('input[value=2], input[value=3], input[value=4], input[value=5], input[value=6], input[value=7]'));
//        $('iinput[value=2], input[value=3], input[value=4], input[value=5], input[value=6], input[value=7]').prop('disabled', true);
//   }
//   else if(this.value == 'b2' && this.checked){
//        $('input[value=1], input[value=3], input[value=4], input[value=5], input[value=6], input[value=7]').prop('disabled', true);
//   }
//   else if(this.value == 'b3' && this.checked){
//        $('input[value=1], input[value=2], input[value=4], input[value=5], input[value=6], input[value=7]').prop('disabled', true);   
//   }
//   else if(this.value == 'b4' && this.checked){
//        $('input[value=1], input[value=2], input[value=3], input[value=5], input[value=6], input[value=7]').prop('disabled', true);   
//   }
//   else if(this.value == 'b5' && this.checked){
//        $('input[value=1], input[value=2], input[value=3], input[value=4], input[value=6], input[value=7]').prop('disabled', true);   
//   }
//   else if(this.value == 'b6' && this.checked){
//        $('input[value=1], input[value=2], input[value=3], input[value=4], input[value=5], input[value=7]').prop('disabled', true);   
//   }
//   else if(this.value == 'b7' && this.checked){
//        $('input[value=1], input[value=2], input[value=3], input[value=4], input[value=5], input[value=6]').prop('disabled', true);   
//   }
//   else{
//      $('.Session').not(this).prop('checked', false).prop('disabled', false);
//   }
//});

</script>
<script>
$ = jQuery;
var jq = $.noConflict();
jq(document).ready(function () {
  "use strict";

  
   function scroll_to_class(element_class, removed_height) 
   {
    var scroll_to = jq(element_class).offset().top - removed_height;
      if(jq(window).scrollTop() != scroll_to) 
      {
        jq('html, body').stop().animate({scrollTop: scroll_to}, 0);
      }
    }

function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
  
function isPhone(phoneno) {
  var phone = /^\d{8,12}$/;
  return phoneno.match(phone);
}
function bar_progress(progress_line_object, direction) {
	var number_of_steps = progress_line_object.data('number-of-steps');
	var now_value = progress_line_object.data('now-value');
	var new_value = 0;
	if(direction == 'right') {
		new_value = now_value + ( 100 / number_of_steps );
	}
	else if(direction == 'left') {
		new_value = now_value - ( 100 / number_of_steps );
	}
	progress_line_object.attr('style', 'width: ' + new_value + '%;').data('now-value', new_value);
}  
    /*
        Form
    */
    jq('.form-wizard fieldset:first').fadeIn('slow');
    
    jq('.form-wizard .required').on('focus', function() {
    	jq(this).removeClass('input-error');
    });
// next step
    jq('.form-wizard .btn-next').on('click', function() {
        
        //validations
        if(jq(this).attr('id') == "firstNext"){

function focused(field){
    jq('.confirm').click(function(){ jq('.form-control').removeClass('focused'); jq(field).focus().addClass('focused');
    jq(field).keyup(function(){jq(field).removeClass('focused')});
    });
}
          if(jq('#title').val() == ''){
              swal("Error!", "Please enter title.", "warning");
              focused('#title');
//jq('.confirm').click(function(){ jq('#title').focus().addClass('focused');jq('#title').keyup(function(){jq('#title').removeClass('focused')})});
//              setTimeout(function() { jq('#title').focus() }, 500);
              return false;
          }
          if(jq('#name').val() == ''){
              swal("Error!", "Please enter full name.", "warning");
              focused('#name');
              return false;
          }
          if(jq('#position').val() == ''){
              swal("Error!", "Please enter position.", "warning");
            focused('#position');
              return false;
          }
          if(jq('#user_email').val() == ''){
              swal("Error!", "Please enter email.", "warning");
              focused('#user_email');
              return false;
          }
          if(jq('#user_password').val() == ''){
              swal("Error!", "Please enter your preferred password.", "warning");
              focused('#user_password');
              return false;
          }
//          if(isEmail(jq('#email').val()) == false){
//            swal("Error!", "Please enter valid email.", "warning");
//              jq('#email').focus();
//              return false;
//          }
          if(jq('#user_phone').val() == ''){
              swal("Error!", "Please enter phone number.", "warning");
              focused('#user_phone');
              return false;
          }
         /*  if(isPhone(jq('#phonenumber').val()) == null){
            swal("Error!", "Please enter valid phone number.", "warning");
              jq('#phonenumber').focus();
              return false;
          } */
          if(jq('#user_mobile').val() == ''){
              swal("Error!", "Please enter mobile number.", "warning");
              focused('#user_mobile');
              return false;
          }
//          if(isPhone(jq('#mobilenumber').val()) == null){
//            swal("Error!", "Please enter valid mobile number.", "warning");
//              jq('#mobilenumber').focus();
//              return false;
//          }
           if(jq('#user_fax').val() == ''){
               swal("Error!", "Please enter fax.", "warning");
               focused('#user_fax');
               return false;
           }

          if(jq('#user_town').val() == ''){
              swal("Error!", "Please enter town.", "warning");
              focused('#user_town');
              return false;
          }
          if(jq('#user_state').val() == ''){
              swal("Error!", "Please enter state.", "warning");
              focused('#user_state');
              return false;
          }
          if(jq('#user_postcode').val() == ''){
              swal("Error!", "Please enter postcode.", "warning");
              focused('#user_postcode');
              return false;
          }
          if(jq('#user_postal').val() == ''){
              swal("Error!", "Please enter postal.", "warning");
              focused('#user_postal');
              return false;
          }
          if(jq('#abn_entityname').val() == ''){
              swal("Error!", "Please enter ABN Entity Name", "warning");
              focused('#abn_entityname');
              return false;
          }
          if(jq('#business_name').val() == ''){
              swal("Error!", "Please enter Business/Trading Name.", "warning");
              focused('#business_name');
              return false;
          }
//          if(jq('#b_industry').val() == ''){
//              swal("Error!", "Please select Business Industry.", "warning");
//              jq('#b_industry').focus();
//              return false;
//          }
          if(jq('#abn').val() == ''){
              swal("Error!", "Please enter ABN.", "warning");
              focused('#abn');
              return false;
          }
           if(jq('#acn').val() == ''){
              swal("Error!", "Please enter ACN.", "warning");
              focused('#acn');
              return false;
          } 
          if(jq('#principal_place').val() == ''){
              swal("Error!", "Please enter Principal Place Business.", "warning");
              focused('#principal_place');
              return false;
          }
          if(jq('#buss_email').val() == ''){
              swal("Error!", "Please enter Business Email.", "warning");
              focused('#buss_email');
              return false;
          }

           if(jq('#website').val() == ''){
              swal("Error!", "Please enter website.", "warning");
              focused('#website');
              return false;
          } 
          if(jq('#date_business_commenced').val() == ''){
              swal("Error!", "Please enter Date Business Commenced.", "warning");
              focused('#date_business_commenced');
              return false;
          }

          if(jq('#buss_mobile').val() == ''){
              swal("Error!", "Please enter Business Mobile Number.", "warning");
              focused('#buss_mobile');
              return false;
          }
//          if(isPhone(jq('#bmobilenumber').val()) == null){
//            swal("Error!", "Please enter valid Business Mobile Number.", "warning");
//              jq('#bmobilenumber').focus();
//              return false;
//          }
          if(jq("input[name='business_type']:checked").val() == '' || jq("input[name='business_type']:checked").val() == undefined){
              swal("Error!", "Please select Business Type.", "warning");
              focused("input[name='business_type']");
              return false;
          }
//		  radioValue = jq("input[name='b_owned']:checked").val();	  
        }
  
        if(jq(this).attr('id') == "secondNext"){

            if(jq("input[name='buss_location[]']:checked").val() == undefined){
                swal("Error!", "Please select business location.", "warning");
                focused("input[name='buss_location[]'");
                return false;
            }
            if(jq('#buss_staff').val() == ''){
              swal("Error!", "Please enter no. of staff.", "warning");
              focused('#buss_staff');
              return false;
          }
          if(jq('#buss_indistaff').val() == ''){
              swal("Error!", "Please enter no. of indigenous staff.", "warning");
              focused('#buss_indistaff');
              return false;
          }

          if(jq('#buss_description').val() == ''){
              swal("Error!", "Please briefly describe the core activities of the business.", "warning");
              focused('#buss_description');
              return false;
          }

          if(jq('#sign_name').val() == ''){
              swal("Error!", "Please enter signature full name.", "warning");
              focused('#sign_name');
              return false;
          }
          if(jq('#sign_position').val() == ''){
              swal("Error!", "Please enter position.", "warning");
              focused('#sign_position');
              return false;
          }

          if(jq('#signature_file').val() == ''){
              swal("Error!", "Please upload signature.", "warning");
              focused('#signature_file');
              return false;
          }

        }
        
        if(jq(this).attr('id') == "thirdNext"){
			/* alert(radioValue) */
			if(radioValue == 'n'){
				jq('#hidevalueNOtselected').hide();
			}else{
				jq('#hidevalueNOtselected').show();
			}
			
            if(jq('#tal_name').val() == ''){
              swal("Error!", "Please enter Talent full name.", "warning");
              focused('#tal_name');
              return false;
          }

            if(jq('#tal_phone').val() == ''){
              swal("Error!", "Please Talent phone number.", "warning");
              jq('#tal_phone').focus();
              return false;
          }

          if(jq('#tal_town').val() == ''){
              swal("Error!", "Please enter town.", "warning");
              jq('#tal_town').focus();
              return false;
          }


           if(jq('#tal_state').val() == ''){
              swal("Error!", "Please enter state.", "warning");
              jq('#tal_state').focus();
              return false;
          }

          if(jq('#tal_postcode').val() == ''){
              swal("Error!", "Please enter postcode.", "warning");
              jq('#tal_postcode').focus();
              return false;
          }

          if(jq('#tal_email').val() == ''){
              swal("Error!", "Please enter email.", "warning");
              jq('#tal_email').focus();
              return false;
          }

          /*if(jq('#bank_name').val() == ''){
              swal("Error!", "Please enter bank name.", "warning");
              jq('#bank_name').focus();
              return false;
          }

          if(jq('#card_holder_name').val() == ''){
              swal("Error!", "Please enter card holder name.", "warning");
              jq('#card_holder_name').focus();
              return false;
          }

          if(jq('#card_number').val() == ''){
              swal("Error!", "Please enter card number.", "warning");
              jq('#card_number').focus();
              return false;
          }*/

        }
 
    	var parent_fieldset = jq(this).parents('fieldset');
    	var next_step = true;
      console.log(parent_fieldset);
    	// navigation steps / progress steps
    	var current_active_step = jq(this).parents('.form-wizard').find('.form-wizard-step.active');
      console.log(current_active_step);
    	var progress_line = jq(this).parents('.form-wizard').find('.form-wizard-progress-line');
    	
    	// fields validation
    	parent_fieldset.find('.required').each(function() {
    		if( jq(this).val() == "" ) {
    			jq(this).addClass('input-error');
    			next_step = false;
    		}
    		else {
    			jq(this).removeClass('input-error');
    		}
    	});
    	// fields validation
    	
    	if( next_step ) {
    		parent_fieldset.fadeOut(400, function() {
    			// change icons
    			current_active_step.removeClass('active').addClass('activated').next().addClass('active');
    			// progress bar
    			bar_progress(progress_line, 'right');
    			// show next step
	    		jq(this).next().fadeIn();
	    		// scroll window to beginning of the form
    			scroll_to_class( jq('.form-wizard'), 20 );
                
	    	});
    	}
    	
    });
    
    // previous step
    jq('.form-wizard .btn-previous').on('click', function() {
    	// navigation steps / progress steps
    	var current_active_step = jq(this).parents('.form-wizard').find('.form-wizard-step.active');
       
    	var progress_line = jq(this).parents('.form-wizard').find('.form-wizard-progress-line');
    	
    	jq(this).parents('fieldset').fadeOut(400, function() {
    		// change icons
    		current_active_step.removeClass('active').prev().removeClass('activated').addClass('active');
    		// progress bar
    		bar_progress(progress_line, 'left');
    		// show previous step
    		jq(this).prev().fadeIn();
    		// scroll window to beginning of the form
			scroll_to_class( jq('.form-wizard'), 20 );
    	});
    });
    //submit
    jq('.form-wizard').on('submit', function(e) {
    	
    	// fields validation
    	jq(this).find('.required').each(function() {
    		if( jq(this).val() == "" ) {
    			e.preventDefault();
    			jq(this).addClass('input-error');
    		}
    		else {
    			jq(this).removeClass('input-error');
    		}
    	});
    	// fields validation
    });
   });//ends noconfl
// image uploader scripts 
/* var $dropzone = $('.image_picker'),
    $droptarget = $('.drop_target'),
    $dropinput = $('#inputFile'),
    $dropimg = $('.image_preview'),
    $remover = $('[data-action="remove_current_image"]');
$dropzone.on('dragover', function() {
  $droptarget.addClass('dropping');
  return false;
});

$dropzone.on('dragend dragleave', function() {
  $droptarget.removeClass('dropping');
  return false;
});

$dropzone.on('drop', function(e) {
  $droptarget.removeClass('dropping');
  $droptarget.addClass('dropped');
  $remover.removeClass('disabled');
  e.preventDefault();
  
  var file = e.originalEvent.dataTransfer.files[0],
      reader = new FileReader();

  reader.onload = function(event) {
    $dropimg.css('background-image', 'url(' + event.target.result + ')');
  };
  
  console.log(file);
  reader.readAsDataURL(file);

  return false;
});

$dropinput.change(function(e) {
  $droptarget.addClass('dropped');
  $remover.removeClass('disabled');
  $('.image_title input').val('');
  
  var file = $dropinput.get(0).files[0],
      reader = new FileReader();
  
  reader.onload = function(event) {
    $dropimg.css('background-image', 'url(' + event.target.result + ')');
  }
  
  reader.readAsDataURL(file);
});

$remover.on('click', function() {
  $dropimg.css('background-image', '');
  $droptarget.removeClass('dropped');
  $remover.addClass('disabled');
  $('.image_title input').val('');
});

$('.image_title input').blur(function() {
  if ($(this).val() != '') {
    $droptarget.removeClass('dropped');
  }
});*/

// image uploader scripts

//function emailCheck(){
//	var email = $('#email').val();
//	$.ajax({
//		type:'POST',
//		url:'https://ntibn.com.au:3001/emailcheck',
//		data:{email:email}
//	}).done(function(msg) {
//		console.log(msg);
//		console.log(msg.status);
//		if(msg.status == 'false'){
//			swal("Error!", msg.msg, "warning");
//              $('#email').val('');
//              $('#email').focus();
//              
//		}	
//	});
//	
//}
 //jq("h1.Header-companyName.u-textTruncate").css({"font-size": "13px !important", "font-weight": "600 !important", "text-align": "left !important"});
// var href = document.location.href;
//var lastPathSegment = href.substr(href.lastIndexOf('/') + 1);
//console.log(lastPathSegment);
</script>
</body>
</html>