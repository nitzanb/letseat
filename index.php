<?php
/*
 *      index.php
 *      
 *      Copyright 2010 Nitzan <nitzan@n2b.org> & Yura <yura@gmail.com>
 *      
 */

//We start by loading the config file
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH.'config/config.php');

/*
 * 	Are there any variables? GET or POST? we need to store theme
 */

	$sitemap = array();
	if (isset($_GET['item']))
		$sitemap['location']= array('item'=> $_GET['item']);


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title><?php echo nicePageTitle() ;?></title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.16" />
</head>

<body>
<div id="header">
	get_header();
</div>
<div id="topnav">
	get_top_nav();
</div>
<div id="content">
	get_content();
</div>
<div id="footer">
(c)2010 ync

</div>

</body>
</html>

<?php
/*
 * 	Thats the end of the script
 * 	We close The Db connection 
 */ 
	$db->close();
?>
