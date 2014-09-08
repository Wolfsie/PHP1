<nav>
	<ul>
		<li><a href="index.php">Home</a></li>
		<?php
			if ($_SESSION['logged_in']) {
				//IF user is logged in, don't show register
				echo '<li><a href="index.php?page=logout">LogOut</a></li>';
			} else {
				//show register
				echo '<li><a href="index.php?page=login">Login</a></li>';
				echo '<li><a href="index.php?page=register">Register</a></li>';
			}
		?>
	</ul>
</nav>