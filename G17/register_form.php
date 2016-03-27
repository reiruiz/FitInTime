<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="./styleSheet/base.css">
        <!--<script src="functions.js"></script>-->

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
        <title>FitInTime</title>
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
                    <li><a href="./nutrition/minute15.html">15 Minutes</a>
                    <li><a href="./nutrition/minute30.html">30 Minutes</a>
                    <li><a href="./nutrition/minute60.html">60 Minutes</a></li>
                </ul>
            </div>
            <div class="menu">
                <a href="index.php#fitness">Fitness</a>
            </div>
            <div class="menu">
                <a href="index.php#exercise">Exercises</a>
                <ul class="dropdown">
                    <li><a href="./exercise/minute15.html">15 Minutes</a>
                    <li><a href="./exercise/minute30.html">30 Minutes</a>
                    <li><a href="./exercise/minute60.html">60 Minutes</a></li>
                </ul>
            </div>
            <div class="menu">
                <a href="./forum.php">Forum</a>
            </div>

            <div class="profile">
                <a href="#"><img src="./images/user.png" width="40" height="40" alt="user"></a>
            </div>
            <div id="registerNav">
			<?php
				if (isLoggedIn()){
					echo '<a href="logout.php">Welcome! Logout?</a><br/>';
				} else {
					echo '<a href="register_form.php">Register / Sign in</a>';
				}
			?>
            </div>
        </div>



        <div id="register">
            <div id="registerBox">
                <div id="inputBoxes">
                    <h1 id="inputText">
                           Register today!
                    </h1>
                    <form id="registerForm" name="registerForm" method="post" action="register.php">
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
                        <table>
                            <tr></tr>
                            <tr>
                                <th>
                                    <label for="reguser">Username:</label>
                                </th>
                                <td>
                                    <input type="text" name="login" id="reguser" onblur="validateUser('reguser')" onfocus="showUsernameRule()" required>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    <p id="usernameRuleDisplay">Must be 4-15 characters long<br>and have no special characters</p>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="regpass">Password:</label>
                                    <br>
                                </th>
                                <td>
                                    <input type="password" name="password" id="regpass" onblur="validatePass('regpass')" onfocus="showPasswordRule()" required>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                </th>
                                <td>
                                    <p class="passwordRuleDisplay">Must contain</p>
                                    <ul class="passwordRuleDisplay" style="margin-left: 20px;">
                                        <li>One uppercase character</li>
                                        <li>One lowercase character</li>
                                        <li>One number</li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="confpass">Confirm Password:</label>
                                </th>
                                <td>
                                    <input type="password" name="cpassword" id="confpass" onblur="confirmInput('regpass','confpass')" required>
                                </td>
                            </tr>
                            <!-- need to add js validation for first name and last name-->
                            <tr>
                                <th>
                                    <label for="fname">First Name:</label>
                                </th>
                                <td>
                                    <input type="text" name="fname" id="fname" required>
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="fname">Last Name:</label>
                                </th>
                                <td>
                                    <input type="text" name="lname" id="lname" required>
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
                                <th>
                                    <input type="submit" name="submit" id="submit" value="Register">
                                </th>
                            </tr>
                        </table>
                    </form>

                    <h2 id="inputText">
                            Sign in!
                    </h2>
                    <form id="loginForm" name="loginForm" method="post" action="login.php">
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
                        <table id="signin">
                            <tr>
                                <th>
                                    <label for="loginUser">Username:</label>
                                </th>
                                <td>
                                    <input type="text" name="login" id="loginUser" onblur="validateUser('signuser')">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <label for="loginPass">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Password:</label>
                                </th>
                                <td>
                                    <input type="password" name="password" id="loginPass" onblur="validatePass('signpass')">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    <input type="submit" name="submitinfo" id="submit" value="Sign in" style="margin-bottom: 20px">
                                </th>
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
						    Sup
                    </td>
                    <td>
                        <a href="./nutrition/minute15.html">15 minutes</a>
                    </td>
                    <td>
                        <a href="./exercise/minute15.html">15 Minutes</a>
                    </td>
                    <td>
						    Sign In
                    </td>
                </tr>
                <tr>
                    <td>
						    Sup
                    </td>
                    <td>
                        <a href="./nutrition/minute30.html">30 minutes</a>
                    </td>
                    <td>
                        <a href="./exercise/minute30.html">30 Minutes</a>
                    </td>
                    <td>
                        <a href="./index.php#register">Register</a>
                    </td>
                </tr>
                <tr>
                    <td>
                    </td>
                    <td>
                        <a href="./nutrition/minute60.html">60 minutes</a>
                    </td>
                    <td>
                        <a href="./exercise/minute60.html">60 Minutes</a>
                    </td>
                </tr>
            </table>
            

            <p>Copyright but not really <a href="./images/mandom.png">&copy;</a></p>
        </div>
    </body>
</html>