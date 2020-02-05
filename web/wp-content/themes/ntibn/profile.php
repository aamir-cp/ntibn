<?php
/* Template Name: Profile */
if (!is_user_logged_in()) {
    $location = site_url() . '/login.php';
    wp_redirect($location);
} else {
    global $current_user;
    wp_get_current_user();
    ?>    

    <?php get_header(); ?>

    <link href="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/css/bootstrap-multiselect.css"
          rel="stylesheet" type="text/css" />
    <script src="http://cdn.rawgit.com/davidstutz/bootstrap-multiselect/master/dist/js/bootstrap-multiselect.js"
    type="text/javascript"></script>
    <style type="text/css" src="<?= get_template_directory_uri() . '/css/register.css'; ?>"></style>
    <style>.stripe-button-el {display: none !important;} body{font-size:14px;}.focused{border:1px solid #EA2803 !important;color:#EA2803 !important;} ::placeholder {font-size: 14px;}.control-label, .b{font-size:14px;font-weight:bold;}#checkboxes label{margin: 0 !important;padding: 5px 10px !important;cursor: pointer !important;}#checkboxes label input[type="checkbox"]{margin-right: 5px !important;}#checkboxes label:hover{color:#FFF !important;}#submit_btn{display: none;}</style>
    <!-- MultiStep Form -->

        <?php if (have_posts()):while (have_posts()):the_post(); ?>
            <section id="main" class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
            <?php // echo site_url().'/wp-content/uploads/user_doc/';    ?>
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

            <?php wp_nonce_field('add-user', '_wpnonce_add-user'); ?>

                                        <!-- Form Step 1 -->
                                        <fieldset style="display: block;">
                                            <h4><strong>Edit Porfile</strong></h4>
                                            <div class="clearfix">
            <?php //=$err_msg;  ?>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="" class="control-label">Title<i class="text-danger">*</i> </label>
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" id="" name="" placeholder="Title" class="form-control" value="<?=$current_user->title;?>" disabled="disabled">
                                                </div>
                                                <div class="col-md-4"></div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-md-4">
                                                    <label for="name" class="control-label">Full Name<i class="text-danger">*</i></label>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" id="name" name="name" placeholder="Full Name" class="form-control" value="<?=$current_user->name;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lastName" class="col-sm-4 control-label">Position<i class="text-danger">*</i></label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="position" name="position" placeholder="Position" class="form-control" value="<?=$current_user->position;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="user_email" class="col-sm-4 control-label">Email<i class="text-danger">*</i> </label>
                                                <div class="col-sm-8">
                                                    <input type="email" id="user_email" placeholder="Email" class="form-control" name="user_email" value="<?=$current_user->user_email;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="user_password" class="col-sm-4 control-label">Password<i class="text-danger">*</i> </label>
                                                <div class="col-sm-8">
                                                    <input type="password" id="user_password" class="form-control" name="user_password" value="<?=$current_user->user_pass;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="user_phone" class="col-sm-4 control-label">Phone<i class="text-danger">*</i></label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="user_phone" name="user_phone" placeholder="Phone Number" class="form-control" value="<?=$current_user->user_phone;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="user_mobile" class="col-sm-4 control-label">Mobile<i class="text-danger">*</i> </label>
                                                <div class="col-sm-8">
                                                    <input type="text" name="user_mobile" id="user_mobile" placeholder="Mobile Number" class="form-control" value="<?=$current_user->user_mobile;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="user_fax" class="col-sm-4 control-label">Fax<i class="text-danger">*</i> </label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="user_fax" name="user_fax" placeholder="Fax" class="form-control" value="<?=$current_user->user_fax;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="user_postal" class="col-sm-4 control-label">Postal<i class="text-danger">*</i> </label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="user_postal" name="user_postal" placeholder="Postal" class="form-control" value="<?=$current_user->user_postal;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="user_town" class="col-sm-4 control-label">Town<i class="text-danger">*</i> </label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="user_town" name="user_town" placeholder="User Town" class="form-control" value="<?=$current_user->user_town;?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="user_state" class="col-sm-4 control-label">State<i class="text-danger">*</i> </label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="user_state" name="user_state" placeholder="State" class="form-control" value="<?=$current_user->user_state;?>">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="user_postcode" class="col-sm-4 control-label">Postcode<i class="text-danger">*</i> </label>
                                                <div class="col-sm-8">
                                                    <input type="text" id="user_postcode" name="user_postcode" placeholder="Postcode" class="form-control" value="<?=$current_user->user_postcode;?>">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-group row" id="">

                                                <div id="response-div" class="col-sm-6 text-right text-success"></div>
                                                <div class="col-sm-6 text-right"><button type="submit" id="myBtn" class="btn btn-submit">Save</button></div>
                                                <!-- onclick="submitform()" --> 
                                            </div>
                                        </fieldset>


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
            <?php // edit_post_link('edit', '<p>', '</p><br/>');   ?>
            </section>

            <!-- Modal -->
            <?php
        endwhile;
    endif;
    $process = get_template_directory_uri() . '/profile_process.php';
    ?>
    <script>
        $ = jQuery;
        var jq = $.noConflict();
        jq(document).ready(function () {
            var data = "register";
            jq("#myBtn").click(function (ev) {
                ev.preventDefault();
                //
                //alert( jq("#payment-form").serialize() ); 
 if(jq('#name').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please provide your full name.');
                jq('#resp').addClass('text-danger');
                return false;
            } else if(jq('#address').val() == ""){
                jq('html, body').animate({
                scrollTop: jq("#main").offset().top
                }, 1000);
                jq('#resp').html('Please provide your address.');
                jq('#resp').addClass('text-danger');
                return false;
            } else{
                jq.ajax({
                    url: '<?= $process; ?>',
                    type: 'POST',

                    data: jq("form").serialize(),
                    success: function (data) {
                        //called when successful
    //        alert('success');
                        jq('#response-div').html('<h4 class="text-success">Profile updated.</h4>');

                    },
                    error: function (e) {
                        //called when there is an error
    //        alert('error');

                        //console.log(e.message);
                        console.log(e);
                    }
                });
                console.log(data);}
                //

            });

        });//doc ready
    </script>
    <?php get_footer(); ?> 
<?php } ?>