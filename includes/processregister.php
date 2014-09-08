<?php


// echo "<pre>";
// print_r($_POST);


$first_name = (isset($_POST['fname'])) ? $_POST['fname'] : "";
$last_name = (isset($_POST['lname'])) ? $_POST['lname'] : "";
$email = (isset($_POST['email'])) ? $_POST['email'] : "";
$password = (isset($_POST['password'])) ? md5(SALT . $_POST['password']) : "";

if ($first_name === "") {
	die("You must enter your first name");
} elseif($last_name === "") {
	die("You must enter your last name");
} elseif($email === "") {
	die("You must enter your email address");
} elseif($password === "") {
	die("You must enter your email address");
}


$emailSql = "SELECT * FROM users WHERE email ='$email'";

if ( $result = $link->query($emailSql)){
	if($result->num_rows >=1) {
		echo "An account with that email address already exists.";
	} else {

		$sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$password')";


		if ($link->query($sql) === false){
			die("You had a mysql error");
		} else {
			$last_inserted_id = $link->insert_id;
			$affected_rows = $link->affected_rows;
		}

		// echo "The user inserted was user ID" . $last_inserted_id;
		echo "Congratulations! You may now login with your account.";
	}

	// echo "<pre>";
	// print_r($result);
} else {
	echo "ERROR";
}

?>