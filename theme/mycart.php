<?php
/*
 *      mycart.php
 *      

 */
	get_top_nav(); //Call the navigation
?>

<div id="wrap">
	<div id="widecb">
		<div id="additemnav">
			<ul>
			<ul>
				<li><a href="" title=""><?_e('Orders history');?></a></li>
				<li><a href="<?=HOME;?>addadress" title=""><?_e('Add Address');?></a></li>
				<li><a href="<?=HOME;?>profile" title=""><?_e('Edit details');?></a></li>
				<li class="selected"><a href="<?=HOME;?>mycart" title=""><?_e('My Cart');?></a></li>
			
			</ul>			
						
			</ul>
		</div>
		<div id="formblock">
			<h2><?_e('My Cart');?></h2>
			<div id="content">
				
				<table id="myCart">
					<thead>
					<tr>
						<th><?_e('Item Name');?></th>
						<th><?_e('Quantitiy');?></th>
						<th><?_e('Remarks');?></th>
						<th><?_e('Unit Price');?></th>
						<th><?_e('Price');?></th>
						<th><?_e('Remove');?></th>
					</tr>
					</thead>
					<tbody>
						<?	printCartLines(); ?>
					
					</tbody>
				</table>
				
				<div id="chekoutbtn">
					<a href="<?=HOME.'checkout';?>" title="<?_e('CheckOut')?>"><img src="<?=HOME;?>images/checkout.png" alt="chekout button"></a>
				
				</div>
			</div>
		</div>
		
	
	<div style="clear:both"></div>
	</div>
</div>
