<?php
	//Set the host address of your mySQL database (usually 'localhost'):
	$dbhost = 'localhost';
	//Set the user of your database:
	$dbuser = 'root';
	//Set the password for your databse:
	$dbpass = '';
	//Set the name of your database:
	$dbname = 'wq';
	//Set a table prefix for Who's Quotes - this allows multiple installations to be in the same database.  Useful if you only have access to one database (on shared hosting):
	//It's best to use an underscore afterwards (e.g. 'wq_')
	$tableprefix = '';
	/*	
		=================
		End Customization Options
		=================
	*/
	//Forcing underscore afterwards:
	if ($tableprefix!='') {
		if (substr($tableprefix, -1)!='_') {
			$tableprefix=$tableprefix.'_';
		}	
	}
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die(mysql_error());
	$dbc = mysql_select_db($dbname) or die("Failed to connect");
?>