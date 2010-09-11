<?php
/*
 *      header.php
 *      
 *      Copyright 2010 nitzan <nitzan@nitzan-laptop>
 *      
 *      This program is free software; you can redistribute it and/or modify
 *      it under the terms of the GNU General Public License as published by
 *      the Free Software Foundation; either version 2 of the License, or
 *      (at your option) any later version.
 *      
 *      This program is distributed in the hope that it will be useful,
 *      but WITHOUT ANY WARRANTY; without even the implied warranty of
 *      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *      GNU General Public License for more details.
 *      
 *      You should have received a copy of the GNU General Public License
 *      along with this program; if not, write to the Free Software
 *      Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston,
 *      MA 02110-1301, USA.
 */

global $sitemap;



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?php echo nicePageTitle() ?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.16" />
	<link type="text/css" rel="Stylesheet" media="screen" href="/style/style.css"/>
	<?php if($sitemap['location'] == 'addnewpage'){?>
		<!-- Skin CSS file -->
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.1/build/assets/skins/sam/skin.css">
		<!-- Utility Dependencies -->
		<script src="http://yui.yahooapis.com/2.8.1/build/yahoo-dom-event/yahoo-dom-event.js"></script> 
		<script src="http://yui.yahooapis.com/2.8.1/build/element/element-min.js"></script> 
		<!-- Needed for Menus, Buttons and Overlays used in the Toolbar -->
		<script src="http://yui.yahooapis.com/2.8.1/build/container/container_core-min.js"></script>
		<script src="http://yui.yahooapis.com/2.8.1/build/menu/menu-min.js"></script>
		<script src="http://yui.yahooapis.com/2.8.1/build/button/button-min.js"></script>
		<!-- Source file for Rich Text Editor-->
		<script src="http://yui.yahooapis.com/2.8.1/build/editor/editor-min.js"></script>
		<?php }?>		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script src="js/gen_validatorv31.js"></script>
		
</head>

<body class="yui-skin-sam">
	
<div id="wrapper">
	<div id="header">
		<h1><?_e('Our happy Site'); ?></h1>
		<div class ="slogen"><?_e('Our happy slogen');?></div>
	</div><!-- end header"-->





