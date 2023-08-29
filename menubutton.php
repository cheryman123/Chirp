<?php
    if (isset($_SESSION['userid'])) {
        include 'include/dbh.inc.php';
        $idUsers = $_SESSION['userid'];
        
        $sql = "SELECT * FROM users WHERE idUsers='$idUsers'";
        $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {
                $tickets = $row['tickets'];
            }
?>
<main>

    <div class="dropdown" style="float: right; width: auto;">
        <a href="#">Mine account ▼</a>
        <div class="dropdown-content">
            <a href="BuyTicketsGazette.php"><?php echo $tickets; ?>🎟️</a>
            <a href="MineaccountGazette.php">Mine chirps</a>
            <a href="r/index.php?path=/memes">r</a>
            <!-- <a href="MineaccountcommentGazette.php">Mine comments</a> -->
            <!-- <a href="MinesubsGazette.php">Your subscriptions</a> -->
            <a href="MinesavesGazette.php">Saved articles</a>
            <!--<a href="MinesavescommentGazette.php">Saved comments</a> -->
            <a href="include/logout.inc.php">Logout</a>
        </div>
    </div>
    
</main>
<?php
    }   else {  
?>
<main>

    <a href="LogpageGazette.php" style="float: right;">Login</a>
    <a href="SignpageGazette.php" style="float: right;">Register</a>
        
</main>
<?php } ?>