<?php
	include 'functions.php';
	require_once('config.php');
	session_start();

	// Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect, error: ".mysql_error());
	mysql_select_db(DB_DATABASE)or die("cannot select DB, error: ".mysql_error());
	$tbl_name="topic"; // Table name
?>
<!--Comment to test commit-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="./styleSheet/base.css">
        <script src="functions.js"></script>

        <!-- SMOOTH SCROLL -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>
            $(function() {
              $('a[href*=#]:not([href=#])').click(function() {
                if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
                  var target = $(this.hash);
                  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
                  if (target.length) {
                    $('html,body').animate({
                      scrollTop: target.offset().top
                    }, 1750);
                    return false;
                  }
                }
              });
            });
        </script>
        <!-- End of SMOOTH SCROLL -->
        <meta charset="utf-8" />
        <title>Register</title>
    </head>
    <body>
        <div id="header">
            <div class="menu" style="background-color: #888888">
                <a href="index.php">FitInTime</a>
            </div>
            <div class="menu">
                <a href="index.php#nutrition">Nutrition</a>
            </div>
            <div class="menu">
                <a href="index.php#recipe">Recipes</a>
                <ul class="dropdown">
                    <li><a href="./nutrition/minute15.php">15 Minutes</a>
                    <li><a href="./nutrition/minute30.php">30 Minutes</a>
                    <li><a href="./nutrition/minute60.php">60 Minutes</a></li>
                </ul>
            </div>
            <div class="menu">
                <a href="index.php#fitness">Fitness</a>
            </div>
            <div class="menu">
                <a href="index.php#exercise">Exercises</a>
                <ul class="dropdown">
                    <li><a href="./exercise/minute15.php">15 Minutes</a>
                    <li><a href="./exercise/minute30.php">30 Minutes</a>
                    <li><a href="./exercise/minute60.php">60 Minutes</a></li>
                </ul>
            </div>
            <div class="menu">
                <a href="./forum.php">Forum</a>
            </div>

            <div class="print">
                <script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 0;var pfHideImages = 1;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if ('https:' === document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF"><img style="padding-right: 10px; margin-top: 10px; border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/button-print-gry20.png" alt="Print Friendly and PDF"/></a>
            </div>
            <div id="registerNav">
			<?php
				if (isLoggedIn()){
					echo '<a href="logout.php">Welcome, '.$_SESSION['SESS_LOGIN'].' (Logout)</a><br/>';
				} else {
					echo '<a href="register_form.php">Register / Sign in</a>';
				}
			?>
            </div>
        </div>



        <div id="register">
            <div id="registerBox">
                <div id="inputBoxes">
                   

                    <h2 id="inputText">
                            Sign in!
                    </h2>
                    <form id="loginForm" name="loginForm" method="post" action="login.php" onsubmit="return submitLoginForm()">
                        <!-- Error message is generated in the div but above the table.-->
                        <?php
	                        if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		                        echo '<ul class="err">';
		                        foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			                        echo '<li>',$msg,'</li>'; 
		                        }
		                        echo '</ul>';
		                        unset($_SESSION['ERRMSG_ARR']);
	                        }
                        ?>
						<ul id="loginError" class="err">
							<li id="errLoginUser"></li>
							<li id="errLoginPass"></li>
						</ul>
                        <table id="signin">
							<tr>
								<th>
									<label for="loginUser">Username:</label>
								</th>
								<td>
									<input type="text" name="login" id="loginUser">
								</td>
							</tr>
							<tr>
								<th>
									<label for="loginPass">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:</label>
								</th>
								<td>
									<input type="password" name="password" id="loginPass">
								</td>
							</tr>
                            <tr>
                                <th></th>
                                <td>
                                    <input type="submit" name="submitinfo" id="submit" value="Sign in" style="margin-bottom: 20px">
                                </td>
                            </tr>
                        </table>
                    </form>
                    <h1 id="inputText">
                        Register today!
                    </h1>
                        <form id="registerForm" name="registerForm" method="post" action="register.php" onsubmit="return submitRegForm()">
                        <!-- Error message is generated in the div but above the table.-->
                        <?php
	                        if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		                        echo '<ul class="err">';
		                        foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			                        echo '<li>',$msg,'</li>'; 
		                        }
		                        echo '</ul>';
		                        unset($_SESSION['ERRMSG_ARR']);
	                        }
                        ?>
						<ul id="regError" class="err">
							<li id="errRegUser"></li>
							<li id="errRegPass"></li>
							<li id="errConfPass"></li>
							<li id="errName"></li>
						</ul>
                        <table>
                            <tr></tr>
							<tr>
								<th>
									<label for="reguser">Username:</label>
								</th>
								<td>
									<input type="text" name="login" id="reguser" required>
								</td>
							</tr>
							
                            <tr>
                                <th>
                                </th>
                                <td>
                                    <p>Must be 4-15 characters long<br>and have no special characters</p>
                                </td>
                            </tr>
							<tr>
								<th>
									<label for="regpass">Password:</label>
									<br>
								</th>
								<td>
									<input type="password" name="password" id="regpass" required>
								</td>
							</tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    <p>Must contain</p>
                                    <ul style="margin-left: 20px;">
                                        <li>One upper case character</li>
                                        <li>One lower case character</li>
                                        <li>One number</li>
										<li>Minimum 5 characters</li>
                                    </ul>
                                </td>
                            </tr>
							<tr>
								<th>
									<label for="confpass">Confirm Password:</label>
								</th>
								<td>
									<input type="password" name="cpassword" id="confpass" required>
								</td>
							</tr>
							<tr>
								<th>
									<label for="fname">First Name:</label>
								</th>
								<td>
									<input type="text" name="fname" id="fname"required>
								</td>
							</tr>
							<tr>
								<th>
									<label for="lname">Last Name:</label>
								</th>
								<td>
									<input type="text" name="lname" id="lname"required>
								</td>
							</tr>
                            <!-- Original php doesn't ask for email so im commenting this out //Chris-->
                            <!--
                            <tr>
                                <th>
                                    <label for="regemail">Email:</label>
                                </th>
                                <td>
                                    <input type="text" name="regemail" id="regemail" onblur="validateEmail('regemail')" required>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="confemail">Confirm Email:</label>
                                </th>
                                <td>
                                    <input type="text" name="confemail" id="confemail" onblur="confirmInput('regemail','confemail')" required>
                                </td>
                            </tr>
                            -->
                            <tr>
                                <th></th>
                                <td>
                                    <input type="submit" name="submit" id="submit" value="Register">
                                </td>
                            </tr>
                        </table>
                    </form>
                    
                </div>
            </div>
        </div>
        <div id="backToTop">
            <a href="#fitInTime"><img src="./images/up-arrow.svg" alt="upwardArrow" width="50" height="50"></a>
        </div>
        <div id="footer">
            <table id="footerTable">
                <tr>
                    <th>
						    About Us
                    </th>
                    <th>
						    Recipes
                    </th>
                    <th>
						    Exercises
                    </th>
                    <th>
						    Profile
                    </th>
                </tr>
                <tr>
                    <td>
						<a href="#fitInTime">Home<a>
                    </td>
                    <td>
                        <a href="./nutrition/minute15.php">15 minutes</a>
                    </td>
                    <td>
                        <a href="./exercise/minute15.php">15 Minutes</a>
                    </td>
                    <td>
						<a href="./register_form.php">Sign In</a>
                    </td>
                </tr>
                <tr>
                    <td>
						<a href="./index.php#nutrition">Nutrition</a>
                    </td>
                    <td>
                        <a href="./nutrition/minute30.php">30 minutes</a>
                    </td>
                    <td>
                        <a href="./exercise/minute30.php">30 Minutes</a>
                    </td>
                    <td>
                        <a href="./register_form.php">Register</a>
                    </td>
                </tr>
                <tr>
                    <td>
						<a href="./index.php#fitness">Fitness</a>
                    </td>
                    <td>
                        <a href="./nutrition/minute60.php">60 minutes</a>
                    </td>
                    <td>
                        <a href="./exercise/minute60.php">60 Minutes</a>
                    </td>
					<td>
						<a href="./forum.php">Forum</a>
					</td>
                </tr>
            </table>
            

            <p>Copyright but not really <a href="./images/mandom.png">&copy;</a></p>
        </div>
    </body>
</html>