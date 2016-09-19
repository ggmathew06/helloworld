/*
Only let users enter letters, numbers, periods, dashes, and spaces 
*/
function validateAddress(element){
	pattern = /^[0-9]*\s[a-zA-Z\.\-\s\,]*$/;
	return regexResult(pattern, element);
}
/*
Only let users enter letters, dashes, and spaces 
*/
function validateCity(element){
	pattern = /^[a-zA-Z\-\s]*$/;
	return regexResult(pattern, element);
}
/*
Only let users enter letters.
*/
function validateAlpha(element){
	pattern = /^[a-zA-Z]*$/;
	return regexResult(pattern, element);
}
/*
Required fields can't be empty
*/
function validateRequired(input){
	if(input[0].value.trim() == ""){
		alert("The required field mustn't be left empty.");
		input.focus();
		return false;
	}
	
	return true;
}
/*
Only let users enter zips that are 5 or 9 digits long. 
If 9 digits long automatically add a dash
*/
function validateZip(element){
	pattern = /^(\d{5}([\-]\d{4})?)$/;
	
	if(element[0].value.length == 9){
		var unformatedVal;
		var formatedVal;
		var firstPart;
		var secondPart;
		
		unformatedVal = element[0].value;
		firstPart = unformatedVal.substring(0,5);
		secondPart = unformatedVal.substring(5,9);
		formatedVal = firstPart + "-" + secondPart;
		element[0].value = formatedVal;
	}
	return regexResult(pattern, element);
}
/*
Warn user that input is invalid based on what is expected 
for the input field.
*/
function regexResult(pattern, input){
	var reg = new RegExp(pattern);
	var result = reg.test(input[0].value);
	
	if(!result){
		alert("Invalid input");
		input.focus();
	}
	return result;
}

/*
*/
function registrationValidation(firstName, lastName, address1, address2, city, zip, formName){
	var fnInput = $(firstName);
	var lnInput = $(lastName);
	var a1Input = $(address1);
	var a2Input = $(address2);
	var cInput = $(city);
	var zInput = $(zip);
	var isValid = true;
	
	//firstName
	var req = fnInput.attr("class");
	if(req != null && req.includes("required")){
		isValid = validateRequired(fnInput);
		if(!isValid){
			return isValid;
		}
	}
	isValid = validateAlpha(fnInput);
	if(!isValid){
		return isValid;
	}
	//-------------------------------------------
	//lastName
	req = lnInput.attr("class");
	if(req != null && req.includes("required")){
		isValid = validateRequired(lnInput);
		if(!isValid){
			return isValid;
		}
	}
	isValid = validateAlpha(lnInput);
	if(!isValid){
		return isValid;
	}
	//-------------------------------------------
	//address1
	req = a1Input.attr("class");
	if(req != null && req.includes("required")){
		isValid = validateRequired(a1Input);
		if(!isValid){
			return isValid;
		}
	}
	isValid = validateAddress(a1Input);
	if(!isValid){
		return isValid;
	}
	//-------------------------------------------
	//address2
	req = a2Input.attr("class");
	if(req != null && req.includes("required")){
		isValid = validateRequired(a2Input);
		if(!isValid){
			return isValid;
		}
	}
	if(a2Input[0].value.trim() != ""){
		isValid = validateAddress(a2Input);
		if(!isValid){
			return isValid;
		}
	}
	//-------------------------------------------
	//city
	req = cInput.attr("class");
	if(req != null && req.includes("required")){
		isValid = validateRequired(cInput);
		if(!isValid){
			return isValid;
		}
	}
	isValid = validateCity(cInput);
	if(!isValid){
		return isValid;
	}
	//-------------------------------------------
	//zip
	req = zInput.attr("class");
	if(req != null && req.includes("required")){
		isValid = validateRequired(zInput);
		if(!isValid){
			return isValid;
		}
	}
	isValid = validateZip(zInput);
	if(!isValid){
		return isValid;
	}
	//-------------------------------------------
	
	$(formName).submit();
}
