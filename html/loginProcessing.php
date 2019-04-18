<?php
session_start();
include_once 'include/msqlconn.inc.php';
include_once 'include/msqlselectdb.inc.php';
?>

<html>
  <head>
    <title>Login | Akindeko Board</title>
    <meta content="string" charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../css/sellform.css"/>
    <link rel="stylesheet" type="text/css" href="../css/login.css"/>
    <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
   </head>
    <body>
    <?php

    	$username = trim($_POST['username']);
    	$password = md5(trim($_POST['password']));

    	$query = "SELECT username FROM users
				WHERE username='{$username}'";
		$result = mysqli_query($connection, $query) or die("Couldn’t execute query.");

		$num = mysqli_num_rows($result); 
		if ($num == 1){ //if login name was found 
			$query = "SELECT username FROM users WHERE username='{$username}'
			AND password='{$password}'";
			$result2 = mysqli_query($connection, $query) or die("Couldn't execute query 2."); 
			$num2 = mysqli_num_rows($result2);

			if ($num2 > 0){ //if password is correct 
				$_SESSION['login']="yes";
				$_SESSION['username'] = $username;
				$today = date("Y-m-d h:m:s"); 
				$query = "INSERT INTO login (username, time) VALUES ('{$username}','{$today}')";
				mysqli_query($connection, $query) or die("Can't execute query." . mysqli_error($connection));
				header("location: ../index.php");
				die();
				print_r($_SESSION);
			}else{ //if password is not correct 
				unset($do);
				$message="The Login Name, $username exists, but you have not entered the
					correct password! Please try again.<br>";
				echo $message;
				include("login.php"); 
			}
		} 
		elseif ($num == 0){ // login name not found 
			unset($do);
			$message = "The Login Name you entered does not exist! Please try again.<br>";
			echo $message;
			include("login.php");
		}

	?>
    </body>
</html>

<?php
include_once 'include/closedb.inc.php';
?>