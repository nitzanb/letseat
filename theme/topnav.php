<?php
/*
 *      topnav.php
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

?>

<div id="topnav">
	<ul id="navbar">
		<li class="<? echo ($sitemap['location']=='home') ? "active" : ""; ?>"><a href="<? echo HOME ;?>" title="<?_e('Main Page');?>"><?_e('Main Page');?></a></li>
		<li class="<? echo ($sitemap['location']=='account') ? "active" : ""; ?>"><a href="<? echo HOME ;?>account" title="<?_e('My account');?>"><?_e('My account');?></a></li>
		<li class="<? echo ($sitemap['location']=='menu') ? "active" : ""; ?>"><a href="<? echo HOME ;?>menu" title="<?_e('Menu');?>"><?_e('Menu');?></a></li>
		<?php
			if($_SESSION['user']->ulevel == ADMIN_LEVEL){?>
				
				<li class="<? echo ($sitemap['location']=='additem') ? "active" : ""; ?>"><a href="<? echo HOME ;?>additem" title="<?_e('Add new Item');?>"><?_e('Add new Item');?></a></li>
				<li class="<? echo ($sitemap['location']=='addnewpage') ? "active" : ""; ?>"><a href="<? echo HOME ;?>addnewpage" title="<?_e('Add New Page');?>"><?_e('Add New Page');?></a></li>
			<?}
		
		?>
		<li class="left <? echo ($sitemap['location']=='mycart') ? "active" : ""; ?>"><a href="<? echo HOME ;?>mycart" title="<?_e('My Cart');?>"><?=howManyItemsDoIHave();?></a></li>
	</ul>
	
	

</div>
