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
<html>
<head>
    <title>Property Listings</title>
	 <link rel="stylesheet" href="dashboard.css">

</head>
<body>

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

</body>
</html>
