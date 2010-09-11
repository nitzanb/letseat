<?php
/*
 *      profile.php
 *      
 *      Copyright 2010 Nitzan Brumer <nitzan@taz>
 */
	get_top_nav(); //Call the navigation
?>


<div id="wrap">
	<div id="widecb">
		<div id="additemnav">
			<ul>
			
				<li><a href="" title=""><?_e('Orders history');?></a></li>
				<li><a href="<?=HOME;?>addadress" title=""><?_e('Add Address');?></a></li>
				<li class="selected"><a href="<?=HOME;?>profile" title=""><?_e('My Profile');?></a></li>
				<li><a href="<?=HOME;?>mycart" title=""><?_e('My Cart');?></a></li>
			
			
			</ul>
		</div>
		<div id="formblock">
	
			<h2><?_e('My info');?></h2>
			<div id="content">
			<?php if(isUser()): ?>
				<table>
					<tr>
						<td><?_e('Name:');?></td>
						<td><?php echo $_SESSION['user']->realname;?></td>
					</tr>
					<tr>
						<td><?_e('Mail:');?></td>
						<td><?php echo $_SESSION['user']->umail;?></td>
					</tr>
				</table>
				<div id="addresses">
					<h3><?php _e('Your Addresses');?></h3><?php
					
					$addresses =  getAddressesByUser($_SESSION['user']->uid);
						foreach($addresses as $address)
							printAddress($address);
					
					?>
				
				</div>
			<?php else: _e('You need to login in order to see your info');
			
		 endif;?>
			</div>
		</div>
		
	
	<div style="clear:both"></div>
	</div>
</div>
