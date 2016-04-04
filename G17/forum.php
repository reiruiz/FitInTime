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
        <title>Forum</title>
    </head>
    <body>
        <div id="header">
            <div class="menu">
                <a href="./index.php#fitInTime">FitInTime</a>
            </div>
            <div class="menu">
                <a href="./index.php#nutrition">Nutrition</a>
            </div>
            <div class="menu">
                <a href="./index.php#recipe">Recipes</a>
                <ul class="dropdown">
                    <li><a href="./nutrition/minute15.php">15 Minutes</a>
                    <li><a href="./nutrition/minute30.php">30 Minutes</a>
                    <li><a href="./nutrition/minute60.php">60 Minutes</a></li>
                </ul>
            </div>
            <div class="menu">
                <a href="./index.php#fitness">Fitness</a>
            </div>
            <div class="menu">
                <a href="./index.php#exercise">Exercises</a>
                <ul class="dropdown">
                    <li><a href="./exercise/minute15.php">15 Minutes</a>
                    <li><a href="./exercise/minute30.php">30 Minutes</a>
                    <li><a href="./exercise/minute60.php">60 Minutes</a></li>
                </ul>
            </div>
            <div class="menu" style="background-color: #888888">
                <a href="./forum.php">Forum</a>
            </div>

            <div class="profile">
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
        <div id="forumTable">
            <?php
	            require_once('config.php');

	            // Connect to server and select database.
	            mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
	            mysql_select_db(DB_DATABASE)or die("cannot select DB");
	            $tbl_name="topic"; // Table name


	            $sql="SELECT * FROM $tbl_name ORDER BY id DESC";
	            // ORDER BY id DESC is order result by descending
	            $result=mysql_query($sql);
            ?>
            <table width="90%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#CCCCCC">
            <tr>
            <td width="6%" align="center" bgcolor="#E6E6E6"><strong>#</strong></td>
            <td width="53%" align="center" bgcolor="#E6E6E6"><strong>Topic</strong></td>
            <td width="13%" align="center" bgcolor="#E6E6E6"><strong>Date/Time</strong></td>
            </tr>

            <?php
            while($rows=mysql_fetch_array($result)){ // Start looping table row
            ?>

            <tr>
            <td bgcolor="#FFFFFF"><?php echo $rows['id']; ?></td>
            <td bgcolor="#FFFFFF"><a href="view_topic.php?id=<?php echo $rows['id']; ?>"><?php echo $rows['topic']; ?></a><BR></td>
            <td align="center" bgcolor="#FFFFFF"><?php echo $rows['datetime']; ?></td>
            </tr>

            <?php
            // Exit looping and close connection
            }
            mysql_close();
            ?>
            <tr>
            <td colspan="5" align="right" bgcolor="#E6E6E6"><a href="add_topic_form.php"><strong>Create New Topic</strong> </a></td>
            </tr>
            </table>
        </div>
		<div id="backToTop">
            <a href="#forumTable"><img src="./images/up-arrow.svg" alt="upwardArrow" width="50" height="50"></a>
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
						<a href="./index.php">Home<a>
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