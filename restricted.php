<?php
	include 'opendb.php';
	$user=mysql_real_escape_string($_COOKIE['user']);
	$session=mysql_real_escape_string($_COOKIE['session']);
	$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
	
	$query="SELECT * FROM ".$tableprefix."sessions LEFT JOIN ".$tableprefix."users ON ".$tableprefix."sessions.UserID=".$tableprefix."users.UserID WHERE Sessionkey='$session' AND UserString='$user' AND Admin='1' AND ".$tableprefix."sessions.IP='$ip'";
	$result=mysql_query($query) or die(mysql_error());
	if(mysql_num_rows($result)==1){
		setcookie('user',$user, time()+3600);
		setcookie('session',$session, time()+3600);
	}else{
		include "plslogin.php";
   		mysql_close($conn);
    	exit;	
	}
?>