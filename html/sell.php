<?php
//session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
      <meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        
            
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" /> 
        <link rel="stylesheet" type="text/css" href="../css/main.css" />    
        <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <title>SELL | The Lebasu Online</title>        
    </head>
    <body>
        <?php include_once 'include/header.inc.php'; ?>
        <form class="form-horizontal" action="sellFormProcessing.php" method="post" name="sellform" enctype="multipart/form-data" >
        <fieldset >
        	<legend>Item Information</legend>

            <div class="control-group">
              <label class="control-label" for="category" class="col-sm-2 control-label">Select a category:
                <div class="controls" class="col-lg-10">
                  <select class="form-control" id="category" name="category" onblur="validateNonEmpty(this, document.getElementById('category').value, document.getElementById('category_help'))">
                    <option>Phones</option>
                    <option>Phone Accessories</option>
                    <option>Laptop</option>
                    <option>Laptop Accessories</option>
                    <option>Clothing</option>
                    <option>Foodstuffs</option>
                  </select>
                  <span id="category_help" class="help" ></span>
                </div>
              </label>
            </div>
            <div class="control-group">
               <label class="control-label"> Name/Model:
                  <div class="controls">
                    <input id="product_name" class="form-control" name="product_name" size="20" type="text" onblur="validateNonEmpty(this, document.getElementById('productname_help'))"/>
                    <span id='productname_help' class="help" ></span>
                  </div>
                </label>
            </div>
            <div class="control-group">
              <label class="control-label">Price:
                <div class="controls">
                  <input class="form-control" id="price" autocomplete="on" name="price" type="text" onblur="validateNonEmpty(this, document.getElementById('price_help'))"/>
                  <span id='price_help' class="help" ></span>
                </div>
              </label>
            </div>
            <div class="control-group">
              <label class="checkbox-inline">
                <div class="controls">
                  <input type="radio" name="negotiability" value="Negotiable" checked="checked"/>Negotiable
                  <input type="radio" name="negotiability" value="Non-negotiable" />Non-negotiable
                </div>
              </label>
            </div>
                
                
            <div class="control-group">
                <label class="control-label">Upload pictures of the product
                  <div class="controls">
                    <input class="form-control" type="file"  name="photo_one" >
                  </div>
                </label>
            </div>
            <div class="control-group">
              <label class="control-label">
                <div class="controls">
                  <input class="form-control" type="file"  name="photo_two" >
                </div>
              </label>
            </div>
            <div class="control-group">
              <label class="control-label">
                <div class="controls">
                  <input class="form-control" type="file"  name="photo_three" >
                </div>
                <small>(Posts with pictures easily find buyers)</small>
              </label>
            </div>
              
            <div class="control-group">        
              <label class="control-label">Description
                <div class="controls">
                    <textarea class="form-control" name="description" id="description" placeholder="Give a Brief Description of the Product!" rows="5" cols="40"></textarea>
                </div>
              </label>
            </div>  
        </fieldset>
        <fieldset>            
          <?php
            if (!isset($_SESSION['username'])){
              $tel_input = '<fieldset><legend>Seller Information</legend><div class="control-group"><label>Name:';
              $tel_input .= '<div class="controls"><input class="form-control" id="seller_name" autocomplete="on" name="seller_name" type="text" onblur=validateNonEmpty(this, document.getElementById("sellername_help"))/>';
              $tel_input .= '<span id="sellername_help" class="help" ></span></div></label></div>';
              $tel_input .= '<div class="control-group"><label>Phone Number:';
              $tel_input .= '<div class="controls"><input class="form-control" id="phone" autocomplete="on" name="phone" type="text" onblur=validateNonEmpty(this, document.getElementById("price_help"))/>';
              $tel_input .= '<span id="phone_help" class="help" ></span></div></label></div>';
              echo $tel_input;
            }
          ?>

          <div class="control-group">
            <div class="controls">    
              <label class="control-label"><button class="btn btn-primary" type="submit" value="Post To Board "  onclick="postToBoard(this.form);">Post To Board</button></label>
            </div>
          </div>
        </fieldset>
            
        </form>
       <?php include_once 'include/footer.inc.php'  ?>
        <script src="../script/jquery.js"></script>
        <script src="../script/sellform.js"></script>
      <script src="../script/bootstrap.min.js"></script>
      <script src="https://use.fontawesome.com/06c684a517.js"></script>
    </body>
</html>
