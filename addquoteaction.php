<?php
	include 'opendb.php';
	
	$quote=mysql_real_escape_string(htmlentities($_POST['quote']));
	
	if($quote!=NULL){
		$query="SELECT * FROM quotes WHERE Quote='$quote' LIMIT 0,1";
		$result=mysql_query($query) or die(mysql_error());
		if(mysql_num_rows($result)==1){
			$msg="This quote already exists in our database";
			mysql_close($conn);
			include 'addquote.php';
		}else{
			$query="INSERT INTO quotes (Quote, Timestamp) VALUES ('$quote', '".time()."')";
			mysql_query($query) or die(mysql_error());
			$id=mysql_insert_id();
			mysql_close($conn);
			include 'index.php';
		}
	}else{
		mysql_close($conn);
		include 'addquote.php';
	}
	
?>