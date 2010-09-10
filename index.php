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
require_once(ABSPATH . 'plugins/l10n.php');

load_textdomain('default',ABSPATH.'lang/default.mo');

session_start(); 
/*
 * 	Are there any variables? 
 * 	GET or POST? 
 * 	Do we use .htaccess file
 * 	we need to store theme
 */

	$sitemap = array();
	$sitemap['currency'] = __('$');
	$url = $_SERVER[ 'REQUEST_URI'  ];
	$url = trim($url, '/');
	
	$location = explode('/', $url);	
	if ($location[0]=='')
		$sitemap['location']='main';
	else
		$sitemap['location']=$location[0];
	
	if(isset($location[1]))
			$sitemap['action'] = $location[1];

if ($sitemap['action'] =='logout'){
		session_destroy();
		session_start();
	}
	get_header(); //Call the header
	get_top_nav(); //Call the navigation
	
	
	
		$path = ABSPATH.'theme/'.$sitemap['location'].'.php';
		
		if (file_exists($path))
			include($path);
		else
			include(ABSPATH.'theme/slug.php');
	
		
	
?>

<div id="footer">
(c)2010 ync
</div>

</div><!-- end wrapper"-->
</body>
</html>

<?php
/*
 * 	Thats the end of the script
 * 	We close The Db connection 
 */ 
	$db->close();
?>
