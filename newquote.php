<?php
	include 'opendb.php';
	$query="SELECT * FROM quotes";
	$result=mysql_query($query) or die(mysql_error());
	$rows=mysql_num_rows($result);
	$num=rand(0, $rows-1);
	$query="SELECT * FROM quotes LIMIT ".$num.",1";
	$result=mysql_query($query) or die(mysql_error());
	if(mysql_num_rows!=NULL){
		$row=mysql_fetch_assoc($result);
		$id=$row['QuoteID'];
		echo "<blockquote class='quote'>".stripslashes($row['Quote'])."
		</blockquote>";
		echo "<div class='quoteauthor'>
				  <input type='text' name='author' id='author' value='Who said/wrote this?' class='span-5 hintTextbox' onkeydown=\"if (event.keyCode == 13) AddAuthor('".$id."', this.value)\">
				  <span id='response'></span>
			</div><a onClick='newQuote()'>Next Quote</a>";
				
	}else{
		echo "An error occured. Skip to the next quote";	
	}
	echo $out;
	mysql_close($conn);
?>