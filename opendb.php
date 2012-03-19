<?php
	//Set the host address of your mySQL database (usually 'localhost'):
	$dbhost = 'localhost';
	//Set the user of your databse (usually 'root'):
	$dbuser = 'root';
	//Set the password for your databse:
	$dbpass = '';
	//Set the name of your database:
	$dbname = 'wq';
	//Set a table prefix for Who's Quotes - this allows multiple installations to be in the same database.  Useful if you only have access to one database (on shared hosting):
	$tableprefix = '';
	/*	
		=================
		End Customization Options
		=================
	*/
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
	$dbc = mysql_select_db($dbname) or die("Failed to connect");
?>