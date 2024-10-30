<?php

/* Hooks & Filters */

add_action( 'widgets_init', 'slush_bpprofilemusic_widget_fn' );

/***** BP Profile Player Widget *****/

/* Creates the widget itself */

class Slushman_bpprofilemusic_widget extends WP_Widget {

	function Slushman_bpprofilemusic_widget() {
		$widget_ops = array( 'classname' => 'slushman-bpprofilemusic-widget', 'description' => __( 'BP-Profile-Music Widget', 'slushman-bpprofilemusic-widget' ) );
		$this->WP_Widget( 'bpprofilemusic_widget', __( 'BP Profile Music Widget' ), $widget_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		
		echo $before_widget;
		
		$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; };
		
		do_action( 'bp_before_sidebar_me' ); ?>
		<div id="sidebar-me"><?php
		
		$description = xprofile_get_field_data( 'Music Player Description' );
		
		/* Pull data from the Xprofile fields, then see which actually has data */		
		$bandcampURL = xprofile_get_field_data( 'Bandcamp URL' );
		$bandcampID = xprofile_get_field_data( 'Bandcamp ID' );	
		$tunecoreURL = xprofile_get_field_data( 'Tunecore URL' );
		$tunecoreID = xprofile_get_field_data( 'Tunecore ID' );
		$reverbnationURL = xprofile_get_field_data( 'Reverbnation URL' );
		$reverbnationID = xprofile_get_field_data( 'Reverbnation ID' );
		$noisetradeURL = xprofile_get_field_data( 'Noisetrade URL' );
		$noisetradeID = xprofile_get_field_data( 'Noisetrade ID' );
		$soundcloudsetURL = xprofile_get_field_data( 'SoundCloud Set URL' );
		$soundcloudID = xprofile_get_field_data( 'SoundCloud ID' );
		
		if ( isset( $bandcampURL ) && !empty( $bandcampURL ) ) {
			
			/* Get the Bandcamp ID from the Bandcamp Profile URL */
			$beginning = 'album=';
			$end = '/"/>';
			$bandcamp = $this->getplayerID( $bandcampURL, $beginning, $end );
		
		} elseif ( isset( $bandcampID ) && !empty( $bandcampID ) ) {
		
			$bandcamp = $bandcampID;	
			
		} elseif ( isset( $tunecoreURL ) && !empty( $tunecoreURL ) ) {
			
			/* Get the Tunecore ID from the Tunecore Profile URL */
			$beginning = '<embed src="http://widget.tunecore.com/swf/tc_run_h_v2.swf?widget_id=';
			$end = '" type="application/x-shockwave-flash"';
			$tunecore = $this->getplayerID( $tunecoreURL, $beginning, $end );
					
		} elseif ( isset( $tunecoreID ) && !empty( $tunecoreID ) ) {
		
			$tunecore = $tunecoreID;	
			
		} elseif ( isset( $reverbnationURL ) && !empty( $reverbnationURL ) ) {
			
			/* Get the Reverbnation ID from the Reverbnation Profile URL */
			$beginning = 'object/join_mailing_list/artist_';
			$end = '">Join the Mailing List';
			$reverbnation = $this->getplayerID( $reverbnationURL, $beginning, $end );
			
		} elseif ( isset( $reverbnationID ) && !empty( $reverbnationID ) ) {
		
			$reverbnation = $reverbnationID;	
			
		} elseif ( isset( $noisetradeURL ) && !empty( $noisetradeURL ) ) {
			
			/* Get the Noisetrade ID from the Noisetrade Profile URL */
			$beginning = 'http://static.noisetrade.com/w/';
			$end = '/cover1500x1500max.jpg';
			$noisetrade = $this->getplayerID( $noisetradeURL, $beginning, $end );
			
		} elseif ( isset( $noisetradeID ) && !empty( $noisetradeID ) ) {
		
			$noisetrade = $noisetradeID;	
			
		} elseif ( isset( $soundcloudsetURL ) && !empty( $soundcloudsetURL ) ) {
			
			/* Get the SoundCloud Set ID from the SoundCloud Set URL */
			$beginning = 'data-sc-playlist-id="';
			$end = '"><div class="info-header large">';
			$soundcloud = $this->getplayerID( $soundcloudsetURL, $beginning, $end );
						
			/* Get the SoundCloud set URL, remove the http://, and explode it - making each section a variable */
			list( $sc1, $sc2, $sc3, $sc4 ) = explode( '/', substr( $soundcloudsetURL, 7 ) );
			
			/* SoundCloud set name: grab $sc4, replace the dashes, then capitalize the first letters */
			$soundcloudsetname = ucwords( str_replace( '-', ' ', $sc4 ) );
			
			/* SoundCloud Profile URL: count the length of $sc3 & $sc4, add 2 (for the slashes), then subtract that amount from the SoundCloud set URL */
			$soundcloudprofilecount = strlen( $sc3 ) + strlen( $sc4 ) + 2;
			$soundcloudprofileURL = substr( $soundcloudsetURL, 0, -$soundcloudprofilecount );
			
			/* SoundCloud Artist Name: grab $sc2, replace the dashes, then capitalize the first letters */
			$soundcloudartistname = ucwords( str_replace( '-', ' ', $sc2 ) );
		
		} elseif ( isset( $soundcloudID ) && !empty( $soundcloudID ) ) {
		
			$soundcloud = xprofile_get_field_data( 'SoundCloud ID' );
			$soundcloudsetname = xprofile_get_field_data( 'SoundCloud Set Name' );
			$soundcloudprofileURL = xprofile_get_field_data( 'SoundCloud Profile URL' );
			$soundcloudartistname = xprofile_get_field_data( 'SoundCloud Artist Name' );

		}
		
		if ( isset( $bandcamp ) && !empty( $bandcamp ) ) { ?>
			
			<object data="http://bandcamp.com/EmbeddedPlayer/album=<?php echo $bandcamp; ?>/size=grande3/bgcol=FFFFFF/linkcol=4285BB//" type="text/html" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" width="280" height="410"><param name="movie" value="http://bandcamp.com/EmbeddedPlayer/album=<?php echo $bandcamp; ?>/size=grande3/bgcol=FFFFFF/linkcol=4285BB//"><param name="quality" value="high"><param name="allowNetworking" value="always"><param name="wmode" value="transparent"><param name="bgcolor" value="#FFFFFF"><param name="allowScriptAccess" value="never"><object data="http://bandcamp.com/EmbeddedPlayer/album=<?php echo $bandcamp; ?>/size=grande3/bgcol=FFFFFF/linkcol=4285BB//" type="text/html" width="280" height="410"></object></object><?php
			
		} elseif ( isset( $tunecore ) && !empty( $tunecore ) ) { ?>
		
			<center><object width="160" height="400"><param name="movie" value="http://widget.tunecore.com/swf/tc_run_v_v2.swf?widget_id=<?php echo $tunecore; ?>"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://widget.tunecore.com/swf/tc_run_v_v2.swf?widget_id=<?php echo $tunecore; ?>" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="160" height="400"></embed></object></center><?php
						
		} elseif ( isset( $reverbnation ) && !empty( $reverbnation ) ) { ?>
		
			<center><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://c.gigcount.com/wildfire/IMP/CXNID=2000002.0NXC/bT*xJmx*PTEyOTkwMTYxMjUzMzMmcHQ9MTI5OTAxNjEzMTA3MSZwPTI3MDgxJmQ9cHJvX3BsYXllcl9maXJzdF9nZW4mZz*xJm89/ZGJhMjc2ZDNjZjEyNDQ*ZDlmMTg3YjY2ZGJhYmE1Y2Umb2Y9MA==.gif" /><embed type="application/x-shockwave-flash" src="http://cache.reverbnation.com/widgets/swf/40/pro_widget.swf" height="200" width="262" align="top" bgcolor="#ffffff" loop="false" wmode="opaque" quality="best" allowScriptAccess="always" allowNetworking="all" allowFullScreen="true" seamlesstabbing="false" flashvars="id=artist_<?php echo $reverbnation; ?>&posted_by=&skin_id=PWAS1003&background_color=FFFFFF&border_color=000000&auto_play=false&shuffle=false" /><br /><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://www.reverbnation.com/widgets/trk/40/artist_<?php echo $reverbnation; ?>//t.gif" /></center><?php 
			
		} elseif ( isset( $noisetrade ) && !empty( $noisetrade ) ) { ?>
		
			<center><img style="visibility:hidden;width:0px;height:0px;" border=0 width=0 height=0 src="http://c.gigcount.com/wildfire/IMP/CXNID=2000002.0NXC/bT*xJmx*PTEyOTkwMzY5MDM2MzMmcHQ9MTI5OTAzNjkwNzI4NyZwPTE5MDI4MSZkPTcwNTdiYTgxLTE4MDUtNGVhZi1hNWQzLWI3/ODI3M2U3MGM4YiZnPTImbz1kYmEyNzZkM2NmMTI*NDRkOWYxODdiNjZkYmFiYTVjZSZvZj*w.gif" /><div style="width:240px; height: 400px;"><object width="240" height="400"><param name="movie" value="http://static.noisetrade.com/w/widget.swf?wid=<?php echo $noisetrade; ?>"/><param name="allowScriptAccess" value="always"/><embed src="http://static.noisetrade.com/w/widget.swf?wid=<?php echo $noisetrade; ?>" type="application/x-shockwave-flash" allowscriptaccess="always" width="240" height="400"></embed></object></div></center><?php
			
		 } elseif ( isset( $soundcloud ) && !empty( $soundcloud ) ) { ?>
				
			<object height="225" width="100%"> <param name="movie" value="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Fplaylists%2F<?php echo $soundcloud; ?>"></param> <param name="allowscriptaccess" value="always"></param> <embed allowscriptaccess="always" height="225" src="http://player.soundcloud.com/player.swf?url=http%3A%2F%2Fapi.soundcloud.com%2Fplaylists%2F<?php echo $soundcloud; ?>" type="application/x-shockwave-flash" width="100%"></embed> </object>  <span><a href="<?php echo $soundcloudsetURL; ?>"><?php echo $soundcloudsetname; ?></a> by <a href="<?php echo $soundcloudprofileURL; ?>"><?php echo $soundcloudartistname; ?></a></span><?php
				
		} else { ?>
		
			<p>This user has not activated their music player.</p><?php
		
		} ?>
		
		<br /><br /><?php
		
		if ( isset( $description ) && !empty( $description ) ) {

			echo $description;

		}
		
		do_action( 'bp_sidebar_me' ); ?>
		
		</div><?php
		
		do_action( 'bp_after_sidebar_me' );
		
		echo $after_widget;
	}
	
	/* Updates the widget */
	
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	
	/* Creates the widget options form */
	
	function form( $instance ) {
		$defaults = array( 'title' => 'BuddyPress' );
		$instance = wp_parse_args( ( array ) $instance, $defaults );
		$title = esc_attr( $instance['title'] );
		?>
			<p>
				<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title' ); ?>: 
				<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" />
				</label>
			</p><?php
	}
	
	function getplayerID( $url, $beginning, $end ) {
		
		// Store the page
        $page = file_get_contents( $url );
        
        // Calculate the length of the beginning string itself
        $stringlength = strlen( $beginning );
        
        // Find where the playerID begins
        $idStart = strpos( $page, $beginning ) + $stringlength;
        
        // Find how long the playerID is
		$idLength = strpos( $page, $end ) - $idStart;
        
        // Extract playerID from $page
		$playerID = substr( $page, $idStart, $idLength );
		
		return $playerID;
	}
}

function slush_bpprofilemusic_widget_fn() {
	register_widget( 'Slushman_bpprofilemusic_widget' );
}

?>