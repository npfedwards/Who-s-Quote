<?php
	include 'opendb.php';
	
	$author=mysql_real_escape_string(htmlentities($_GET['a'], ENT_QUOTES, "ISO8859-15"));
	$q=mysql_real_escape_string(htmlentities($_GET['q']));
	
	$query="SELECT * FROM authors WHERE QuoteID='$q' AND Author='$author' LIMIT 0,1";
	$result=mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($result)==1){
		$row=mysql_fetch_assoc($result);
		$query="INSERT INTO concurrance (AuthorID, Timestamp) VALUES ('".$row[AuthorID]."', '".time()."')";
		mysql_query($query) or die(mysql_error());
		echo $row[AuthorID];	
	}else{
		$query="INSERT INTO authors (QuoteID, Author, Timestamp) VALUES ('$q', '$author', '".time()."')";
		mysql_query($query) or die(mysql_error());
		echo stripslashes($author);
	}
	mysql_close($conn);
?>