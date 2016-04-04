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
        <title>30 Minute Recipes</title>
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
                <h1>30 Minutes</h1>
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
                <a href="#thirty1"><img src="../images/food/30Recipes/MisoSalmon.jpg" alt="Miso Salmon"></a>
            </div>
            <div class="imageLink">
                <a href="#thirty2"><img src="../images/food/30Recipes/TurkeySkillet.jpg" alt="Turkey Skillet"></a>
            </div>
            <div class="imageLink">
                <a href="#thirty3"><img src="../images/food/30Recipes/VeggieSandwich.jpg" alt="Veggie Sandwich"></a>
            </div>
        </div>

        <div id="thirty1">
            <div class="information" style="margin-top: 100px;">
                <h1>Miso Glazed
                    <br>Salmon</h1>
                <p> Ingredients (4 servings)
                </p>
                <ul>
                    <li>4 (6-ounce) skinless salmon fillets
                    <li>1/4 cup white miso
                    <li>1/4 cup maple syrup
                    <li>1/4 cup mirin
                    <li>1 tablespoon ginger
                    <li>1 tablespoon sesame oil
                    <li>1 cup sugar snap peas</li>
                </ul>
                <p>Instructions (454 calories per s.)</p>
                <ol>
                    <li>Preheat the oven to broil and adjust the rack to about 6 inches from the heat.
                    <li>Whisk the miso, maple syrup, mirin, ginger and sesame oil
                    <li>Add the salmon and toss to coat.
                    <li>Place fillets on a cooking sheet and place in oven until the glaze is browned and shiny.
                    <li>Leave the fillets in the oven for roughly 5-8 minutes until the salmon is firm and opaque.
                    <li>In the meantime, steam the snap peas for about 5 minutes until crisp-tender.</li>

                </ol>
            </div>
        </div>

        <div id="thirty2">
            <div class="information" style="margin-top: 150px;">
                <h1>Turkey Skillet</h1>
                <p> Ingredients (4 servings)
                </p>
                <ul>
                    <li>1/4 cup orange juice (or pineapple juice)
                    <li>1/4 1lb. turkey cutlets, sliced
                    <li>1/2teaspoon fine chili peppers
                    <li>1/2 teaspoon finely sliced ground cumin
                    <li>1/2 teaspoon finely sliced ground coriander
                    <li>1/2 large orange sliced with peel on
                    <li>1 tablespoon pine nuts
                    <li>1 tablespoon olive oil
                    <li>1/4 cup raisins
                    <li>1 tablespoon honey</li>
                </ul>
                <p>Instructions (308 calories per s.)</p>
                <ol>
                    <li>Combine beans, cheese and 1/4 cup of salsa in a bowl.
                    <li>Spread out the tortillas and spread 1/2 cup of the mixture on each tortilla, then fold them in half.
                    <li>Heat 1 tablespoon oil in a large non-stick skillet over medium heat. Add a tortilla and cook for 2 to 4 minutes on each side until golden.
                    <li>Serve the quesadillas with avocado and the remaining salsa.</li>
                </ol>
            </div>
        </div>

        <div id="thirty3">
            <div class="information" style="margin-top: 175px;">
                <h1>Veggie Sandwich</h1>
                <p> Ingredients (4 servings)
                </p>
                <ul>
                    <li>1 avocado mashed
                    <li>1 cup alfalfa sprouts
                    <li>1 small tomato, chopped
                    <li>1 small sweet onion, chopped
                    <li>4 tablespoons Ranch-style salad dressing
                    <li>4 tablespoons toasted sesame seeds
                    <li>1 cup shredded smoked Cheddar Cheese
                    <li>4 English muffins, split and toasted</li>
                </ul>
                <p>Instructions (470 calories per s.)</p>
                <ol>
                    <li>Preheat oven to broil
                    <li>Place each muffin faced up on a cooking sheet.
                    <li>Spread each half with mashed avocados.
                    <li>Distribute the remaining ingredients on each half of the muffin.
                    <li>Place under broiler for roughly 5 minutes, or until cheese is melted and bubbly.</li>
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