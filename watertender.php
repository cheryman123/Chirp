<?php

session_start();

include 'include/dbh.inc.php';
echo "<link href='style.css' rel='stylesheet' type='text/css'>";
echo "<meta name='viewport' content='width=device-width, initial-scale=1.0'>";

if ($_GET['p'] == $watertender) {
    function setPost($conn) {
        if (isset($_POST['postSubmit'])) {
            if (isset($_SESSION['userid'])) {
        
                $idUsers = $_SESSION['userid'];;
                $username = $_POST['username'];
                $title = $_POST['title'];
                $post = $_POST['post'];

                $upvote = $_POST['upvote'];
                $downvote = $_POST['downvote'];
                $true = $_POST['true'];
                $false = $_POST['false'];
                $totrated = $_POST['totrated'];
                $totratecount = $_POST['totratecount'];

                $date = date('Y-m-d H:i:s');

                $one = '1';

                $sql = "INSERT INTO post (idUsers, username, date, title, post, report, save, upvote, downvote, tru, fals, totrated, totratecount) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)){
                    echo "<script type='text/javascript'>alert('Unsuccessfull');history.go(-1);</script>";
                    exit();
                }
                else {
                    mysqli_stmt_bind_param($stmt,"sssssssssssss", $idUsers, $username, $date, $title, $post, $one, $one, $upvote, $downvote, $true, $false, $totrated, $totratecount);
                    mysqli_stmt_execute($stmt);
                    echo "<script type='text/javascript'>alert('Article successfully posted');history.go(-1);</script>";
                    exit();
                }
            } 
            else {
                $message = "You can create articles if you have an account";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
    }

    echo"
    <form method='POST' action'".setPost($conn)."'>
        <div style='overflow: hidden; box-sizing: border-box; margin-top: 6px; width: 100%; padding: 0.30em; padding-bottom: 0px; border: solid 2px; border-radius: 5px;'>
            <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
            
            <textarea maxlength='1000' name='title' placeholder='Title' rows='4' style='width: 100%; font-size: 18px; box-sizing: border-box; border-radius: 3px; background-color: #F2eecb; overflow-wrap: break-word;'></textarea>
            <div style=''>
                <textarea maxlength='40000' name='post' placeholder='Text' rows='20' style='width: 100%; font-size: 12px; box-sizing: border-box; border-radius: 3px; background-color: #F2eecb; overflow-wrap: break-word;'></textarea>
                <input name='username' class='logright' type='text' maxlength='20' placeholder='Username' autocomplete='off'>

                <input name='upvote' class='logright' type='number' maxlength='20' placeholder='upvote' autocomplete='off'>
                <input name='downvote' class='logright' type='number' maxlength='20' placeholder='downvote' autocomplete='off'>
                <input name='true' class='logright' type='number' maxlength='20' placeholder='true' autocomplete='off'>
                <input name='false' class='logright' type='number' maxlength='20' placeholder='false' autocomplete='off'>
                <input name='totratecount' class='logright' type='number' maxlength='20' placeholder='totratecount' autocomplete='off'>
                <input name='totrated' class='logright' type='number' maxlength='20' placeholder='totrated' autocomplete='off'>

                <button style='margin-bottom: 0.30em; margin-top: 0.30em; float: right;' type='submit' name='postSubmit' class='post'>Post</button>
            </div>  
        </div>
    </form>";
}else {

}

?>