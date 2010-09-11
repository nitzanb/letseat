<?php
/*
 *      adresses.php
 *      
 * 	This is the mysql Dump for tables
 * 


CREATE TABLE IF NOT EXISTS `streets` (
  `street_id` int(11) NOT NULL AUTO_INCREMENT,
  `street_name` varchar(30) NOT NULL,
  PRIMARY KEY (`street_id`),
  UNIQUE KEY `UQ_Streets_street_name` (`street_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;


-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(30) NOT NULL,
  PRIMARY KEY (`city_id`),
  UNIQUE KEY `UQ_Cities_city_name` (`city_name`)  
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;


-- Table structure for table `streets2cities`
--

CREATE TABLE IF NOT EXISTS `streets2cities` (
  `cityid` int(4) NOT NULL,
  `streetid` int(4) NOT NULL,
  KEY `citycodeids` (`cityid`),
  KEY `streetcodeids` (`streetid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;



-- Constraints for table `streets2cities`
--
ALTER TABLE `streets2cities`
  ADD CONSTRAINT `streetcodeids` FOREIGN KEY (`streetid`) REFERENCES `streets` (`street_id`),
  ADD CONSTRAINT `citycodeids` FOREIGN KEY (`cityid`) REFERENCES `cities` (`city_id`);


 */



function addCity($cityName){
	global $db;
	$sql = "SELECT * FROM `cities` WHERE `city_name` = '$cityName'";
	$record = $db->query_first($sql);
	if (!empty($record))
		return $record['city_id'];
	$data['city_name'] = $cityName;
	return $db->insert('cities', $data);	
}

function addStreet($streetName){
	global $db;
	$sql = "SELECT * FROM `streets` WHERE `street_name` = '$streetName'";
	$record = $db->query_first($sql);
	if (!empty($record))
		return $record['street_id'];
	$data['street_name'] = $streetName;
	return $db->insert('streets', $data);	
}

function pairStreetToCity($street_id, $city_id){
	global $db;
	$data['cityid'] = $city_id;
	$data['streetid'] = $street_id;
	return $db->insert('streets2cities', $data);	
}

function updateCity($cid, $cname){
	global $db;
	$data['city_name'] = $cname;
	return $db->update('cities', $data, "`city_id` = $cid");	
}

function updateStreet($sid, $sname){
	global $db;
	$data['street_name'] = $sname;
	return $db->update('streets', $data, "`street_id` = $sid");	
	
}

function getCityNameById($cid){
	global $db;
	$sql = "SELECT * FROM `cities` WHERE `city_id` = '$cid'";
	$record = $db->query_first($sql);
	if (!empty($record))
		return $record['city_name'];
	return 'Unknown';	
}

function getStreetNameById($sid){
	global $db;
	$sql = "SELECT * FROM `streets` WHERE `street_id` = '$sid'";
	$record = $db->query_first($sql);
	if (!empty($record))
		return $record['street_name'];
	return 'Unknown';	
}

function printCitySelects(){
	global $db;
	$sql = "SELECT * FROM `cities`";
	$results = $db->query($sql);
	$string ="";
	while($row = mysql_fetch_assoc($results)){
		$string .= '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
	}
	return $string;	
	
}

function printStreetSelects($cid){
	global $db;
	$sql = "select street_id, street_name from cities as c, streets as s, streets2cities as sc where cityid = city_id and street_id = streetid and city_id = '$cid'";
	$results = $db->query($sql);
	$string ="";
	while($row = mysql_fetch_assoc($results)){
		$string .= '<option value="'.$row['street_id'].'">'.$row['street_name'].'</option>';
	}
	return $string;	
	
}


/*
 * 	For later on
 * 	I did not add a delete city and delete street to the system on purpose
 * 	There is usage of FOREIGN KEY and I don't want to lose them
 * 	Deleting can be dangerous
 */ 

/*
 *	Now we handle user adresses 
 * 
 * 

CREATE TABLE IF NOT EXISTS `adresses` (
  `adressId` int(15) NOT NULL AUTO_INCREMENT,
  `userid` int(10) NOT NULL,
  `cityid` int(11) NOT NULL,
  `streetid` int(11) NOT NULL,
  `homenumber` int(3) NOT NULL,
  `floor` int(2) NOT NULL,
  PRIMARY KEY (`adressId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

ALTER TABLE `adresses`  ADD CONSTRAINT `userAdress` FOREIGN KEY (`userid`) REFERENCES `users` (`uid`);
  ADD CONSTRAINT `streetadress` FOREIGN KEY (`streetid`) REFERENCES `streets` (`street_id`),
  ADD CONSTRAINT `cityadress` FOREIGN KEY (`cityid`) REFERENCES `cities` (`city_id`);
  ADD CONSTRAINT `userAdress` FOREIGN KEY (`userid`) REFERENCES `users` (`uid`);

* 
*/

function addAddress($uid, $cid, $sid, $hnumber, $floor){
	global $db;
	$sql = "SELECT * FROM `adresses` WHERE `userid` = '$uid' and `streetid` = '$sid' and `homenumber` = '$hnumber' ";
	$record = $db->query_first($sql);
	if (!empty($record))
		return $record['adressId'];		
	$data['userid'] = $uid;	
	$data['cityid'] = $cid;	
	$data['streetid'] = $sid;	
	$data['homenumber'] = $hnumber;	
	$data['floor'] = $floor;			
	return $db->insert('adresses', $data);	
}

function deleteAddress($aid){
	global $db;
	$sql = "DELETE FROM `adresses` WHERE `adressId`=$aid";
	$db->query($sql);		
}

function getAddressesByUser($uid){
	global $db;
	$sql = "SELECT * FROM `adresses` WHERE `userid`=$uid";
	$results = $db->query($sql);
	$adresses = array();
	while($row = mysql_fetch_assoc($results)){
		$adresses[] = $row;
	}
	return $adresses;
}

function printAddress($address, $echo = TRUE){
	//print_r($address);
	$sid = getStreetNameById($address['streetid']);
	$cid = getCityNameById($address['cityid']);
	$hn = $address['homenumber'];
	$fn = $address['floor'];	
	$address = sprintf(__('Street %s %s Floor %s, %s <br/>'), $sid, $hn, $fn, $cid);
	if ($echo)
		echo $address ;
	else
		return $address ;	
	
}

function getAddressOptionList($uid){
	global $db;
	$sql = "SELECT * FROM `adresses` WHERE `userid`=$uid";
	$results = $db->query($sql);
	$adresses = "";
	while($row = mysql_fetch_assoc($results)){
		$adresses .= '<option value="'.$row['adressId'].'">'.printAddress($row, FALSE).'</option>'."\n";
	}
	return $adresses;
	
}
