<?php
	include 'header.php';
	include 'opendb.php';
	include 'inc/functions.php';
?>
	<div id='quoteholder' class='prepend-4 span-16'>
    	<?php
        	newQuote();
		?>
    </div>
<?php
	mysql_close($conn);
	include 'footer.php';
?>