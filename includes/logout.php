<?php
// $q=mysql_query("update users set status='OFF' where id='".$_SESSION['id']."'");
// session_destroy();
// $updateStatus = "update users set status='OFF' where time < '$time'";

$q= "update users set status='OFF' where id='".$_SESSION['id']."'";
$results = $link -> query($q);
session_destroy();

header('Location:index.php') ;
?>