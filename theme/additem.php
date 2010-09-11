<?php
/*
 *      additem.php
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

if(isset($_GET['type']))
	$itemType = $_GET['type'];
else
	$itemType = 3;
	
if(isset($_GET['iid'])){	
	$item = new Item();
	$item->populatItem($_GET['iid']);
	}
	
	
if(isset($_POST['form_id']) && $_POST['form_id'] == FORM_SUBMIT && isAdmin()){

	$itemcode= $_POST['itemcode'];
	$itemname= $_POST['itemname'];	
	$itemtype = $_POST['type'];
	$prices= $_POST['prices'];
	$pricem= $_POST['pricem'];
	$pricel= $_POST['pricel'];	
	$itemsettings['1']= $_POST['itemsettings_1'];	
	$itemsettings['2'] = $_POST['itemsettings_2'];
	$itemsettings['3'] = $_POST['itemsettings_3'];
	$itemsettings['4'] = $_POST['itemsettings_4'];
	$itemsettings['5'] = $_POST['itemsettings_5'];
	$itemsettings['6'] = $_POST['itemsettings_6'];
	$itemsettings['7'] = $_POST['itemsettings_7'];
	$itemsettings['8'] = $_POST['itemsettings_8'];
	$itemsettings['9'] = $_POST['itemsettings_9'];
	
	$settings = '';
	for ($count=1; $count<10; $count++)
		$settings .= isset($itemsettings[$count]) ? '1' : '0';	
	
	$remove_these = array(' ','`','"','\'','\\','/');
	$newname = time().'-'.str_replace($remove_these,'',$_FILES['image']['name']);	
	
	if(isAllowedExtension($newname)){
		if (move_uploaded_file($_FILES['image']['tmp_name'], ITEM_IMAGE_PATH.$newname) ) {
			$success = true;
		//	echo $newpath;
		} else {
			$success = false;
		}}
		
	$item = new Item();	
	if(isset($_POST['iid']))
		$message = $item->updateItem($_POST['iid'], $itemcode, $itemname, $itemtype, $prices, $pricem, $pricel, $newname, $settings);
	else
		$message = $item->addNewItem($itemcode, $itemname, $itemtype, $prices, $pricem, $pricel, $newname, $settings);	
}

$itemTypeName = array(	'1'=> __('Drink'),
						'2'=> __('Dessert'),
						'3'=> __('Meat'),
						'4'=> __('Extra'),
						'5'=> __('Meal'),
						'6'=> __('Combina'));



?>

<div id="wrap">
	<div id="widecb" >

<div id="additemnav">
	<ul>
		<li class="<? echo ($itemType==1) ? 'selected' : '' ;?>"><a href="<?=HOME.'additem/?type=1';?>" title="<?_e('Add drinks');?>"><?_e('Add drinks');?></a></li>
		<li class="<? echo ($itemType==2) ? 'selected' : '' ;?>"><a href="<?=HOME.'additem/?type=2';?>" title="<?_e('Add Desserts');?>"><?_e('Add Desserts');?></a></li>
		<li class="<? echo ($itemType==3) ? 'selected' : '' ;?>"><a href="<?=HOME.'additem/?type=3';?>" title="<?_e('Add meat');?>"><?_e('Add meat');?></a></li>
		<li class="<? echo ($itemType==4) ? 'selected' : '' ;?>"><a href="<?=HOME.'additem/?type=4';?>" title="<?_e('Add Extras');?>"><?_e('Add Extras');?></a></li>
		<li class="<? echo ($itemType==5) ? 'selected' : '' ;?>"><a href="<?=HOME.'additem/?type=5';?>" title="<?_e('Add Meals');?>"><?_e('Add Meals');?></a></li>
			
	</ul>


</div>	
	
	
<div id="formblock">
<?php if(!isAdmin()):?>

<h2><?_e('You are not supposed to be here');?></h2>

<p><?_e('Please Dont try that again');?></p>

<?php else:?>

	<h2><?echo sprintf(__('Add %s to Menu'),$itemTypeName[$itemType]) ;?></h2>
<!-- Form Start -->
<form id="form_2870" class="appnitro" enctype="multipart/form-data" method="post" action="">				
	<ul >
		<li id="li_1" >
			<label class="description" for="itemname"><?_e('Product Name');?> </label>
			<div>
			<input id="itemname" name="itemname" class="element text medium" type="text" maxlength="255" value="<?=$item->itemname;?>"/> 
			</div> 
		</li>		
		<li id="li_2" >
			<label class="description" for="itemcode"><?_e('Product Code');?> </label>
			<div>
			<input id="itemcode" name="itemcode" class="element text medium" type="text" maxlength="255" value="<?=$item->itemcode;?>"/> 
			</div> 
		</li>		
	<?php
		if ($itemType == 1)
			$itemtext1 = __('Price - 330cc Can');
		else if ($itemType == 2)
			$itemtext1 = __('Price');
		else
			$itemtext1 = __('Price - Small');
	?>
		
		<li id="li_3" >
			<label class="description" for="prices"><?=$itemtext1;?> </label>
			<div>
			<input id="prices" name="prices" class="element text medium" type="text" maxlength="255" value="<?=$item->prices;?>"/> 
			</div> 

		</li>		
	
	<?php
		
		
		if ($itemType != 2){			
		if ($itemType == 1)
			$itemtext2 = __('Price - 500cc Bottle');		
		else
			$itemtext2 = __('Price - Medium');
	?>	
		
		<li id="li_4" >
			<label class="description" for="pricem"><?=$itemtext2;?> </label>
			<div>
			<input id="pricem" name="pricem" class="element text medium" type="text" maxlength="255" value="<?=$item->pricem;?>"/> 
			</div> 
	
		</li>
		<?php
		if ($itemType != 1){
		?>				
		<li id="li_5" >
			<label class="description" for="pricel"><?_e('Price - Large');?> </label>
			<div>
			<input id="pricel" name="pricel" class="element text medium" type="text" maxlength="255" value="<?=$item->pricel;?>"/> 
			</div> 

		</li>
		<?
	}
	}
		?>		
		<li id="li_6" >
			<label class="description" for="image"><?_e('Product Image');?></label>
			<div>
			<input id="image" name="image" class="element file" type="file"/> 
			</div>  
			
			<?if(isset($item)){?>
				<img src="<?=HOME.'images/items/'.$item->image ;?>" alt="<?=$item->itemname;?>">
			<?php } ?>
			</li>		
			
	<?
		if ($itemType == 3 || $itemType == 5){
	
	?>		
		<li id="li_8" >
			<label class="description" for="itemsettings"><?_e('Components');?> </label><br/>
			<span>
			<table>
				<tr>					
						<td><input id="itemsettings_1" name="itemsettings_1" class="element checkbox" type="checkbox" value="1" />
						<label class="choice" for="itemsettings_1">Ketchup</label></td>
						<td><input id="itemsettings_2" name="itemsettings_2" class="element checkbox" type="checkbox" value="1" />
						<label class="choice" for="itemsettings_2">Thousand Islands</label></td>
						<td><input id="itemsettings_3" name="itemsettings_3" class="element checkbox" type="checkbox" value="1" />
						<label class="choice" for="itemsettings_3">Lettuce</label></td>
				</tr>
				<tr>
					<td><input id="itemsettings_4" name="itemsettings_4" class="element checkbox" type="checkbox" value="1" />
						<label class="choice" for="itemsettings_4">Tomato</label></td>
					<td><input id="itemsettings_5" name="itemsettings_5" class="element checkbox" type="checkbox" value="1" />
						<label class="choice" for="itemsettings_5">Pickles</label></td>
					<td><input id="itemsettings_6" name="itemsettings_6" class="element checkbox" type="checkbox" value="1" />
						<label class="choice" for="itemsettings_6">Onion</label></td>
				</tr>
				<tr>
					<td><input id="itemsettings_7" name="itemsettings_7" class="element checkbox" type="checkbox" value="1" />
						<label class="choice" for="itemsettings_7">Spicy</label></td>
					<td><input id="itemsettings_8" name="itemsettings_8" class="element checkbox" type="checkbox" value="1" />
						<label class="choice" for="itemsettings_8">Hot</label></td>
					<td><input id="itemsettings_9" name="itemsettings_9" class="element checkbox" type="checkbox" value="1" />
						<label class="choice" for="itemsettings_9">Pickled onion</label></td>
				</tr>
			</table>

			</span> 
		</li>
<?php }?>
		<li class="buttons">
			<input type="hidden" name="form_id" value="<?=FORM_SUBMIT?>" />
			<input type="hidden" name="type" value="<?=$itemType?>" />
			
			<?
				if(isset($item)){?>
				
				<input type="hidden" name="iid" value="<?=$item->itemid ;?>" />
				
			<?php	}?>
			
			<input id="saveForm" class="button_text" type="submit" name="submit" value="<?_e('Submit');?>" />
		</li>
	</ul>
</form>	
<?php endif;?>
</div>
<!-- Form End -->
<div style="clear:both"></div>
	</div>
</div>
