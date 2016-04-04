<?php
	include 'functions.php';
	require_once('config.php');
	session_start();

	// Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect, error: ".mysql_error());
	mysql_select_db(DB_DATABASE)or die("cannot select DB, error: ".mysql_error());
	$tbl_name="topic"; // Table name
?>

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
        <title>FitInTime</title>
    </head>
    <body>
        <div id="header">
            <div class="menu" style="background-color: #888888">
                <a href="#fitInTime">FitInTime</a>
            </div>
            <div class="menu">
                <a href="#nutrition">Nutrition</a>
            </div>
            <div class="menu">
                <a href="#recipe">Recipes</a>
                <ul class="dropdown">
                    <li><a href="./nutrition/minute15.php">15 Minutes</a>
                    <li><a href="./nutrition/minute30.php">30 Minutes</a>
                    <li><a href="./nutrition/minute60.php">60 Minutes</a></li>
                </ul>
            </div>
            <div class="menu">
                <a href="#fitness">Fitness</a>
            </div>
            <div class="menu">
                <a href="#exercise">Exercises</a>
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

        <div id="fitInTime">

            <div id="logo">
                <h1>Get FitInTime</h1>
                <p>Whether you've got 15 minutes or 60 minutes,
                    we at FITINTIME will provide the resources you'll need to get fit in time!</p>
                <p>Click below to get started!</p>
                <p id="miniNav">
                    <a href="#nutrition">Nutrition</a> / <a href="#fitness">Fitness</a>
                </p>
            </div>

        </div>

        <div id="nutrition">
            <div class="introduction">
                <h1>Nutrition</h1>
                <p>
                Eating healthy is easier said than done. Things are made harder when fast food is right around the
                corner and buying a burger beats making your own meal. We at FitInTime hope to change that!
                Below are recipes that you can make in whatever time you have available, whether that is in 15, 30,
                or 60 minutes.
                </p>
                <p>So click below</p>
                <a href="#recipe">Get Healthy</a>
            </div>
        </div>

        <div id="recipe">
            <div class="imageLink">

                <a href="./nutrition/minute15.php">
                    <p>15 Min</p>
                    <img src="./images/15min.jpg" alt="recipes15">
                </a>
            </div>
            <div class="imageLink">
                <a href="./nutrition/minute30.php">
                    <p>30 Min</p>
                    <img src="./images/30min.jpg" alt="recipes30">
                </a>
            </div>
            <div class="imageLink">
                <a href="./nutrition/minute60.php">
                    <p>60 Min</p>
                    <img src="./images/60min.jpg" alt="recipes60">
                </a>
            </div>
        </div>

        <div id="fitness">
            <div class="introduction">
                <h1>Fitness</h1>
                <p>
                    Getting up and getting active is tough, especially with how busy you
                    can get. However, we at FitInTime will provide you with the tools and resources that you will
                    need so that you can fit in a workout with whatever time you have! Below are
                    several workout plans that you can complete in 15, 30, or 60 minutes.
                </p>
                <p>So click below to</p>
                <a href="#exercise">Get Fit</a>
            </div>
        </div>

        <div id="exercise">
            <div class="imageLink">
                <a href="./exercise/minute15.php">
                    <p>15 min</p>
                    <img src="./images/15ex.jpg" alt="exercise15">
                </a>
            </div>
            <div class="imageLink">
                <a href="./exercise/minute30.php">
                    <p>30 Min</p>
                    <img src="./images/30ex.jpg" alt="exercise30">
                </a>
            </div>
            <div class="imageLink">
                <a href="./exercise/minute60.php">
                    <p>60 Min</p>
                    <img src="./images/60ex.jpg" alt="exercise60">
                </a>
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
						<a href="#nutrition">Nutrition</a>
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
						<a href="#fitness">Fitness</a>
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