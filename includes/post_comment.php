<?php 

if($_SESSION['logged_in']) {
	$comment = $_POST['comment'];
	$user_id = $_SESSION['id'];
	$post_time=date("Y-m-d H:i:s");


	$sql = "INSERT INTO comments (comment, user_id, post_time) VALUES ('" . $comment . "' , '" . $user_id . "' , '" . $post_time . "')";

	if($link -> query($sql) === false) {
		echo "You had a mysql error";
	} else {
		echo "success";
		$last_inserted_id = $link->insert_id;
		$affected_rows = $link ->affected_rows;
		header( 'Location: index.php' ) ;

	}
}

//SELECT * FROM comments INNER JOIN users ON comments.user_id=users.id



?>