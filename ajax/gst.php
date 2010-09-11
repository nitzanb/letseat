<?php
/*
 *      gst.php
 *      
 */
if ( !defined('ABSPATH') )
	define('ABSPATH', $_SERVER['DOCUMENT_ROOT'] . '/');
require_once('../config/config.php');
require_once('../functions/adresses.php');

echo printStreetSelects($_GET['cid']);

