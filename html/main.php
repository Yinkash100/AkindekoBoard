<?php
include_once 'include/msqlconn.inc.php';
include_once 'include/msqlselectdb.inc.php';

?>


<?php
 	$query = "SELECT * FROM products";
 	$result = mysqli_query($connection, $query) or		die("database query failed");

?>


<!DOCTYPE html>
<html>

    <head>
        <title>Database</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/products.css" />
    </head>
    <body>
        <?php
        //use returned data
        	while ($row = mysqli_fetch_array($result)){
                /*
        		echo $row['image_one'];
                echo  '<p><b>'. $row['product_name'] .'</b><br/>Seller Name: '. $row['Name'].'<br/>Seller Contact: <tel class="product_contact"> '.$row['phone'].'</tel></p>';*/
                $imgsrc = 'file:///'.$row['image_one'];
                $output = '<div id="product"><h4>'.$row['product_name'].'</h4><br/>';
                $output .=  '<img class="product_img" alt="product image" src="'. $imgsrc .'"/>';
                $output .= '<span class="product_link">';
                $output .= $row['price'].'</b><br/>';
                $output .= 'Seller Name: '. $row['Name'].' <br/>Seller Contact: <tel class="product_contact"> '. $row['phone'] .'</tel></p>';
                $output .= '<a href="#">See More > </a>'. $row['description'] .'</span></div>';
                echo $output;
        	}
                mysqli_free_result($result);
		?>

        
    </body>
</html>


<?php
//closing database
 mysqli_close($connection);
?>