<?php  if ( $register = get_event_registration_method() ) :
	wp_enqueue_script( 'wp-event-manager-event-registration' );
	
	?>
<?php  ?>	<div class="event_registration registration">
		<?php do_action( 'event_registration_start', $register ); ?>
<!--		<div class="wpem-event-sidebar-button wpem-registration-event-button">
		<input type="button" class="registration_button wpem-theme-button" value="<?php _e( 'Register for event', 'wp-event-manager' ); ?>" />
		</div>-->
<!--		<div class="registration_details wpem-register-event-form">
			<?php
				/**
				 * event_manager_registration_details_email or event_manager_registration_details_url hook
				 */
				do_action( 'event_manager_registration_details_' . $register->type, $register );
			?>
		</div>-->
<div><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Buy Event</button></div>
		<?php do_action( 'event_registration_end', $register ); ?>
	</div> 
<!--<style>.modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 0 !important;}</style>-->
<!-- Modal -->
<!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: unset auto !important;">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content" style="height:200px;width:300px;">
      <div class="modal-header" style="width:298.5px;height:50px">
        <h5 class="modal-title" id="exampleModalLabel">Buy Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="height:50px; ">
     <h4 style="text-align: center; margin-bottom: 100px" > Buy Event</h4>
      </div>
      <div class="modal-footer">
        <a href="<?=site_url() . "/login.php"?>"><button type="button" class="btn btn-primary"
         style="  padding:8px 12px; margin-left: 0px; border: none;
  cursor: pointer;
  width:85px;
        border-radius: 4px;
        display: block;
        position: middle;">Member</button>
</a>

 <a href="2.html" onclick="location.href=this.href+'?key='+scrt_var;return false;">Link</a> 

<a href="<?=site_url() . "/BuyEvent.php"?>"><button type="button" class="btn btn-primary" style="  padding:8px 12px; border: none;
        width:70px;
        cursor: pointer;
            margin-right: 60px; 
              border-radius: 4px;
              display: block;
              position: middle;">Guest</button>
              </a> 

      </div>
    </div>
  </div>
</div>-->
<?php endif; ?>
