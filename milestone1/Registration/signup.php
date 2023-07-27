<?php

if (empty($_POST["name"])) {
    die("Name is required");
}


if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$host = "localhost";
$dbname = "kajibade1";
$username = "kajibade1";
$password = "kajibade1";

$mysqli = new mysqli($host, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    echo "Could not connect to the server\n";
    die("Connection error: " . $mysqli->connect_error);
} else {
    echo "";
}

// Create user table
$sql = "CREATE TABLE IF NOT EXISTS user (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(128) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL
)";



// Insert user data into the user table
$sql = "INSERT INTO user (name, email, password_hash) VALUES (?, ?, ?)";
$stmt = $mysqli->prepare($sql);

if (!$stmt) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

if ($stmt->execute()) {
   header("Location: signsuccess.html");
} else {
    if ($mysqli->errno === 1062) {
        die("Email already taken\n");
    } else {
        die("Error: " . $mysqli->error . " " . $mysqli->errno . "\n");
    }
}

$stmt->close();
$mysqli->close();
