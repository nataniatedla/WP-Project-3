<?php
include('props.php');

// Replace database credentials with your own
$host = "localhost";
$dbname = "kajibade1";
$username = "kajibade1";
$password = "kajibade1";

try {
    // Connect to the database
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch property details for each property ID and create three cards
    for ($i = 0; $i < 3; $i++) {
        $property_id = $property_ids[$i];

        $stmt = $conn->prepare("SELECT property_id, price, beds, bath, sqft, img1 FROM properties WHERE property_id = :property_id");
        $stmt->bindParam(':property_id', $property_id, PDO::PARAM_INT);
        $stmt->execute();
        $property = $stmt->fetch(PDO::FETCH_ASSOC);
?>

        <!-- CARD <?php echo $i + 1; ?> -->
        <div class="card">
            <div class="cover cover1">
                <div class="content">
                    <img src="<?php echo $property['img1']; ?>">
                </div>
            </div>
            <div class="cover cover2">
                <div class="content">
                    <h3> <?php echo $property['price']; ?> </h3>
                    <hr>
                    <p> <?php echo $property['beds']; ?> beds | <?php echo $property['bath']; ?> baths | <?php echo $property['sqft']; ?> </p>
                    <p> </p>
                    <a href="houseinfo.php?id=<?php echo $property_id; ?>">Read More</a>
                </div>
            </div>
        </div>

<?php
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}
?>





