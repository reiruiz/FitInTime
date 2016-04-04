<?php
	include '../functions.php';
	require_once('../config.php');
	session_start();

	// Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect, error: ".mysql_error());
	mysql_select_db(DB_DATABASE)or die("cannot select DB, error: ".mysql_error());
	$tbl_name="topic"; // Table name
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="stylesheet" href="../styleSheet/base.css">
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
        <title>30 Minute Exercises</title>
    </head>
    <body>
        <div id="header">
            <div class="menu">
                <a href="../index.php#fitInTime">FitInTime</a>
            </div>
            <div class="menu">
                <a href="../index.php#nutrition">Nutrition</a>
            </div>
            <div class="menu">
                <a href="../index.php#recipe">Recipes</a>
                <ul class="dropdown">
                    <li><a href="../nutrition/minute15.php">15 Minutes</a>
                    <li><a href="../nutrition/minute30.php">30 Minutes</a>
                    <li><a href="../nutrition/minute60.php">60 Minutes</a></li>
                </ul>
            </div>
            <div class="menu">
                <a href="../index.php#fitness">Fitness</a>
            </div>
            <div class="menu">
                <a href="../index.php#exercise" style="background-color: #888888">Exercises</a>
                <ul class="dropdown">
                    <li><a href="../exercise/minute15.php">15 Minutes</a>
                    <li><a href="../exercise/minute30.php">30 Minutes</a>
                    <li><a href="../exercise/minute60.php">60 Minutes</a></li>
                </ul>
            </div>
            <div class="menu">
                <a href="../forum.php">Forum</a>
            </div>

            <div class="print">
                <script>var pfHeaderImgUrl = '';var pfHeaderTagline = '';var pfdisableClickToDel = 0;var pfHideImages = 1;var pfImageDisplayStyle = 'right';var pfDisablePDF = 0;var pfDisableEmail = 0;var pfDisablePrint = 0;var pfCustomCSS = '';var pfBtVersion='1';(function(){var js, pf;pf = document.createElement('script');pf.type = 'text/javascript';if ('https:' === document.location.protocol){js='https://pf-cdn.printfriendly.com/ssl/main.js'}else{js='http://cdn.printfriendly.com/printfriendly.js'}pf.src=js;document.getElementsByTagName('head')[0].appendChild(pf)})();</script><a href="http://www.printfriendly.com" style="color:#6D9F00;text-decoration:none;" class="printfriendly" onclick="window.print();return false;" title="Printer Friendly and PDF"><img style="padding-right: 10px; margin-top: 10px; border:none;-webkit-box-shadow:none;box-shadow:none;" src="http://cdn.printfriendly.com/button-print-gry20.png" alt="Print Friendly and PDF"/></a>
            </div>
            <div id="registerNav">
			<?php
				if (isLoggedIn()){
					echo '<a href="../logout.php">Welcome, '.$_SESSION['SESS_LOGIN'].' (Logout)</a><br/>';
				} else {
					echo '<a href="../register_form.php">Register / Sign in</a>';
				}
			?>
            </div>
        </div>

<!--         <div id="fitness">
            <div class="introduction">
                <h1>30 Minutes</h1>
                <p>
                HIIT (High Intensity Interval Training) exercises, are a great way to maximize insufficient time in order to burn fat!
                We at FitinTime feel that 30 minutes is enough to complete one HIIT exercises, and thus have provided you with 3 separate
                HIIT exercises that you can complete on a bike, a treadmill, and a row machine, within 30 minutes.
                </p>
                <p>Click below to</p>
                <a href="#exercise">Get Fit</a>
            </div>
        </div> -->

        <div id="exercise">
            <div class="imageLink">
                <a href="#thirty4"><img src="../images/exercise/30Exercise/biking.jpg" alt="biking"></a>
            </div>
            <div class="imageLink">
                <a href="#thirty5"><img src="../images/exercise/30Exercise/treadmill.jpg" alt="treadmill"></a>
            </div>
            <div class="imageLink">
                <a href="#thirty6"><img src="../images/exercise/30Exercise/row.jpg" alt="row"></a>
            </div>
        </div>

        <div id="thirty4">
            <div class="information" style="margin-top: 200px">
                <h1>Hiit the Bike</h1>
                <p>
                    Instructions
                </p>
                <ol>
                    <li>Warm up by cycling at a low resistance between 70-80 rpm for three minutes
                    <li>Immediately increase your rpm to above 90
                    <li>Increase the resistance by one level while maintaining an rpm above 90 every 30 seoconds
                    <li>Continue until you can no longer hold the rpm above 90, and rest for three minutes
                    <li>Repeat for the desired number of sets</li>
                </ol>
                <p>
                    Number of Sets
                </p>
                <ul>
                    <li>Beginners: one
                    <li>Intermediate: two
                    <li>Advanced: three</li>
                </ul>
            </div>
        </div>

        <div id="thirty5">
            <div class="information" style="margin-top: 200px">
                <h1>Hiit the Treadmill</h1>
                <p>
                    Instructions
                </p>
                <ol>
                    <li>For three minutes, warm up by jogging (a recommended pace of at least 10 km/h)
                    <li>After three minutes, increase the incline by 10%
                    <li>Continue running, then jump off the treadmill and rest for 30 seconds
                    <li>Before continuining, increase the speed by at least 5 km/h
                    <li>Continue running for 30 seconds until you can no longer complete a 30-second set
                    <li>Repeat for desired number of sets</li>
                </ol>
                <p>
                    Number of Sets
                </p>
                <ul>
                    <li>Beginners: one
                    <li>Intermediate: two
                    <li>Advanced: three</li>
                </ul>
            </div>
        </div>

        <div id="thirty6">
            <div class="information" style="margin-top: 175px">
                <h1>Hiit the Rowing Machine</h1>
                <p>
                    Instructions
                </p>
                <ol>
                    <li>Set the screen such that it displays the number of calories, and if possible the time elapsed
                    <li>Warm up for at least 3 minutes by rowing at a comfortable pace
                    <li>After three minutes, increase the intensity of rowing by rowing using maximum effort
                    <li>Try to burn as many calories as possible within 60 seconds
                    <li>Reduce your intensity after 60 seconds and row comfortably for another 60 seconds before continuing another 60-second set
                    <li>Repeat for the desired number of sets</li>
                </ol>
                <p>
                    Number of Sets
                </p>
                <ul>
                    <li>Beginners: three
                    <li>Intermediate: six
                    <li>Advanced: ten</li>
                </ul>
            </div>
        </div>

        <div id="backToTop">
            <a href="#exercise"><img src="../images/up-arrow.svg" alt="upwardArrow" width="50" height="50"></a>
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
						<a href="../index.php">Home</a>
                    </td>
                    <td>
                        <a href="../nutrition/minute30.php">15 minutes</a>
                    </td>
                    <td>
                        <a href="#exercise">15 Minutes</a>
                    </td>
                    <td>
                        <a href="../register_form.php">Sign In</a>
                    </td>
                </tr>
                <tr>
                    <td>
						<a href="../index.php#nutrition">Nutrition</a>
                    </td>
                    <td>
                        <a href="../nutrition/minute30.php">30 minutes</a>
                    </td>
                    <td>
                        <a href="../exercise/minute30.php">30 Minutes</a>
                    </td>
                    <td>
                        <a href="../register_form.php">Register</a>
                    </td>
                </tr>
                <tr>
                    <td>
						<a href="../index.php#fitness">Fitness</a>
                    </td>
                    <td>
                        <a href="../nutrition/minute60.php">60 minutes</a>
                    </td>
                    <td>
                        <a href="../exercise/minute60.php">60 Minutes</a>
                    </td>
					<td>
						<a href="../forum.php">Forum</a>
					</td>
                </tr>
            </table>
            <p>Copyright but not really <a href="./images/mandom.png">&copy;</a></p>
        </div>
    </body>
</html>