<!--<?php
	include '../functions.php';
	require_once('../config.php');
	session_start();

	// Connect to server and select database.
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect, error: ".mysql_error());
	mysql_select_db(DB_DATABASE)or die("cannot select DB, error: ".mysql_error());
	$tbl_name="topic"; // Table name
?>-->

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
        <title>15 Minute Exercises</title>
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
                <h1>15 Minutes</h1>
                <p>
                15 minutes, although not a lot of time, is sufficient to do a quick workout! Below is a list of exercises
                that you can do at home, without the use of any equipment. We have modified, produced, and provided you with
                a quick 15 minute workout that exercises and strengthens your legs, chest, and core.
                </p>
                <p>So click below to</p>
                <a href="#exercise">Get Fit</a>
            </div>
        </div> -->

        <div id="exercise">
            <div class="imageLink">
                <a href="#fifteen4"><img src="../images/exercise/15Exercise/lunge.jpg" alt="lunge"></a>
            </div>
            <div class="imageLink">
                <a href="#fifteen5"><img src="../images/exercise/15Exercise/pushup.jpg" alt="pushup"></a>
            </div>
            <div class="imageLink">
                <a href="#fifteen6"><img src="../images/exercise/15Exercise/situp.jpg" alt="situp"></a>
            </div>
        </div>

        <div id="fifteen4">
            <div class="information" style="margin-top: 50px">
                <h1>Leg Workout</h1>
                <p>
                    Lunges
                </p>
                <ol>
                    <li>Stand straight comfortably with legs at shoulders-width and arms either at the side, in front, or on your waist
                    <li>Proceed to step forward with one leg, bending at the knee, while keeping the other leg planted
                    <li>Keep leg in front for at least 3 seconds then bring it back and return to the starting position
                    <li>Repeat with the opposite leg, while maintaining good posture
                    <li>For a good workout, complete at least 3 sets of your maximum</li>
                </ol>
                <p>
                    Squats
                </p>
                <ol>
                    <li>Stand straight comfortably with legs at shoulders-width and arms either at the side, in front, or on your waist
                    <li>While keeping your back straight, bend at the knee
                    <li>Hold for at least 3 seconds, then straighten your legs
                    <li>Make sure that getting into the squat position is slower than returning to your starting position
                    <li>Proceed to do at minimum 3 sets of your maximum amount of reps</li>
                </ol>
                <p>
                    Leg Raises
                </p>
                <ol>
                    <li>Stand straight with legs at shoulders-width and arms in front
                    <li>Lift your right leg off the ground behind you while bending forward slightly
                    <li>At the same time, keep the opposite arm (your left) in front, while putting your right arm behind
                    <li>Hold for at least 2 seconds and then proceed to return to the starting position
                    <li>Continue for at least 3 sets of your maximum</li>
                </ol>
            </div>
        </div>

        <div id="fifteen5">
            <div class="information" style="margin-top: 50px">
                <h1>Chest Workout</h1>
                <p>
                    Wide-Grip Pushup
                </p>
                <ol>
                    <li>Position yourself in a plank position/normal pushup position
                    <li>Place your hands parallel to your chest, except far away from your chest differing from a normal push up (wide-grip formation)
                    <li>Bend your arms such that they are at 90 degree angle
                    <li>Remain in this position for at least 2 seconds and then proceed to push up to the stating position
                    <li>Repeat for at least 3 sets of your maximum amount of reps</li>
                </ol>
                <p>
                     Feet-elevated pushups
                </p>
                <ol>
                    <li>Position your self in a plank position/normal pushup position
                    <li>Place your feet on an elevated surface (the higher the platform, the more difficult the pushup will be)
                    <li>Place your arms parallel to your chest
                    <li>Bend your arms such that they are at a 90 degree angle
                    <li>Remain in this position for at least 2 seconds and then proceed to push up to the starting position
                    <li>Proceed to do least 3 sets of your maximum</li>
                </ol>
                <p>
                    Diamond Pushup
                </p>
                <ol>
                    <li>Position yourself in a plank position/normal pushup position
                    <li>Place your hands in front of your chest, with the palms of your hands forming a diamond shape
                    <li>Bend your arms such that they are at 90 degree angle
                    <li>Remain in this position for at least 2 seconds and then proceed to push up to the stating position
                    <li>Continue for at least 3 sets of your maximum amount of reps</li>
                </ol>
            </div>
        </div>

        <div id="fifteen6">
            <div class="information" style="margin-top: 50px">
                <h1>Core Workout</h1>
                <p>
                    V Sit-Ups
                </p>
                <ol>
                    <li>Lie on the floor with your body in a V position
                    <li>Keep your arms either in front of you or above your head
                    <li>Bend your legs at the knee and lift them so that only your bottom remains on the floor
                    <li>Extend your legs while in the air and hold for at least 2 seconds
                    <li>Return to the starting position and make sure that you feel the burn in your core
                    <li>Proceed to do at least 3 sets of your maximum</li>
                </ol>
                <p>
                    Russian Twists
                </p>
                <ol>
                    <li>Lie on the floor with your body in a V position
                    <li>Keep your arms in front of you, above your core but below your chest, with your hands together
                    <li>Bring your hands to your right side while twisting your body at the same time, emphasizing the use of your core
                    <li>Proceed to do this on the opposite side (your left side in this case) which would be 1 rep
                    <li>Repeat for 3 sets of your maximum amount of reps</li>
                </ol>
                <p>
                    Crunches
                </p>
                <ol>
                    <li>Lay on the floor with your knees bent and your head on the floor
                    <li>Place your hands on your head or in front of you on your chest
                    <li>Slowly lift your chest up from towards the ground at a 45 degree angle from the floor
                    <li>Hold in this position for at least 1 seconds and slowly return to the starting position (1 rep)
                    <li>Repeat for at least 3 sets of your maximum</li>
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
            <p>Copyright but not really <a href="../images/mandom.png">&copy;</a></p>
        </div>
    </body>
</html>