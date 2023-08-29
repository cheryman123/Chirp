<?php
    date_default_timezone_set('Europe/Oslo');
    include 'include/dbh.inc.php';

    if (isset($_SESSION['userid'])) {
        $userid = $_SESSION['userid'];
        $username = $_SESSION['username'];
    }
    else {
        $userid = 0;
        $username = 'Anonymous';
    }

    $cid = $_GET['c'];

    echo"<form class='reply-form' method='POST' style='display:none;' data-comment-id='" . $row['kid'] . "' action'".setReply($conn)."'>
            <div style='overflow: hidden; box-sizing: border-box; margin-top: 6px; width: 100%; padding: 0.30em; padding-bottom: 0px; border: solid 2px; border-radius: 5px;'>
                <input type='hidden' name='cid' value='".$row['cid']."'>
                <input type='hidden' name='pid' value='".$row['kid']."'>
                <input type='hidden' name='CorR' value='0'>
                <input type='hidden' name='idUsers' value='".$userid."'>
                <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
                
                <div>
                    <textarea maxlength='10000' name='comment' placeholder='Add a reply' rows='2' style='font-size: 12px; width: 100%; box-sizing: border-box; border-radius: 3px; background-color: #F2eecb; overflow-wrap: break-word;'></textarea>
                </div>
                <button style='margin-bottom: 0.30em; float: right;' type='submit' name='replySubmit' class='post'>Comment</button>
            </div>
        </form>";
?>