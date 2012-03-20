<?php
	include 'header.php'; //HTML header and nav
?>
	<div id='quoteholder' class='prepend-4 span-16'>
    	<form action='login.php' method='post'>
        	Name <input type='text' name='user'><br>
            Password <input type='password' name='pass'><br>
            <input type='submit' value='Log In'>
        </form>
        <?php
        	echo $error;
		?>
    </div>
<?php
	include 'footer.php'; //HTML footer
?>