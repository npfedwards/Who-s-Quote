<?php
	include 'header.php';
	include 'opendb.php';
?>
	<div id='quoteholder' class='prepend-4 span-16'>
    	<?php
			if($id==NULL){
				$query="SELECT * FROM quotes";
				$result=mysql_query($query) or die(mysql_error());
				$rows=mysql_num_rows($result);
				$num=rand(0, $rows-1);
				$query="SELECT * FROM quotes LIMIT ".$num.",1";
			}else{
				$query="SELECT * FROM quotes WHERE QuoteID='$id'";
			}
			$result=mysql_query($query) or die(mysql_error());
			if(mysql_num_rows!=NULL){
				$row=mysql_fetch_assoc($result);
				$id=$row['QuoteID'];
				echo "<blockquote class='quote'>".stripslashes($row['Quote'])."
				</blockquote>";
				echo "<div class='quoteauthor'>
						  <input type='text' name='author' id='author' value='Who said/wrote this?' class='span-5 hintTextbox' onkeydown=\"if (event.keyCode == 13) AddAuthor('".$id."', this.value)\" onFocus=\"textboxOnFocus(this)\">
						  <span id='response'></span>
					</div>";
						
			}else{
				echo "An error occured. Skip to the next quote";	
			}
		?>
        <a onClick="newQuote()">Next Quote</a>
    </div>
<?php
	mysql_close($conn);
	include 'footer.php';
?>