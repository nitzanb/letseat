<?php
/*
 *      User.php
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
define('SECRET','askldj08asd98asd2013h82650f58j23498'); //This is used to Hash the Passwords

class User{
	
	var $uname;
	var $uid;
	var $umail;
	var $ulevel;
	var $upass;
	var $realname;
	var $phone;
	
	public function populateUser($uid){
		global $db;		
		//check if username already exist		
		$sql = "SELECT * FROM `".TBL_USERS."` WHERE `uid` = '$uid'";
		$record = $db->query_first($sql);	
		if ($record){
			$this->uname = $record['uname'];
			$this->uid = $record['uid'];
			$this->umail = $record['email'];
			$this->ulevel = $record['ulevel'];
			$this->upass = $record['password'];
			$this->realname = $record['realname'];		
			$this->phone = $record['phone'];	
		}
	
		
		
	}
	
	public function getName(){
		return $this->realname;
		
	}
	
	/*
	 * 	addNewUser($username, $password, $email)
	 * 
	 * 	Gets 3 parmeters - username, password and email address
	 * 	checks if the username or the email is already registered
	 * 	if not - creates new user and add to db
	 * 
	 */ 
	public function addNewUser($username, $password, $email, $realname,  $phone){
		global $db;		
		//check if username already exist		
		$sql = "SELECT uname FROM `".TBL_USERS."` WHERE `uname` = '$username'";
		$record = $db->query_first($sql);	
		if($record)	{ 	//if null we continue, if not we throw error
			$message['text'] = __('This user name Is already in use');
			return $message; 
			}		
		//check if email already exist
		$sql = "SELECT email FROM `".TBL_USERS."` WHERE `email` = '$email'";
		$record = $db->query_first($sql);		
		if($record) {	//if null we continue, if not we throw error
			$message['text'] = __('This email Is already in use');
			return $message; 
			}		
		$ulevel = USER_LEVEL;
		/*
		 * So, No such user exist and the mail is not in use, lets create the user
		 */ 		
		
		$data['uname'] = $username;
		$data ['password'] =  $this->generate_encrypted_password($password); //I hash the password
		$data['ulevel'] = $ulevel;
		$data['email']	= 	$email;
		$data['realname']	= 	$realname;
		$data['phone'] = $phone;
	
		$qid = $db->insert(TBL_USERS, $data); //if query succedded I get the new user Id
		
      	$message['text'] = __('User Created successfully');
      	$message['uid'] = $qid;
		return $message;       		
   }
   
   /*
    * 	authUser($uname, $pass)
    * 	This function checks if the user is in the DB 
    * 	and the password is correct.
    * 	
    * 	error level: 	1 - Success
    * 					2 - Wrong password
    * 					3 - No user
    */ 
   	public function authUser($uname, $pass){
		global $db;	
		$pass = $this->generate_encrypted_password($pass);
		
		$sql = "SELECT uid, uname, password FROM `".TBL_USERS."` WHERE `uname` = '$uname'";
		$record = $db->query_first($sql);
		if($record){
			if($pass == $record['password']){
				$err['msg'] = __('Success');
				$err['lvl'] = 1;
				$err['uid'] = $record['uid'];
			}
			else{
				$err['msg'] = __('Wrong Password');
				$err['lvl'] = 2;				
			}
		}
		else{
			$err['msg'] = __('No Such user');
				$err['lvl'] = 3;
			
		}
		return $err;		
	}
   
	/*
	 * 	I hash the password in the database so if someOne hack it he 
	 * 	will not have the original passwords.
	 * 
	 * 	IMPORTENT: 	after the site is up and running you CANNOT change the SECRET
	 * 				changing it will cause all passwords to stop working
	 */ 
	public function generate_encrypted_password($str) { 		
			$new_pword = md5(SECRET.$str); 
			return substr($new_pword, strlen($str), 40); 
	} 



}

?>
