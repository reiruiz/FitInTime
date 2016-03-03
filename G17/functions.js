function validateNewUser(){
    //Gets string for new user name
    var user = document.getElementById("regusername").value;
    //Test pattern for user
    var patt = /\W/;
    if(patt.test(user)){
        alert("Invalid new username");
    }
}
function validateNewPass(){
    //Gets string for password
    var pass = document.getElementById("regpassword").value;
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