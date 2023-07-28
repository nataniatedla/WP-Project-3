<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["token"])) {
        die("Token is not here");
    }

    if (empty($_POST["password"])) {
        die("Password is not here");
    }

    if (empty($_POST["confirm_password"])) {
        die("Confirm Password is not here");
    }

    $token = $_POST["token"];
    $userPassword = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];

    if ($userPassword !== $confirm_password) {
        die("Passwords do not match");
    }

    if (!$token) {
        die("Invalid or expired reset token");
    }

    $host = "localhost";
    $dbname = "kajibade1";
    $username = "kajibade1";
    $password = "kajibade1";

    $mysqli = new mysqli($host, $username, $password, $dbname);

    if ($mysqli->connect_errno) {
        echo "Could not connect to the server\n";
        die("Connection error: " . $mysqli->connect_error);
    }

    $sql = "SELECT * FROM user WHERE reset_token = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $token);

    if (!$stmt->execute()) {
        die("Error: " . $mysqli->error);
    }

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
       // die("Invalid or expired reset token");
    }

    // Update the user's password in the database
    $hashed_password = password_hash($userPassword, PASSWORD_DEFAULT);
    $sql = "UPDATE user SET password_hash = ?, reset_token = NULL WHERE email = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("ss", $hashed_password, $user["email"]);

    if (!$stmt->execute()) {
        die("Error: " . $mysqli->error);
    }

    // Password reset successful, redirect to the login page
    header("Location: login.html");
    exit();

    $stmt->close();
    $mysqli->close();
}
?>
