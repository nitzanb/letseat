<?php

/*
 CREATE TABLE pages (
	`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`content` TEXT NOT NULL ,
	`timestamp` DATE NOT NULL ,
	`title` VARCHAR( 60 ) NOT NULL ,
	`slug` VARCHAR( 60 ) NOT NULL ,
	`status` INT( 1 ) NOT NULL
) ENGINE = MYISAM 
* 
*/
class Page{
	public $id;
	public $content;
	public $title;
	public $slug;
	public $timestamp;
	public $status;
	
	
	public function addNewPage( $content, $title, $slug){
		global $db;
		$sql = "SELECT * FROM `".TBL_PAGES."` WHERE `id` = '$id'";
		$record = $db->query_first($sql);	
		if($record)	{ 	//if null we continue, if not we throw error
			$message['text'] = __('This Item code is already listed');
			return $message; 
			}		
		$data['content'] = $content;
		$data['title'] = $title;
		$data['slug'] = $slug;
		$data['status'] = 1;	
		
		$qid = $db->insert(TBL_PAGES, $data);
		$message['text'] = __('Page added successfully');
		$message['qid'] = $qid;
		
		return $message;
	}
	
	public function populatPage($id){
		global $db;		
		//check if username already exist		
		$sql = "SELECT * FROM `".TBL_PAGES."` WHERE `id` = $id";
		$record = $db->query_first($sql);	
		if ($record){
			$this->pageFromArray($record);			
		}		
	}
	
	
	public function pageFromArray($record){
			$this->id = $record['id'];
			$this->content = $record['content'];
			$this->title = $record['title'];
			$this->slug = $record['slug'];
			$this->status = $record['status'];				
	}
	
	public function deletePage($id){
		$sql = "DELETE FROM `".TBL_PAGES."` WHERE `id`=$id";
		$db->query($sql);		
	}
	
	public function updatePage($id, $content, $title, $slug, $status){
		global $db;
		$sql = "SELECT * FROM `".TBL_PAGES."` WHERE `id` = '$id'";
		$record = $db->query_first($sql);	
		if($record)	{ 
			$this->id = $id;
			$this->content = $content;
			$this->title = $title;
			$this->slug = $slug;
			$this->status = $status;			
		}		
		
		$this->updatePageInDb();
		
		return $message;
	}
	
	public function updatePageInDb(){
		global $db;
		$id = $this->id;
		$data['id'] = $this->id;
		$data['content'] = $this->content;
		$data['title'] = $this->title;
		$data['slug'] = $this->slug;
		$data['status'] = 1;			
		$qid = $db->update(TBL_PAGES, $data, "`id` = $id");
		$message['text'] = __('Page added successfully');
		$message['qid'] = $qid;
		
		return $message;
		
	}

	
	public function getPageBySlug($slug){
		global $db;		
		//check if username already exist		
		$sql = "SELECT * FROM `".TBL_PAGES."` WHERE `slug` ='$slug'";
		$record = $db->query_first($sql);	
		if ($record){
			$this->pageFromArray($record);	
		}
		else {
			$this->content = __('Sorry, Page not Found');
			$this->title = '404';
			
		}		
	}		
	
	
}	
