<?php
/*
 *      functions.php
 *      
 * 		This file contains sevral function for daily use.
 */

//We load the cart module
require_once(ABSPATH.'functions/cart.php');
//We load the addresses module
require_once(ABSPATH.'functions/adresses.php');
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

function isAdmin(){
	if($_SESSION['user']->ulevel == ADMIN_LEVEL)
		return TRUE;
	else
		return FALSE;
	
}


function logedUid(){
	if(isset($_SESSION['user']->uid))
		return $_SESSION['user']->uid;
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

function isAllowedExtension($file) {
	  $allowed_extensions = array('jpg','png','gif');
	  $file = strtolower($file);
	  return in_array(end(explode(".", $file)), $allowed_extensions);
	}

function getAllPages(){
	global $db;
	$sql = "select * from ".TBL_PAGES." where status = 1";
	$results = $db->query($sql);
	$pages = array();
	while($row = mysql_fetch_assoc($results)){
		$page = new Page();
		$page->pageFromArray($row);
		$pages[] = $page;
	}
	
	return $pages;
	
}
function checkEmail($email) {
  if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])
  ↪*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",
               $email)){
    list($username,$domain)=split('@',$email);
    if(!checkdnsrr($domain,'MX')) {
      return false;
    }
    return true;
  }
  return false;
}
