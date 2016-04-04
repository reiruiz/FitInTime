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
        <title>15 Minute Recipes</title>
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
                <a href="../index.php#recipe" style="background-color: #888888">Recipes</a>
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
                <a href="../index.php#exercise">Exercises</a>
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

<!--         <div id="nutrition">
            <div class="introduction">
                <h1>15 Minutes</h1>
                <p>
                Lorem ipsum dolor sit amet, per commodo eleifend eu, qui dolore timeam indoctum et.
                Praesent consectetuer mel ne. Et oratio tritani euripidis sed, nonumy nostro at vel.
                Dignissim tincidunt et mea, vidit doctus vivendo et sea. Et detracto urbanitas cum,
                feugait singulis conclusionemque est id, ex mel nostro legimus electram.
                </p>
                <a href="#recipe">Get Healthy</a>
            </div>
        </div> -->

        <div id="recipe">
            <div class="imageLink">
                <a href="#fifteen1"><img src="../images/food/15Recipes/Quesadillas.jpg" alt="quesadilla"></a>
            </div>
            <div class="imageLink">
                <a href="#fifteen2"><img src="../images/food/15Recipes/fillets.jpg" alt="fillets"></a>
            </div>
            <div class="imageLink">
                <a href="#fifteen3"><img src="../images/food/15Recipes/shrimp.jpg" alt="shrimp"></a>
            </div>
        </div>

        <div id="fifteen1">
            <div class="information" style="margin-top: 150px;">
                <h1>Black Bean Quesadillas</h1>
                <p>
                    Ingredients (4 servings)
                </p>
                <ul>
                    <li>1 can of black beans
                    <li>1/2 cup of shredded Monterey Jack Cheddar cheesed
                    <li>1/2 cup prepared fresh salsa
                    <li>4 8-inch whole-wheat tortillas
                    <li>2 teaspoons canola oil
                    <li>1 ripe diced avocado </li>
                </ul>
                <p>
                    Instructions (377 calories per s.)
                </p>
                <ol>
                    <li>Combine beans, cheese and 1/4 cup of salsa in a bowl.
                    <li>Spread out the tortillas and spread 1/2 cup of the mixture on each tortilla, then fold them in half.
                    <li>Heat 1 tablespoon oil in a large non-stick skillet over medium heat. Add a tortilla and cook for 2 to 4 minutes on each side until golden.
                    <li>Serve the quesadillas with avocado and the remaining salsa. </li>
                </ol>
            </div>
        </div>

        <div id="fifteen2">
            <div class="information" style="margin-top: 175px;">
                <h1>Sauteed Fish
                    <br>Fillets</h1>
                <p>
                    Ingredients (4 servings)
                </p>
                <ul>
                    <li>1/3 cup all-purpose flour</li>
                    <li>1/2 teaspoon salt</li>
                    <li>1/4 teaspoon </li>
                    <li>1 pound of any white-fish fillet </li>
                    <li>1 tablespoon extra-virgin olive oil</li>
                </ul>
                <p>
                    Instructions (163 Calories per s.)
                </p>
                <ol>
                    <li>Combine flour, salt and pepper in a bowl.</li>
                    <li>Cut the fish into 4 portions.</li>
                    <li>Dredge the fillets thoroughly with the mixture in the bowl.</li>
                    <li>Heat the oil in a large non-stick skillet over medium-high heat.</li>
                    <li>Add the fish and cook 3 to 4 minutes per side until lightly brown and just opaque in the center.</li>
                </ol>
            </div>
        </div>

        <div id="fifteen3">
            <div class="information" style="margin-top: 150px;">
                <h1>Spicy Thai Shrimp Salad</h1>
                <p>
                    Ingredients (4 servings)
                </p>
                <ul>
                    <li>2 tablespoon lime juice
                    <li>4 teaspoons fish sauce
                    <li>1 tablespoon canola oil
                    <li>2 teaspoons light brown sugar
                    <li>1/2 teaspoon crushed red pepper
                    <li>1 pound cooked and peeled small shrimp
                    <li>1 cup thinly sliced red, yellow, or orange pepper
                    <li>1 cup seeded and thinly sliced cucumber
                    <li>1/4 cup mixed chopped fresh herbs (eg. Basil, cilantro)</li>
                </ul>
                <p>
                    Instructions (170 calories per s.)
                </p>
                <ol>
                    <li>Whisk lime juice, fish sauce, oil, brown sugar, and crushed red pepper in a bowl.
                    <li>Toss in the shrimp, bell pepper, cucumber and fresh.
                    <li>Add the coated ingredients into some salad lettuce and serve.</li>
                </ol>
            </div>
        </div>

        <div id="backToTop">
            <a href="#recipe"><img src="../images/up-arrow.svg" alt="upwardArrow" width="50" height="50"></a>
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
                        <a href="#recipe">15 minutes</a>
                    </td>
                    <td>
                        <a href="../exercise/minute15.php">15 Minutes</a>
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
                        <a href="./minute30.php">30 minutes</a>
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
                        <a href="./minute60.php">60 minutes</a>
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