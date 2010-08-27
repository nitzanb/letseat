<?php
/*
 *      functions.php
 *      
 * 		This file contains sevral function for daily use.
 */

//We load the cart module
require_once(ABSPATH.'functions/cart.php');

function nicePageTitle(){
	$title = "Burgeranch";
	if(TRUE)
		$title .= "- I love it";
	
	return $title;
	
}

function get_header(){
	include (ABSPATH.'theme/header.php');
	
	}

function get_top_nav(){
	include (ABSPATH.'theme/topnav.php');
	
	
	}

function get_content(){
	global $sitemap;

	switch ($sitemap['location']){
		case 'menu':
			echo "menu";
			break;
		case 'account':
			//include (ABSPATH.'theme/acount.php');
			break;
		default:
			include (ABSPATH.'theme/main.php');

	}
	
	
	
	
	}



function __($string){
	return $string;
}

function _e($string){
	echo $string;
	}
	
	
