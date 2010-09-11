<?php
/*
 *      addadress.php
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

if(isset($_POST['form_submit']) && $_POST['form_submit']=="11234"):
	$cid = $_POST['cityselect'];
	$sid = $_POST['streetselect'];
	$hn = $_POST['homenumber'];
	$fn = $_POST['floor'];
	$uid = logedUid();
	if(is_numeric($cid) && is_numeric($sid) && is_numeric($hn) && is_numeric($fn) && is_numeric($uid))
		addAddress($uid, $cid, $sid, $hn, $fn);
	else
		$notice = __('You did something wrong');
endif;

	get_top_nav(); //Call the navigation
?>


<div id="wrap">
	<div id="widecb">
		<div id="additemnav">
			<ul>
				<li><a href="" title=""><?_e('Orders history');?></a></li>
				<li class="selected"><a href="" title=""><?_e('Add Address');?></a></li>
				<li><a href="<?=HOME;?>profile" title=""><?_e('Edit details');?></a></li>
				<li><a href="<?=HOME;?>mycart" title=""><?_e('My Cart');?></a></li>
			
			</ul>
		</div>
		<div id="formblock">
		<div id="notice"><?=$notice;?></div>
			<h2><?_e('Adding Addresses');?></h2>
			<div id="content">
				<form id="addnewaddress" method="POST" name="add_address">
				<p>
					<label for="cityselect"><?_e('Select a City');?></label>
					<select id="cityselect" name = "cityselect" class = "cselect">
					<?php echo  printCitySelects(); ?>
					</select>
				</p>
				<p>
					<label for="streetselect" ><?_e('Select a Street');?></label>
					<select id="streetselect" name ="streetselect" disabled="true" class="result">
					
					</select>
				</p>
				
				<p>
					<label for="homenumber"><?_e('Home Number');?></label><br/>
					<input type="text" id="homenumber" name="homenumber" value="<?=$page->title;?>">
				</p>
				<p>
					<label for="floor"><?_e('Floor');?></label><br/>
					<input type="text" id="floor" name="floor" value="<?=$page->title;?>">
				</p>		
				<p>
					<input type="hidden" name="form_submit" value="11234">	
													
					<input id="updateForm" class="button_text" type="submit" name="submit" value="<?_e('Click ME');?>" />
				
				</p>
				</form>
				
				  
			<script type="text/javascript">
			$('.cselect').change(function() {
			 $.get('ajax/gst.php?cid='+$('.cselect :selected').val(), function(data) {
				  $('.result').html(data);
				  $('.result').removeAttr('disabled');

				 
				});
			});
			
				  

		</script>
			</div>
		</div>
		
	
	<div style="clear:both"></div>
	</div>
</div>
