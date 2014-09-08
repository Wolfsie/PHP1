<style>
	html {
		height: auto;
	}
</style>


	<?php
		if($_SESSION['logged_in']) {
			echo '<table border="5px">';
			echo '<tr style="background:rgb(0,0,0);">';
			echo '<th style="border-right: 1px solid #F1D9C6;">Username</th>';
			echo '<th>Comments</th>';
			echo '</tr>';
			$sql = "SELECT * FROM comments INNER JOIN users ON comments.user_id=users.id";

			$results = $link->query($sql);
			$rows = $results->num_rows;


			while ($row = $results->fetch_assoc()) {
				echo "<tr>";
				echo "<td style='border-right: 1px solid #F1D9C6;	text-transform: capitalize;'>" . $row['post_time'] . "<br> " .$row['first_name']." ".$row['last_name'] . " said: </td>";
				echo "<td>".$row['comment']."</td>";
				echo "</tr>";
			}
			echo '</table>';
		} else {
			echo "<p>Welcome to The Forum. Please log in to see content.</p>";
		}
	?>
