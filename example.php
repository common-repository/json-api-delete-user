<?php
error_reporting(E_ERROR | E_WARNING | E_PARSE);
	// Create Nonce
	$service_url = 'http://localhost/wordpress/api/get_nonce/';
	$curl = curl_init($service_url);
	$curl_post_data = array(
		"controller" => 'user',
		"method" => 'delete_user_with_meta',
		);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
	$response_token = curl_exec($curl);
	//print_r($response_token); die();
	$response_token = json_decode($response_token);
	parse_str($_SERVER['QUERY_STRING'],$myArr);
	if($response_token->status == 'ok')
	{
   
	   $service_url = 'http://localhost/wordpress/api/user/delete_user_with_meta';
	   $curl = curl_init($service_url);
	   $curl_post_data = array(
			"email" => $myArr['email'],
			"nonce" => $response_token->nonce,
			);
	   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	   curl_setopt($curl, CURLOPT_POST, true);
	   curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
	   $curl_response = curl_exec($curl);
	   curl_close($curl);
	   print_r($curl_response);
	}
?>