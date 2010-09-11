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
	 
	 /*
	  * 	This function get parameters to the cart and create a itemsline form it
	  * 	using the Line class
	  * 
	  */ 
 	
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
	
	function clearCart(){
		if(isset($_SESSION['cart']))
			unset($_SESSION['cart']);		
	}

/*
 * 	a simple unset funcion, gets a line id and remove it
 * 
 */ 

function removeFromCart($lineId){
	if(isset($_SESSION['cart'][$lineId]))
		unset($_SESSION['cart'][$lineId]);
}

function printCartLines(){
	$cart = $_SESSION['cart'];if (isset($cart)){
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
}


function printRecite(){
	$cart = $_SESSION['cart'];
	if (isset($cart)){
		$string = '';
	foreach($cart as $line)
			$string .= $line->toRecite();
			
		$string .= '<tr class="total">';
		$string .= '<td>'.__('Total:').'</td>';
		$string .= '<td>'.howManyItemsDoIHave(TRUE).'</td>';
			
		$string .= '<td></td>';
		$string .= '<td>'.number_format(getCartValue(), 2, '.', '').'</td>';
		$string .= '</tr>';
		return $string;			
	}
}


/*
 * 	This function runs on all the cart and calculate the total value.
 */ 

function getCartValue(){
	$cart = $_SESSION['cart'];
	if (isset($cart)){
		$count = 0.00;
		foreach($cart as $line)
				$count += $line->getLineValue();		
		return $count;
	}
}



/*
 * 	This is a simple class that manage the cart lines
 */ 

class Line{
	
	var $lineId;
	var $itemId;
	var $itemName;
	var $qtty;
	var $price;
	var $itemCode;
	var $remarks;
	
	/* Thats not really a constractor by the book but thats exactly what it do */
	public function addNewLine( $lineId,  $itemId,  $itemName, $qtty, $price, $itemCode, $remarks){
		$this->lineId = $lineId;
		$this->itemId = $itemId;
		$this->itemName = $itemName;
		$this->qtty = $qtty;
		$this->price = $price;
		$this->itemCode = $itemCode;
		$this->remarks = $remarks;
		
	}
	
	//Calculate the line value by motliply quantity with unit price
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
	
		public function toRecite(){		
	
		$string = '<tr>';
		$string .= '<td>'.$this->itemName.'</td>';
		$string .= '<td>'.$this->qtty.'</td>';		
		$string .= '<td>'.$this->price.'</td>';
		$string .= '<td>'.number_format($this->getLineValue(), 2, '.', '').'</td></tr>';		
		return $string;		
		
	}
	
}


/*
 * 	Complete the order
 * 
 * 	This Section handle the order submittion
 * 	It is very basic and can be blown up to huge size
 * 
 * 	TODO: 	add ID verification algorithem
 * 			add Credit card Verification algorithem
 * 			this is actually should talk with transilla api or any other credit card services supplier
 * 			
 * 
 * 	basicly - we take the order, parse it, save it to db and clear the basket
 
 
 CREATE TABLE `brsite`.`orders` (
`orderid` INT( 15 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`uid` INT( 10 ) NOT NULL ,
`dump` TEXT NULL ,
`total` DECIMAL( 8, 2 ) NOT NULL ,
`timestamp` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
INDEX ( `uid` )
) ENGINE = InnoDB;

 */ 	


function processOrder($address, $cardType, $cardnumber, $duedate, $ownerId ){
	
	$uid = logedUid();
	$date = date('d.m.y - H:m' );
	$recite =  '';
	$slogen = __('B.R L.T.D - 12345678');
	$anounce = __('Tax Invoice / recite');
	$status = __('Copy');
	$tableHeader['iname'] = __('Item Name');
	$tableHeader['Quantitiy'] =__('Quantitiy');	
	$tableHeader['uprice'] = __('Unit Price');
	$tableHeader['total'] = __('Price');
	
	global $db;
	
	$data['uid'] = $uid ;
	$data['total'] = getCartValue();
	
	$qid = $db->insert('orders', $data);
	
	
	$transactionid = $qid;
	
	
$recite .= <<<EOF
			<div id="recite">
				<div id="reciteheader">
					<div class="date">${date}</div>
					<div class="slogen">${slogen}</div>
					<div class="anounce">${anounce} : ${transactionid} - ${status} </div>
				</div>
				<div id="recitebody">
				<table id="myCart">
					<thead>
					<tr>
						<th>${tableHeader['iname']}</th>
						<th>${tableHeader['Quantitiy']}</th>					
						<th>${tableHeader['uprice']}</th>
						<th>${tableHeader['total']}</th>						
					</tr>
					</thead>
					<tbody>
						
					
				
EOF;

	$recite .=	printRecite();		
$recite .= <<<EOF
				</tbody>
				</table>
				<div id="reciteFooter">
					
				

EOF;

$recite .= sprintf(__('Paid with credit Card ending with %s'), substr($cardnumber, -4,4));
				
$recite .= <<<EOF
				
				
				</div>
				
				
				</div>
			</div></div>

EOF;
	$data['dump'] = $recite;
	$db->update('orders', $data, "`orderid` = $qid");
	
	$recite = str_replace(__('Copy'), __('Original') , $recite);
	clearCart();
	return $recite;
}
	
