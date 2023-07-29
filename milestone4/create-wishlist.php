<?php

// Replace the following variables with your actual database credentials
$host = "localhost";
$user = "ntedla3";
$password = "ntedla3";
$database = "ntedla3";

try {
    // Create a connection to the database
    $connection = new PDO("mysql:host=$host;dbname=$database", $user, $password);

    // Set the PDO error mode to exception
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define the SQL query to create the "wishlist" table
    $query = "
        CREATE TABLE wishlist (
            id INT AUTO_INCREMENT PRIMARY KEY,
            pid INT(11) NOT NULL,
            uid INT(11) NOT NULL,
            timestamp DATETIME DEFAULT NULL
        )
    ";

    // Execute the query to create the table
    $connection->exec($query);

    echo "Table 'wishlist' created successfully.";

} catch (PDOException $e) {
    echo "Error creating table: " . $e->getMessage();
}
?>