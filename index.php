<?php
	include 'header.php'; //HTML header and nav
	include 'opendb.php'; //Open the wq database
	include 'inc/functions.php';
?>
	<div id='quoteholder' class='prepend-4 span-16'>
    	<?php
        	newQuote();
		?>
    </div>
<?php
	mysql_close($conn); //Close the wq database
	include 'footer.php'; //HTML footer
?>