<?php

/*
 CREATE TABLE pages (
	`id` BIGINT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
	`content` TEXT NOT NULL ,
	`timestamp` DATE NOT NULL ,
	`title` VARCHAR( 60 ) NOT NULL ,
	`status` INT( 1 ) NOT NULL
) ENGINE = MYISAM 
* 
*/
class Page{
	public $id;
	public $content;
	public $title;
	public $timestamp;
	public $status;
	
	public function __construct($id, $content, $title, $timestamp, $status){
			$this->id = $id;
			$this->content = $content;
			$this->title=$title;
			$this->timestamp = $timestamp;
			$this->status = $status;
		
		}
		
	public static function newpage($content, $title){
			$page = new Page("0", $content, $title, date( 'Y-m-d' ), "1"  );
			return $page;
		}
	
	public function storepage($page){
			$content = $page->content ;
			$title = $page->title;
			$sql = "insert into `pages` (`content`,`title`) values ('$content','$title')";
			echo $sql;
			global $link;
			mysql_query($sql);
			$result = mysql_insert_id();
			return $result;			
		}
		
	public function updatepage($page){
			$content = $page->content ;
			$title = $page->title;
			$id = $page->id;
			global $link;
			$sql = "update pages set content = '$content' and title = '$title' where id = $id";	
			mysql_query($sql);	
	}
		
	public function getPageById($id){
			$sql = "select * from pages where id = $id";			
			$result =runquery($sql);
			while ($row = mysql_fetch_array($result)){
				$page = new Page($row['id'], $row['content'], $row['title'], $row['timestamp'], $row['status']);
			}
			return $page;					
	}
	
	
}

?>
