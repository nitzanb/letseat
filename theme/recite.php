<?php
/*
 *      tests.php
 **/      

if ($_POST['form_submit']== "11234"):

$address = $_POST['address'];
$cardType =  $_POST['cardType'];
$cardnumber = $_POST['cardnumber'];
$duedate = $_POST['duedate'];
$ownerId = $_POST['ownerId'];

$recite =  processOrder($address, $cardType, $cardnumber, $duedate, $ownerId );


endif;



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
			<h2>Adding a street</h2>
			<div id="content">
				<?php
			
				echo $recite;

				?>
			
			
		</div>
		
	
	<div style="clear:both"></div>
	</div>
</div>
