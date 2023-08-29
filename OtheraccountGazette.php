<?php
    session_start();
    $idUsers = $_GET['uid'];

    $limit = 10;

    if (empty($_GET['limit'])) {
        header("Location: OtheraccountGazette.php?uid=".$idUsers."&cat=1&start=0&limit=".$limit."");
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
        <div class="dropdown">
            <a href="#"><?php
            if($_GET['cat'] == 2){
                echo 'Most Viewed ▼';
            }

            if($_GET['cat'] == 3){
                echo 'Most Karma ▼';
            }
            
            if($_GET['cat'] == 4){
                echo 'Most Upvoted ▼';
            }

            if($_GET['cat'] == 5){
                echo 'Most Downvoted ▼';
            }
            
            if($_GET['cat'] == 1){
                echo 'Latest ▼';
            }
            ?></a>
            <div class="dropdown-content">
                <object><a href="?uid=<?php echo $idUsers; ?>&cat=1&start=0&limit=<?php echo $limit; ?>">Latest</a></object>
                <object><a href="?uid=<?php echo $idUsers; ?>&cat=2&start=0&limit=<?php echo $limit; ?>">Most Viewed</a></object>
                <object><a href="?uid=<?php echo $idUsers; ?>&cat=3&start=0&limit=<?php echo $limit; ?>">Most Karma</a></object>
                <object><a href="?uid=<?php echo $idUsers; ?>&cat=4&start=0&limit=<?php echo $limit; ?>">Most Upvoted</a></object>
                <object><a href="?uid=<?php echo $idUsers; ?>&cat=5&start=0&limit=<?php echo $limit; ?>">Most Downvoted</a></object>
            </div>
        </div>
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
    include 'include/subs.inc.php';

    echo getSubs($conn);

    echo "<div id='PostMobileDivDivider' style='display: grid; grid-template-columns: 74% 26%; padding: 0px 6px 0px 6px; grid-gap: 6px;'>";
        echo "<div>";
        
            echo getOtheraccount($conn);

        echo "<div style='text-align: center; padding: 6px 0px 0px 0px;'>";
            echo "<div style='display: inline-block;'>";
                echo "<div style='display: grid; grid-template-columns: 100px 50px 100px; align-self: center; justify-self: center;'>";

                    $startprevious = $_GET['start'] - $limit;
                    if ($_GET['start'] == 0) {
                        echo "<div>";
                            echo "<button class='vote' style='float: right;'>Previous</button>";
                        echo "</div>";   
                    } else {
                        echo "<a href='?uid=".$idUsers."&cat=".$_GET['cat']."&start=".$startprevious."&limit=".$limit."'>
                            <button type='submit' class='vote' style='float: right;'>Previous</button>";
                        echo "</a>";
                    }
                
                    $pagenum = ($_GET['start'] / $limit) + 1;
                    echo "<div style='align-self: center; justify-self: center;'>";
                        echo "<h1 class='signuptext' style='font-size: 16px; display: table-caption;'>".$pagenum."</h1>";
                    echo "</div>";         
                    
                    $startnext = $_GET['start'] + $limit;
                    echo "<a href='?uid=".$idUsers."&cat=".$_GET['cat']."&start=".$startnext."&limit=".$limit."'>
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
