<?php
/*
 *      City.php
 
CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL auto_increment,
  `city_name` varchar(30) NOT NULL,
  `area_id` int(11) default NULL,
  PRIMARY KEY  (`city_id`),
  UNIQUE KEY `UQ_Cities_city_name` (`city_name`),
  KEY `area_id` (`area_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

 
 */

class City{
	private $city_id;
	private $city_name;
	private $area_id;
	
		public function __construct(){
		
		}
		
		public function getCityId(){return $this->city_id;}
		public function setCityId($cid){if(is_numeric($cid)) {$this->city_id=$cid;return TRUE;} return FALSE;}
		public function getCityName(){return $this->city_name;}
		public function setCityName($name){$this->city_name=$name; return TRUE;}
		public function getAreaId(){return $this->area_id;}
		public function setAreaId($aid){if(is_numeric($aid)) {$this->area_id = $aid;  return TRUE;} return FALSE;}
		
		public function storeCity(){
			$sql = "INSERT INTO ;";

			$result = $sql;
			return $sql;
		}
		
		
	
}
