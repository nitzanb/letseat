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
			$this->itemFromArray($record);
			}		
		}
	
	public function itemFromArray($record){
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
	
	public function deleteItem($id){
		$sql = "DELETE FROM `".TBL_ITEMS."` WHERE `itemid`=$id";
		$db->query($sql);		
	}
	
	/*
	 * 	we update the fields for an item in the table
	 */ 
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
	
	/*	
	 * 	_toString is a php function that sets the class output 
	 * 	(much like toString in Java)
	 * 	in order to show an item we can now use 
	 * 			echo $item;
	 *	insted of retyping the full code 
	 */
	
	public function __toString(){		
		$string =  '<div class="item_wrapper" id="item-'.$this->itemid.'">';
		$string .= '<img class="itemimage" src='.HOME.'images/items/'.$this->image.' alt = '.$this->itemname.' />';
		$string .='<div class = "item_info">';
		// We want to prevent unregistered user from entering the order item page
		if(isUser()) 
			$string .= '<h3><a href="'.HOME.'item/'.$this->itemid.'" title="'. __('Order').'">'.$this->itemname.'</a></h3>';
		else
			$string .= '<h3>'.$this->itemname.'</h3>';
		
		$string .= '<div class="item_price"><table>';
		switch ($this->itemtype){
			case 1:
				$string .= sprintf(__('<tr><td class="desc">330cc can</td><td> %s </td></tr><tr><td class="price"> 500cc bottle</td><td> %s</td></tr>'),$this->prices, $this->pricem);		
				break;
			case 2:
				$string .= sprintf(__('<tr><td class="desc">מחיר: </td><td> %s </td></tr>'),$this->prices);	
				break;
			case 3: 
				$string .= sprintf(__('<tr><td class="desc">regular</td><td> %s </td></tr><tr><td class="price">double</td><td> %s</td></tr><tr><td class="price">Triple</td><td> %s</td></tr>'),$this->prices, $this->pricem, $this->pricel);			
				break;
			case 4: 
			case 5:
				$string .= sprintf(__('<tr><td class="desc">Small</td><td> %s </td></tr><tr><td class="price">Medium</td><td> %s</td></tr><tr><td class="price">Large</td><td> %s</td></tr>'),$this->prices, $this->pricem, $this->pricel);			
				break;
			case 6:
				$string .= sprintf(__('<tr><td class="desc">For 3</td><td> %s </td></tr><tr><td class="price">For 4</td><td> %s</td></tr>'), $this->pricem, $this->pricel);			
				break;			
			}		
		$string .= '</table></div>';
		$string .= '</div>';
		// We want to prevent unregistered user from entering the order item page
		if(isUser()){	
			$string .= '<a href="'.HOME.'item/'.$this->itemid.'" title="'.__('Add this item to your cart').'"><img class="addtoorder" src="'.HOME.'images/addtocart.png" alt="Add to order"></a>';
		}
		$string .='</div>';
		return $string;		
	}
		
}
