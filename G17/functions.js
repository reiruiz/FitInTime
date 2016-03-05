
function $(id){
    var element = document.getElementById(id);
    if(element == null){
        alert("Error at the programming level");
    }
    return element;
}
/* function being tested
function errorMsg(msg, childId, parentId){
    var error = document.createElement("p");
    var text = document.createTextNode(msg);
    error.appendChild(text);
    parentId.insertBefore(error,childId);
}*/
function validateNewUser(id){
    //Gets string for new user name
    var element = $(id);
    //Username must be alphanumeric
    var patt = /\W/;
    if(patt.test(element.value)){
        element.style.backgroundColor = "Pink";
        element.style.border = "1px solid red";
        //errorMsg("Invalid user name.", element, element.parentNode);
    }
}
function validateNewPass(id){
    //Gets string for password
    var pass = $(id).value;
    //Builds a string containing what user is missing in password
    var errorString = "";
    //Password must contain uppercase letter, lowercase letter and a number
    var testUpper = /[A-Z]/;
    var testLower = /[a-z]/;
    var testNum = /[0-9]/;
    if (!testUpper.test(pass)) {
        errorString += "Password must contain an upper case letter.\n";
    }
    if(!testLower.test(pass)) {
        errorString +="Password must contain a lower case letter.\n";
    }
    if(!testNum.test(pass)) {
        errorString += "Password must contain a number.\n";
    }
    if(errorString.length > 0) {
        alert(errorString);
    }
}

function validateEmail(id){
    var email = $(id).value;
    /*
    pattern matches to format:
    [any alphanumeric characters including underscore]@[any domain].[toplevel domain(min 2 char)]
    */
    var patt = /[\w_]*@.*\.\a{2,}/;
    if(!patt.test(email)){
        alert("Invalid email");
    }
}

function confirmInput(original, confirmer){
    if($(original).value != $(confirmer).value){
        alert("Original does not match confirmation.");
    }
}
