<?php
	$connection = mysql_connect("localhost", "root", "") or die(mysql_error());
	
	// uncomment to use the line below to connect to the uni server
	//$connection = mysql_connect("localhost", "c7095656", "c7095656") or die(mysql_error());
	
	mysql_select_db("c7095656", $connection) or die(mysql_error());
?>

