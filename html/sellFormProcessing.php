<?php

include_once 'include/msqlconn.inc.php';
include_once 'include/msqlselectdb.inc.php';
?>
<!DOCTYPE html>
<html>
    <head>
   
      <title>Sell | Akindeko Board</title>
      <link rel="stylesheet" type="text/css" href="../css/sellform.css">
      <meta charset="UTF-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <link rel="stylesheet" type="text/css" href="../css/main.css" /> 
    </head>
    <body>
    <?php include_once 'include/header.inc.php' ; ?>
    <?php
      $feedback  = array(); 

      $product_name       = trim($_POST['product_name']);
      $price      = trim($_POST['price']);
      $category   = trim($_POST['category']);
      $negotiability = trim($_POST['negotiability']);

      $photo1     = $_FILES['photo_one']['name'];
      $photo2     = $_FILES['photo_two']['name'];
     $photo3      = $_FILES['photo_three']['name'];
	   $description = trim($_POST['description']);
      $tmp_name = $_FILES['photo_one']['tmp_name'];
      if (!isset($_SESSION['username'])){
        $seller_name=trim($_POST['seller_name']);
        $phone=trim($_POST['phone']);
      }

  foreach($_POST as $field => $value){
      if ($value == ""){
        $feedback['emptyField'] = "Some required information is missing.";
      }
    }
    if (!isset($_SESSION['username'])){
      if (strlen($phone) !==11){
          $feedback['phone'] = "phone number not valid.";
      }
    }
    if ($_FILES['photo_one']['name'] === ""){
      $feedback['photo'] = "You should at least put one picture"; 
    }


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


    if (!empty($feedback)){
      echo formErrors($feedback);
      include "sell.php";
      die();
    }

    if ($photo1 !== "")
      $photo1 = getimg($photo1, $_FILES['photo_one']['tmp_name']);
    }

   if ($photo2 !== ""){
        $photo2 = getimg($photo2, $_FILES['photo_two']['tmp_name']);
      }
      if ($photo3 !== ""){
        $photo3 = getimg($photo3, $_FILES['photo_three']['tmp_name']);
      }

    if (isset($_SESSION['username'])){
      $query = "SELECT firstname, phone FROM users WHERE username = '{$_SESSION['username']}' ";
      $result = mysqli_query($connection, $query) or die("can't get seller name". mysql_error());
      if ($result){
        $row = mysqli_fetch_row($result);
        $seller_name =$row[0];
        $phone = $row[1];
      }
    }
  function Redirect($url, $permanent = false ){
    header('Location: ' . $url, true, $permanent ? 301 : 302 );
    exit();
  }


    $query = "INSERT INTO products (product_name,  category, price, negotiable, image_one, image_two, image_three, description, upload_date, name, phone) 
              VALUES ('{$product_name}','{$category}', '{$price}', '{$negotiability}', '{$photo1}', '{$photo2}', '{$photo3}', '{$description}', now(), '{$seller_name}', '{$phone}')";
    $success = mysqli_query($connection, $query);
    if($success){
      echo 'insert successful';
      $url ='../index.php?msg=' .urlencode("Product Suscessfully Added");
      Redirect($url, false );
    }else{
      echo mysqli_error($connection);
}


    ?>
<?php include_once 'include/footer.inc.php'  ?>
  </body>

</html>


<?php
include_once 'include/closedb.inc.php';
?>