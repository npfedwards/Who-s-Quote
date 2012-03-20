<?php
	include 'opendb.php';
	$user=mysql_real_escape_string(htmlentities($_POST['user']));
	$pass=mysql_real_escape_string(htmlentities($_POST['pass'])); //Get the form outputs
	$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']); //And the IP
	
	$query="SELECT * FROM ".$tableprefix."users WHERE UserName='$user'"; //Get the details for that Username
	$result=mysql_query($query) or die(mysql_error()); 
	if(mysql_num_rows($result)==1){
		$row=mysql_fetch_assoc($result);
		$pass=sha1($pass.$row['Salt']); //Concatenate the Pass and the Salt and hash them
		if($pass==$row['Password']){ //Check the hash
			
			$session=sha1(rand()); //create a random hash
			$query="SELECT * FROM ".$tableprefix."sessions WHERE SessionKey='$session'";
			$result=mysql_query($query) or die(mysql_error());
			
			while(mysql_num_rows($result)==1){ //if we have a clash
				$session=sha1(rand()); //create a random hash
				$query="SELECT * FROM ".$tableprefix."sessions WHERE SessionKey='$session'";
				$result=mysql_query($query) or die(mysql_error());
			}
			
			//Set Cookies and Database insert
			setcookie('user', $row['UserString'], time()+3600);
			setcookie('session', $session, time()+3600);
			$query="INSERT INTO ".$tableprefix."sessions (Sessionkey, UserID, IP, Timestamp) VALUES ('$session', '".$row['UserID']."', '$ip', '".time()."')";
			mysql_query($query) or die(mysql_error());
		}else{
			$error="Wrong Password";		
		}
	}else{
		$error="Username not recognised";	
	}
	
	mysql_close($conn);
	if($error!=NULL){
		include 'plslogin.php';
	}else{
		include 'index.php';	
	}
	
?>