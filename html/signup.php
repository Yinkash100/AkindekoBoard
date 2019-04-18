<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
      <title>Sign Up | Akindeko Board</title>
        <meta content="string" charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" href="../css/signup.css"/>
        <link href="../css/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
        
    </head>
    <body> 
        <?php include_once 'include/header.inc.php' ; ?>
        <form name="signUpForm" id="signUp" action="signupprocessing.php" method="post" >
		      <h4>Create Account</h4>
            Fields marked " <span class="help">*</span> " are important
          	<label for="firstname">
              <span class="help">* </span>
                First Name: 
                <input id="firstname" name="firstname" type="text" placeholder="First Name" onblur="validateNonEmpty(this, document.getElementById('firstname_help'))" autocomplete="on" required/>
              <span id='firstname_help' class="help" span>
            </label>
					
            <label for="phone">
              <span class="help">* </span> 
                Phone Number: 
                <input id="phone" name="phone" type="tel"  placeholder="e.g.  08012345678" onblur= "validatePhoneNumber(document.getElementById('phone').value, document.getElementById('phone_help'))" required/>
              <span id='phone_help' class="help" ></span> </td></label>
              
            <label for="email">
              <span class="help">* </span>
                Email Address:
                <input id="email" name="email" type="email" placeholder="" onblur="validateEmail(this, document.getElementById('email_help'))" required/>
              <span id='email_help' class="help" ></span>
            </label>
          
            <label for="username">
              <span class="help">* </span>
                Choose a Username:
                <input id="username" name="username" type="text" placeholder="Middle Name" onblur="validateNonEmpty(this, document.getElementById('username_help'))" required/>
              <span id='username_help' class="help" ></span>
            </label>
            
            <label for="pass1">
              <span class="help">* </span>
                Choose a Password:
                <input id="pass1" name="pass1" type="password" onblur="validateNonEmpty(this, document.getElementById('pass1_help'))" required/>
              <span id="pass1_help" class="help" ></span>
            </label>
            
            <label for="pass2">
              <span class="help">* </span>
                Confirm Password:
                <input id="pass2" name="pass2" type="password" onblur= "confirmPassword(document.getElementById('pass1').value, document.getElementById('pass2').value, this, document.getElementById('pass2_help'))" required/>
              <span id="pass2_help" class="help" ></span>
            </label>
        
            <label for="loctions">
              <span class="help">* </span>
                Location: 
                <input list="locations" name="locations" onblur="validateList(document.signUpForm.locations.value, document.getElementById('location_help'))" required/>
                <datalist id="locations" > 
                  <option value="Akindeko Hall"></option>
                  <option value="Abiola Hall"></option>
                  <option value="Adeniyi Hall"></option>                    <option value="Jadesola Hall"></option>
                  <option value="Jibowu Hall">/</option>
                  <option value="South Gate"></option>
                  <option value="North Gate"></option>
                  <option value="Jibowu Annex"></option>
                </datalist>
            <span id="location_help" class="help" ></span>
          </label>
          
          <span id="signUpBotton">
          <label>
            <input  type="button" value="Signup" onclick="signUp(this.form);" >
          </label>
          </span>
        </form>
        <?php include_once 'include/footer.inc.php' ; ?>
        <script src="../script/jquery.js"></script>
        <script src="../script/sellform.js"></script>
      <script src="../script/bootstrap.min.js"></script>
      <script src="https://use.fontawesome.com/06c684a517.js"></script>
    </body>
</html>
