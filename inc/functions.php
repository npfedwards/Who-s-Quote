<?php
function newQuote(){
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
				$query="SELECT * FROM authors WHERE AuthorID<>'".$row['AuthorID']."' LIMIT 0,3";
				$result=mysql_query($query) or die(mysql_error());
				
				$rand=rand(1,4);
				
				
				$i=0;
				
				while($rows=mysql_fetch_assoc($result)){
					$i++;
					if($rand==$i){
						$query="SELECT * FROM authors WHERE AuthorID='".$row['AuthorID']."'";
						$re=mysql_query($query) or die(mysql_error());
						$ro=mysql_fetch_assoc($re);
						echo "<div class='option'><a onClick=\"CheckAuthor(".$id.",".$row['AuthorID'].")\">".stripslashes($ro['Author'])."</a></div>";
					}
					echo "<div class='option'><a onClick=\"CheckAuthor(".$id.",".$rows['AuthorID'].")\">".stripslashes($rows['Author'])."</a></div>";
				}
				if($rand==4){
					$query="SELECT * FROM authors WHERE AuthorID='".$row['AuthorID']."'";
					$re=mysql_query($query) or die(mysql_error());
					$ro=mysql_fetch_assoc($re);
					echo "<div class='option'><a onClick=\"CheckAuthor(".$id.",".$row['AuthorID'].")\">".stripslashes($ro['Author'])."</a></div>";
				}
										
			}else{
				echo "An error occured. Skip to the next quote";	
			}
		
        echo "<div id='response'></div><a onClick=\"newQuote()\">Next Quote</a>";

}

?>