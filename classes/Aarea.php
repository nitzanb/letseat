<?php

/*

CREATE TABLE IF NOT EXISTS `areas` (
  `id` int(11) NOT NULL auto_increment,
  `area_name` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

*/

class Area {
	private $id;
	private $area_name;
	
	public function __construct(){
		
		}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		if(is_numeric($id)){
			$this->id=$id;
			return TRUE;
		}
		return FALSE;		
	}
	
	public function setAreaName($name){
		$this->area_name = $name;
		return TRUE;		
	}
	
	public function getAreaName(){
		return $this->area_name;
	}
	
	public function storeArea(){
		$sql = "INSERT INTO `areas` (`id`, `area_name`) VALUES (`".$this->id."`,`".$this->area_name."`);";

		$result = $sql;
		return $sql;
		
	}
}

/* Testing Zone * /

$area51 = new Area();
$area51->setAreaName('Area 51');
$area51->setId(51);
echo $area51->storeArea();
print_r($area51);
/*/
