<?php
	include 'opendb.php'; //Open the Database
	
	//GET author and quoteID
	$author=mysql_real_escape_string(htmlentities($_GET['a']));
	$q=mysql_real_escape_string(htmlentities($_GET['q']));
	//Get from cookies the randomly generated userstring
	$user=mysql_real_escape_string($_COOKIE['user']);
	//Get IP
	$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
	
	//Get user from table
	$query="SELECT * FROM ".$dbprefix."users WHERE UserString='$user' AND IP='$ip'";
	$result=mysql_query($query) or die(mysql_error());
	
	if(mysql_num_rows($result)==1){ //if there is a user
	
		$row=mysql_fetch_assoc($result);
		$userid=$row['UserID']; //then that's our userid
		
	}else{ //if there isn't a user (or if the IP address has changed)
	
		$user=sha1(rand()); //create a random hash
		$query="SELECT * FROM ".$dbprefix."users WHERE UserString='$user'";
		$result=mysql_query($query) or die(mysql_error());
		
		while(mysql_num_rows($result)==1){ //if we have a clash
			$user=sha1(rand()); //create a random hash
			$query="SELECT * FROM ".$dbprefix."users WHERE UserString='$user'";
			$result=mysql_query($query) or die(mysql_error());
		}
		setcookie('user', $user, time()+86400*365);
		//Insert new user data
		$query="INSERT INTO ".$dbprefix."users (UserString, IP) VALUES ('$user','$ip')";
		mysql_query($query) or die(mysql_error());
		$userid=mysql_insert_id();
	}
	
	//Does the Author name match the DB?
	$query="SELECT * FROM ".$dbprefix."quotes LEFT JOIN ".$dbprefix."authors ON ".$dbprefix."quotes.AuthorID=authors.AuthorID WHERE QuoteID='$q' AND ".$dbprefix."authors.AuthorID='$author' LIMIT 0,1";
	$result=mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($result)==1){
		//Database insert for correctness
		$query="INSERT INTO ".$dbprefix."answers (UserID, QuoteID, Timestamp, Correct) VALUES ('$userid', '$q', '".time()."', '1')";
		mysql_query($query) or die(mysql_error());
		
		$query="SELECT * FROM ".$dbprefix."answers WHERE UserID='$userid'";
		$result=mysql_query($query) or die(mysql_error());
		$quotes=mysql_num_rows($result);
		$query="SELECT * FROM ".$dbprefix."answers WHERE UserID='$userid' AND Correct='1'";
		$result=mysql_query($query) or die(mysql_error());
		$correct=mysql_num_rows($result);
		//Send back some text...
		echo "Correct! So far you have answered ".$correct."/".$quotes." correctly";
	}else{
		//Database insert for wrongness
		$query="INSERT INTO ".$dbprefix."answers (UserID, QuoteID, Timestamp, Correct) VALUES ('$userid', '$q', '".time()."', '0')";
		mysql_query($query) or die(mysql_error());
		
		$query="SELECT * FROM ".$dbprefix."answers WHERE UserID='$userid'";
		$result=mysql_query($query) or die(mysql_error());
		$quotes=mysql_num_rows($result);
		$query="SELECT * FROM ".$dbprefix."answers WHERE UserID='$userid' AND Correct='1'";
		$result=mysql_query($query) or die(mysql_error());
		$correct=mysql_num_rows($result);
		//Send back some text...
		echo "Oh no... you got it wrong! So far you have answered ".$correct."/".$quotes." correctly";
	}
	//Close the DB
	mysql_close($conn);
?>