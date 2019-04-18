      function validateRegEx(regex, input, helpText, helpMessage) {
        // See if the input data validates OK
        if (!regex.test(input)) {
          // The data is invalid, so set the help message and return false
          if (helpText !== null)
            helpText.innerHTML = helpMessage;
          return false;
        }
        else {
          // The data is OK, so clear the help message and return true
          if (helpText !== null)
            helpText.innerHTML = "";
          return true;
        }
      }

function validateNonEmpty(inputField, helpText) {
        // See if the input value contains any text
        return validateRegEx(/.+/,   
			inputField.value, helpText,
                "Please enter a value.");
    }

function confirmPassword(pass1, pass2, inputField, helpText){
	//first check if input contains a data
	if (pass2.length === 0){
        if(helpText !== null){
		  helpText.innerHTML = "please enter a value";
		  return false;
        }
	}
	else {
		if (pass1 === pass2){ 
            if(helpText !==null){
                helpText.innerHTML = "";
                return true;
            }
		}
		else {
            if(helpText !== null){
                helpText.innerHTML = "passwords does not match";
                return false;
            }
		}
	}
}
    function validatePhoneNumber(phoneNumber, helpText) {
        // See if the input value contains at least minLength but no more than maxLength characters
        if(isNaN(phoneNumber)){
            if(helpText !== null){
                helpText.innerHTML = "not a valid phone number";
                return false;
            }
        }

        else{
            //input contains a number so check if the nuber is up to the standard length
            if(phoneNumber.length < 11 || phoneNumber.length >15){
                if(helpText !==null){
                    helpText.innerHTML="please recheck the number";
                    return false;
                }
             }
             else{
                if(helpText!==null){
                    helpText.innerHTML="";
                    return true;
                }
             }
            }
    }

    function validateZipCode(inputField, helpText) {
        // First see if the input value contains data
        if (!validateNonEmpty(inputField, helpText))
            return false;

        // Then see if the input value is a ZIP code
        return validateRegEx(/^\d{5}$/,
                inputField.value, helpText,
                "Please enter a 5-digit ZIP code.");
    }

	function validateList(selection, helpText) {
	      // First see if the input value contains data
		if (selection.length === 0) {
            if(helpText !== null){
			     helpText.innerHTML = "You must make a selection from the list";
			     return false;
            }
        }
		else{
              if(helpText !== null){
                 helpText.innerHTML = "";
                 return true;
            }
	    }
    }

    function validateEmail(inputField, helpText) {
        // First see if the input value contains data
        if (!validateNonEmpty(inputField, helpText))
            return false;

        // Then see if the input value is an email address
        return validateRegEx(/^[\w\.-_\+]+@[\w-]+(\.\w{2,3})+$/,
                inputField.value, helpText,
                "Not a valid email address (for example, johndoe@acme.com).");
    }

    

	
	function signUp(form) {
        var phoneNumber = document.signUpForm.phone.value;
        if ( validateNonEmpty(form["firstname"], document.getElementById('firstname_help')) &&
            validateNonEmpty(form["username"], document.getElementById('username_help')) &&		
			validateNonEmpty(form["pass1"], document.getElementById('pass1_help')) &&
            confirmPassword(document.signUpForm.pass1.value, document.signUpForm.pass2.value, document.signUpForm.pass2.value, document.getElementById('pass2_help')) &&
           validatePhoneNumber(phoneNumber, document.getElementById('phone_help'))&&
           validateList(document.signUpForm.locations.value, document.getElementById('location_help'))&&
            validateEmail(form["email"], document.getElementById('email_help'))) {
				// Submit the details to the server
            form.submit();
        } else {
            validateNonEmpty(form["firstname"], document.getElementById('firstname_help'));
            validateNonEmpty(form["username"], document.getElementById('username_help'));        
            validateNonEmpty(form["pass1"], document.getElementById('pass1_help'));
            confirmPassword(document.signUpForm.pass1.value, document.signUpForm.pass2.value, document.signUpForm.pass2.value, document.getElementById('pass2_help'));
           validatePhoneNumber(phoneNumber, document.getElementById('phone_help'));
           validateList(document.signUpForm.locations.value, document.getElementById('location_help'));
            validateEmail(form["email"], document.getElementById('pass1_help'));
       }
    }

    function postToBoard(form){
        if (validateNonEmpty(form["name"], document.getElementById('name_help')) &&
            validateNonEmpty(form["price"], document.getElementById('price_help'))&&

            validateList(form["category"], document.getElementById('category_help'))){
            form.submit();
            }
        else{
                validateNonEmpty(form["name"], document.getElementById('name_help'));
            validateNonEmpty(form["price"], document.getElementById('price_help'));
            validateList(form["category"], document.getElementById('category_help'));
        }

    }