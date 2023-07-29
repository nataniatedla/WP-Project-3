<?php
// Replace the following variables with your actual database credentials
$host = 'localhost';
$user = 'kajibade1';
$password = 'kajibade1';
$database = 'kajibade1';


try {
    // Create a connection to the database
    $connection = new PDO("mysql:host=$host;dbname=$database", $user, $password);

    // Set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define the SQL query to retrieve all property_id values and their data
    $query = "SELECT property_id, price, address, beds, bath, sqft, monthly_payment, home, cooling, heating, laundry, parking, electricity, appliances, cable FROM properties";

    // Execute the query and fetch all rows
    $result = $connection->query($query);
    $properties = $result->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
    <!-- stylesheets -->
        <link rel="stylesheet" href="dashboard.css">
        <link rel="stylesheet" href="cards.css">
        <link rel="stylesheet" href="thankyou.css">

        <!-- script -->
        <script type="text/javascript" src="dashboard.js" defer></script>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        
        
        <title>UBuyIt - Buyer Dashboard</title>
    </head>
    <body onload="openMessage()">

    <!-- THANK YOU MESSAGE -->
        <div class="messageContainer">
                <div class="thankyou" id="thankyou">
                <img class="smile" src="smile.png">
                <h2>Thank you for choosing us!</h2>
                <p>You have successfully logged into your account. Happy browsing!</p>
                <button type="button" onclick="closeMessage()">Continue to Dashboard</button>
            </div>
        </div>

    <!-- UBUYIT HEADER -->
        <header>
                <h1>UBuyIt</h1>
            
                <div class="register-button-container">
                    <a href="signupform.html" class="register-button">Register</a>
                    <a href="login.html" class="login-button">Login</a>
                </div>
            </header>

    
    <!-- SEARCH BAR -->

        <div class="search">
            <label for="searchInput">Search</label>
            <input type="search" id="searchInput" oninput="liveSearch()" placeholder="Search...">
            <br>
            
            <div class="query">
                <h3> <?php echo $property['price']; ?> </h3>
                <p><?php echo $property['beds']; ?> beds | <?php echo $property['bath']; ?> baths | <?php echo $property['sqft']; ?> </p>
            </div>

            <div class="query">
                <h3> <?php echo $property['price']; ?> </h3>
                <p> <?php echo $property['beds']; ?> beds | <?php echo $property['bath']; ?> baths | <?php echo $property['sqft']; ?> </p>
            </div>

            <div class="query">
                <h3> <?php echo $property['price']; ?> </h3>
                <p> <?php echo $property['beds']; ?> beds | <?php echo $property['bath']; ?> baths | <?php echo $property['sqft']; ?></p>
            </div>
        </div>
    


    <!-- DASHBOARD CARDS -->

        <div class="uhm">
            <h2> Some properties you might be interested in...</h2>
        </div>

        <div class="container">

            <!-- Loop through all properties and create cards for each one -->
            <?php foreach ($properties as $property) : ?>
                <div class="card">
                    <div class="cover cover1">
                        <div class="content">
                            <img src="<?php echo $property['img1']; ?>">
                        </div>
                    </div>
                    <div class="cover cover2">
                        <div class="content">
                            <h3><?php echo $property['price']; ?></h3>
                            <hr>
                            <p><?php echo $property['beds']; ?> beds | <?php echo $property['bath']; ?> baths | <?php echo $property['sqft']; ?></p>
                            <!-- Add other property information as needed -->
                            <p> </p>
                            <a href="houseinfo.php?id=<?php echo $property['property_id']; ?>">Read More</a>
                        </div>
                    </div>
                </div>
                <br>
            <?php endforeach; ?>
            
        </div>

    <!-- WISHLIST -->
        <div class="wishlist">
            <button href="show-wishlist.php?id=<?php echo $_GET['property_id']?>" class="register-button">
                View Wishlist <i class="fas fa-list" style="font-size:24px"></i>
            </button>
        </div>

        <p>
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img style="border:0;width:88px;height:31px"
                    src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                    alt="Valid CSS!" />
            </a>
        </p>
        

    </body>
</html>

