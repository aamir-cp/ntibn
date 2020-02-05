<?php
/* Template Name: Register */
if (is_user_logged_in()) {
    global $current_user;
    wp_get_current_user();

    $location = site_url();
    wp_redirect($location);
}
?>
<?php get_header(); ?>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>

<link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
      rel="stylesheet" type="text/css" />
<script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
type="text/javascript"></script>
<style type="text/css" src="<?= get_template_directory_uri() . '/css/register.css'; ?>"></style>
<style>.stripe-button-el {display: none !important;} body{font-size:14px;}.focused{border:1px solid #EA2803 !important;color:#EA2803 !important;} ::placeholder {font-size: 14px;}.control-label, .b{font-size:14px;font-weight:bold;}#checkboxes label{margin: 0 !important;padding: 5px 10px !important;cursor: pointer !important;}#checkboxes label input[type="checkbox"]{margin-right: 5px !important;}#checkboxes label:hover{color:#FFF !important;}#submit_btn{display: none;}</style>
<!-- MultiStep Form -->
<script>
    var expanded = false;

    function showCheckboxes()
    {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded)
        {
            checkboxes.style.display = "block";
            expanded = true;
        } else
        {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
<?php if (have_posts()):while (have_posts()):the_post(); ?>
        <section id="main" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <?php // echo site_url().'/wp-content/uploads/user_doc/';   ?>
            <!--CONTENT-->

            <!-- MultiStep Form -->
            <section class="form-box">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="form-wizard">
                                <?php $err_msg = ""; ?>
                                <!-- Form Wizard -->
                                <div class="clearfix text-danger" id="err_msg"><?php echo $err_msg; ?></div>
                                <form action="#" role="form" method="post" id="payment-form" enctype="multipart/form-data">
                                    <input name="action" type="hidden" value="adduser" />
                                    <?php wp_nonce_field('add-user', '_wpnonce_add-user'); ?>
                                    <!-- Form progress -->
                                    <div class="form-wizard-steps form-wizard-tolal-steps-5">
                                        <div class="form-wizard-progress">
                                            <div class="form-wizard-progress-line" data-now-value="12.25" data-number-of-steps="5" style="width: 12.25%;"></div>
                                        </div>
                                        <!-- Step 1 -->
                                        <div class="form-wizard-step active">
                                            <div class="form-wizard-step-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                            <p>Personal</p>
                                        </div>
                                        <!-- Step 1 --> 
                                        <!-- Step 2 -->
                                        <div class="form-wizard-step">
                                            <div class="form-wizard-step-icon"><i class="fa fa-location-arrow" aria-hidden="true"></i></div>
                                            <p>Region</p>
                                        </div>
                                        <!-- Step 2 --> 
                                        <!-- Step 3 -->
                                        <div class="form-wizard-step">
                                            <div class="form-wizard-step-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                            <p>Authority</p>
                                        </div>
                                        <!-- Step 3 --> 
                                        <!-- Step 4 -->
                                        <div class="form-wizard-step">
                                            <div class="form-wizard-step-icon"><i class="fa fa-briefcase" aria-hidden="true"></i></div>
                                            <p>Fees</p>
                                        </div>
                                        <!-- /Step 4 --> 
                                        <!-- Step 5 -->
                                        <div class="form-wizard-step">
                                            <div class="form-wizard-step-icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                                            <p>Payment</p>
                                        </div>
                                        <!-- Step 5 --> 
                                    </div>
                                    <!-- Form progress --> 
                                    <!-- Form Step 1 -->
                                    <fieldset style="display: block;">
                                        <h4><strong>Applicant Information</strong> <span>Step 1 - 5</span></h4>
                                        <div class="clearfix">
                                            <?php //=$err_msg; ?>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="title" class="control-label">Title<i class="text-danger">*</i> </label>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" id="title" name="title" placeholder="Title" class="form-control" autofocus>
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4">
                                                <label for="name" class="control-label">Full Name<i class="text-danger">*</i></label>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="text" id="name" name="name" placeholder="Full Name" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="lastName" class="col-sm-4 control-label">Position<i class="text-danger">*</i></label>
                                            <div class="col-sm-8">
                                                <input type="text" id="position" name="position" placeholder="Position" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="user_email" class="col-sm-4 control-label">Email<i class="text-danger">*</i> </label>
                                            <div class="col-sm-8">
                                                <input type="email" id="user_email" placeholder="Email" class="form-control" name="user_email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="user_password" class="col-sm-4 control-label">Password<i class="text-danger">*</i> </label>
                                            <div class="col-sm-8">
                                                <input type="password" id="user_password" class="form-control" name="user_password">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="user_phone" class="col-sm-4 control-label">Phone<i class="text-danger">*</i></label>
                                            <div class="col-sm-8">
                                                <input type="text" id="user_phone" name="user_phone" placeholder="Phone Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="user_mobile" class="col-sm-4 control-label">Mobile<i class="text-danger">*</i> </label>
                                            <div class="col-sm-8">
                                                <input type="text" name="user_mobile" id="user_mobile" placeholder="Mobile Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="user_fax" class="col-sm-4 control-label">Fax<i class="text-danger">*</i> </label>
                                            <div class="col-sm-8">
                                                <input type="text" id="user_fax" name="user_fax" placeholder="Fax" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="user_postal" class="col-sm-4 control-label">Postal<i class="text-danger">*</i> </label>
                                            <div class="col-sm-8">
                                                <input type="text" id="user_postal" name="user_postal" placeholder="Postal" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="user_town" class="col-sm-4 control-label">User Town<i class="text-danger">*</i> </label>
                                            <div class="col-sm-8">
                                                <input type="text" id="user_town" name="user_town" placeholder="User Town" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="user_state" class="col-sm-4 control-label">State<i class="text-danger">*</i> </label>
                                            <div class="col-sm-8">
                                                <input type="text" id="user_state" name="user_state" placeholder="State" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="user_postcode" class="col-sm-4 control-label">Postcode<i class="text-danger">*</i> </label>
                                            <div class="col-sm-8">
                                                <input type="text" id="user_postcode" name="user_postcode" placeholder="Postcode" class="form-control">
                                            </div>
                                        </div>
                                        <br>
                                        <h4><strong>Business Information</strong></h4>
                                        <div class="clearfix"></div>
                                        <div class="form-group row">
                                            <label for="abn_entityname" class="col-sm-4 control-label b">ABN Entity Name<i class="text-danger">*</i></label>
                                            <div class="col-sm-8">
                                                <input type="text" id="abn_entityname" name="abn_entityname" placeholder="ABN Entity Name" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="business_name" class="col-sm-4 control-label b">Business/Trading Name<i class="text-danger">*</i></label>
                                            <div class="col-sm-8">
                                                <input type="text" id="business_name" name="business_name" placeholder="Business/Trading Name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="b_industry" class="col-sm-4 control-label">Business Industry<i class="text-danger">*</i></label>
                                            <div class="col-sm-8">
                                                <div class="multiselect" style="width:100%;">
                                                    <div class="selectBox form-control" onclick="showCheckboxes()" id="b_industry">
                                                        <select style="border:none;">
                                                            <option>Select Industry</option>
                                                        </select>
                                                        <div class="overSelect"></div>
                                                    </div>

                                                    <div id="checkboxes">
                                                        <label for="1">
                                                            <input id="1" type="checkbox" name="b_industry[]" class="b_industry" value="Agriculture, Forestry and Fishing">
                                                            Agriculture, Forestry and Fishing</label>
                                                        <label for="8">
                                                            <input id="8" type="checkbox" name="b_industry[]" class="b_industry" value="Accommodation and Food Services">
                                                            Accommodation and Food Services</label>
                                                        <label for="14">
                                                            <input id="14" type="checkbox" name="b_industry[]" class="b_industry" value="Administrative and Support Services">
                                                            Administrative and Support Services</label>
                                                        <label for="18">
                                                            <input id="18" type="checkbox" name="b_industry[]" class="b_industry" value="Art and Recrerational Services">
                                                            Art and Recreational Services</label>
                                                        <label for="5">
                                                            <input id="5" type="checkbox" name="b_industry[]" class="b_industry" value="Construction">
                                                            Construction</label>
                                                        <label for="16">
                                                            <input id="16" type="checkbox" name="b_industry[]" class="b_industry" value="Education and Training">
                                                            Education and Training</label>
                                                        <label for="4">
                                                            <input id="4" type="checkbox" name="b_industry[]" class="b_industry" value="Electricity, Gas, Water and Waste Services">
                                                            Electricity, Gas, Water and Waste Services</label>
                                                        <label for="11">
                                                            <input id="11" type="checkbox" name="b_industry[]" class="b_industry" value="Financial and Insurance Services">
                                                            Financial and Insaurance Services</label> 
                                                        <label for="17">
                                                            <input id="17" type="checkbox" name="b_industry[]" class="b_industry" value="Healthcare and Social Assistance">
                                                            Healthcare and Social Assistance</label>
                                                        <label for="10">
                                                            <input id="10" type="checkbox" name="b_industry[]" class="b_industry" value="Information Media and Telecommunication">
                                                            Information Media and Telecommunication</label>
                                                        <label for="3">
                                                            <input id="3" type="checkbox" name="b_industry[]" class="b_industry" value="Manufacturing">
                                                            Manufacturing</label>					  
                                                        <label for="2">
                                                            <input id="2" type="checkbox" name="b_industry[]" class="b_industry" value="Mining">
                                                            Mining</label>
                                                        <label for="19">
                                                            <input id="19" type="checkbox" name="b_industry[]" class="b_industry" value="other Services">
                                                            other Services</label>
                                                        <label for="13">
                                                            <input id="13" type="checkbox" name="b_industry[]" class="b_industry" value="Professional, Scientific and Technical Services">
                                                            Professional, Scientific and Technical Services</label>
                                                        <label for="15">
                                                            <input id="15" type="checkbox" name="b_industry[]" class="b_industry" value="Public Administration and Safety">
                                                            Public Administration and Safety</label>
                                                        <label for="7">
                                                            <input id="7" type="checkbox" name="b_industry[]" class="b_industry" value="Retail Trade">
                                                            Retail Trade</label>
                                                        <label for="12">
                                                            <input id="12" type="checkbox" name="b_industry[]" class="b_industry" value="Rental, Hiring and Real Estate Services">
                                                            Rental, Hiring and Real Estate Services</label>
                                                        <label for="9">
                                                            <input id="9" type="checkbox" name="b_industry[]" class="b_industry" value="Transport, Postal and Warehousing">
                                                            Transport, Postal and Warehousing</label>
                                                        <label for="6">
                                                            <input id="6" type="checkbox" name="b_industry[]" class="b_industry" value="Wholesale Trade">
                                                            Wholesale Trade</label>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--                <div class="form-group row">
                                                          <div class="col-md-4">
                                                            <label for="abn" class="b">ABN</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="text" id="abn" name="abn" placeholder="ABN" class="form-control" autofocus>
                                                          </div>
                                                        </div>-->
                                        <!--                <div class="form-group row">
                                                          <div class="col-md-4">
                                                            <label for="acn" class="b">ACN</label>
                                                          </div>
                                                          <div class="col-md-8">
                                                            <input type="text" name="acn" id="acn" placeholder="ACN" class="form-control">
                                                          </div>
                                                        </div>-->
                                        <div class="form-group row">
                                            <label for="principal_place" class="col-sm-4 control-label">Principal Place Business<i class="text-danger">*</i></label>
                                            <div class="col-sm-8">
                                                <input type="text" id="principal_place" name="principal_place" placeholder="Principal Place Business" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="add_line2" class="col-sm-4 control-label">(Address Line 2)</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="add_line2" name="add_line2" placeholder="Address Line 2" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="buss_town" class="col-sm-4 control-label">Business Town</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="buss_town" name="buss_town" placeholder="Business Town" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="buss_state" class="col-sm-4 control-label">Business State </label>
                                            <div class="col-sm-8">
                                                <input type="text" id="buss_state" name="buss_state" placeholder="Business State" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="buss_postcode" class="col-sm-4 control-label">Business Postcode</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="buss_postcode" name="buss_postcode" placeholder="Business Postcode" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="buss_email" class="col-sm-4 control-label">Business Email<i class="text-danger">*</i></label>
                                            <div class="col-sm-8">
                                                <input type="email" id="buss_email" placeholder="Email" class="form-control" name="buss_email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="buss_website" class="col-sm-4 control-label">Website</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="buss_website" name="buss_website" class="form-control" placeholder="Website">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="date_business_commenced" class="col-sm-4 control-label">Date Business Commenced</label>
                                            <div class="col-sm-8">
                                                <input type="date" id="date_business_commenced" name="date_business_commenced" class="form-control" placeholder="Date Business Commenced">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="buss_mobile" class="col-sm-4 control-label">Business Mobile<i class="text-danger">*</i> </label>
                                            <div class="col-sm-8">
                                                <input type="text" id="buss_mobile" name="buss_mobile" placeholder="Business Mobile Number" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="buss_fax" class="col-sm-4 control-label">Business Fax </label>
                                            <div class="col-sm-8">
                                                <input type="text" id="buss_fax" name="buss_fax" placeholder="Business Fax" class="form-control">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-6" id="business_type">
                                                <label class="control-label"><strong>Business Type<i class="text-danger">*</i> </strong></label>
                                                <br>
                                                <label for="bt-1"><input type="radio" name="business_type" value="Sole Trader" id="bt-1">
                                                    Sole Trader</label> <br>
                                                <label for="bt-2"><input type="radio" name="business_type" value="Partnership" id="bt-2">
                                                    Partnership </label><br>
                                                <label for="bt-3"><input type="radio" name="business_type" value="Association" id="bt-3">
                                                    Association</label><br>
                                                <label for="bt-4"><input type="radio" name="business_type" value="Aboriginal Corporation" id="bt-4">
                                                    Aboriginal Corporation </label> <br>
                                                <label for="bt-5"><input type="radio" class="Session" name="business_type" value="Company (Pty Ltd or Ltd)" id="bt-5">
                                                    Company (Pty Ltd or Ltd)</label> <br>
                                            </div>
                                            <div class="col-sm-6">
                                                <div id="profit">  
                                                    <label for="" class="control-label"><strong>Is this business Not for Profit? </strong></label>
                                                    <br>
                                                    <label for="nonprof"><input type="radio" name="profit" class="b_profit" value="n" id="nonprof">
                                                        No</label> <br>
                                                    <label for="prof"><input type="radio" name="profit" class="b_profit" value="y" id="prof">
                                                        Yes</label> <br>
                                                </div>
                                                <label for="phoneNumber" class="control-label"><strong>Is this business at least 51% Indigenous owned? </strong></label>
                                                <br>
                                                <label for="indigno"><input type="radio" name="indi_owned" class="b_owned" value="n" id="indigno">
                                                    No</label> <br>
                                                <label for="indigyes"><input type="radio" name="indi_owned" class="b_owned" value="y" id="indigyes">
                                                    Yes</label> </div>
                                        </div>
                                        <div class="form-group row">
                                            <p style="font-size:14px; font-family:Open Sans,sans-serif;">When submitting this application, you will need to attach relevant following documentation, whichever is applicable, to support your application, including:<br>
                                                1) Evidence of Business Registrations/Company extract<br>
                                                2) Proof of Aboriginality or Torres Strait Islander<br>
                                                3) Certificate of Incorporation (if applicable)<br>
                                                4) Information relating to percentage of partnership<br>
                                                5) Any other legal document that show the business
                                                status </p>
                                        </div>
                                        <div class="form-wizard-buttons">
                                            <button type="button" id="firstNext" class="btn btn-next">Next</button>
                                        </div>
                                    </fieldset>
                                    <!-- Form Step 1 --> 

                                    <!-- Form Step 2 -->
                                    <fieldset>
                                        <h4><strong>Region</strong><span>Step 2 - 5</span></h4>
                                        <div class="clearfix"></div>
                                        <div class="form-group row" id="buss_location">
                                            <label for="" class="col-sm-12 control-label"><strong>Where is your business located?  (please tick one)</strong><i class="text-danger">*</i> </label>
                                            <div class="col-sm-6" id="">
                                                <label><input type="checkbox" name="buss_location[]" class="b_location" value="Darwin">
                                                    Darwin </label><br>
                                                <label><input type="checkbox" name="buss_location[]" class="b_location" value="Katherine">
                                                    Katherine </label><br>
                                                <label><input type="checkbox" name="buss_location[]" class="b_location" value="Tennant Creek">
                                                    Tennant Creek </label><br>
 
                                                    <label><input type="checkbox" name="buss_location[]" class="b_location" value="International">
                                                    International </label></div>
                                            <div class="col-sm-6">
                                                <label><input type="checkbox" name="buss_location[]" class="b_location" value="Alice Springs">
                                                    Alice Springs </label><br>
                                                <label><input type="checkbox" name="buss_location[]" class="b_location" value="Regional Remote Area">
                                                    Regional Remote Area </label><br>
                                                <label><input type="checkbox" name="buss_location[]" class="b_location" value="Nhulunbuy">
                                                    Nhulunbuy </label>  <br>
                                                <label><input type="checkbox" name="buss_location[]" class="b_location" value="Interstate">
                                                    Interstate </label><br>


                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="buss_staff" class="col-sm-8 control-label">How many total staff in the business?<i class="text-danger">*</i> </label>
                                            <div class="col-sm-4">
                                                <input type="text" id="buss_staff" name="buss_staff" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="buss_indistaff" class="col-sm-8 control-label">How many indigenous staff in the business?<i class="text-danger">*</i></label>
                                            <div class="col-sm-4">
                                                <input type="text" id="buss_indistaff" name="buss_indistaff" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="buss_description" class="col-sm-12 control-label"><strong>Briefly describe the core activities of the business</strong><i class="text-danger">*</i></label>
                                            <div class="col-sm-12">
                                                <textarea rows="2" id="buss_description" name="buss_description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <h4><strong>Signature</strong></h4>
                                        <div class="clearfix"></div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 control-label" for="sign_name">Full Name<i class="text-danger">*</i> </label>
                                            <div class="col-sm-8">
                                                <input type="text" id="sign_name" name="sign_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 control-label" for="sign_position">Position<i class="text-danger">*</i></label>
                                            <div class="col-sm-8">
                                                <input type="text" id="sign_position" name="sign_position" class="form-control" autofocus>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 control-label" for="sign_bussname">Business Name<i class="text-danger">*</i></label>
                                            <div class="col-sm-8">
                                                <input type="text" id="sign_bussname" name="sign_bussname" class="form-control">
                                            </div>
                                        </div>
                                        <p>I authorise the verification of the information provided on this form is true and correct.  I have retained a copy of this application.</p>
                                        <div class="form-group row"> <div class="col-sm-12">Upload Signature<i class="text-danger">*</i>:</div>
                                            <input type="file" name="signature_file" id="signature_file" class="col-sm-4">
                                            <input type="hidden" value="" id="signature" name="signature" class="form-control "/>
                                            <div class="col-sm-1">&nbsp;</div>
                                            <button type="button" id="upl_signature" class="btn btn-info">Upload</button>
                                            <div class="col-sm-12 text-danger" id="upl_resp"></div>
                                        </div>
                                        <br>
                                        <h4><strong><strong>Use of Information</strong></strong></h4>
                                        <div class="clearfix"></div>
                                        <div class="form-group row">
                                            <label class="col-sm-8 control-label">Are you currently registered with the ICN NT? </label>
                                            <div class="col-sm-4">
                                                <input type="radio" name="icn_reg" class="icn_nt" checked="checked" value="1">
                                                Yes &nbsp;
                                                <input type="radio" name="icn_reg" class="icn_nt" value="2">
                                                No </div>
                                        </div>
                                       <div class="form-group row"><div class="col-sm-8">
<label for="snr">Supply Nation Registered? </label><br/> </div> 
                                           <div class="col-sm-4"><label><input type="checkbox" name="supply_nation_registered" class="supply_nation_registered" value="yes" id="snr">&nbsp;Yes</label></div>
                                       </div>
                                        <div class="form-group row"> <div class="col-sm-12">Business extract:</div>
                                            <input type="file" name="add_doc_1_file" id="add_doc_1_file" class="col-sm-4">
                                            <input type="hidden" value="" id="add_doc_1" name="add_doc_1" class="form-control "/>
                                            <div class="col-sm-1">&nbsp;</div>
                                            <button type="button" id="btn_add_doc_1" class="btn btn-info">Upload</button>
                                            <div class="col-sm-12 text-danger" id="add_doc_1_resp"></div>
                                        </div>	

                                        <div class="form-group row"> <div class="col-sm-12">Confirmation of aboriginality:</div>
                                            <input type="file" name="add_doc_2_file" id="add_doc_2_file" class="col-sm-4">
                                            <input type="hidden" value="" id="add_doc_2" name="add_doc_2" class="form-control "/>
                                            <div class="col-sm-1">&nbsp;</div>
                                            <button type="button" id="btn_add_doc_2" class="btn btn-info">Upload</button>
                                            <div class="col-sm-12 text-danger" id="add_doc_2_resp"></div>
                                        </div>	

                                        <div class="form-group row"> <div class="col-sm-12">Upload Additional Doc:</div>
                                            <input type="file" name="add_doc_3_file" id="add_doc_3_file" class="col-sm-4">
                                            <input type="hidden" value="" id="add_doc_3" name="add_doc_3" class="form-control "/>
                                            <div class="col-sm-1">&nbsp;</div>
                                            <button type="button" id="btn_add_doc_3" class="btn btn-info">Upload</button>
                                            <div class="col-sm-12 text-danger" id="add_doc_3_resp"></div>
                                        </div>	            			

                                        <div class="form-wizard-buttons">
                                            <button type="button" class="btn btn-previous">Previous</button>
                                            <button type="button" id="secondNext" class="btn btn-next">Next</button>
                                        </div>
                                    </fieldset>
                                    <fieldset>
                                        <h4><strong>Talent Release Authority</strong> <span>Step 3 - 5</span></h4>
                                        <div class="clearfix"></div>
                                        <div class="form-group row">
                                            <label for="tal_name" class="col-sm-4 control-label">Full Name<i class="text-danger">*</i></label>
                                            <div class="col-sm-8">
                                                <input type="text" id="tal_name" name="tal_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tal_phone" class="col-sm-4 control-label">Phone</label>
                                            <div class="col-sm-8">
                                                <input type="text" id="tal_phone" name="tal_phone" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tal_address" class="col-sm-4 control-label">Address</label>
                                            <div class="col-sm-8">
                                                <textarea rows="3" name="tal_address" id="tal_address" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tal_town" class="col-sm-4 control-label">Town</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="tal_town" id="tal_town" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tal_state" class="col-sm-4 control-label">State</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="tal_state" id="tal_state" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tal_postcode" class="col-sm-4 control-label">Postcode</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="tal_postcode" id="tal_postcode" class="form-control">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="tal_email" class="col-sm-4 control-label">Email</label>
                                            <div class="col-sm-8">
                                                <input type="email" name="tal_email" id="tal_email" class="form-control">
                                            </div>
                                        </div>
                                        <ol>
                                            <li>I agree to appear in visual and/or audio recordings which can be used in advertisements and other 	documents published by the Northern Territory Indigenous Business Network (NTIBN).</li>
                                            <li>I give permission for my name and visual and/or audio recordings of me to be used in any associated 	advertisements and promotional documents.</li>
                                            <li>I assign any rights I may have in the visual and/or audio recordings and associated advertisements and 	promotional documents to the NTIBN.</li>
                                            <li>I am free to enter into this Agreement and to appear in the proposed associated advertisements and 	promotional documents</li>
                                            <li>This Agreement is made under the laws of the Northern Territory and any dispute can be taken for resolution 	by the courts in the Northern Territory.</li>
                                        </ol>
                                        <p>Wherever possible, the NTIBN will remain sensitive to and understanding of cultural, family and personal sensitivities.</p>
                                        <div class="form-group row">
                                            <label class="col-sm-8 control-label">Are you of Indigenous or Torres Strait Islander descent?</label>
                                            <div class="col-sm-4">
                                                <input type="radio" name="indi_decent" class="t_tsid" value="1">
                                                Yes &nbsp;
                                                <input type="radio" name="indi_decent" class="t_tsid" value="2">
                                                No </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 control-label">Are there any circumstances in which you would not want your visual or audio recordings used?</label>
                                            <div class="col-sm-12">
                                                <textarea rows="3" name="circumstances" id="circumstances" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-12 control-label"><strong>Brief description of visuals/audio recorded</strong></label>
                                            <div class="col-sm-12">
                                                <textarea rows="3" name="t_description" id="t_description" class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row"> <div class="col-sm-12">Your Signature<i class="text-danger">*</i>:</div>
                                            <input type="file" name="talent_signature_file" id="talent_signature_file" class="col-sm-4">
                                            <input type="hidden" value="" id="talent_signature" name="talent_signature" class="form-control "/>
                                            <div class="col-sm-1">&nbsp;</div>
                                            <button type="button" id="talent_signature_btn" class="btn btn-info">Upload</button>
                                            <div class="col-sm-12 text-danger" id="talent_signature_resp"></div>
                                        </div> 
                                        <p>The Northern Territory Indigenous Business Network (NTIBN) is collecting the information in this form to obtain permission to use visual and audio recordings in NTIBN advertising, promotional materials and publications.  Visual and/or audio recordings, or other personal information described in this form may be supplied to contractors or service providers engaged by the NTIBN develop or produce advertising, promotional materials or publications, but will not be provided to any other person or organization for purposes other than Northern Territory Government advertising and promotions. You are entitled at any time to access and amend the information provided by you on this form.</p>
                                        <br>
                                        <div class="form-wizard-buttons">
                                            <button type="button" class="btn btn-previous">Previous</button>
                                            <button type="button" id="thirdNext" class="btn btn-next">Next</button>
                                        </div>
                                    </fieldset>
                                    <!-- Form Step 3 --> 

                                    <!-- Form Step 4 -->
                                    <fieldset id="fees">
                                        <h4><strong>Membership Fees</strong> <span>Step 4 - 5</span></h4>
                                        <label for="membership_fees" class="control-label" style="color: black;"><strong>Full Member Fees<i class="text-danger">*</i> (refer to notes below)</strong></label>
                                        <div class="form-group row" id="hidevalueNOtselected">
                                            <div class="col-sm-6" id="membership_fees">
                                                <div class="form-group row" style="margin: 0px; padding:0px;">
                                                    <div class="col-sm-6" style="margin: 0px; padding:0px;"> Sole Trader </div>
                                                    <div class="col-sm-6" style="margin: 0px; padding:0px;">
                                                        <input type="radio" name="membership_fees" class="Session" value="78.65" id="Sole-Trader">
                                                        &nbsp; $78.65
                                                        <label style="font-size: 12px; margin-left: 5px; margin-bottom: 0px;"> GST INC</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin: 0px; padding:0px;">
                                                    <div class="col-sm-6" style="margin: 0px; padding:0px;"> Partnership</div>
                                                    <div class="col-sm-6" style="margin: 0px; padding:0px;">
                                                        <input type="radio" name="membership_fees" class="Session" value="102.85" id="Partnership">
                                                        &nbsp; $102.85
                                                        <label style="font-size: 12px; margin-left: 5px; margin-bottom: 0px;"> GST INC</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin: 0px; padding:0px;">
                                                    <div class="col-sm-6" style="margin: 0px; padding:0px;"> Association</div>
                                                    <div class="col-sm-6" style="margin: 0px; padding:0px;">
                                                        <input type="radio" name="membership_fees" class="Session" value="121" id="Association">
                                                        &nbsp; $121.00
                                                        <label style="font-size: 12px; margin-left: 5px; margin-bottom: 0px;"> GST INC</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group row" style="margin: 0px; padding:0px;">
                                                    <div class="col-sm-7" style="margin: 0px; padding:0px;"> Aboriginal Corporation </div>
                                                    <div class="col-sm-5" style="margin: 0px; padding:0px;">
                                                        <input type="radio" name="membership_fees" class="Session" value="121" id="Aboriginal-Corporation">
                                                        &nbsp; $121.00
                                                        <label style="font-size: 12px; margin-left: 5px; margin-bottom: 0px;"> GST INC</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin: 0px; padding:0px;">
                                                    <div class="col-sm-7" style="margin: 0px; padding:0px;"> Company (Pty Ltd)</div>
                                                    <div class="col-sm-5" style="margin: 0px; padding:0px;">
                                                        <input type="radio" name="membership_fees" class="Session" value="181.50" id="Company-Pty-Ltd">
                                                        &nbsp;  $181.50
                                                        <label style="font-size: 12px; margin-left: 5px; margin-bottom: 0px;"> GST INC</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin: 0px; padding:0px;">
                                                    <div class="col-sm-7" style="margin: 0px; padding:0px;"> Not for Profit</div>
                                                    <div class="col-sm-5" style="margin: 0px; padding:0px;">
                                                        <input type="radio" name="membership_fees" class="Session" value="121" id="Not-for-Profit">
                                                        &nbsp; $121.00
                                                        <label style="font-size: 12px; margin-left: 5px; margin-bottom: 0px;"> GST INC</label>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin: 0px; padding:0px;">
                                                    <div class="col-sm-7" style="margin: 0px; padding:0px;">Remote </div>
                                                    <div class="col-sm-5" style="margin: 0px; padding:0px;">
                                                        <input type="radio" name="membership_fees" class="Session" value="78.65" id="Not-for-Profit">
                                                        &nbsp; $78.65
                                                        <label style="font-size: 12px; margin-left: 5px; margin-bottom: 0px;"> GST INC</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="membership_fees" class="control-label" style="color: black;"><strong>Associate Member Fees</strong></label>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="membership_fees" class="Session" value="242" id="Associate-Member-Fees">
                                        &nbsp; $242.00
                                        <label style="font-size: 12px; margin-left: 5px; margin-bottom: 0px;"> GST INC</label>
                                        <label for="membership_fees" class="control-label" style="color: black;"><strong>International Association Member </strong></label>
                                        &nbsp; &nbsp;
                                        <input type="radio" name="membership_fees" class="Session" value="242" id="international-Associate-Member-Fees">
                                        &nbsp; $242.00
                                        <label style="font-size: 12px; margin-left: 5px; margin-bottom: 0px;"> GST INC</label>
                                        <p>*To be eligible for full membership the business must be at least 51% Indigenous owned and based in the Northern Territory. Each application for full or associate membership must provide documentary evidence to support the application.<br>
                                            NTIBN Applicants who do not meet the eligibility criteria for full membership and who wish to be affiliated with NTIBN may apply to NTIBN to become an Associate member.
                                            Once received your completed application will be assessed by the NTIBN at the next Committee meeting.  You will be advised of the outcome and, if endorsed, an invoice will be issued to the business for payment of membership fee. </p>
                                        <br>

                                        <input type="hidden" value="" id="membership_type" name="membership_type"/>

                                        <div class="form-wizard-buttons">
                                            <button type="button" class="btn btn-previous">Previous</button>
                                            <button type="button" id="forthNext" class="btn btn-next">Next</button>
                                        </div>
                                    </fieldset>
                                    <!-- Form Step 4 --> 

                                    <!-- Form Step 5 -->
                                    <fieldset>
                                        <h4><strong>Payment Information</strong> <span>Step 5 - 5</span></h4>
                                        <div style="clear:both;"></div>

                                        <div class="form-group">
                                            <label for="bank_name">Bank Name:</label>
                                            <input type="text" name="bank_name" id="bank_name" placeholder="Bank Name" class="form-control" required="required">
                                        </div>
                                        <!--                <div class="form-group">
                                                          <label>Payment Type : </label>
                                                          <label class="radio-inline">
                                                            <input type="radio" name="payment_type" class="payment_type" value="Master Card" checked="checked">
                                                            Master Card </label>
                                                          <label class="radio-inline">
                                                            <input type="radio" name="payment_type" class="payment_type" value="Visa Card">
                                                            Visa Card </label>
                                                        </div>-->
                                        <div class="row">
                                            <div class="creditCardForm">
                                                <div class="payment">
                                                    <div class="form-group owner">
                                                        <label for="owner">Holder Name<i class="text-danger">*</i></label>
                                                        <input type="text" class="form-control" name="card_holder_name" id="card_holder_name" placeholder="Holder Name" required="required">
                                                    </div>
                                                    <div class="form-group CVV">
                                                        <label for="cvv">CCV<i class="text-danger">*</i></label>
                                                        <input type="text" class="form-control" name="cvv" id="cvv" size="4" maxlength="3" minlength="3" data-stripe="cvc" placeholder="CVC" required="required">
                                                    </div>
                                                    <div class="form-group" id="card-number-field">
                                                        <label for="card_number">Card Number<i class="text-danger">*</i></label>
                                                        <input type="text" class="form-control" name="card_number" id="card_number" size="20" maxlength="20" data-stripe="number" placeholder="Card Number" required="required">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Expiration Date<i class="text-danger">*</i></label>
                                                        <select name="exp_month" id="exp_month" data-stripe="exp-month">
                                                            <option value="01">January</option>
                                                            <option value="02">February </option>
                                                            <option value="03">March</option>
                                                            <option value="04">April</option>
                                                            <option value="05">May</option>
                                                            <option value="06">June</option>
                                                            <option value="07">July</option>
                                                            <option value="08">August</option>
                                                            <option value="09">September</option>
                                                            <option value="10">October</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>
                                                        <select name="exp_year" id="exp_year" data-stripe="exp-year">

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
                                        </div>
                                        <div class="response text-center"><div class="form-group"><span class="payment-errors b text-danger"></span></div></div>
                                        <div class="form-wizard-buttons" id="stripe_btn"><button type="submit" id="thebutton" class="btn btn-submit" style="float:right;">Submit Payment</button></div>
                                        <br>
                                        <input type="hidden" name="transaction_id" id="transaction_id" value=""/>
                                        <input type="hidden" name="paid_for" id="paid_for" value="Registration"/>
                                        <input type="hidden" name="user_type" id="user_type" value="member"/>
                                        <input type="hidden" name="date_paid" id="date_paid" value="<?= date("Y-m-d") ?>"/>
                                        <div class="form-wizard-buttons" id="submit_btn">
                                            <button type="button" class="btn btn-previous">Previous</button>
                                            <button type="submit" id="myBtn" class="btn btn-submit">Submit</button>
                                            <!-- onclick="submitform()" --> 
                                        </div>
                                    </fieldset>
                                    <!-- Form Step 5 -->

                                </form>
                                <!-- Form Wizard --> 
                            </div>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
            </section>
            <!-- /.MultiStep Form -->

            <!--/CONTENT-->
            <?php // edit_post_link('edit', '<p>', '</p><br/>');  ?>
        </section>

        <!-- Modal -->
        <?php
    endwhile;
endif;
$process = get_template_directory_uri() . '/process.php';
?>
<script>
    $ = jQuery;
    var jq = $.noConflict();
    jq(document).ready(function () {
        //membership_type
        var mem_fees = jq('input[name="membership_fees"]');
        mem_fees.click(function () {
            var mem_fee = jq(this).attr('id').replace(/-/g, ' ');
            jq('#membership_type').val(mem_fee);
            //console.log(mem_fee);
        });

        var data = "register";
        jq("#myBtn").click(function (ev) {
            ev.preventDefault();
            //
            //alert( jq("#payment-form").serialize() ); 

            jq.ajax({
                url: '<?= $process; ?>',
                type: 'POST',

                data: jq("form").serialize(),
                success: function (data) {
                    //called when successful
//        alert('success');
                    setTimeout(function () {
                        window.location.replace("<?= site_url() ?>/registered.php");
                    }, 1000);
                    console.log(data);

                },
                error: function (e) {
                    //called when there is an error
//        alert('error');

                    //console.log(e.message);
                    console.log(e);
                }
            });
            console.log(data);
            //

        });
//upload file
        function uploadFile(btn, upl, valSend, upl_resp) {

            jq("#" + btn).click(function () {

                var fd = new FormData();

                var files = jq('#' + upl)[0].files[0];

                fd.append('file', files);

                jq.ajax({
                    url: '<?= get_template_directory_uri() . "/upload.php" ?>',
                    type: 'post',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response != 0) {
                            jq("#" + valSend).attr("value", response);
                            jq('#' + upl_resp).html('Uploaded successfully.').removeClass('text-danger').addClass('text-success');
                        } else {
                            jq('#' + upl_resp).html('No file was uploaded,\n\
<br>Please not that only these formats are allowed: .pdf,.doc,docx,jpg,png,jpeg<br>\n\
And maximum file size should be less than 4MB.');
                            jq('#' + upl).click(function () {
                                jq('#' + upl_resp).empty();
                            });
                        }
                    }
                });

            });
        }
//sign upl
        uploadFile('upl_signature', 'signature_file', 'signature', 'upl_resp');
//add doc upl    
        uploadFile('btn_add_doc_1', 'add_doc_1_file', 'add_doc_1', 'add_doc_1_resp');
        uploadFile('btn_add_doc_2', 'add_doc_2_file', 'add_doc_2', 'add_doc_2_resp');
        uploadFile('btn_add_doc_3', 'add_doc_3_file', 'add_doc_3', 'add_doc_3_resp');

//   talent_signature
        uploadFile('talent_signature_btn', 'talent_signature_file', 'talent_signature', 'talent_signature_resp');

    });//doc ready
</script>
<?php include('skey.php'); ?>
<script type="text/javascript">
    /**********
     * STRIPE 
     **********/
    $ = jQuery;
    var jq = $.noConflict();
    jq(document).ready(function () {
// This identifies your website in the createToken call below
        Stripe.setPublishableKey('<?= $stripe['publishable_key']; ?>');

        var stripeResponseHandler = function (status, response) {
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
//var data=jq('#payment-form').serialize(); 

                var card_holder = jq('#card_holder_name').serialize();

                var amount = jq('input[name="membership_fees"]').serialize();

                console.log('test..');

                console.log(amount);

                var cvv = jq('#cvv').serialize();

                var user_email = jq('#user_email').serialize();

                var card_number = jq('#card_number').serialize();

                var exp_month = jq('#exp_month').serialize();

                var exp_year = jq('#exp_year').serialize();

                var stripe_token = jq('input[name="stripeToken"]').serialize();



                var seializedFields = amount + '&' + card_holder + '&' + cvv + '&' + card_number + '&' + exp_month + '&' + exp_year + '&' + user_email + '&' + stripe_token;


                jq.ajax({
                    type: "POST",
                    url: '<?= get_template_directory_uri() . "/submit.php" ?>',
                    data: seializedFields,
                    success: function (response) {
                        // alert(data);
//                    console.log(response);
                        form.find('button').prop('disabled', false);
                        if (response != 'Transaction failed!' && response != 'Form submission error!') {
                            jq('.payment-errors').html('Payment Successful, Complete your registration by submitting the form.');
                            jq('.payment-errors').removeClass('text-danger').addClass('text-success');
                            jq('#stripe_btn').hide();
                            jq('#submit_btn').show();
                            jq('#transaction_id').val(response);
                        } else {
                            jq('.payment-errors').html(response);
                        }
                    }, error: function (e) {
                        console.log(e);
                        //alert('error: '+e);
                    }
                });


// Prevent page from refreshing
                return false;

            }
        };


// ONCLICK RESPONSE 

        jq('#thebutton').on('click', function (e) {
            var form = jq('#payment-form');

// Disable the submit button to prevent repeated clicks
//form.find('button').prop('disabled', true);

            Stripe.card.createToken(form, stripeResponseHandler);

// Prevent the form from submitting with the default action
            return false;

        });


    });//doc read
</script>
<?php get_footer(); ?>