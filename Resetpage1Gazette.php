
<main>
<link href="style.css" rel="stylesheet" type="text/css">

<head>
    <link rel="icon" type="img/x-icon" href="img/BenjaminFranklin1767.ico" />
    <title>Reset your password</title>

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
            <div style=''>
                <h1 class='signuptext' style='color: #F2eecb; font-size: 16px;'>Send a password reset request to your email.</h1>
            </div>
        </div>
        <div class="logbox">
            <form action="include/reset1.inc.php" method="post">
                <table style="width: 100%; box-sizing: border-box;">
                    <tr>
                        <td colspan="1"><input name="email" class="logright" type="text" maxlength="50" placeholder="Email" autocomplete="off"></td>
                        <td colspan="1"><input name="username" class="logright" type="text" maxlength="50" placeholder="Username" autocomplete="off"></td>
                    </tr>
                        <td colspan="2">
                            <?php
                                if (isset ($_GET['reset'])){
                                    if ($_GET['reset'] == "successEmail") {
                                        echo '<h1 class="signuptext" style="color: #bb0000; margin-top: 6px; margin-bottom: 6px; float: left;">Check your e-mail!</h1>';
                                    }
                                    if ($_GET['reset'] == "resubmit") {
                                        echo '<h1 class="signuptext" style="color: #bb0000; margin-top: 6px; margin-bottom: 6px; float: left;">Please try again!</h1>';
                                    }
                                    if ($_GET['reset'] == "success") {
                                        echo '<h1 class="signuptext" style="color: #bb0000; margin-top: 6px; margin-bottom: 6px; float: left;">Your password has been reset!</h1>';
                                    }
                                    
                                }
                            ?>
                            <button name="send" class="button" type="submit" style="background-color: #1A1A1B; color: #F2eecb; margin-top: 6px;">Send</button>
                        </td>
                </table>
            </form>
        </div>
    </div>
</main>