<?php
/*
 *      menu.php
 *      
 *      Copyright 2010 nitzan <nitzan@nitzan-laptop>
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

global $sitemap;
if(isset($sitemap['action']))
	$type = $sitemap['action'];
else
	$type = 1;
	$items = getItemsByType($type);
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
		<?
		
			foreach ($items as $item)
					echo $item;
		?>
		</div>
	
	
	<div style="clear:both"></div>	
	</div>
</div>
