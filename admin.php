<?php
	include 'restricted.php';
	include 'header.php'; //HTML header and nav
	include 'opendb.php'; //Open the wq database
	include 'inc/functions.php';
?>
	<div id='quoteholder' class='prepend-4 span-16'>
    	<h3>Admin</h3>
        <h4>Add Quote</h4>
        <form action='addquote.php' method='post'>
        	<input type='text' name='quote' label='quote'><br>
            <input type='text' name='author' label='author'><br>
            <!--NEED TO BE ABLE TO PICK FROM PREVIOUS AUTHORS-->
            <input type='submit' value='Add'>
        </form>
        <?php
        	echo $message;
		?>
    </div>
<?php
	mysql_close($conn); //Close the wq database
	include 'footer.php'; //HTML footer
?>