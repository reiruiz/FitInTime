//Shortcut to getting elements
function getElement(id){
    var element = document.getElementById(id);
    return element;
}

////Highlights element as invalid
//function highlight(element){
//    element.style.backgroundColor = "pink";
//    element.style.border = "2px solid red";
//}
////Highlights element as valid
//function validHighlight(element){
//    element.style.backgroundColor = "#99ff99";
//    element.style.border = "2px solid #339900";
//}
////Insert new node after
//function insertAfter(insertNode, refNode){
//    
//    refNode.parentNode.insertBefore(insertNode, refNode.nextSibling);
//}

//Creates error message for invalid fields
//function errorMsg(msg, childId, parentId, errorId){
//    //Checks to see if the error id being created is already present
//    if(getElement(errorId) == null){
//        //creates new paragraph tag and inserts it before input field
//        var error = document.createElement("td");
//        var text = document.createTextNode(msg);
//        error.appendChild(text);
//        error.style.color = "red";
//        error.id = errorId;
//        insertAfter(error,childId);
//    }
//}

//Checks if name is valid.
function isNameValid(id){
    //Pattern that matches to letters only
    var patt = /^[A-z]+$/;
    return patt.test(getElement(id).value);
}

//Checks if username is valid.
function isUserValid(id){
    //Pattern that allows anything except special characters(excluding '_')
    var patt = /^[A-z0-9_]{4,}$/;
    return patt.test(getElement(id).value);
}

//Checks if password is valid.
function isPassValid(id){
    /*Pattern that requires the user to have:
        - One upper case letter
        - One lower case letter
        - One number
        - Five characters long
    */
    var patt = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9]).{5,}$/;
    return patt.test(getElement(id).value);
}

//If the value of first element is the same as the second element, return true
function isSame(first, second){
    return (getElement(first).value == getElement(second).value);
}

//Validate login form before submitting.
function submitLoginForm(){
    var validLog = true;
    //Check user name
    if(isUserValid('loginUser')){
        // getElement('errLoginUser').className = '';
        getElement('errLoginUser').innerHTML = '';
		getElement('errLoginUser').style.display = "none";
    }else{
        validLog = false;
        // getElement('errLoginUser').className = 'error';
		getElement('errLoginUser').style.display = "block";
        getElement('errLoginUser').innerHTML = 'Invalid Username!';
    }
    //Check password
    if(isPassValid('loginPass')){
        // getElement('errLoginPass').className = '';
        getElement('errLoginPass').innerHTML = '';
		getElement('errLoginPass').style.display = "none";
    }else{
        validLog = false;
        // getElement('errLoginPass').className = 'error';
		getElement('errLoginPass').style.display = "block";
        getElement('errLoginPass').innerHTML = 'Invalid Password!';
    }
	if(!validLog){
		getElement('loginError').style.display = "block";
	}
    return validLog;
}

//Validate registration form before submitting.
function submitRegForm(){
    var validReg = true;
    //Check user name
    if(isUserValid('reguser')){
        // getElement('eleRegUser').className = '';
		getElement('errRegUser').style.display = "none";
        getElement('errRegUser').innerHTML = '';
    }else{
        validReg = false;
        // getElement('eleRegUser').className = 'error';
		
		getElement('errRegUser').style.display = "block";
        getElement('errRegUser').innerHTML = 'Invalid Username!';
    }
    //Check password
    if(isPassValid('regpass')){
        // getElement('eleRegPass').className = '';
		
		getElement('errRegPass').style.display = "none";
        getElement('errRegPass').innerHTML = '';
    }else{
        validReg = false;
        // getElement('eleRegPass').className = 'error';
		
		getElement('errRegPass').style.display = "block";
        getElement('errRegPass').innerHTML = 'Invalid Password!';
    }
    //Check confirmation password
    if(isSame('regpass','confpass')){
        // getElement('eleConfPass').className = '';
		
		getElement('errConfPass').style.display = "none";
        getElement('errConfPass').innerHTML = '';
    }else{
        validReg = false;
        // getElement('eleConfPass').className = 'error';
		
		getElement('errConfPass').style.display = "block";
        getElement('errConfPass').innerHTML = 'Passwords does not match!';
    }
    //Check first name
    if(isNameValid('fname')){
        // getElement('eleFname').className = '';
		
		getElement('errName').style.display = "none";
        getElement('errName').innerHTML = '';
    }else{
        validReg = false;
        // getElement('eleFname').className = 'error';
		
		getElement('errName').style.display = "block";
        getElement('errName').innerHTML = 'Name must be alphabetic!';
    }
    //Check last name, edits the same error since 
    if(isNameValid('lname')){
        // getElement('errName').className = '';
		
		getElement('errName').style.display = "none";
        getElement('errName').innerHTML = '';
    }else{
        validReg = false;
        // getElement('errName').className = 'error';
		
		getElement('errName').style.display = "block";
        getElement('errName').innerHTML = 'Name must be alphabetic!';
    }
	if(!validReg){
		getElement('regError').style.display = "block";
	}
    return validReg;
}
/*













//Validates name field(either one)
function validateName(id){
    var element = getElement(id);
    var patt = /^[a-zA-Z-]{1,}$/; //Pattern that allows any letter or dash in name
    if(!patt.test(element.value)){
        highlight(element);
        errorMsg("Name cannot contain special characters", element, element.parentNode, id + 'Error');
    } else {
        var nameError = getElement(id + 'Error');
        if(nameError != null){
            nameError.parentNode.removeChild(nameError);
        }
        validHighlight(element);
    }
}
//Validates username registration field
function validateUser(id){
    //Gets string for new user name
    var element = getElement(id);
    //Username must be alphanumeric and at 4-15 characters long
    var patt = /^\w{4,15}$/;
    if(patt.test(element.value) || (element.value).length < 4 || (element.value).length > 15){
        highlight(element);
        errorMsg("Invalid user name.", element, element.parentNode,id + 'Error');
    }else{
        var userError = getElement(id + 'Error');
        if(userError != null){
            userError.parentNode.removeChild(userError);
        }
        validHighlight(element);
    }
	document.getElementById("usernameRuleDisplay").style.display = "none";
}
//Validates password registration field
function validatePass(id){
    //Gets string for password
    var pass = getElement(id).value;

    //Password must contain uppercase letter, lowercase letter and a number
    var testUpper = /[A-Z]/;
    var testLower = /[a-z]/;
    var testNum = /[0-9]/;

    //Test patterns, if all pass, input categorized as valid.
    if(!testUpper.test(pass) || !testLower.test(pass) || !testNum.test(pass) || (pass).length < 4 || (pass).length > 15){
        highlight(getElement(id));
        
        errorMsg("Invalid Password.", getElement(id), getElement(id).parentNode, id+'Error');
    } else {
        var passError = $(id+'Error');
        if(passError != null){
            passError.parentNode.removeChild(passError);
        }
        validHighlight(getElement(id));
    }
	document.getElementsByClassName("passwordRuleDisplay")[0].style.display = "none";
	document.getElementsByClassName("passwordRuleDisplay")[1].style.display = "none";
}
//Validates email registration field
function validateEmail(id){
    var email = getElement(id).value;
    /*
    pattern matches to format:
    [any alphanumeric characters including underscore]@[any domain].[toplevel domain(min 2 char)]
    */
/*
    var patt = /[\w_]+@.*\.[a-zA-Z]{2,}/;
    if(!patt.test(email)){
        highlight(getElement(id));
        errorMsg("Invalid email!", getElement(id), getElement(id).parentNode, 'emailError');
    }else{
        var emailError = getElement('emailError');
        //Removes error message if present
        if(emailError != null){
            emailError.parentNode.removeChild(emailError);
        }
        validHighlight(getElement(id));
    }
}
//Confirms if two input fields are the same
function confirmInput(original, confirmer){
    var conf = getElement(confirmer);
    if(getElement(original).value != conf.value || conf.value.length == 0){
        highlight(conf);
        errorMsg("Does not match!", conf, conf.parentNode, 'error' + original);
    } else {
        var confirm = getElement('error' + original);
        if(confirm != null){
            confirm.parentNode.removeChild(confirm);
        }
        validHighlight(conf);
    }
}

//Shows username rules
function showUsernameRule() {
	document.getElementById("usernameRuleDisplay").style.display = "initial";
}

//Show password rules
function showPasswordRule() {
	document.getElementsByClassName("passwordRuleDisplay")[0].style.display = "initial";
	document.getElementsByClassName("passwordRuleDisplay")[1].style.display = "initial";
}
*/