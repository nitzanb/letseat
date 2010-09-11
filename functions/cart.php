<?
/*
 * 	cart.php
 * 
 * 	This file holds all the functions that Handle the cart
 * 	The cart itself is Session based and stored under $_SESSION['cart']
 * 	Those functions handle it
 * 
 * 
 */ 


/*
 *	howManyItemsDoIHave()
 * 	Gets no Parameters
 * 	return string
 * 	If cart is empty -> empty cart message
 * 	If cart is full -> return ammount of items 
 * 
 */
 
  
 function howManyItemsDoIHave($value=FALSE) {
	 $cart = $_SESSION['cart'];
	 if (!isset($cart)) {
		 if (!$value)
		 	return __('You have no items in your shopping cart');
		 else
		 	return 0;
		 	
	 	} 
	else {
		$count = 0;
		foreach($cart as $line)
			$count += $line->qtty;

		if (!$value)
			return sprintf  ( __('You have %s items in your shopping cart'), $count );
		 else
		 	return $count;	
		 }
	 }
 	
	function addToCart($itemId,  $itemName, $qtty, $price, $itemCode, $remarks){
		$cart = $_SESSION['cart'];
		$line = new Line();
		
		if(!isset($cart)) {	
			$line->addNewLine(1, $itemId,  $itemName, $qtty, $price, $itemCode, $remarks);
			
			$_SESSION['cart'][1] = $line;	
			return;
			}
		

			$pos = count($_SESSION['cart'])+1;
			$line->addNewLine($pos, $itemId,  $itemName, $qtty, $price, $itemCode, $remarks);
			$_SESSION['cart'][$pos] = $line;	
			return;
	}


function removeFromCart($lineId){
	if(isset($_SESSION['cart'][$lineId]))
		unset($_SESSION['cart'][$lineId]);
}

function printCartLines(){
	$cart = $_SESSION['cart'];
	foreach($cart as $line)
			echo $line;
			
		$string = '<tr class="total">';
		$string .= '<td>'.__('Total:').'</td>';
		$string .= '<td>'.howManyItemsDoIHave(TRUE).'</td>';
		$string .= '<td></td>';
		$string .= '<td></td>';
		$string .= '<td>'.number_format(getCartValue(), 2, '.', '').'</td>';
		$string .= '<td></td></tr>';
		echo $string;			
	
}

function getCartValue(){
	$cart = $_SESSION['cart'];
	$count = 0.00;
	foreach($cart as $line)
			$count += $line->getLineValue();
			
	return $count;
}


function getItemName($iid){
	return "this is an item- - " . $iid;
}

function getItemTotal($iid, $amount){
	return 10*$amount;
	
}


class Line{
	
	var $lineId;
	var $itemId;
	var $itemName;
	var $qtty;
	var $price;
	var $itemCode;
	var $remarks;
	
	
	public function addNewLine( $lineId,  $itemId,  $itemName, $qtty, $price, $itemCode, $remarks){
		$this->lineId = $lineId;
		$this->itemId = $itemId;
		$this->itemName = $itemName;
		$this->qtty = $qtty;
		$this->price = $price;
		$this->itemCode = $itemCode;
		$this->remarks = $remarks;
		
	}
	
	public function getLineValue(){
		return (double)($this->qtty * $this->price);
		
	}
	
	public function __toString(){		
	
		$string = '<tr>';
		$string .= '<td>'.$this->itemName.'</td>';
		$string .= '<td>'.$this->qtty.'</td>';
		$string .= '<td>'.$this->remarks.'</td>';
		$string .= '<td>'.$this->price.'</td>';
		$string .= '<td>'.number_format($this->getLineValue(), 2, '.', '').'</td>';
		$string .= '<td><a href="'.HOME.'removeitem/'.$this->lineId.'" title="'.__('Remove Item').'">'.__('Remove').'</a></td></tr>';
		
		return $string;		
		
	}
	
}


	

	
