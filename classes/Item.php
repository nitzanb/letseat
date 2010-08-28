<?php
/*
 *      Item.php
 *      
 *      Copyright 2010 Nitzan Brumer <nitzan@taz>
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

class Item{
	var $itemid;			//The item id in the 
	var $itemcode;			//the item code in the system (not same as id)
	var $itemname;			//The Item name
	var $itemtype;			//what kind of item it is
	var $prices;			//Price for small item
	var $pricem;			//Price for medium item  - the default price
	var $pricel;			//price for large item 
	var $image;				//path to image
	var $itemsettings;		//spacial settings for meat or meal
	
	
	/*
	 * 	Item type
	 	1	drink 	- 	coke, water, sprite, etc.
		2	desert 	- 	choclate pai, icecream, etc
		3	meat	-	Ranch, Nagets
		4	Extra	-	French fries, Onion rings
		5	meal	-	
		6	combina	-
	 * 
	 */ 

	
	public function addNewItem($itemcode, $itemname, $itemtype, $prices, $pricem, $pricel, $image, $itemsettings){
		global $db;
		$sql = "SELECT * FROM `".TBL_ITEMS."` WHERE `itemcode` = '$itemcode'";
		$record = $db->query_first($sql);	
		if($record)	{ 	//if null we continue, if not we throw error
			$message['text'] = __('This Item code is already listed');
			return $message; 
			}		
		$data['itemcode']= $itemcode ;
		$data['itemname']= $itemname ;
		$data['itemtype']= $itemtype ;
		$data['prices']= $prices ;
		$data['pricem']= $pricem ;
		$data['pricel']= $pricel ;
		$data['image']= $image ;
		$data['itemsettings']= $itemsettings ;
		
		$qid = $db->insert(TBL_ITEMS, $data);
		$message['text'] = __('Item added successfully');
		$message['qid'] = $qid;
		
		return $message;
		
	}
	
	public function populatItem($id){
		global $db;		
		//check if username already exist		
		$sql = "SELECT * FROM `".TBL_ITEMS."` WHERE `itemid` = $id";
		//echo $sql;
		$record = $db->query_first($sql);	
		if ($record){
			$this->itemid = $record['itemid'];
			$this->itemcode = $record['itemcode'];
			$this->itemname = $record['itemname'];
			$this->itemtype = $record['itemtype'];
			$this->prices = $record['prices'];
			$this->pricem = $record['pricem'];
			$this->pricel = $record['pricel'];
			$this->image = $record['image'];
			$this->itemsettings = $record['itemsettings'];
			}
		
	}
	
	public function deleteItem($id){
		$sql = "DELETE FROM `".TBL_ITEMS."` WHERE `itemid`=$id";
		$db->query($sql);		
	}
	
	public function updateItem($itemid, $itemcode, $itemname, $itemtype, $prices, $pricem, $pricel, $image, $itemsettings){
		global $db;
		$sql = "SELECT * FROM `".TBL_ITEMS."` WHERE `itemid` = '$itemid'";
		$record = $db->query_first($sql);	
		if($record)	{ 
			$data['itemcode']= $itemcode ;
			$data['itemname']= $itemname ;
			$data['itemtype']= $itemtype ;
			$data['prices']= $prices ;
			$data['pricem']= $pricem ;
			$data['pricel']= $pricel ;
			$data['image']= $image ;
			$data['itemsettings']= $itemsettings ;			
			$db->update(TBL_ITEMS, $data, "`itemid` = $itemid");
			$message['text'] = __('Item Updated successfully');
			return $message;
			}
		else
			return addNewItem( $itemcode, $itemname, $itemtype, $prices, $pricem, $pricel, $image, $itemsettings);		
	}
	
}
