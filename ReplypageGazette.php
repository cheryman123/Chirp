<?php
    session_start();
    include 'include/dbh.inc.php';

    $limit = 10;

    if (empty($_GET['cat'])) {
        header("Location: ReplypageGazette.php?cat=3&sort=4&c=".$_GET['c']."&p=".$_GET['p']."&k=".$_GET['k']."&start=0&limit=".$limit."");
    }

    $cid = $_GET['c'];
    $sql = "SELECT * FROM post WHERE cid='$cid'";
    $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $webpage_title = $row['title'];
        }
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="icon" type="img/x-icon" href="img/BenjaminFranklin1767.ico" />
    <title><?php echo $webpage_title; ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="topnav">
        <div class="dropdown">
            <a href="#"><?php
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
                }else {
                    if($_GET['sort'] == 1) {
                        echo ' Now ▼';
                    }
                
                    if($_GET['sort'] == 2) {
                        echo ' Today ▼';
                    }
                
                    if($_GET['sort'] == 3) {
                        echo ' This Week ▼';
                    }
                
                    if($_GET['sort'] == 4) {
                        echo ' This Month ▼';
                    }
                
                    if($_GET['sort'] == 5) {
                        echo ' This Year ▼';
                    }
                    
                    if($_GET['sort'] == 6) {
                        echo ' Of All Time';
                    }
                }
            ?></a>
            <div class="dropdown-content">
                <object><a href="?cat=1&sort=<?php echo $_GET['sort']; ?>&c=<?php echo $_GET['c']; ?>&p=<?php echo $_GET['p']; ?>&k=<?php echo $_GET['k']; ?>&start=0&limit=<?php echo $limit; ?>"">Latest</a></object>
                <object><a href="?cat=3&sort=<?php echo $_GET['sort']; ?>&c=<?php echo $_GET['c']; ?>&p=<?php echo $_GET['p']; ?>&k=<?php echo $_GET['k']; ?>&start=0&limit=<?php echo $limit; ?>"">Most Karma</a></object>
                <object><a href="?cat=4&sort=<?php echo $_GET['sort']; ?>&c=<?php echo $_GET['c']; ?>&p=<?php echo $_GET['p']; ?>&k=<?php echo $_GET['k']; ?>&start=0&limit=<?php echo $limit; ?>"">Most Upvoted</a></object>
                <object><a href="?cat=5&sort=<?php echo $_GET['sort']; ?>&c=<?php echo $_GET['c']; ?>&p=<?php echo $_GET['p']; ?>&k=<?php echo $_GET['k']; ?>&start=0&limit=<?php echo $limit; ?>"">Most Downvoted</a></object>
                
                <object><a class="sort" href="?sort=1&cat=<?php echo $_GET['cat']; ?>&c=<?php echo $_GET['c']; ?>&p=<?php echo $_GET['p']; ?>&k=<?php echo $_GET['k']; ?>&start=0&limit=<?php echo $limit; ?>"">Now</a></object>
                <object><a class="sort" href="?sort=2&cat=<?php echo $_GET['cat']; ?>&c=<?php echo $_GET['c']; ?>&p=<?php echo $_GET['p']; ?>&k=<?php echo $_GET['k']; ?>&start=0&limit=<?php echo $limit; ?>"">Today</a></object>
                <object><a class="sort" href="?sort=3&cat=<?php echo $_GET['cat']; ?>&c=<?php echo $_GET['c']; ?>&p=<?php echo $_GET['p']; ?>&k=<?php echo $_GET['k']; ?>&start=0&limit=<?php echo $limit; ?>"">This Week</a></object>
                <object><a class="sort" href="?sort=4&cat=<?php echo $_GET['cat']; ?>&c=<?php echo $_GET['c']; ?>&p=<?php echo $_GET['p']; ?>&k=<?php echo $_GET['k']; ?>&start=0&limit=<?php echo $limit; ?>"">This Month</a></object>
                <object><a class="sort" href="?sort=5&cat=<?php echo $_GET['cat']; ?>&c=<?php echo $_GET['c']; ?>&p=<?php echo $_GET['p']; ?>&k=<?php echo $_GET['k']; ?>&start=0&limit=<?php echo $limit; ?>"">This Year</a></object>
                <object><a class="sort" href="?sort=6&cat=<?php echo $_GET['cat']; ?>&c=<?php echo $_GET['c']; ?>&p=<?php echo $_GET['p']; ?>&k=<?php echo $_GET['k']; ?>&start=0&limit=<?php echo $limit; ?>"">All Time</a></object>
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
        <a href="index.php" style="text-decoration: none;"><h1 class="title">The Pennsylvania Gazette</h1></a>
    </nav>
    
    <?php
        include 'include/post.inc.php';
        include 'include/Comment.inc.php';
        
        echo "<div id='HomepageMobileDivDivider' style='display: grid; grid-template-columns: 72% 28%; padding: 0px 6px 0px 6px; grid-gap: 6px;'>";
            echo "<div>";
                echo "<div>";
                    echo getPost($conn); 
                echo "</div>";

                echo "<div>";
                    include("Replybox.php"); 
                echo "</div>";

                echo "<div>";
                    echo getComment($conn); 
                echo "</div>";

                echo "<div>";
                    if (isset($_SESSION['userid'])) {
                        echo getCommentLatestBB($conn);
                    }
                echo "</div>";

                echo "<div>";
                    echo "<div>"; 
                        echo getReplypage($conn);
                    echo "</div>";
                    echo "<div style='text-align: center; padding: 6px 0px 0px 0px;'>";
                        echo "<div style='display: inline-block;'>";
                            echo "<div style='display: grid; grid-template-columns: 100px 50px 100px; align-self: center; justify-self: center;'>";

                                $startprevious = $_GET['start'] - $limit;
                                if ($_GET['start'] == 0) {
                                    echo "<div>";
                                        echo "<button class='vote' style='float: right;'>Previous</button>";
                                    echo "</div>";   
                                } else {
                                    echo "<a href='?cat=".$_GET['cat']."&sort=".$_GET['sort']."&c=".$_GET['c']."&p=".$_GET['p']."&k=".$_GET['k']."&start=".$startprevious."&limit=".$limit."'>
                                        <button type='submit' class='vote' style='float: right;'>Previous</button>";
                                    echo "</a>";
                                }
                            
                                $pagenum = ($_GET['start'] / $limit) + 1;
                                echo "<div style='align-self: center; justify-self: center;'>";
                                    echo "<h1 class='signuptext' style='font-size: 16px; display: table-caption;'>".$pagenum."</h1>";
                                echo "</div>";         
                                
                                $startnext = $_GET['start'] + $limit;
                                echo "<a href='?cat=".$_GET['cat']."&sort=".$_GET['sort']."&c=".$_GET['c']."&p=".$_GET['p']."&k=".$_GET['k']."&start=".$startnext."&limit=".$limit."'>
                                    <button type='submit' class='vote' style='float: left;'>Next</button>";
                                echo "</a>";
                     
                            echo "</div>";
                        echo "</div>";
                     echo "</div>";
                echo "</div>";
            echo "</div>";
        echo "</div>";
    ?>
    
</body>
</html>