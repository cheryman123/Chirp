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
    echo "<div id='HomepageMobileDivDivider' style='display: grid; grid-template-columns: 64% 36%; padding: 6px 0px 0px 0px;'>";
        echo "<div style='padding: 0px 6px 0px 6px;'>";
            echo "<div class='asidebox' style='background-color: #1A1A1B;'>
                    <div style=''>
                        <h1 class='signuptext' style='color: #F2eecb; font-size: 18px;'>Our rules📜:</h1>
                    </div>";
            echo "</div>";
            echo "<div class='asidebox' style='background-color: #1A1A1B; margin: 6px 0px 0px 0px;'>
                    <div style=''>
                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px; padding: 0px 0px 6px 0px;'>This website does only contain speech in text format. Any United states law that seeks to restrict speech is unconstitutional and overruled by the First Amendment right to free speech.</h1>

                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px; padding: 0px 0px 6px 6px;'>There is either restricted speech or free speech.</h1>

                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px; padding: 0px 0px 6px 0px;'>Our algorithms are rather uncomplex. Articles are essentially sorted out by either most upvotes or downvotes.</h1>

                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px; padding: 0px 0px 6px 6px;'>Use your vote to promote virtuous content and demote content that is unvirtuous.</h1>

                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px;'>Be cautious with redirections or links to other websites.</h1>
                    </div>";
            echo "</div>";
            echo "<div class='asidebox' style='background-color: #1A1A1B; margin: 6px 0px 0px 0px;'>
                    <div style=''>
                        <h1 class='signuptext' style='color: #F2eecb; font-size: 18px; padding: 0px 0px 0px 0px;'>Famous quotes about freedom of speech💬:</h1>
                    </div>";
            echo "</div>";
            // Thomas Jefferson
            echo "<div class='asidebox' style='background-color: #1A1A1B; margin: 6px 0px 0px 0px;'>
                    <div style=''>
                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px; padding: 0px 0px 6px 0px;'>''Rightful liberty is unobstructed action according to our will within limits drawn around us by the equal rights of others. I do not add 'within the limits of the law,' because law is often but the tyrant's will, and always so when it violates the right of an individual.''</h1>

                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px;'>Thomas Jefferson to Isaac H. Tiffany, 1819.</h1>
                    </div>";
            echo "</div>";
            // Mark Twain
            echo "<div class='asidebox' style='background-color: #1A1A1B; margin: 6px 0px 0px 0px;'>
                    <div style=''>
                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px; padding: 0px 0px 6px 0px;'>''In our country, we have those three unspeakably precious things: freedom of speech, freedom of conscience, and the prudence never to practice either.''</h1>

                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px;'>Mark Twain</h1>
                    </div>";
            echo "</div>";
            // George Orwell
            echo "<div class='asidebox' style='background-color: #1A1A1B; margin: 6px 0px 0px 0px;'>
                    <div style=''>
                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px; padding: 0px 0px 6px 0px;'>''If liberty means anything at all, it means the right to tell people what they do not want to hear''</h1>

                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px;'>George Orwell</h1>
                    </div>";
            echo "</div>";
            // John F.Kennedy
            echo "<div class='asidebox' style='background-color: #1A1A1B; margin: 6px 0px 0px 0px;'>
                    <div style=''>
                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px; padding: 0px 0px 6px 0px;'>''The unity of freedom has never relied on uniformity of opinion.''</h1>

                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px;'>John F.Kennedy</h1>
                    </div>";
            echo "</div>";
            // Noam Chomsky
            echo "<div class='asidebox' style='background-color: #1A1A1B; margin: 6px 0px 0px 0px;'>
                    <div style=''>
                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px; padding: 0px 0px 6px 0px;'>''If we don't believe in free expression for people we despise, we don't believe in it at all''</h1>

                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px;'>Noam Chomsky</h1>
                    </div>";
            echo "</div>";
        echo "</div>";
    echo "</div>";
    ?>
    
</body>
</html>
