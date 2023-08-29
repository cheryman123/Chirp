<?php
    date_default_timezone_set('Europe/Oslo');
    include 'include/dbh.inc.php';
    include 'include/post.inc.php';

    if (isset($_SESSION['userid'])) {
        $username = $_SESSION['username'];

        $cid = $_POST['cid'];
        $idUsers = $_POST['idUsers'];
        $date = $_POST['date'];
        $title = $_POST['title'];

        $sqlpost = "SELECT * FROM post WHERE cid = $cid";
        $resultpost = $conn->query($sqlpost);
        while($row = $resultpost->fetch_assoc()) {
            $post = $row['post'];
        }

        echo"<form method='POST' action'". editPost($conn) ."'>
                <div style='overflow: hidden; box-sizing: border-box; margin-top: 6px; width: 100%; padding: 0.30em; padding-bottom: 0px; border: solid 2px; border-radius: 5px;'>
                    <input type='hidden' name='cid' value='". $cid ."'>
                    <input type='hidden' name='idUsers' value='". $idUsers ."'>
                    <input type='hidden' name='date' value='". $date ."'>
                    
                    <textarea maxlength='1000' name='title' placeholder='Title' rows='4' style='width: 100%; font-size: 18px; box-sizing: border-box; border-radius: 3px; background-color: #F2eecb; overflow-wrap: break-word;'>". $title ."</textarea>
                    <div style=''>
                        <textarea maxlength='40000' name='post' placeholder='Text' rows='20' style='width: 100%; font-size: 12px; box-sizing: border-box; border-radius: 3px; background-color: #F2eecb; overflow-wrap: break-word;'>". $post ."</textarea>
                    </div>   
                    <button style='margin-bottom: 0.30em; float: right;' type='submit' name='postEdit' class='post'>Edit</button>
                </div>
            </form>";


    }
?>