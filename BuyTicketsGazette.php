<?php
    session_start();
    include 'include/dbh.inc.php';

    $testmode = false;
    $paypalurl = $testmode ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
    
    if (isset($_SESSION['userid'])) {
        $idUsers = $_SESSION['userid'];
        $sql = "SELECT * FROM users WHERE idUsers='$idUsers'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $ticketown = $row['tickets'];
        }
    }else{
        $ticketown = '0';
    }

    //success
    if (isset($_REQUEST['ipn_listener']) && $_REQUEST['ipn_listener'] == 'paypal') {
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode ('=', $keyval);
            if (count($keyval) == 2) $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
        $req = 'cmd=_notify-validate';
        $get_magic_quotes_exists = function_exists('get_magic_quotes_gpc') ? true : false;
        foreach ($myPost as $key => $value) {
            if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }
        // Below will verify the transaction, it will make sure the input data is correct
        $ch = curl_init($paypalurl);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
        $res = curl_exec($ch);
        curl_close($ch);
        if (strcmp($res, 'VERIFIED') == 0) {
            $idUsers = $_POST['item_number'];
            $ticketsamount = $_POST['quantity'];
            $ratecents = 1;

            $date = date('Y-m-d H:i:s');

            $sql1 =  "INSERT INTO transactionticketsmoney (idUsers, date, ticketsamount, ratecents) VALUES ('$idUsers', '$date', '$ticketsamount', '$ratecents')";
            $result1 = $conn->query($sql1);

            $sql2 = ("UPDATE users SET tickets = tickets + $ticketsamount WHERE idUsers = $idUsers");
            $result2 = $conn->query($sql2);
        }
        exit;
    }

    //Paypal Dir
    function paypal($idUsers) {
        if (isset($_POST['paypal'])) {
            // Variables we need to pass to paypal
            // Make sure you have a business account and set the "business" variable to your paypal business account email
            $data = array(
                'cmd'			=> '_xclick',
                'upload'        => '1',
                'lc'			=> 'EN',
                'business' 		=> 'thepg17760704@gmail.com',
                'cancel_return'	=> 'https://thepennsyl.com/BuyTicketsGazette.php?cancel=true',
                'notify_url'	=> 'https://thepennsyl.com/BuyTicketsGazette.php?ipn_listener=paypal',
                'currency_code'	=> 'USD',
                'return'        => 'https://thepennsyl.com/BuyTicketsGazette.php?success=true',
                'item_number'   => $idUsers,
                'quantity'      => $_POST['quantity'],
                'amount'        => '0.01'
            );
            // Add all the products that are in the shopping cart to the data array variable

            $testmode = false;
            $paypalurl = $testmode ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
        
            // Send the user to the paypal checkout screen
            header('location:' . $paypalurl . '?' . http_build_query($data));
            // End the script don't need to execute anything else
            exit;
        }
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

    <div id='HomepageMobileDivDivider' style='display: grid; grid-template-columns: 64% 36%; padding: 6px 0px 0px 0px;'>
        <div style='padding: 0px 6px 0px 6px;'>
            <div class='asidebox' style='background-color: #1A1A1B;'>
                    <div style=''>
                        <h1 class='signuptext' style='color: #F2eecb; font-size: 18px; font-family: Consolas;'>Buy Tickets切符🎟️</h1>
                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px; margin-top: 6px; font-family: Consolas;'>1 ▲/▼ = 1 Ticket🎟️</h1>
                        <h1 class='signuptext' style='color: #F2eecb; font-size: 12px; margin-top: 6px; font-family: Consolas;'>$0.01 = 1 Ticket🎟️</h1>
                    </div>
            </div>
            <div class='asidebox' style='background-color: #F2eecb; margin-top: 6px;'>

                <?php 
                
                if (isset($_SESSION['userid'])) {

                    echo"
                    <form method='POST' action'".paypal($idUsers)."'>
                        <div style='display: grid; grid-template-columns: auto auto; align-items: center;'>
                            <div>
                                <h1 class='signuptext' style='color: #1A1A1B; font-size: 11px;'>
                                    <label for='up'>Of what quantity Tickets🎟️=</label>
                                    <input class='ticket' type='number' name='quantity' value='0'>
                                </h1>
                            </div>
                            <div style='text-align: right;'>
                                <button id='sway' name='paypal' type='submit' class='voting' style='font-size: 10px; float:none;'>Purchase with Paypal</button>
                            </div>
                        </div>
                    </form>";

                }else {

                    echo"
                    <div style='display: grid; grid-template-columns: auto; align-items: center;'>
                        <div>
                            <h1 class='signuptext' style='color: #1A1A1B; font-size: 11px;'>You are not logged in and cannot purchase Tickets🎟️</h1>
                        </div>
                    </div>";

                } ?>
            </div>
<?php
        if ((isset($_REQUEST['success']) && $_REQUEST['success'] == true)) {
            echo"
            <div class='asidebox' style='background-color: #F2eecb; margin-top: 6px;'>
                <div>
                    <h1 class='signuptext' style='color: #1A1A1B; font-size: 18px;'>🎊Congratulation on your purchase of Tickets切符🎟️</h1>
                    <h1 class='signuptext' style='color: #1A1A1B; margin-top: 6px; font-size: 18px;'>You will get your Tickets切符🎟️ shortly. Try to refresh the webpage after 10 seconds.</h1>
                </div>
            </div>";
        }else {
            
        }
?>
        </div>
    </div>
    
</body>
</html>