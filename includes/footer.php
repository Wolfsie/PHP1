<style>
	footer {
				font-size: 20px;
	}
	footer div {
		display: inline-block;
		text-transform: capitalize;
	}
</style>
<?php 
	// $onlineUsers = array();
	if($_SESSION['logged_in']) {
		// print_r($_SESSION);
		// $userFullName = $_SESSION['first_name'] . " " . $_SESSION['last_name'];
		// echo $userFullName;

		// array_push($onlineUsers, $userFullName);
		// echo "<pre>";
		// var_dump ($onlineUsers);
		// echo "Users Online: " . $onlineUsers;









		//UPDATE LOGIN STATUS FOR ONLINE USERS
		$time=date("Y-m-d H:i:s");
		// echo $time;
		// echo $_SESSION['id'];
		$setStatus = "update users set status='ON',time='$time' where id='".$_SESSION['id']."'";
		$results = $link->query($setStatus);

		//SET TIME FOR ACTIVE USERS IN THE PAST X MINUTES, WHERE X = $gap
		$gap=15; 
		//FIND OUT WHEN 10 MINUTES AGO WAS (FOR SETTING LAPSED USERS TO OFFLINE)
		//THIS WILL ALSO SET ALL USERS WHO HAVE YET TO LOGIN TO OFFLINE AS THEIR DEFAULT
		$time=date ("Y-m-d H:i:s", mktime (date("H"),date("i")-$gap,date("s"),date("m"),date("d"),date("Y")));
 		$updateStatus = "update users set status='OFF' where time < '$time'";
 		$results = $link->query($updateStatus);

 		//COLLECT IDS FROM USERS WHO ARE ONLINE
 		$queryOnlineUsers = "SELECT * FROM users where time > '$time' and status='ON'";
 		$results = $link->query($queryOnlineUsers);
 		$rows = $results->num_rows;
 		// echo "<pre>";
 		if ($rows >=1) {
 			echo "Users Online In Past 15 Minutes: <br>";
 			//FOUND AT LEAST ONE USER ONLINE
 			while ($row = $results->fetch_assoc()) {
 				// echo $row['id'];
 				// var_dump ($row);
 				echo "<div>" . $row['first_name'] . " " . $row['last_name'] . ",&nbsp;"."</div>";
 			}
 		} else {
 			//NO USERS ONLINE
 			echo "No one is online at this time.";
 		}
 /// Now let us collect the userids from table who are online ////////
 // $qt=mysql_query("select userid from plus_login where time > '$time' and status='ON'");
 // echo mysql_error();

 // while($nt=mysql_fetch_array($qt)){
 // echo "$nt[userid],";





	}
?>