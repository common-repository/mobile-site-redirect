<?php
/*
 * Plugin Name: Mobile Site Redirect
 * Plugin URI: http://wordpress.org/plugins/mobile-site-redirect/
 * Description: Redirection to a separate mobile site such as http://m.example.com with the same page name (so desktop version links can be used by mobile devices without redirection to a generic home page). View full site and view mobile site options allows users to switch back and forth between the desktop and mobile site versions.
 * Version: 1.2.2
 * Author: N'Djamena Marmon
 * Author URI: webdevabq.com
 * License: GPL2
*/
/*  Copyright 2014  N'Djamena Marmon  (email : support@webdevabq.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/


function mobired_is_mobile(){
	include("Mobile_Detect.php");
	$detect = new Mobile_Detect();
	$device_type = 'desktop';
	if ($detect->isMobile()) {
    	// any mobile platform
		$device_type = 'mobile';
	}
	if($detect->isTablet()){
    	// any tablet
		$device_type = 'tablet';
	}
	return $device_type;

}

function mobired_full_site_cookie(){
	$mobile = $_GET['mobile'];
	if($mobile == 'false'){
		unset($_COOKIE['mobile']);
		setcookie("mobile", '', time()-3600, '/');
	}
	if($mobile == 'true'){
		unset($_COOKIE['mobile']);
		setcookie("mobile", '', time()-3600, '/');
		setcookie("mobile", 'true', time()+3600, '/');
	}
	if(!$mobile){
		//DO NOTHING
	}
	$mobile_url = get_option('mobired_mobilesite');
		if($mobile_url){
		if($mobile == 'true' || $_COOKIE['mobile'] == 'true'){header( 'Location: ' . $mobile_url );}
		}
	
}
function mobired_header_redirect() {
	$mobile = $_COOKIE['mobile'];
	if($mobile != 'false'){
	global $wp;
	$current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
	$mobile_url = get_option('mobired_mobilesite');
		if($mobile_url){
		$new_url = str_replace(home_url('/'), $mobile_url, $current_url);
		$nmobile_url = substr($mobile_url, 0, -1);
		if(strpos($new_url, $mobile_url)){$new_url = str_replace(home_url(), $nmobile_url, $new_url);}
		header( 'Location: ' . $new_url );
		}
	}
}
add_action ( 'send_headers', 'mobired_full_site_cookie' );

$isphone = get_option('mobired_isphone');
$istablet = get_option('mobired_istablet');
$mobired_is_mobile = mobired_is_mobile();
if($mobired_is_mobile == 'mobile' && $isphone == 'yes' || $mobired_is_mobile == 'tablet' && $istablet == 'yes'){
	$demobile = $_GET['demobile'];
	if($demobile != 'true'){
	add_action( 'send_headers', 'mobired_header_redirect' );
	}
}

function mobired_admin() {
    include('mobired_admin.php');
}
function mobired_admin_actions() {
	add_options_page("Mobile Site Redirect Settings", "Mobile Site Redirect", 'activate_plugins', 'mobired_settings', "mobired_admin");
}
 
add_action('admin_menu', 'mobired_admin_actions');
?>