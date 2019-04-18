<?php

$db=mysqli_select_db($connection, "yinkash")
	or die("Can't select database!");
  



 	$query = "SELECT * FROM users";
 	$result = mysqli_query($connection, $query);
 	if(!$result){			// Tests if there is a query error 
 		die("database query failed");
 	}
?>