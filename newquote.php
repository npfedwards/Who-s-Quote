<?php
	include 'opendb.php';
	$query="SELECT * FROM quotes";
	$result=mysql_query($query) or die(mysql_error());
	$rows=mysql_num_rows($result);
	$id=rand(1, $rows);
	
	$query="SELECT * FROM quotes WHERE QuoteID='$id'";
	$result=mysql_query($query) or die(mysql_error());
	if(mysql_num_rows!=NULL){
		$row=mysql_fetch_assoc($result);
		$out= "<blockquote class='quote'>
			".stripslashes($row['Quote'])."
		</blockquote>";
		$query="SELECT * FROM authors WHERE QuoteID='$id'";
		$result=mysql_query($query) or die(mysql_error());
		while($row=mysql_fetch_assoc($result)){
			$query="SELECT * FROM concurrance WHERE AuthorID='".$row['AuthorID']."'";
			$r=mysql_query($query) or die(mysql_error());
			$concurrances=mysql_num_rows($r);
			$out=$out. "<div class='quoteauthor'>
				".stripslashes($row['Author'])."
				<span class='concurrance' id='con".$row['AuthorID']."'>";
					if($concurrances!=0){
						$out=$out. $concurrances;
					}
				$out=$out. "</span><a class='iconcur'><img src='img/accept.png' alt='tick'></a>
				</div>";
		}
		$out=$out. "<div class='quoteauthor'>
				  <input type='text' name='author' id='author' value='Who said/wrote this?' class='hintTextbox' onkeydown=\"if (event.keyCode == 13) AddAuthor('".$id."', this.value)\">
				  <span id='response'></span>
			</div>
			<a onClick=\"newQuote()\">Next Quote</a>";
				
	}else{
		$out=$out."An error occured. Skip to the next quote";	
	}
	echo $out;
	mysql_close($conn);
?>