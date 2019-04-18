<?php
include_once 'msqlconn.inc.php';
include_once 'msqlselectdb.inc.php';

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Search <?php echo $_GET['search']; ?> | Akindekoboard.com </title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    		<link rel="stylesheet" type="text/css" href="../../css/main.css" />
        <link rel="stylesheet" type="text/css" href="../../css/products.css" />
        <link rel="stylesheet" type="text/css" href="../../css/sellform.css" />
        <script type="text/javascript" src="../../script/main.js"></script>
    </head>
    <body>
    	<?php include_once 'header.inc.php' ; ?>
			<?php
			$searchterm = $_GET['search']; 
				if ($searchterm !== ""){
					$query = "SELECT * FROM products WHERE product_name LIKE '%" .$searchterm ."%'";
					$result = mysqli_query($connection, $query);
	        	while ($row = mysqli_fetch_array($result)){
             	$link = 'html/productDetails.php?id=' .$row['product_id'];
              $output =  '<div id="product"><img class="product_img" alt="product image" src="'. $row['image_one'] .'"/>';
              $output .= '<span class="product_link">';
              $output .= '<p><b>'.$row['product_name'].'<br/>&#8358; '.$row['price'].'</b><br/>';
              $output .= 'Seller Contact: <span class="tel"> '. $row['phone'] .'</span><br/>Seller Name: '. $row['Name'].' </p>';
              $output .= '<a href="'.$link.'">See More > </a>'. $row['description'] .'</span></div>';
              echo $output;
  	        }
            mysqli_free_result($result);
        }
			?>
			<?php include_once 'footer.inc.php';  ?>
			<?php include_once 'closedb.inc.php';?>
	  </body>
</html>
