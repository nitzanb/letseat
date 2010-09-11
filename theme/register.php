<?php
/*
 *      register.php
 *      
 *      Copyright 2010 Nitzan Brumer <nitzan@taz>
 *      
 */
$user = new User();
$err = '';
	get_top_nav(); //Call the navigation
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
				if($_POST['form_submit']=='11234'):
					$fatal = FALSE;	
					$unmae = $_POST['uname'];
					$fname = $_POST['fname'];
					$pass = $_POST['pass'];
					$pass2 = $_POST['pass2'];
					$phone = $_POST['phone'];
					$mail = $_POST['email'];
					
					if($pass!=$pass2 ){
						$err .=  __('Something went wrong with your Passwords, Please recheck')."<br>";
						$fatal = TRUE;	
					}
					
					if(empty($phone) || empty($pass) || empty($pass2) || empty($mail) || empty($fname) || empty($unmae)){
						$err.= __('A field was left blank')."<br>";
						$fatal = TRUE;
					}				
					
					if(!checkEmail($mail)){
						$err.= __('Problem With email Address')."<br>";
						$fatal = TRUE;
						
					}
					
					if(!$fatal){
						$result = $user->addNewUser($unmae, $pass, $mail, $fname, $phone);
						$err .= $result['text'];
						$user->populateUser($result['qid']);
						}
					
					
					echo '<div id="errors">'.$err . "</div>	";	

				elseif(isUser()):
					echo '<div id="errors">';
					_e('You are already loged in');
					?>
					<a href="<?=HOME.$_SERVER['REQUEST_URI'];?>/logout" title="logout"><?_e('Log Out');?></a></div>	
					<?
				else:
				?>
							
			
					
			
					<form id="register" method="POST" name="registration_form">
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
					
					<script language="JavaScript">
					function DoCustomValidation()
						{
						  var frm = document.forms["register"];
						  if(frm.pass.value != frm.pass2.value)
						  {
							sfm_show_error_msg("<?_e('The Password and verified password do not match!');?>",frm.pwd1);
							return false;
						  }
						  else
						  {
							return true;
						  }
						}

 				  var frmvalidator  = new Validator("registration_form");
 				  frmvalidator.EnableMsgsTogether();
 				  	/* Phone number must be omly digits */
 				  	
 				  	frmvalidator.addValidation("phone","numeric", "<?_e('Only digits as phone number please');?>"); 
 				   	frmvalidator.addValidation("phone","req", "<?_e('You must enter your phone number');?>"); 
 				   	frmvalidator.addValidation("phone","maxlen=11","<?_e('Phone number can not be longer than 10 digits');?>"); 
 				   	frmvalidator.addValidation("phone","minlen=8","<?_e('Phone number can not be Shorter than 8 digits');?>"); 
 					
 					frmvalidator.addValidation("email","maxlen=60");
					frmvalidator.addValidation("email","req",  "<?_e('A valid Email address is required');?>");
					frmvalidator.addValidation("email","email");
					
					frmvalidator.addValidation("pass2","req",  "<?_e('Please retype the password');?>");
					frmvalidator.addValidation("pass","req",  "<?_e('Please type a password');?>");
					frmvalidator.setAddnlValidationFunction("DoCustomValidation"); 
					
					frmvalidator.addValidation("uname","req",  "<?_e('You must select a user name');?>");
					frmvalidator.addValidation("uname","alphanumeric",  "<?_e('User name must contains alphanumeric values please');?>");
					
					frmvalidator.addValidation("fname","alpha_s",  "<?_e('full name must contains alphanumeric values please');?>");  
 				   
 				   	
 			</script>
		
			<?php endif;?>
				
				
				
			
			</div>
		</div>
		
	
	<div style="clear:both"></div>
	</div>
</div>
