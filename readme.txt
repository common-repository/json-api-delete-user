=== JSON API Delete User ===

Contributors: aiyaz
Tags: json api, RESTful delete user, delete usermeta, json api delete user, delete user api
Stable tag: 1.0
Requires at least: 3.0.1
Tested up to: 4.4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Delete User with meta details add-ons for JSON API

==Description==

JSON API DELETE USER extends the JSON API Plugin with a new Controller to delete user with meta data. 


==Installation==

First you have to install the JSON API for WordPress Plugin (http://wordpress.org/extend/plugins/json-api/installation/).

To install JSON API User just follow these steps:

* Upload the folder "json-api-delete-user" to your WordPress plugin folder (/wp-content/plugins)
* Activate the plugin through the 'Plugins' menu in WordPress or by using the link provided by the plugin installer
* Activate the controller through the JSON API menu found in the WordPress admin center (Settings -> JSON API)

==Screenshots==


==Changelog==

= 1.0 =

* Initial release.

==Upgrade Notice==

==Documentation==

* You need to create nonce to delete user, nonce can be created by calling http://localhost/api/get_nonce/?controller=user&method=delete_user_with_meta

* You can then use 'nonce' value to delete user.

= Method: delete_user_with_meta=

You can find example.php file to understand delete user api call via curl.

http://localhost/wordpress/api/user/delete_user_with_meta?email=example@domain.com