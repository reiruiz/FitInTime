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
        <title>View Topic</title>
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
        <div id="forumTable">
            <?php
	            require_once('config.php');

	            // Connect to server and select database.
	            mysql_connect(DB_HOST, DB_USER, DB_PASSWORD)or die("cannot connect");
	            mysql_select_db(DB_DATABASE)or die("cannot select DB");
	            $tbl_name="topic"; // Table name

	            // get value of id that sent from address bar
	            $id=$_GET['id'];

	            $sql="SELECT * FROM $tbl_name WHERE id='$id'";
	            $result=mysql_query($sql);

	            $rows=mysql_fetch_array($result);
            ?>
            <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
            <tr>
            <td><table width="100%" border="0" cellpadding="3" cellspacing="1" bordercolor="1" bgcolor="#FFFFFF">
            <tr>
            <td bgcolor="#F8F7F1"><strong><?php echo $rows['topic']; ?></strong></td>
            </tr>

            <tr>
            <td bgcolor="#F8F7F1"><?php echo $rows['detail']; ?></td>
            </tr>

            <tr>
            <td bgcolor="#F8F7F1"><strong>By :</strong> <strong></td>
            </tr>

            <tr>
            <td bgcolor="#F8F7F1"><strong>Date/time : </strong><?php echo $rows['datetime']; ?></td>
            </tr>
            </table></td>
            </tr>
            </table>
            <BR>
            <?php
            $tbl_name2="response"; // Switch to table "response"

            $sql2="SELECT * FROM $tbl_name2 WHERE topic_id='$id'";
            $result2=mysql_query($sql2);

            while($rows=mysql_fetch_array($result2)){
            ?>
            <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
            <tr>
            <td><table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
            <td bgcolor="#F8F7F1"><strong>ID</strong></td>
            <td bgcolor="#F8F7F1">:</td>
            <td bgcolor="#F8F7F1"><?php echo $rows['id']; ?></td>
            </tr>
            <tr>
            <td width="18%" bgcolor="#F8F7F1"><strong>Name</strong></td>
            <td width="5%" bgcolor="#F8F7F1">:</td>
            <td width="77%" bgcolor="#F8F7F1"></td>
            </tr>
            <tr>
            <td bgcolor="#F8F7F1"><strong>Response</strong></td>
            <td bgcolor="#F8F7F1">:</td>
            <td bgcolor="#F8F7F1"><?php echo $rows['response']; ?></td>
            </tr>
            <tr>
            <td bgcolor="#F8F7F1"><strong>Date/Time</strong></td>
            <td bgcolor="#F8F7F1">:</td>
            <td bgcolor="#F8F7F1"><?php echo $rows['datetime']; ?></td>
            </tr>
            </table></td>
            </tr>
            </table><br>

            <?php
            }
            mysql_close();
            ?>

            <BR>
            <table width="400" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
            <tr>
            <form name="form1" method="post" action="add_response.php">
            <td>
            <table width="100%" border="0" cellpadding="3" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
            <td valign="top"><strong>Response</strong></td>
            <td valign="top">:</td>
            <td><textarea name="response" cols="45" rows="3" id="answer"></textarea></td>
            </tr>
            <tr>
            <td>&nbsp;</td>
            <td><input name="id" type="hidden" value="<?php echo $id; ?>"></td>
            <td><input type="submit" name="Submit" value="Submit"> <input type="reset" name="Submit2" value="Reset"></td>
            </tr>
            </table>
            </td>
            </form>
            </tr>
            </table>
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