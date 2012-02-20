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
				$id=rand(1, $rows);
			}
			
			$query="SELECT * FROM quotes WHERE QuoteID='$id'";
			$result=mysql_query($query) or die(mysql_error());
			if(mysql_num_rows!=NULL){
				$row=mysql_fetch_assoc($result);
				echo "<blockquote class='quote'>".stripslashes($row['Quote'])."
				</blockquote>";
				$query="SELECT * FROM authors WHERE QuoteID='$id'";
				$result=mysql_query($query) or die(mysql_error());
				while($row=mysql_fetch_assoc($result)){
					$query="SELECT * FROM concurrance WHERE AuthorID='".$row['AuthorID']."'";
					$r=mysql_query($query) or die(mysql_error());
					$concurrances=mysql_num_rows($r);
					echo "<div class='quoteauthor'>
						".stripslashes($row['Author'])."
						<span class='concur span-4 last'><a class='iconcur'><img src='img/accept.png' alt='tick'></a>
							<span class='concurrance' id='con".$row['AuthorID']."'>".$concurrances."</span> people agree</span>
						<div class='clear'></div>
					</div>";
				}
				echo "<div class='quoteauthor'>
						  <input type='text' name='author' id='author' value='Who said/wrote this?' class='span-5 hintTextbox' onkeydown=\"if (event.keyCode == 13) AddAuthor('".$id."', this.value)\">
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