
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

<?php

    $selector = $_GET["selector"];
    $validator = $_GET["validator"];

    if (empty($selector) || empty($selector)) {
        echo "Could not validate your request";
    }
    else {
        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
            ?>
                <div id='LogSignpageMobileDivDivider' style='display: grid; grid-template-columns: 50%; padding: 6px 6px 6px 6px;'>
                    <div class='asidebox' style='background-color: #1A1A1B;'>
                        <div style=''>
                            <h1 class='signuptext' style='color: #F2eecb; font-size: 16px;'>Reset your password.</h1>
                        </div>
                    </div>
                    <div class="logbox">
                        <form action="include/reset2.inc.php" method="post">
                            <table style="width: 100%; box-sizing: border-box;">
                                <tr>
                                    <input type="hidden" name="selector" value="<?php echo $selector ?>">
                                    <input type="hidden" name="validator" value="<?php echo $validator ?>">
                                    <td colspan="1"><input name="password" class="logright" type="password" maxlength="50" placeholder="New Password" autocomplete="off"></td>
                                    <td colspan="1"><input name="repeat-password" class="logright" type="password" maxlength="50" placeholder="Repeat Password" autocomplete="off"></td>
                                </tr>
                                    <td colspan="2">
                                        <button name="reset-password" class="button" type="submit" style="background-color: #1A1A1B; color: #F2eecb; margin-top: 6px;">Reset</button>
                                    </td>
                            </table>
                        </form>
                    </div>
                </div>
            <?php
        }
    }

?>

</main>