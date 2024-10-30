<?php
/*
  Controller name: Delete User
  Controller description: Delete User with Meta
*/
class JSON_API_User_Controller {

	/* Delete User with meta */

	public function delete_user_with_meta(){	  

		global $json_api;

		if (!$json_api->query->email ) {
			$json_api->error("You must include 'email' var in your request.");
		}
		
		if (!$json_api->query->nonce) {
				$json_api->error("You must include 'nonce' var in your request. Use the 'get_nonce' Core API method.");
		}
		else $nonce =  sanitize_text_field( $json_api->query->nonce ) ;
		
		$nonce_id = $json_api->get_nonce_id('user', 'delete_user_with_meta');

		if( !wp_verify_nonce($json_api->query->nonce, $nonce_id) ) {
			$json_api->error("Invalid access, unverifiable 'nonce' value. Use the 'get_nonce' Core API method.");
		}
		
		if(!email_exists( $json_api->query->email )) {
			$json_api->error("Invalid Email, Use email that is registered with website.");
		}

		require_once ABSPATH . 'wp-admin/includes/user.php';
		$user = get_user_by( 'email', $json_api->query->email );
		$is_deleted = wp_delete_user($user->ID); 
		
		return array(
			"success" => "User has been deleted Successfully."
		);

	} 
 
 }