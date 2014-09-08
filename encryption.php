<?php

//ENCRYPTION


//salted password
$salt = "Dear Sally, I love you.";

$password_from_form = $_POST['password'];


//encrypted plaintext
$password = md5($salt + "abc123");
$password2 = sha1($salt + $password_from_form);

echo "Password 1 is: " . $password ."<br>";
echo "Password 2 is: " . $password2;

?>