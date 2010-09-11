<?php
/*
 *      config.php
 *      
 */
/*
define('DB_NAME', '');    // The name of the data
define('DB_USER', '');     //  MySQL username
define('DB_PASSWORD', ''); // ...and password
define('DB_HOST', '');    //Db server
*/
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8');
define ('LANG', 'he_IL');  //For localization and translation
define('HOME', 'http://br.twodiv.com/');//'http://bur.geran.ch/');
define ('ADMIN_LEVEL', '9');
define('USER_LEVEL','1');
define('SECRET','askldj08asd98asd2013h82650f58j23498'); //This is used to Hash the Passwords
define('FORM_SUBMIT','cpq9r092y8123');
define('ITEM_IMAGE_PATH',ABSPATH.'images/items/');

/*	Database Table names */

define('TBL_USERS','users');
define('TBL_ITEMS','items');
define('TBL_PAGES','pages');

require_once(ABSPATH.'config/private.php');
// 	Requires Section - all the included files should be included here
//	use require_once(ABSPATH.'filename'); 

require_once(ABSPATH.'classes/Database.singleton.php');
$db = Database::obtain(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
$db->connect(); 


require_once(ABSPATH.'functions/functions.php');
require_once(ABSPATH.'classes/classes.php');



?>
