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
	
function isUser(){
	if(isset($_SESSION['user']->ulevel))
		return $_SESSION['user']->ulevel;
	else
		return FALSE;
}

function getItemsByType($type){
	global $db;
	$sql = "select * from items where itemtype = ".$type;
	$results = $db->query($sql);
	
	$items = array();
	while($row = mysql_fetch_assoc($results)){
		$item = new Item();
		$item->itemFromArray($row);
		$items[] = $item;
	}
	
	return $items;
	
}


/*
 * 	The next two function are paceholder for the translation
 * 	functionality. thy should be commented out when 
 * 	a proper 1l8n class be placed
 * 
 */
function __($string){ 
	return $string;
}

function _e($string){
	echo $string;
	}
	
	/**/
	
function isAllowedExtension($file) {
	  $allowed_extensions = array('jpg','png','gif');
	  $file = strtolower($file);
	  return in_array(end(explode(".", $file)), $allowed_extensions);
	}
