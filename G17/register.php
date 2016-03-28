<?php
	//Start session
	session_start();
	
	//Include database connection details
	require_once('config.php');

	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
	//Connect to mysql server
	$link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
	if(!$link) {
		die('Failed to connect to server: ' . mysql_error());
	}
	
	//Select database
	$db = mysql_select_db(DB_DATABASE);
	if(!$db) {
		die("Unable to select database");
	}
	
	//Function to sanitize values received from the form. Prevents SQL injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}
	
	//Sanitize the POST values
	$fname = clean($_POST['fname']);
	$lname = clean($_POST['lname']);
	$login = clean($_POST['login']);
	$password = clean($_POST['password']);
	$cpassword = clean($_POST['cpassword']);
	
    //Regex strings to match to
    $namePatt = '/^[a-zA-Z-]{1,}$/'; // One or more characters of the alphabet or '-' is allowed
    $loginPatt = '/^[\w]{4,15}$/'; // 4-15 alpha numeric characters
    $passPatt = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{3,}/'; //(?=PATTERN) means look ahead in the string for the pattern, don't move pointer
    //pass must contain 1 lowercase letter, 1 uppercase letter and one number

	//Input Validations
    //Check if fields are empty
	if($fname == '') {
		$errmsg_arr[] = 'First name missing';
		$errflag = true;
	}
	if($lname == '') {
		$errmsg_arr[] = 'Last name missing';
		$errflag = true;
	}
	if($login == '') {
		$errmsg_arr[] = 'Login ID missing';
		$errflag = true;
	}
	if($password == '') {
		$errmsg_arr[] = 'Password missing';
		$errflag = true;
	}
    //Compare $cpassword with $password
	if($cpassword == '' || $cpassword != $password) {
		$errmsg_arr[] = 'Confirm password did not match password';
		$errflag = true;
	}
	if( strcmp($password, $cpassword) != 0 ) {
		$errmsg_arr[] = 'Passwords do not match';
		$errflag = true;
	}
	//Check if fields meet requirements
    //First name and last name generate same error message.
    if(!preg_match($namePatt,$fname) || !preg_match($namePatt,$lname)){
        $errmsg_arr[] = 'Name cannot contain numbers or special characters other than \'-\'.';
        $errflag = true;
    }
    //Check $password if it meets requirements
    if(!preg_match($passPatt,$password)){
        $errmsg_arr[] = 'Password must contain two letters<br>(Upper case AND lower case) and one number and is at least 3 characters long.';
        $errflag = true;
    }
    //Check if $login meets requirements
    if(!preg_match($loginPatt,$login)){
        $errmsg_arr[] = 'Login can only have alphanumeric characters(a-z and 0-9).';
        $errflag = true;
    }
	//Check for duplicate login ID
	if($login != '') {
		$qry = "SELECT * FROM members WHERE login='$login'";
		$result = mysql_query($qry);
		if($result) {
			if(mysql_num_rows($result) > 0) {
				$errmsg_arr[] = 'Login ID already in use';
				$errflag = true;
			}
			@mysql_free_result($result);
		}
		else {
			die("Query failed");
		}
	}
	
	//If there are input validations, redirect back to the registration form
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: register_form.php");
		exit();
	}

	//Create INSERT query
	$qry = "INSERT INTO members(firstname, lastname, login, passwd) VALUES('$fname','$lname','$login','".md5($_POST['password'])."')";
	$result = @mysql_query($qry);
	
	//Check whether the query was successful or not
	if($result) {
		header("location: login.php?login=".$login."&password=".$password);
		exit();
	}else {
		die("Query failed");
	}
?>
