<?php
/*
 *      addnewpage.php
 *      
 *      Copyright 2010 Nitzan Brumer <nitzan@taz>
 */



$page = new Page();

if(isset($_POST['subdelbanned'])){
	
	$title =$_POST['title'];
	$content = $_POST['editor'];
	$spacialChars = array(" ", "/", "\\","?",".",",","#");
	$slug = str_replace($spacialChars, "-", $_POST['slug']);
	if (!empty($_POST['pageId']) )
		$result = $page->updatePage($_POST['pageId'],  $content, $title, $slug, $status);
	else	
		$result = $page->addNewPage( $content, $title, $slug);
	
	if(isset($result['qid']))
		$page->populatPage($result['qid']);
	
	
	
}
if(isset($_GET['pid'])){
	$pid = $_GET['pid'];	
	$page = Page::getPageById($pid);
	$oldtitel = $page->title;
	$oldcontent = $page->content;
}


?>

<div id="wrap">
	<div id="widecb">
		<div id="additemnav">
			<ul>
				<li><a href="" title=""><?_e('About the network');?></a></li>
				<li><a href="" title=""><?_e('Deals of the Mounth');?></a></li>
				<li><a href="" title=""><?_e('Deals of the Mounth');?></a></li>
			
			</ul>
		</div>
		<div id="formblock">
			<h2><?=$page->title;?></h2>
			<div id="content">
				<form id="writeaPage" method="POST" >
						<p>
							<label for="title"><?_e('Title');?></label><br/>
							<input type="text" id="title" name="title" value="<?=$page->title;?>">
						</p>
						<p>
							<label for="slug"><?_e('Slug <small>Thats for the nice links</small>');?></label><br/>
							<input type="text" id="slug" name="slug" value="<?=$page->slug;?>">
						</p>
						<p>
							<label for="editor"><?_e('Content');?></label><br/>
							<textarea id="editor" name="editor" rows="20" cols="75"> <?=$page->content;?></textarea>
						</p>
						<p>
							<input type="hidden" name="subdelbanned" value="1212555"/>
							<input type="hidden" name="pageId" value="<?=$page->id;?>"/>
							<input id="updateForm" class="button_text" type="submit" name="submit" value="Click ME" />
						</p>
					</form>
					
				<script type="text/javascript">

				(function() {
					//Setup some private variables
					var Dom = YAHOO.util.Dom,
						Event = YAHOO.util.Event;

						//The SimpleEditor config
						var myConfig = {
							height: '300px',
							width: '600px',
							dompath: true,
							css: 'body{text-align:right; direction:rtl;}',
							focusAtStart: true,
							handleSubmit: true
							
						};

					//Now let's load the SimpleEditor..
					var myEditor = new YAHOO.widget.SimpleEditor('editor', myConfig);
					myEditor.render();
					//Inside an event handler after the Editor is rendered
					YAHOO.util.Event.on('saveForm', 'click', function() {
					//Put the HTML back into the text area
					myEditor.saveHTML();
				 
					//The var html will now have the contents of the textarea
					var html = myEditor.get('editor').value;
				});
				 
				})();

				</script>
			
			</div>
		</div>
		
	
	<div style="clear:both"></div>
	</div>
</div>
