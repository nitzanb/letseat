<?php
/*
 *      register.php
 *      
 *      Copyright 2010 Nitzan Brumer <nitzan@taz>
 *      
 */
$user = new User();
$err = '';
if($_POST('form_submit')=='11234'):
	$unmae = $_POST('uname');
	$fname = $_POST('fname');
	$pass = $_POST('pass');
	$pass2 = $_POST('pass2');
	$phone = $_POST('phone');
	$mail = $_POST('email');
	
	if($pass!=$pass2)
		$err .=  __('Passwords dont match')."<br>";
	
	

else:



endif;



?>

<div id="wrap">
	<div id="widecb">
		<div id="additemnav">
			<ul>
				<li><a href="" title="">Place Holder</a></li>
			
			
			</ul>
		</div>
		<div id="formblock">
			<h2><?_e('Registration Form');?></h2>
			<div id="content">
				<?php
					if(isUser()):?>
						<p><?_e('You are already loged in');?> <a href="<?=HOME.$_SERVER['REQUEST_URI'];?>/logout" title="logout"><?_e('Log Out');?></a></p>
						
					<?php else: ?>
							<form id="register" method="POST" >
								<p>
									<label for="uname"><?_e('User Name');?></label><br/>
									<input type="text" id="uname" name="uname" value="<?=$page->title;?>">
								</p>
								<p>
									<label for="pass"><?_e('Password');?></label><br/>
									<input type="password" id="pass" name="pass" value="<?=$page->title;?>">
								</p>
								<p>
									<label for="pass2"><?_e('Password <small>again</small>');?></label><br/>
									<input type="password" id="pass2" name="pass2" value="<?=$page->title;?>">
								</p>
								<p>
									<label for="fname"><?_e('Full Name');?></label><br/>
									<input type="text" id="fname" name="fname" value="<?=$page->title;?>">
								</p>
								<p>
									<label for="phone"><?_e('Phone Number');?></label><br/>
									<input type="text" id="phone" name="phone" value="<?=$page->title;?>">
								</p>
								<p>
									<label for="email"><?_e('Email');?></label><br/>
									<input type="text" id="email" name="email" value="<?=$page->title;?>">
								</p>
								<p>
									<input type="hidden" name="form_submit" value="11234">									
									<input id="updateForm" class="button_text" type="submit" name="submit" value="<?_e('Click ME');?>" />
								
								</p>
							</form>
				
					<?php endif;?>
				
				
				
			
			</div>
		</div>
		
	
	<div style="clear:both"></div>
	</div>
</div>
