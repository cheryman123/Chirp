<?php

?>
<?php
    if (isset($_SESSION['userid'])) {
?>
<main>
    
</main>
<?php
    }   else {  
?>
<main>
<link href="style.css" rel="stylesheet" type="text/css">

<head>
    <link rel="icon" type="img/x-icon" href="img/BenjaminFranklin1767.ico" />
    <title>Chirp🐦</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

    <div class="topnav">
        <?php include("menubutton.php");?>
        <form action="https://www.paypal.com/cgi-bin/webscr" id="iloveyou" method="post" target="_top">
            <input type="hidden" name="cmd" value="_donations" />
            <input type="hidden" name="business" value="thepg17760704@gmail.com" />
            <input type="hidden" name="item_name" value="Help!?" />
            <input type="hidden" name="currency_code" value="USD" />
            <a href="#" style="float: right; color: #3E54E8;" onclick="document.getElementById('iloveyou').submit()">Donate!</a>
        </form>
    </div>

    <nav class="navmain">
        <a href="index.php" style="text-decoration: none;"><h1 class="title">Chirp🐦</h1></a>
    </nav>

<div id='LogSignpageMobileDivDivider' style='display: grid; grid-template-columns: 50%; padding: 6px 6px 6px 6px;'>
    <div class='asidebox' style='background-color: #1A1A1B;'>
        <div style="margin: 2px;">
            <h1 class="signuptext" style="color: #F2eecb; font-size: 11px;">Remember to have a Paypal account with a matching email account. In order to receive donations from your fellow Gazetors and Gazetteers.</h1>
        </div>
    </div>
    <div class="logbox">
        <form action="include/signup.inc.php" method="post">
            <table style="width: 100%; box-sizing: border-box;">
                <tr>
                    <td><input name="username" class="logright" type="text" maxlength="20" placeholder="Username" autocomplete="off"></td>
                    <td><input name="email" class="logright" type="text" maxlength="50" placeholder="E-mail" autocomplete="off"></td>
                </tr>
                <tr>
                    <td><input name="password" class="logright" type="password" maxlength="50" placeholder="Password" autocomplete="off"></td>
                    <td><input name="password-repeat" class="logright" type="password" maxlength="50" placeholder="Repeat Password" autocomplete="off"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php
                            if (isset ($_GET['error'])){
                                if ($_GET['error'] == "emptyfields") {
                                    echo '<h1 class="signuptext" style="color: #bb0000; margin-top: 6px; margin-bottom: 6px; float: left;">Fill in all fields!</h1>';
                                }
                                elseif ($_GET['error'] == "invalidemail") {
                                    echo '<h1 class="signuptext" style="color: #bb0000; margin-top: 6px; margin-bottom: 6px; float: left;">Invalid E-mail</h1>';
                                }
                                elseif ($_GET['error'] == "invalidusername") {
                                    echo '<h1 class="signuptext" style="color: #bb0000; margin-top: 6px; margin-bottom: 6px; float: left;">Invalid Username</h1>';
                                }
                                elseif ($_GET['error'] == "invalidemail&uid") {
                                    echo '<h1 class="signuptext" style="color: #bb0000; margin-top: 6px; margin-bottom: 6px; float: left;">Invalid Username & E-mail</h1>';
                                }
                                elseif ($_GET['error'] == "usernametaken") {
                                    echo '<h1 class="signuptext" style="color: #bb0000; margin-top: 6px; margin-bottom: 6px; float: left;">Username is taken</h1>';
                                }
                                elseif ($_GET['error'] == "passwordcheck") {
                                    echo '<h1 class="signuptext" style="color: #bb0000; margin-top: 6px; margin-bottom: 6px; float: left;">Your password does not match!</h1>';
                                }
                                elseif ($_GET['error'] == "sqlerror") {
                                    echo '<h1 class="signuptext" style="color: #bb0000; margin-top: 6px; margin-bottom: 6px; float: left;">Database error!</h1>';
                                }

                            }
                        ?>
                        <button name="signup" class="button" type="submit"style="background-color: #1A1A1B; color: #F2eecb; margin-top: 6px;">Signup</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
</main>
<?php } ?>