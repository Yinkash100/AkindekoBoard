<?php

include_once 'include/msqlconn.inc.php';
include_once 'include/msqlselectdb.inc.php';
?>
<!DOCTYPE html>
<html>
  <head>
  	<title>Accommodation | Campus Market</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" /> 
    <link rel="stylesheet" type="text/css" href="../css/main.css" />
    <link rel="stylesheet" type="text/css" href="../css/accomodation.css" />
    <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">       
  </head>
	<body>
    <?php include_once 'include/header.inc.php' ; ?>
    <?php
      echo $_POST['submit'];
    	if (isset($_FILES['file'])){
    		echo "files uploaded successfull";
    	}
      $feedback  = array(); 
      $location = trim($_POST['location']);
      $apartment_type = trim($_POST['apartment_type']);
      $apartment_name = trim($_POST['lodge_name']);
      $rent = trim($_POST['rent']);
	    $apartment_address= trim($_POST['lodge_address']);
	   	$negiotability = trim($_POST['negotiability']);
      $description = trim($_POST['description']);
	   	if (isset($_FILES['photo_one']['name'])) {
	   		$photo1     = $_FILES['photo_one']['name'];
      }
      if (isset($_FILES['photo_two']['name'])) {
        $photo2     = $_FILES['photo_two']['name'];
      }
      if (isset($_FILES['photo_three']['name'])) {
        $photo3      = $_FILES['photo_three']['name'];
      }
      if (!isset($_SESSION['username'])){
        $seller_name=trim($_POST['seller_name']);
        $phone=trim($_POST['phone']);
      }
      else{
         $query = "SELECT firstname, phone FROM users WHERE username = '{$_SESSION['username']}' ";
        $result = mysqli_query($connection, $query) or die("can't get seller name". mysql_error());
        if ($result){
          $row = mysqli_fetch_row($result);
          $seller_name =$row[0];
          $phone = $row[1];
        }
      }
      
    ?>
<?php
  function formErrors($feedback= array()){
    $output = "";
    if (!empty($feedback)){
      $output .=  "<div class=\"help\">";
      $output .= "<b>Please fix the following errors</b>";
      $output .= "<ul>";
      foreach ($feedback as $key => $error) {
        $output .= "<li>{$error}</li>";
      }
      $output .= "</ul>";
      $output .= "</div>";
      return $output;
      
    } 
  }

  function getimg($imgName, $tmp_name){
        $ImageDir ="";
        if (isset($_SESSION['username'])){
          $ImageDir ="C:/xampp/htdocs/web+bootstrap/img/products/". $_SESSION['username'];
        }else{
          $phone = trim($_POST['phone']);
          $ImageDir ="C:/xampp/htdocs/web+bootstrap/img/products/". $phone;
        }
         $ImageDir=$ImageDir.$imgName;
        move_uploaded_file($tmp_name, $ImageDir);
        
        if (isset($_SESSION['username'])){
          $newIImageDir ="img/products/". $_SESSION['username'];
        }else{
          $phone = trim($_POST['phone']);
          $newIImageDir ="img/products/". $phone;
        }
        $newImageName = $newIImageDir .$imgName;
        return $newImageName;
  }

  function Redirect($url, $permanent = false ){
    header('Location: ' . $url, true, $permanent ? 301 : 302 );
    exit();
  }
?>


<?php
  if (!empty($feedback)){
      echo formErrors($feedback);
      include "accomodation.php";
      die();
    }

  if ($photo1 !== ""){
  	$photo1 = getimg($photo1, $_FILES['photo_one']['tmp_name']);
  }
  if ($photo2 !== ""){
    $photo2 = getimg($photo2, $_FILES['photo_two']['tmp_name']);
  }
  if ($photo3 !== ""){
    $photo3 = getimg($photo3, $_FILES['photo_three']['tmp_name']);
  }
?>

  <?php
    $query = "INSERT INTO accomodations (location, apartment_type, price,  apartment_name, apartment_address,   negiotability, image_one, image_two, image_three, description, upload_date, seller_name, phone) 
      VALUES ('{$location}', '{$apartment_type}', '{$rent}', '{$apartment_name}', '{$apartment_address}', '{$negiotability}', '{$photo1}', '{$photo2}', '{$photo3}', '{$description}', now(), '{$seller_name}', '{$phone}')";
    $success = mysqli_query($connection, $query);
    if($success){
      echo 'insert successful';
      $url ='../index.php?msg=' .urlencode("Product Suscessfully Added");
      Redirect($url, false );
    }else{
      echo mysqli_error($connection);
    }
  ?>
  </body>
</html>