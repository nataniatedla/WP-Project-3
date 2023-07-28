<html>
    <head>
        <meta charset="UTF-8">
    <!-- css stylesheets -->
        <link rel="stylesheet" href="dashboard.css">

        <title>UBuyIt - House Listing 1</title>
    </head>
    <body>
        <!-- UBUYIT HEADER -->
        <header>
                <h1>UBuyIt</h1>
            
                <div class="register-button-container">
                    <a href="signupform.html" class="register-button">Register</a>
                    <a href="login.html" class="login-button">Login</a>
                </div>
            </header>

        <!-- ACCESSING DATABASE -->
        <?php
            $host = "localhost";
            $user = "ntedla3";
            $pass = "ntedla3";
            $dbname = "ntedla3";

            $conn = new mysqli($host, $user, $pass, $dbname);
            if ($conn -> connect_error) {
                echo "Could not connect to server \n";
                die("Connection failed: " . $conn -> connect_error);
            }
            else {
                echo "Connection established \n";
            }
            
            echo mysql_get_server_info() . "\n";
            $conn -> close();
            //$db = mysql_select_db("company", $connection); // Selecting Database
            
            //MySQL Query to read data
            $query = mysql_query("select * from employee", $connection);
            
            while ($row = mysql_fetch_array($query)) {
                echo "<b> <a href='houseinfo.php?id={$row['price']}'> {$row['address']}</a></b>";
                echo "<br>";
            }
        ?>

            <div class="price">
                <?php echo $row1['price']; ?>
            </div>


    </body>
</html>