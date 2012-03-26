<?php
	include 'restricted.php';
	include 'opendb.php';
	
	$quote=mysql_real_escape_string(htmlentities($_POST['quote']));
	$author=mysql_real_escape_string(htmlentities($_POST['author']));
	
	if($quote==NULL || $author==NULL){
		$message='We require both a quote and an author';	
	}else{
		$query="INSERT INTO authors (Author, Timestamp) VALUES ('$author', '".time()."')";
		mysql_query($query) or die(mysql_error());
		$authorid=mysql_insert_id();
		$query="INSERT INTO quotes (Quote, Timestamp, AuthorID) VALUES ('$quote', '".time()."', '$authorid')";
		mysql_query($query) or die(mysql_error());
		$message='Success';
	}
	
	mysql_close($conn);
	include 'admin.php';
?>