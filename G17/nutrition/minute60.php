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
        <title>60 Minute Recipes</title>
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
                <h1>60 Minutes</h1>
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
                <a href="#sixty1"><img src="../images/food/60Recipes/ChickenRedWine.jpg" alt="ChickenRedWine"></a>
            </div>
            <div class="imageLink">
                <a href="#sixty2"><img src="../images/food/60Recipes/SpinachChicken.jpg" alt="SpinachChicken"></a>
            </div>
            <div class="imageLink">
                <a href="#sixty3"><img src="../images/food/60Recipes/TurkeyMeatloaf.jpg" alt="TurkeyMeatloaf"></a>
            </div>
        </div>

        <div id="sixty1">
            <div class="information" style="margin-top: 100px;">
                <h1>Chicken and Red Wine Sauce</h1>
                <p>
               Ingredients (12 servings)
                </p>
                <ul>
                    <li>1 tablespoon olive oil
                    <li>1 tablespoon minced garlic 3 pound skinless, boneless chicken breasts
                    <li>1 tablespoon paprika
                    <li>1 cup brown sugar
                    <li>1 cup red wine
                    <li>Salt and pepper</li>
                </ul>
                <p>Instructions (214 calories per s.)</p>
                <ol>
                    <li>Heat oil in a large skillet over medium heat.
                    <li>Cook the garlic in the oil until it becomes tender.
                    <li>Place the chicken on the skillet and cook for about 10 minutes on each side, until it is no longer pink and the juices run clear.
                    <li>Drain the oil from the skillet.
                    <li>Sprinkle the chicken with paprika and brown sugar.
                    <li>Pour some red wine around the chicken and let it simmer while covering the skillet for roughly 20 minutes.
                    <li>Lightly baste the chicken with wine sauce while cooking.
                    <li>Add some salt and pepper for taste and serve.</li>

                </ol>
            </div>
        </div>

        <div id="sixty2">
            <div class="information" style="margin-top: 75px;">
                <h1>Spinach Stuffed Chicken</h1>
                <p>
               Ingredients (10 servings)
                </p>
                <ul>
                    <li>2 1/2 cups of spinach
                    <li>1 cup shredded Swiss Cheese
                    <li>3/4 cup ricotta cheese
                    <li>1/3 cup grated parmesan cheese
                    <li>3 tablespoon finely chopped onions
                    <li>1 clove minced garlic
                    <li>1/2 tablespoon salt and pepper
                    <li>1/4 tablespoon ground nutmeg
                    <li>6 boneless chicken breast halves
                    <li>2 tablespoon olive or vegetable oil
                    <li>1 tablespoon paprika
                    <li>1/2 tablespoon dried oregano
                    <li>1/2 tablespoon dried thyme</li>
                </ul>
                <p>Instructions (294 calories per s.)</p>
                <ol>
                    <li>Preheat the oven to 350 degrees F.
                    <li>Combine and mix the spinach, swiss cheese, ricotta cheese, parmesan cheese, onions, garlic, salt, pepper, and ground nutmeg in a bowl.
                    <li>Stuff 1/2 cup of the mixture into each chicken breast.
                    <li>Place the stuffed chicken on a greased baking pan.
                    <li>Mix the oil, paprika, oregano, and thyme in a bowl and brush the mixture over the chicken.
                    <li>Sprinkle some more paprika on top if desired.
                    <li>Bake in the oven for 1 to 1 1/2 hours, or until juices run clear.</li>

                </ol>
            </div>
        </div>

        <div id="sixty3">
            <div class="information" style="margin-top: 100px;">
                <h1>Turkey Veggie Meatloaf Cups</h1>
                <p>
               Ingredients (10 servings)
                </p>
                <ul>
                    <li>2 cups of chopped zucchini
                    <li>1 1/2 cups of chopped onions
                    <li>1 red bell pepper chopped
                    <li>1 pound extra lean ground turkey meat
                    <li>1/2 cup uncooked couscous
                    <li>1 egg
                    <li>1 tablespoon Dijon mustard
                    <li>1/2 cup BBQ sauce
                    <li>2 tablespoon Worcestershire sauce </li>

                </ul>
                <p>Instructions (119 calories per s.)</p>
                <ol>
                    <li>Preheat oven to 400 degrees F.
                    <li>Chop the zucchini, onions and bell pepper as finely as you can, or blend them in a food processor.
                    <li>Place the vegetables, turkey, egg, couscous, Worcestershire, and the Dijon mustard in a bowl and mix evenly.
                    <li>Spray 20 muffin cups with cooking spray and fill each cup about ¾ full with the mixture.
                    <li>Add a tablespoon of BBQ sauce on top of each cup.
                    <li>Bake in the oven for roughly 25 minutes until the juices run clear.
                    <li>Let them sit for 5 minutes before serving.</li>

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