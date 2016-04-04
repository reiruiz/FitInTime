//Shortcut to getting elements
function $(id){
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

//Creates error message for invalid fields
function errorMsg(msg, childId, parentId, errorId){
    //Checks to see if the error id being created is already present
    if($(errorId) == null){
        //creates new paragraph tag and inserts it before input field
        var error = document.createElement("p");
        var text = document.createTextNode(msg);
        error.appendChild(text);
        error.style.color = "red";
        error.id = errorId;
        parentId.insertBefore(error,childId);
    }
}
//Validates username registration field
function validateNewUser(id){
    //Gets string for new user name
    var element = $(id);
    //Username must be alphanumeric
    var patt = /\W/;
    if(patt.test(element.value)){
        highlight(element);
        errorMsg("Invalid user name.", element, element.parentNode,'userError');
    }else{
        var userError = $('userError');
        if(userError != null){
            userError.parentNode.removeChild(userError);
        }
        validHighlight(element);
    }
}
//Validates password registration field
function validateNewPass(id){
    //Gets string for password
    var pass = $(id).value;

    //Password must contain uppercase letter, lowercase letter and a number
    var testUpper = /[A-Z]/;
    var testLower = /[a-z]/;
    var testNum = /[0-9]/;

    //Test patterns, if all pass, input categorized as valid.
    if(!testUpper.test(pass) || !testLower.test(pass) || !testNum.test(pass)){
        highlight($(id));
        errorMsg("Password must contain one uppercase and lowercase letter and one number."
                    , $(id), $(id).parentNode, 'passError');
    } else {
        var passError = $('passError');
        if(passError != null){
            passError.parentNode.removeChild(passError);
        }
        validHighlight($(id));
    }
}
//Validates email registration field
function validateEmail(id){
    var email = $(id).value;
    /*
    pattern matches to format:
    [any alphanumeric characters including underscore]@[any domain].[toplevel domain(min 2 char)]
    */
    var patt = /[\w_]+@.*\.[a-zA-Z]{2,}/;
    if(!patt.test(email)){
        highlight($(id));
        errorMsg("Invalid email!", $(id), $(id).parentNode, 'emailError');
    }else{
        var emailError = $('emailError');
        //Removes error message if present
        if(emailError != null){
            emailError.parentNode.removeChild(emailError);
        }
        validHighlight($(id));
    }
}
//Confirms if two input fields are the same
function confirmInput(original, confirmer){
    var conf = $(confirmer);
    if($(original).value != conf.value){
        highlight(conf);
        errorMsg("Does not match!", conf, conf.parentNode, 'error' + original);
    } else {
        var confirm = $('error' + original);
        if(confirm != null){
            confirm.parentNode.removeChild(confirm);
        }
        validHighlight(conf);
    }
}
