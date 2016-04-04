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
        <title>60 Minute Exercises</title>
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
                <h1>60 Minutes</h1>
                <p>
                If you have a lot of time, and access to a gym, try our own 60 minute workout!
                Below you'll find an personalized workout aimed to strengthen your arms, chest, and back
                that you should be able to complete within an hour. Remember to stretch and raise your
                heart rate prior to starting your workout by doing a quick jog or cardio exercise!
                </p>
                <p>Click below to</p>
                <a href="#exercise">Get Fit</a>
            </div>
        </div> -->

        <div id="exercise">
            <div class="imageLink">
                <a href="#sixty4"><img src="../images/exercise/60Exercise/arms.jpg" alt="arms"></a>
            </div>
            <div class="imageLink">
                <a href="#sixty5"><img src="../images/exercise/60Exercise/chest.jpg" alt="chest"></a>
            </div>
            <div class="imageLink">
                <a href="#sixty6"><img src="../images/exercise/60Exercise/back.jpg" alt="back"></a>
            </div>
        </div>

        <div id="sixty4">
            <div class="information" style="margin-top: 175px">
                <h1>Arms</h1>
                <p>
                    Incline Bicep Curl
                </p>
                <ol>
                    <li>Grab appropriate weights and position them beside you on an incline bench
                    <li>Sit down and set the incline to a 45 degree angle then proceed to grab the dumbbells and place them on your thighs
                    <li>Bring the dummbells, with palms facing up towards the ceiling, and drop them to your sides
                    <li>Slowly lift your right arm and dumbbell such that it bends at a 90 degree angle
                    <li>Hold for at least 2 seconds and return to the starting position
                    <li>Repeat for the opposite side and continue for at least 3 sets of your maximum for that weight</li>
                </ol>
                <p>
                    Standing Hammer Curl
                </p>
                <ol>
                    <li>Grab appropriate weights and stand up straight, comfortably, with knees slightly bent
                    <li>With your arms at your side and your palms facing towards your body, slowly lift one arm and dumbell and raise to a 90 degree angle
                    <li>Hold at this position for at least 3 seconds and slowly lower your arm to return to the starting position
                    <li>Repeat with the opposite arm and continue to do 3 sets of your maximum for that weight</li>
                </ol>
            </div>
        </div>

        <div id="sixty5">
            <div class="information" style="margin-top: 100px">
                <h1>Chest</h1>
                <p>
                    Dumbbell Chest Press
                </p>
                <ol>
                    <li>Grab appropriate weighted dumbbells and bring them to a flat bench
                    <li>Sit down, place the weights on your thighs, and lift them up by pushing up your thigh
                    <li>Lie down on the bench with your arms fully extended and in front of you
                    <li>Position your arms such that they are at a 45 degree angle from your body with your palms perpendicular to your body
                    <li>Slowly bend your arms such that the dumbbells are just above your chest and hold for at least 2 seconds
                    <li>Push up with form and repeat for 3 sets of your maximum for that weight</li>
                </ol>
                <p>
                    Dumbbell Flys
                </p>
                <ol>
                    <li>Grab appropriate weighted dumbbells and bring them to a flat bench
                    <li>Sit down, place the weights on your thighs, and lift them up by pushing up your thigh
                    <li>Lie down on the bench with your arms fully extended and in front of you with your palms facing your body
                    <li>Move your arms with the dumbbells such that they are farther away from your body and at at 45 degree angle
                    <li>Hold for at least 2 seconds and return to the starting position
                    <li>Continue for at least 3 reps of your maximum for that weight</li>
                </ol>
            </div>
        </div>

        <div id="sixty6">
            <div class="information" style="margin-top: 125px">
                <h1>Back</h1>
                <p>
                    One-Arm Dumbbell Rows
                </p>
                <ol>
                    <li>Grab appropriate weighted dumbbells and bring them to a flat bench
                    <li>Position the dummbells such that they are at each side of the flat bench
                    <li>Put your left knee and left hand on the bench and proceed to grab and pick up the dumbbell to the right of the flat bench
                    <li>Position your arm such that it is to your side and pull the dummbell up towards your chest and extend your back
                    <li>Hold for at least 2 seconds and return to the starting position and repeat for your maximum amount of reps
                    <li>Repeat for the other side and continue for at least 3 sets</li>
                </ol>
                <p>
                    Standing Dummbell Rows
                </p>
                <ol>
                    <li>Grab appropriate weighted dumbbells and position them in front of you (preferably in front of a mirror)
                    <li>Stand comfortably with your legs slightly bent at the knee and at shoulders width
                    <li>Pick up both dumbells and hold them with your palms facing your body
                    <li>With your back slightly bent, pull both of the dumbbells up towards your chest and hold for at least 2 seconds
                    <li>Slowly bring them down to the starting position and repeat for 3 sets of your maximum for that weight</li>
                </ol>
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