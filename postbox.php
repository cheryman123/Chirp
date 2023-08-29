<?php
    date_default_timezone_set('Europe/Oslo');
    include 'include/dbh.inc.php';
    include 'include/post.inc.php';

    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $username = $_SESSION['username'];
    }
    else {
        $userid = 0;
        $username = 'Anonymous';
    }

    echo"<form method='POST' action'".setPost($conn)."'>
            <div style='overflow: hidden; box-sizing: border-box; margin-top: 6px; width: 100%; padding: 0.30em; padding-bottom: 0px; border: solid 2px; border-radius: 5px;'>
                <input type='hidden' name='idUsers' value='".$userid."'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                
                <textarea maxlength='280' name='title' placeholder='Chirp/Title' rows='4' style='width: 100%; font-size: 18px; box-sizing: border-box; border-radius: 3px; background-color: #F2eecb; overflow-wrap: break-word;'></textarea>
                <div style=''>
                    <textarea maxlength='40000' name='post' placeholder='Text' rows='20' style='width: 100%; font-size: 12px; box-sizing: border-box; border-radius: 3px; background-color: #F2eecb; overflow-wrap: break-word;'></textarea>
                </div>
                <button style='margin-bottom: 0.30em; float: right;' type='submit' name='postSubmit' class='post'>Chirp/Post</button>  
            </div>
        </form>";
?>