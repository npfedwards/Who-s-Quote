<?php
function newQuote(){
			
			if(isset($_GET['id'])){ //Checks to see if an ID has been passed by the URL
				$id=mysql_real_escape_string(htmlentities($_GET['id'])); //If an id argument is passed in the URL then we'll show that Quote
			}else{
				$id=NULL;
			}
			if($id==NULL){ //otherwise find a random one
				$query="SELECT * FROM quotes";
				$result=mysql_query($query) or die(mysql_error());
				$rows=mysql_num_rows($result); //Get the number of rows in the table
				$num=rand(0, $rows-1); //Find a random row
				$query="SELECT * FROM quotes LIMIT ".$num.",1"; //Select that row from the table
			}else{
				$query="SELECT * FROM quotes WHERE QuoteID='$id'";
			}
			$result=mysql_query($query) or die(mysql_error());
			if(mysql_num_rows($result)!=NULL){ //Check we have a quote
				$row=mysql_fetch_assoc($result);
				$id=$row['QuoteID'];
				echo "<blockquote class='quote'>".stripslashes($row['Quote'])."
				</blockquote><div id='author'>";
				$query="SELECT AuthorID FROM authors WHERE AuthorID<>'".$row['AuthorID']."'";
				$result=mysql_query($query) or die(mysql_error());
				$numrows=mysql_num_rows($result)-1; //Number of rows to chose from -1 to account for row 0.
				$rownum=array(rand(0,$numrows),rand(0,$numrows),rand(0,$numrows)); //Find three random quotes
				
				while($rownum[0]==$rownum[1]){ //Make sure 0 != 1
					$rownum[1]=rand(0,$numrows); 
				}
				while($rownum[0]==$rownum[2] || $rownum[1]==$rownum[2]){ // Make sure 0!=2 
					$rownum[2]=rand(0,$numrows);
				}
				
				$rand=rand(0,3); //Position of correct answer
				$i=0;
				$n=0;
				
				while($i<3){
					if($rand==$i){//depending on position display correct answer
						$query="SELECT * FROM authors WHERE AuthorID='".$row['AuthorID']."'";
						$re=mysql_query($query) or die(mysql_error());
						$ro=mysql_fetch_assoc($re);
						echo "<div class='option span-8";
						if($n%2==1){
							echo " last";	
						}
						echo "'><a class='span-7' onClick=\"CheckAuthor(".$id.",".$row['AuthorID'].")\">".stripslashes($ro['Author'])."</a></div>";
						$n++;
					}
					//SELECT and display other answers
					$query="SELECT * FROM authors WHERE AuthorID<>'".$row['AuthorID']."' LIMIT ".$rownum[$i].",1";
					$result=mysql_query($query) or die(mysql_error());
					$rows=mysql_fetch_assoc($result);
					echo "<div class='option span-8";
					if($n%2==1){
						echo " last";	
					}
					echo "'><a class='span-7' onClick=\"CheckAuthor(".$id.",".$rows['AuthorID'].")\">".stripslashes($rows['Author'])."</a></div>";
					$i++;
					$n++;
				}
				if($rand==3){
					$query="SELECT * FROM authors WHERE AuthorID='".$row['AuthorID']."'";
					$re=mysql_query($query) or die(mysql_error());
					$ro=mysql_fetch_assoc($re);
					echo "<div class='option last'><a class='span-7' onClick=\"CheckAuthor(".$id.",".$row['AuthorID'].")\">".stripslashes($ro['Author'])."</a></div>";
				}
										
			}else{ //We don't have a quote... oops
				echo "An error occured. Skip to the next quote";	
			}
		
        echo "</div><div id='response'></div><a onClick=\"newQuote()\">Next Quote</a>";

}

?>