<?php
	include 'header.php';
?>
	<div id='quoteholder'>
    	<form action='addquoteaction.php' method='post' name='addquote'>
        	<label for='quote'>New Quote</label>
            <input class='span-12' name='quote' id='quote'>
            <input type='submit' value='Submit'>
        </form>
        <p>
        	Don't add the author here! That comes later.
        </p>
        <p><?php
        	echo $msg;
		?></p>
    </div>
<?php
	include 'footer.php';
?>