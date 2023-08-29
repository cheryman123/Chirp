<?php
    session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="img/x-icon" href="img/BenjaminFranklin1767.ico" />
    <title>Chirp🐦</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
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
        echo "<div id='HomepageMobileDivDivider' style='display: grid; grid-template-columns: 72% 28%; padding: 0px 6px 0px 6px; grid-gap: 6px;'>";
            echo "<div>";
                include("editbox.php");
            echo "</div>";
        echo "</div>";
    ?>
</body>
</html>