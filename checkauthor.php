<?php
	include 'opendb.php'; //Open the Database
	
	//GET author and quoteID
	$author=mysql_real_escape_string(htmlentities($_GET['a']));
	$q=mysql_real_escape_string(htmlentities($_GET['q']));
	
	//Does the Author name match the DB?
	$query="SELECT * FROM quotes LEFT JOIN authors ON quotes.AuthorID=authors.AuthorID WHERE QuoteID='$q' AND authors.AuthorID='$author' LIMIT 0,1";
	$result=mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($result)==1){
		/*
			To Add: Database insert for correctness.
		*/
		//Send back some text...
		echo "Correct!";
	}else{
		/*
			To Add: Database insert for wrongness?
		*/
		//Send back some text...
		echo "Oh no... you got it wrong!";
	}
	//Close the DB
	mysql_close($conn);
?>