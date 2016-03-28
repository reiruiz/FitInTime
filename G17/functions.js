//Shortcut to getting elements
function getElement(id){
    var element = document.getElementById(id);
    return element;
}
//Highlights element as invalid
function highlight(element){
    element.style.backgroundColor = "pink";
    element.style.border = "2px solid red";
}
//Highlights element as valid
function validHighlight(element){
    element.style.backgroundColor = "#99ff99";
    element.style.border = "2px solid #339900";
}
//Insert new node after
function insertAfter(insertNode, refNode){
    
    refNode.parentNode.insertBefore(insertNode, refNode.nextSibling);
}

//Creates error message for invalid fields
function errorMsg(msg, childId, parentId, errorId){
    //Checks to see if the error id being created is already present
    if(getElement(errorId) == null){
        //creates new paragraph tag and inserts it before input field
        var error = document.createElement("p");
        var text = document.createTextNode(msg);
        error.appendChild(text);
        error.style.color = "red";
        error.id = errorId;
        insertAfter(error,childId);
    }
}
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
    var patt = /^\W{4,15}$/;
    if(patt.test(element.value) || (element.value).length < 4 || (element.value).length > 15){
        highlight(element);
        errorMsg("Invalid user name.", element, element.parentNode,'userError');
    }else{
        var userError = getElement('userError');
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
        
        errorMsg("Invalid Password.", getElement(id), getElement(id).parentNode, 'passError');
    } else {
        var passError = $('passError');
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