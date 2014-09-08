<?php

	if($_SESSION['logged_in']) {
		// print_r($_SESSION);
		echo "Welcome back, " . $_SESSION['first_name'] . " " . $_SESSION['last_name'];
		echo '<hr>';
		@include("comments.php");
	} else {
		echo "<p>Welcome to The Forum. Please log in to see content.</p>";
	}

?>