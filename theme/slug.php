<?php
/*
 *      slug.php
 *      
 *      Copyright 2010 nitzan <nitzan@nitzan-laptop>
 *      
 */

global $sitemap;
if(isset($sitemap['location']))
	$slug = $sitemap['location'];
else
	die(_e('You are not suppose to be here'));
	
$page = new Page();
$page->getPageBySlug($slug);

	get_top_nav(); //Call the navigation
?>

<div id="wrap">
	<div id="widecb">
		<div id="additemnav">
			<ul>
			<?php 
				$pages = getAllPages();
				foreach($pages as $page){?>
					<li><a href="<?=HOME.$page->slug;?>" title="<?=$page->title;?>"><?=$page->title;?></a></li>
					
				<?php } ?>
			
			
			</ul>
		</div>
		<div id="formblock">
			<h2><?=$page->title;?></h2>
			<div id="content">
				<?=$page->content;?>
			
			</div>
		</div>
		
	
	<div style="clear:both"></div>
	</div>
</div>
