<?php


//LOGIC
//Query to find User
//Encrypt Password with SALT
//Find Value of password in Database
//Match

$email = isset($_POST['email']) ? $_POST['email'] : "";
$password = isset($_POST['password']) ? md5(SALT . $_POST['password']) : "";


//Can Run server side by just sayind look for email and password
$emailSql = "SELECT * FROM users WHERE email ='$email'";



$results = $link->query($emailSql);
$rows = $results->num_rows;

if ($rows >=1) {
	//Email found in database, run password check logic
	while ($row = $results->fetch_assoc()) {
		if ($row['password'] === $password) {
			$_SESSION['id'] = $row['id'];
			$_SESSION['first_name'] = $row['first_name'];
			$_SESSION['last_name'] = $row['last_name'];
			$_SESSION['logged_in'] = TRUE;
			
			echo "YAY login Succeeded";
			header('Location:index.php') ;


		} else {
			echo "Boo incorrect password";
		}
		// print_r($row);
	}
} else {
	//email not found, display error
	echo "Sorry, that email is not registered.";
}

?>