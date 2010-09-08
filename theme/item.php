<?php
/*
 *      item.php
 *      
 *      Copyright 2010 nitzan <nitzan@nitzan-laptop>
 *      
 */
global $sitemap;
if(isset($sitemap['action']))
	$iid = $sitemap['action'];
else
	die(_e('You are not suppose to be here'));
	
$item = new Item();
$item->populatItem($iid);
?>

<div id="wrap">
	<div id="widecb" >
	<div id="additemnav">
			<ul>
				<li><a href="<?php echo HOME.'menu/6';?>" title=""><?_e('Combina');?></a></li>
				<li><a href="<?php echo HOME.'menu/5';?>" title=""><?_e('Meals');?></a></li>
				<li><a href="<?php echo HOME.'menu/3';?>" title=""><?_e('Main Dishes');?></a></li>	
				<li><a href="<?php echo HOME.'menu/1';?>" title=""><?_e('Drinks');?></a></li>	
				<li><a href="<?php echo HOME.'menu/4';?>" title=""><?_e('Extras');?></a></li>
				<li><a href="<?php echo HOME.'menu/2';?>" title=""><?_e('Deserts');?></a></li>
						
			</ul>
		</div>
		<div id="menuitemlist">
		<div class="inner-item_wrapper" id="item-<?echo $item->itemid;?>">
			<img class="itemimage" src='<?php echo HOME.'images/items/'.$item->image ;?>' alt = "<?php echo $item->itemname;?>" />
			<div class = "item_info">
			<h3><?=$item->itemname;?></h3>
		<form id="add_item_to_Cart" class="appnitro" enctype="multipart/form-data" method="post" action="'.HOME.'menu'.'">
			<ul>
			<?php 
				/*
				 * 	This section prints out the prices by size table
				 * 	We checked if a price is set and than if its not 0.00
				 * 	if the check pass - we print the radio botton
				 * 
				 * 	we also check for the item type to print the correct 
				 * 	lable to the item 
				 */		
			?>
			
			
				<li id="prices">
						<label class="description" for="itemPrice"><?_e('Prices and quantities');?> </label><br/>
						<table>
						
						<?php  if(isset($item->prices) && $item->prices != "0.00"):?>
							<tr>
								<td><input id="itemPrice_s" name="itemsettings_4" class="element checkbox" type="radio" value="1" /></td>
								
								<td  class="desc"><? ($item->itemtype != 1) ?  _e('Small') :  _e('330cc Can');?></td>
								<td  class="price"><?=$item->prices. " " . $sitemap['currency'];?></td>
							</tr>
						<?php endif;?> 
						<?php  if(isset($item->pricem) && $item->pricem != "0.00"):?>
							<tr>
								<td><input id="itemPrice_m" name="itemsettings_4" class="element checkbox" type="radio" value="1" /></td>
								<td class="desc"><?($item->itemtype != 1) ? _e('Medium') : _e('500cc Bottle');?></td>
								<td class="price"><?=$item->pricem . " " . $sitemap['currency'] ;?></td>
							</tr>
						<?php endif;?> 
						<?php  if(isset($item->pricel) && $item->pricel != "0.00"):?>
							<tr>
								<td><input id="itemPrice_l" name="itemsettings_4" class="element checkbox" type="radio" value="1" /></td>
								<td class="desc"><?($item->itemtype != 1) ? _e('Large') : _e('1.5L Bottle');?></td>
								<td class="price"><?=$item->pricel . " " . $sitemap['currency'] ;?></td>
							</tr>
						<?php endif;?> 
						</table>
				
				</li>
				<li id="quantity">
					<label class="description" for="pricel"><?_e('Quantitiy');?> </label>
					<input id="qtty" name="qtty" class="element text small" type="text" maxlength="255" value="1"/> 
				</li>
				
				
				<li id="submition">
				
				
				<input id="saveForm" class="button_text" type="submit" name="submit" value="<?_e('Submit');?>" />
				</li>
			
			
			
			</ul>
		
		</form>
		
		</div>
		
		<?
			//echo $item->printItemForm();
		?>
		</div>
		</div>
	
	
	<div style="clear:both"></div>	
	</div>
</div>
