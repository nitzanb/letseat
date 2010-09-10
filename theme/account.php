<?php
/*
 *      account.php
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

if(isset($_POST['sublogin'])){
	$user = new User();
	$frmErr = $user->authUser($_POST['user'], $_POST['pass']);
	
	if ($frmErr['lvl'] == 1){
		$user->populateUser($frmErr['uid']);
		$_SESSION['user'] = $user;
	}
}


?>

<div id="wrap">
	<div id="widecb" >
	<?
	/*
	 * 	We check if the user is logged in
	 * 
	 */ 
	if(isset($_SESSION['user'])){?>
	
		
				<div id="additemnav">
			<ul>
				<li><a href="" title=""><?_e('Orders history');?></a></li>
				<li><a href="" title=""><?_e('Add Address');?></a></li>
				<li><a href="" title=""><?_e('Edit details');?></a></li>
			
			</ul>
		</div>
		<div id="formblock">
		<div id="welcomenote">
			<? echo __('Hello ').$_SESSION['user']->realname ; ?>
			<a href="<? echo $_SERVER['REQUEST_URI'];?>/logout">[<?_e('Logout');?>]</a>
		</div>
		</div>
<?		
	}
	else { ?>
	<div id="loginformblock">
		<div id="formErrors"><?=$frmErr['msg'];?></div>
		<form action="" method="POST">
			<table align="left" border="0" cellspacing="0" cellpadding="3">
				<tr><td><?_e('Username:');?></td><td><input type="text" name="user" maxlength="30" value=""></td><td></td></tr>
				<tr><td><?_e('Password:');?></td><td><input type="password" name="pass" maxlength="30" value=""></td><td></td></tr>
				<tr><td colspan="2" align="left"><input type="checkbox" name="remember" >
				<font size="2"><?_e('Remember me next time &nbsp;&nbsp;&nbsp;&nbsp;');?>
				<input type="hidden" name="sublogin" value="1">
				<input type="submit" value="Login"></td></tr>
				<tr><td colspan="2" align="left"><br><font size="2">[<a href="forgotpass"><?_e('Forgot Password?');?></a>]</font></td><td align="right"></td></tr>
				<tr><td colspan="2" align="left"><br><a href="register"><?_e('Sign-Up!');?></a></td></tr>
			</table>
		</form>
		
	</div>
		
	<?php } ?>
	
		
	
	<div style="clear:both"></div>
	</div>
</div>
