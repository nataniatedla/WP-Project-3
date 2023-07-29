<?php
    session_start();

    // Check if property ID is provided in the URL
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $property_id = $_GET['id'];

        // Replace database credentials with your own
        $host = "localhost";
        $dbname = "kajibade1";
        $username = "kajibade1";
        $password = "kajibade1";

        try {
            // Connect to the database
            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Fetch property details based on the provided property ID
            $stmt = $conn->prepare("SELECT * FROM properties WHERE property_id = :property_id");
            $stmt->bindParam(':property_id', $property_id, PDO::PARAM_INT);
            $stmt->execute();
            $property = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            exit();
        }
    } else {
    echo "Invalid property ID provided.";
    exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Property Details</title>
    
	 	 <link rel="stylesheet" href="details.css">


 
</head>
<body>
<header> 
        <h1>UBuyIt</h1>
       <!-- Assuming you have the property_id available in a variable named property_id -->
      
        <div class="wishlist-button-container">
           <a href="wishlist.php?id=<?php echo $_GET['id']?>" class="wishlist-button">Wishlist +</a>
        </div>

	           


    </header>
    
    <div class="all">
        <?php if ($property): ?>
            <div class="property-details-container">
                <div class="property-image-container">
                    <img class="property-image" src="<?php echo $property['img1']; ?>" alt="Property Image">
                    <div class="navigation-arrows">
                        <span class="arrow" onclick="showPreviousImage()">&#8249;</span>
                        <span class="arrow" onclick="showNextImage()">&#8250;</span>
                    </div>
                </div>
                <div class="property-details">
                    <br/><br/>
                    <h2><?php echo $property['price']; ?></h2>
                    <p><?php echo $property['beds']; ?> beds | <?php echo $property['bath']; ?> baths | <?php echo $property['sqft']; ?> </p>
                    <p><?php echo $property['address']; ?></p>
                    <p>Monthly Payment: <?php echo $property['monthly_payment']; ?></p>
                    <br/> <br/>
                    <div class="home-description">
                        <h3>Home Description:</h3>
                        <p><?php echo $property['home']; ?></p>
                    </div>
                </div>
            </div>
			 <div class="home-details-container">
            <div class="home-details">
                <div class="features">
                    <h3>Features:</h3>
                    <p>Cooling: <?php echo $property['cooling']; ?></p>
                    <p>Heating: <?php echo $property['heating']; ?></p>
                    <p>Laundry: <?php echo $property['laundry']; ?></p>
                    <p>Parking: <?php echo $property['parking']; ?></p>
                    <p>Electricity: <?php echo $property['electricity']; ?></p>
                    <p>Appliances: <?php echo $property['appliances']; ?></p>
                    <p>Cable: <?php echo $property['cable']; ?></p>
                </div>
            </div>
			 </div>
        <?php else: ?>
            <p>Property not found.</p>
        <?php endif; ?>
    </div>

    <!-- JavaScript to handle image navigation -->
    <script>
        const images = [
            '<?php echo $property['img1']; ?>',
            '<?php echo $property['img2']; ?>',
            '<?php echo $property['img3']; ?>'
        ];
        let currentImageIndex = 0;

        function showPreviousImage() {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            updatePropertyImage();
        }

        function showNextImage() {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            updatePropertyImage();
        }

        function updatePropertyImage() {
            const propertyImage = document.querySelector('.property-image');
            propertyImage.src = images[currentImageIndex];
        }
		
		function addToWishlist(propertyId) {
            // Check if the property is already in the wishlist
            if (isPropertyInWishlist(propertyId)) {
                alert('Property already in wishlist.');
            } else {
                // Get existing wishlist from localStorage or initialize an empty array
                const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
                
                // Add the propertyId to the wishlist
                wishlist.push(propertyId);
                
                // Save the updated wishlist to localStorage
                localStorage.setItem('wishlist', JSON.stringify(wishlist));


               
            }
        }

        function isPropertyInWishlist(propertyId) {
            // Get the wishlist from localStorage or initialize an empty array
            const wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];
            
            // Check if the propertyId is present in the wishlist array
            return wishlist.includes(propertyId);
        }
    </script>
</body>


</html>