<?php
/*
Plugin Name: JSON API DELETE USER 
Plugin URI: http://www.resumedirectory.in
Description: Delete User with user meta details add-ons for JSON API.
Version: 1.0
Author: Aiyaz Khorajia
Author URI: http://www.resumedirectory.in
License: GPLv2
*/

if (!defined('ABSPATH'))  exit; // Exit if accessed directly

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

if (!is_plugin_active('json-api/json-api.php')) {
    add_action('admin_notices', 'jadu_display_notice');
    return;
}

add_filter('json_api_controllers', 'jadu_ApiController');
add_filter('json_api_user_controller_path', 'jadu_setControllerPath');
add_action('init', 'jadu_checkAuthCookie', 100);

function jadu_display_notice()
{
    echo '<div id="message" class="error fade"><p style="line-height: 150%">';
    _e('<strong>JSON API User</strong></a> requires the JSON API plugin to be activated. Please <a href="wordpress.org/plugins/json-api/‎">install / activate JSON API</a> first.', 'json-api-user');
    echo '</p></div>';
}

function jadu_ApiController($aControllers)
{
    $aControllers[] = 'User';
    return $aControllers;
}

function jadu_setControllerPath($sDefaultPath)
{
    return dirname(__FILE__) . '/controllers/DeleteUser.php';
}

function jadu_checkAuthCookie($sDefaultPath)
{
    global $json_api;
    if ($json_api->query->cookie) {
        $user_id = wp_validate_auth_cookie($json_api->query->cookie, 'logged_in');
        if ($user_id) {
            $user = get_userdata($user_id);
            wp_set_current_user($user->ID, $user->user_login);
        }
    }
}