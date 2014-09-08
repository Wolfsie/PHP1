<style>
	form {
		height: 200px;
	}
	span {
		cursor: pointer;
	}
</style>



<?php 

	if($_SESSION['logged_in']) {
		// print_r($_SESSION);
		echo '<form id="commentForm" action="index.php?page=post_comment" method="POST">';
		echo '<span id="commentClose">_</span><h1 id="formHeader">Add a Comment</h1>';
		echo '<textarea id="commentFormInput" name="comment"></textarea>';
		echo '<button id="postBtn">POST ME!</button>';
		echo '</form>';

		@include("all_comments.php");
	} else {
		echo "<p>Welcome to The Forum. Please log in to see content.</p>";
	}

?>

<script>
	var commentFormInput = document.getElementById('commentFormInput');
	var commentForm = document.getElementById('commentForm');
	var postButton = document.getElementById('postBtn');
	var commentClose = document.getElementById('commentClose');
	var formHeader = document.getElementById('formHeader');
	var open = true;
	commentFormInput.onfocus = function() {
		commentFormInput.style.height = "200px";
		commentForm.style.height = "300px";
	}



	postButton.addEventListener("click", function(event) {

		if(commentFormInput.value === "") {
			console.log(commentFormInput.value);
			event.preventDefault();
			formHeader.innerHTML = formHeader.innerHTML + " - <span style='width: 75%; color: rgba(200, 0, 0, 1); float: right; font-weight: bold;'>*You Must Enter A Comment To Post On This Board</span>";
		} else {
			console.log("blhlhk")
		}
	});

	commentClose.addEventListener("click", function() {
		console.log("blah");
		if (open) {
			commentClose.innerHTML = "+";
			commentClose.style.marginTop = "-1.5%";
			commentForm.style.height = "50px";
			commentFormInput.style.display = "none";
			postButton.style.display = "none";
			open = false;
		} else if (!open) {
			commentClose.innerHTML = "_";
			commentClose.style.marginTop = "-4%";
			commentForm.style.height = "200px";
			commentFormInput.style.display = "block";
			postButton.style.display = "block";
			open = true;
		}
	});

</script>