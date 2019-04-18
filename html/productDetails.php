<?php
include_once 'include/msqlconn.inc.php';
include_once 'include/msqlselectdb.inc.php';
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

    $query = "SELECT * FROM products WHERE product_id = '{$_GET['id']}' ";
    $result = mysqli_query($connection, $query) or      die("database query failed");
?>
<html>
    <head>
        <title>Product Details |Akindeko Board</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" href="../css/productDetails.css" />
        <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet"> 

    </head>
    <body>
    	<?php include_once 'include/header.inc.php' ; ?>
    	<?php
           	while ($row = mysqli_fetch_array($result)){
                $output =  '<div id="productDetail"><h2>'.$row['product_name'].'</h2>';
                $output .= '<a href="../'. $row['image_one'] .'"><img class="product_img" alt="product image" src="../'. $row['image_one'] .'"/></a></p>';
                $output .= '<h4>Price:</h4> &#8358; '.$row['price'].'  ('.$row['negotiable']. ')';
                $output .= '<h4>Seller Contact:</h4> <span class="tel">'. $row['phone'] .'</span> ';
                $output .= '<h4>Seller Name: </h4>'. $row['Name'] .'<br/><p>';
                $date = strtotime($row['upload_date']);
                $output .= '<h4>Date Uploaded: </h4>'. date('d-F-Y h:i a', $date) .'<br/><p>';
                
                $output .= '<h4>Description: <br/></h4><p>'.$row['description'] .'</p>';
                $output .= '<h4>More Images: </h4><p> <a href="../'. $row['image_two'] .'"><img class="more_img" alt="product image two" src="../'. $row['image_two'] .'"/></a>';
                $output .= '<a href="../'. $row['image_three'] .'"><img class="more_img" alt="product image three" src="../'. $row['image_three'] .'"/></a></p></div>';
                echo $output;
            }
        ?>
        <?php include_once 'include/footer.inc.php'  ?>
        <script src="../script/jquery.js"></script>
        <script src="../script/sellform.js"></script>
      <script src="../script/bootstrap.min.js"></script>
      <script src="https://use.fontawesome.com/06c684a517.js"></script>
    </body>
</html>
