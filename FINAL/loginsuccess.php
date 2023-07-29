<!DOCTYPE html>
<html>
<head>
    <title>Login Success</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="thankyou.css">
    <!-- script -->
        <script type="text/javascript" src="dashboard.js" defer></script>
</head>
<body onload="openMessage()" style="background-color: #f1f1f1; margin: 0px; font-family: Arial, sans-serif;">

    <!-- THANK YOU MESSAGE -->
    <div class="messageContainer">
                <div class="thankyou" id="thankyou">
                <img class="smile" src="smile.png">
    <?php
        if (isset($_GET["name"])) {
            $user_name = $_GET["name"];

            echo "<h2>Thank you for choosing us, $user_name!</h2>
                <p>You have successfully logged into your account. Happy browsing!</p>
                ";
        } else {
            echo "<h2>Thank you for choosing us!</h2>
                <p>You have successfully logged into your account. Happy browsing!</p>
                ";
        }

        if (isset($_GET["id"])) {
            $user_id = $_GET["id"];
            
        }
        ?><form action="dashboardNew.php" method="post"><button type="submit" name="redirectButton">Continue to Dashboard</button></form>
            </div>
        </div>
        
<header style="background-color: #333;
            color: #fff;
            padding: 10px;
            margin: 0px;
            /* Reduced header padding */
            height: 60px;
            margin-bottom: 50px;
            ">  
    <h1 style="margin-top: 15px;
    font-size: 50px;
    margin-left: 15px;">UBuyIt</h1>
    </header>
    
</body>
</html>
