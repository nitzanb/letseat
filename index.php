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
 * 	Are there any variables? 
 * 	GET or POST? 
 * 	Do we use .htaccess file
 * 	we need to store theme
 */

	$sitemap = array();
	$url = $_SERVER[ 'REQUEST_URI'  ];
	$url = trim($url, '/');
	$location = explode('/', $url);	
	if ($location[0]=='')
		$sitemap['location']='home';
	else
		$sitemap['location']=$location[0];
	
	if(isset($location[1]))
			$sitemap['page'] = $location[1];
			
	if(isset($location[2]))
			$sitemap['page'] = $location[1];
			

	
	
	
	
	


?>

<?php 
	get_header(); //Call the header
	get_top_nav(); //Call the navigation
	
	get_content(); //Call the content
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
