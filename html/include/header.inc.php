<?php
session_start();
?>
        <div id="header">
            <div id="topline"> 
                <?php 

                    $output;
                    if (isset($_SESSION['username'])){
                        $output =  'logged in as ' . $_SESSION['username'] . ' <a href="http://localhost/web+bootstrap/html/logout.php"> logout  </a>';
                        $output .= ' <a href="http://localhost/web+bootstrap/html/uac.php"> Account Setup </a>';
                    }else{
                        $output =  '<a href="http://localhost/web+bootstrap/html/signup.php" >Sign Up  </a>';
                        $output .= '<a href="http://localhost/web+bootstrap/html/login.php"> login</a>';
                    }
                    $output .= " ".date("d F, Y");
                    $output .=  " ".date("h:ia");
                    echo $output; 
                ?>
            </div>

            <div id="menu" class="navbar navbar-default" role="navigation"> 
              <div class="container-fluid">     
                <ul class="nav nav-tabs"   id="verticalMenu">
                    
                    <li role="presentation" class="active"><a href="http://localhost/web+bootstrap/" saria-controls="Home" role="tab" data-toggle="tab">Home</a></li>
                    <li role="presentation" class="dropdown"><a class="dropbtn">Buy </a></li>
                    <ul id="dropdown" class="dropdown-content">                      
                        <li><a href="#">phones</a></li><hr/>
                        <li><a href="#">Phone Accessories</a></li><hr/>
                        <li><a href="#">Laptops</a></li><hr/>
                        <li><a href="#">Foodstuff</a></li><hr/>
                        <li><a href="#">Clothing</a></li><hr/> 
                        <li><a href="#">Others</a></li>
                    </ul>
                    <li role="presentation" ><a href="http://localhost/web+bootstrap/html/sell.php" aria-controls="Sell" role="tab" data-toggle="tab">Sell</a></li>
                    <li role="presentation" ><a href="http://localhost/web+bootstrap/html/events.php" aria-controls="Events" role="tab" data-toggle="tab">Events</a></li>
                    <li role="presentation" ><a href="http://localhost/web+bootstrap/html/updates.php" aria-controls="Updates" role="tab" data-toggle="tab">News</a></li>
                    <li role="presentation" ><a href="http://localhost/web+bootstrap/html/services.php" aria-controls="Services" role="tab" data-toggle="tab">Services</a></li>
                    <li role="presentation" ><a href="http://localhost/web+bootstrap/html/Accomodation.php" aria-controls="Tolet" role="tab" data-toggle="tab">Accomodation</a></li>
                </ul>
              </div>
            </div>

            <form id="searchform" method="GET" action="http://localhost/web+boostrap/html/include/search.inc.php">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search&hellip;" id="search" name="search" >
                    <span class="input-group-addon">
                      <a class="btn btn-default" type="button" onclick="submit"><i class="fa fa-search "></i></a>    
                    </span>
                </div>
            </form> 
        </div>