<?php
    date_default_timezone_set('Europe/Oslo');
    include 'include/dbh.inc.php';
    include 'include/post.inc.php';

    if (isset($_SESSION['userid'])) {
        $username = $_SESSION['username'];

        $cid = $_POST['cid'];
        $pid = $_POST['pid'];
        $kid = $_POST['kid'];
        $idUsers = $_POST['idUsers'];
        $date = $_POST['date'];
        $comment = $_POST['comment'];

        echo"<form method='POST' action'". editComment($conn) ."'>
                <div style='overflow: hidden; box-sizing: border-box; margin-top: 6px; width: 100%; padding: 0.30em; padding-bottom: 0px; border: solid 2px; border-radius: 5px;'>
                    <input type='hidden' name='cid' value='". $cid ."'>
                    <input type='hidden' name='pid' value='". $pid ."'>                            
                    <input type='hidden' name='kid' value='". $kid ."'>                                                                                    
                    <input type='hidden' name='idUsers' value='". $idUsers ."'>
                    <input type='hidden' name='date' value='". $date ."'>
                    
                    <div style='padding-top: 0px;'>
                        <textarea maxlength='10000' name='comment' placeholder='Text' rows='10' style='font-size: 12px; width: 100%; box-sizing: border-box; border-radius: 3px; background-color: #F2eecb; overflow-wrap: break-word;'>". $comment ."</textarea>
                    </div>
                    <button style='margin-bottom: 0.30em; float: right;' type='submit' name='postEdit' class='post'>Edit</button>  
                </div>
            </form>";


    }
?>