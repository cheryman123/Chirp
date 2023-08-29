<?php
    session_start();

    $limit = 10;

    if (empty($_GET['limit'])) {
        header("Location: MinesavesGazette.php?start=0&limit=".$limit."");
    }
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
    include 'include/dbh.inc.php';
    include 'include/post.inc.php';

    echo "<div id='HomepageMobileDivDivider' style='display: grid; grid-template-columns: 74% 26%; padding: 0px 6px 0px 6px; grid-gap: 6px;'>";
        echo "<div>";

            echo getSaves($conn);

        echo "<div style='text-align: center; padding: 6px 0px 0px 0px;'>";
            echo "<div style='display: inline-block;'>";
                echo "<div style='display: grid; grid-template-columns: 100px 50px 100px; align-self: center; justify-self: center;'>";

                    $startprevious = $_GET['start'] - $limit;
                    if ($_GET['start'] == 0) {
                        echo "<div>";
                            echo "<button class='vote' style='float: right;'>Previous</button>";
                        echo "</div>";   
                    } else {
                        echo "<a href='?start=".$startprevious."&limit=".$limit."'>
                            <button type='submit' class='vote' style='float: right;'>Previous</button>";
                        echo "</a>";
                    }
                
                    $pagenum = ($_GET['start'] / $limit) + 1;
                    echo "<div style='align-self: center; justify-self: center;'>";
                        echo "<h1 class='signuptext' style='font-size: 16px; display: table-caption;'>".$pagenum."</h1>";
                    echo "</div>";         
                    
                    $startnext = $_GET['start'] + $limit;
                    echo "<a href='?start=".$startnext."&limit=".$limit."'>
                        <button type='submit' class='vote' style='float: left;'>Next</button>";
                    echo "</a>";
                    
                echo "</div>";
            echo "</div>";
        echo "</div>";
            
        echo "</div>";
    echo "</div>";
        
    ?>
    
</body>
</html>