$ = jQuery;
var jq = $.noConflict();
jq(document).ready(function () {
    //func to checek if val is there
    var field_err;

    jq('#to2nd').click(function () {

            if (jq('#title').val() == "") {
                jq('#title').after('<p class="text-danger cap" id="title_err">This field is required!</p>');
                jq('#title').focus();
                //console.log(jq('#title'));
                jq('#title').keyup(function () {
                    jq('#title_err').hide();
                });
                
            } 
            if (jq('#fullname').val() == "") {
                jq('#fullname').after('<p class="text-danger cap" id="fullname_err">This field is required!</p>');
                jq('#fullname').focus();
                //console.log(jq('#title'));
                jq('#fullname').keyup(function () {
                    jq('#fullname_err').hide();
                });
                
            }
            if (jq('#position').val() == "") {
                jq('#position').after('<p class="text-danger cap" id="position_err">This field is required!</p>');
                jq('#position').focus();
                //console.log(jq('#title'));
                jq('#position').keyup(function () {
                    jq('#position_err').hide();
                });
                
            } else {
                console.log('to 2nd step');
            }
      
       
//        req('');
//        req('');
//        req('user_email');
//        req('user_phone');
//        req('user_mobile');
//        req('user_postal');
//        req('user_town');
//        req('user_state');
//        req('user_fax');
//        req('user_postcode');
//        req('abn_entityname');
//        req('business_name');
//        req('principal_place_business');
//        req('buss_email');
//        req('buss_website');
//        req('date_business_commenced');
//        req('buss_mobile');
//        req('buss_fax');
//        req('buss_town');
//        req('buss_state');
//        req('buss_postcode');
//        if (field_err == false) {
//            console.log('to 2nd step');
//        }
    });//first btn




});//ends noconfl
