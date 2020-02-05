<?php
global $post;
$start_date = get_event_start_date ();
$end_date = get_event_end_date ();
wp_enqueue_script('wp-event-manager-slick-script');
wp_enqueue_style( 'wp-event-manager-slick-style');
do_action('set_single_listing_view_count');
?>
<!--<pre>-->
<?php //print_r($post->_event_location);?>
<!--</pre>-->
<div class="section-header">
          <h2>Events Details</h2>
          
        </div>
<div class="single_event_listing" itemscope
	itemtype="http://schema.org/Event">
	<meta itemprop="title"
		content="<?php echo esc_attr( $post->post_title ); ?>" />

	<div class="wpem-main wpem-single-event-page">
		<?php if ( get_option( 'event_manager_hide_expired_content', 1 ) && 'expired' === $post->post_status ) : ?>
		<div class="event-manager-info wpem-alert wpem-alert-danger" ><?php _e( 'This listing has been expired.', 'wp-event-manager' ); ?></div>
		<?php else : ?>
			<?php if ( is_event_cancelled() ) : ?>
              <div class="wpem-alert wpem-alert-danger">
              	<span class="event-cancelled" itemprop="eventCancelled"><?php _e( 'This event has been cancelled', 'wp-event-manager' ); ?></span>
			  </div>	               
            <?php elseif ( ! attendees_can_apply() && 'preview' !== $post->post_status ) : ?>		       
               <div class="wpem-alert wpem-alert-danger">
               	<span class="listing-expired" itemprop="eventExpired"><?php _e( 'Registrations have closed', 'wp-event-manager' ); ?></span>
               </div>
	        <?php endif; ?>
		<?php
			/**
			 * single_event_listing_start hook
			 */
			do_action ( 'single_event_listing_start' );
			?>
		<div class="wpem-single-event-wrapper">
			<div class="wpem-single-event-header-top">
				<div class="wpem-row">
		
				 <div class="wpem-col-xs-12 wpem-col-sm-6 wpem-col-md-6 wpem-single-event-images">
				 <?php
			$event_banners = get_event_banner ();
			if (is_array ( $event_banners ) && sizeof ( $event_banners ) > 1) :
				?>
				 <div class="wpem-single-event-slider-wrapper">
							<div class="wpem-single-event-slider">
				 		<?php foreach( $event_banners as $banner_key => $banner_value ) :  ?>
				 			<div class="wpem-slider-items">
									<img src="<?php echo $banner_value;?>" alt="<?php the_title();?>" />
								</div>
				 		<?php endforeach;?>
				 	</div>
						</div>
				 <?php else : ?>
				 	<div class="wpem-event-single-image-wrapper">
							<div class="wpem-event-single-image"><?php display_event_banner();?></div>
						</div>
				 <?php endif;?>
				 </div>
					<div class="wpem-col-xs-12 wpem-col-md-6 wpem-single-event-short-info">
						
					<div class="wpem-row">
					<div class="wpem-col-xs-12 wpem-single-event-left-content">
      <h2 style="color: #112363;font-size: 28px;font-weight: 700; margin-bottom: 10px;"><?php echo esc_attr( $post->post_title ); ?></h2>
               <?php do_action('single_event_overview_before');?>
              <div class="wpem-single-event-body-content">
               <?php do_action('single_event_overview_start');?>
               	<?php echo apply_filters( 'display_event_description', get_the_content() ); ?>
               <?php do_action('single_event_overview_end');?>
              </div>
               <?php do_action('single_event_overview_after');?>
            </div>
<?php /*	?><p><?php if ( is_user_logged_in() ) {
	
echo do_shortcode("[asp_product id='270']");
} else {
$btn = '<button class="btn btn-primary" type="button">Buy Event</button>';
echo do_shortcode('[sg_popup id="328" event="click"]'.$btn.'[/sg_popup]'); 
}?></p><?php */ ?> 
<?php if(is_user_logged_in()){$current_user = wp_get_current_user();$post = get_post( $post ); $params = "?id=$post->ID&&price=$post->_price&&email=$current_user->user_email&&event=$post->post_title&&location=$post->_event_location&&tickets=$post->_available_tickets";}else{$params = "?id=$post->ID&&price=$post->_price&&event=$post->post_title&&location=$post->_event_location&&tickets=$post->_available_tickets";}?>
<div><a href="<?=site_url();?>/BuyEventlogin.php<?=$params;?>"><button type="button" class="btn btn-primary">Buy Event</button></a></div>
					<div
						class="wpem-col-xs-12 wpem-col-sm-5 wpem-col-md-4 wpem-single-event-right-content">
						<div class="wpem-single-event-body-sidebar">
							<?php do_action( 'single_event_listing_button_start' ); ?>
							
							<?php
						$date_format = WP_Event_Manager_Date_Time::get_event_manager_view_date_format ();
						$registration_end_date = get_event_registration_end_date ();
						$registration_end_date = WP_Event_Manager_Date_Time::date_parse_from_format ( $date_format, $registration_end_date );
	
						$registration_addon_form = apply_filters ( 'event_manager_registration_addon_form', true );
						$event_timezone = get_event_timezone ();
	
						// check if timezone settings is enabled as each event then set current time stamp according to the timezone
						// for eg. if each event selected then Berlin timezone will be different then current site timezone.
						if (WP_Event_Manager_Date_Time::get_event_manager_timezone_setting () == 'each_event')
							$current_timestamp = WP_Event_Manager_Date_Time::current_timestamp_from_event_timezone ( $event_timezone );
						else
							$current_timestamp = current_time ( 'timestamp' ); // If site wise timezone selected
	
						if (attendees_can_apply () && ((strtotime ( $registration_end_date ) > $current_timestamp) || empty ( $registration_end_date )) && $registration_addon_form)
							get_event_manager_template ( 'event-registration.php' );
						?>
				
							<?php do_action( 'single_event_listing_button_end' ); ?>
							
							
						</div>

					</div>
				</div>	
					</div>
				</div>
			</div>
 
         	  
	<?php

			get_event_manager_template_part( 'content', 'single-event_listing-organizer' );
			/**
			 * single_event_listing_end hook
			 */
			//do_action ( 'single_event_listing_end' );
			?>
  <?php endif; ?>
			<!-- Main if condition end -->
		</div>
		<!-- / wpem-wrapper end  -->

	</div>
	<!-- / wpem-main end  -->
</div>
<!-- override the script if needed -->
<script type="text/javascript">
  jQuery(document).ready(function(){
    jQuery('.wpem-single-event-slider').slick({
      dots: true,
      infinite: true,
      speed: 500,
      fade: true,
      cssEase: 'linear',
      responsive: [{
	      breakpoint: 992,
	      settings: {
	        dots: true,
	        infinite: true,
	        speed: 500,
	        fade: true,
	        cssEase: 'linear',
	        adaptiveHeight: true
	      }
	    }]
    });

  });
</script>