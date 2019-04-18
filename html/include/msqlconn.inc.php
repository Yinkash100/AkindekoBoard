

<?php
//craete a database connection
$dbhost = "localhost";
$dbuser= "root";
$dbpass = "thoughenough";
$dbname= "yinkash";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (mysqli_connect_errno()){
	die("Database Connection Filed: ".
		mysqli_connect_error() .
		"(" . mysqli_connect_errno() . ")"
		);
}

?>