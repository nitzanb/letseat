<?php
/*
 *      checkout.php
 *      
 *      Copyright 2010 nitzan <nitzan@nitzan-laptop>
 *      
 */

?>

<div id="wrap">
	<div id="widecb">
		<div id="additemnav">
			<ul>
				<li><a href="" title=""><?_e('Orders history');?></a></li>
				<li><a href="<?=HOME;?>addadress" title=""><?_e('Add Address');?></a></li>
				<li><a href="<?=HOME;?>profile" title=""><?_e('Edit details');?></a></li>
				<li ><a href="<?=HOME;?>mycart" title=""><?_e('My Cart');?></a></li>
			
			
			
			</ul>
		</div>
		<div id="formblock">
			<h2><?_e('Check Out');?></h2>
			<div id="content">
				<form id="checkoutform" method="POST" >
					<p>						
						<label for="address"><?_e('Select Your Address');?></label>
						<select id="address" name = "address" >
							<?php echo getAddressOptionList(logedUid());?>
						</select>				
					</p>

					<p>						
						<label for="cardType"><?_e('Credit Card Type');?></label>
						<select id="cardType" name = "cardType" >
							<option value="1"><?_e('Visa');?></option>
							<option value="2"><?_e('MasterCard');?></option>
							<option value="3"><?_e('American Express');?></option>
							<option value="4"><?_e('Diners');?></option>
						</select>				
					</p>
					<p>
						<label for="cardnumber"><?_e('Card Number');?></label><br/>
						<input type="text" id="cardnumber" name="cardnumber" value="<?=$page->title;?>">
					</p>
				</form>
					<p>
						<label for="duedate"><?_e('Valid until');?></label><br/>
						<input type="text" id="duedate" name="duedate" value="MM/YY" onFocus="this.value=''" >
					</p>
					<p>
						<label for="ownerId"><?_e('Id Number');?></label><br/>
						<input type="text" id="ownerId" name="ownerId" value="<?=$page->title;?>">
					</p>
					<p>
					<input type="hidden" name="form_submit" value="11234">													
					<input id="updateForm" class="button_text" type="submit" name="submit" value="<?_e('Click ME');?>" />
				
				</p>
				</form>
			
			</div>
		</div>
		
	
	<div style="clear:both"></div>
	</div>
</div>
