<?php
// Register User Contact Methods
function _themename_user_contact_methods( $user_contact_method ) {

	$user_contact_method['_themename_user_facebook'] = __( 'Facebook Link', '_themename' );
	$user_contact_method['_themename_user_twitter'] = __( 'Twitter Link', '_themename' );
	$user_contact_method['_themename_user_instagram'] = __( 'Instagram Link', '_themename' );
	$user_contact_method['_themename_user_pinterest'] = __( 'Pinterest Link', '_themename' );
	$user_contact_method['_themename_user_dribble'] = __( 'Dribble Link', '_themename' );

	return $user_contact_method;

}
add_filter( 'user_contactmethods', '_themename_user_contact_methods' );
