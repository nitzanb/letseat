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
 
  
 function howManyItemsDoIHave() {
	 $cart = $_SESSION['cart'];
	 if (!isset($cart)) {
		 return __('You have no items in your shopping cart');
	 	} 
	else {
		$count = 0;
		foreach($cart as $items)
			print_r($items);

		 
		 return sprintf  ( __('You have %s items in your shopping cart'), $count );
		 }
	 }
 	

function addToCart($itemId, $qantity, $notes){
	$cart = $_SESSION['cart'];
	$hadJustThat = FALSE;
	
	//Cart is empty - we add the first item
	if(!isset($cart)) {	
		$_SESSION['cart'][ $itemId][0] = array( $qantity, $notes);
		return;
		}
	
	//If we already have that item
	if(isset($_SESSION['cart'][ $itemId])){
		$pos = 0;
			foreach ($_SESSION['cart'][ $itemId] as $note){
				if( $note[1] ==  $notes){
						$_SESSION['cart'][ $itemId][$pos][0]= $_SESSION['cart'][ $itemId][$pos][0] + $qantity;
						return;
					}
				else $pos++;
			}
		$_SESSION['cart'][ $itemId][] = array( $qantity, $notes);
			return;
		}
	
	$_SESSION['cart'][ $itemId] = array( $qantity, $notes);
}

function removeFromCart($itemId, $pos=0){
	if(isset($_SESSION['cart'][$itemId][$pos]))
		unset($_SESSION['cart'][$itemId][$pos]);
}
