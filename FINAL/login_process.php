<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        die("Email and password are required");
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

    $email = $_POST["email"];
    $password = $_POST["password"];
    $id = $_POST["id"];

    // Retrieve user data from the user table
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("s", $email);

    if (!$stmt->execute()) {
        die("Error: " . $mysqli->error);
    }

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        die("Invalid email or password");
    }

    // Verify password
    if (password_verify($password, $user["password_hash"])) {
        session_start();
        $_SESSION["user_name"] = $user["name"]; // Store the user's name in a session variable
        $_SESSION["user_id"] = $user["id"];

        //header("Location: loginsuccess.php?name=" . urlencode($user["name"]));
        //exit();

        $redirect_url = "loginsuccess.php?name=" . urlencode($user["name"]) . "&user_id=" . urlencode($user["id"]);
        header("Location: " . $redirect_url);
        exit();
    } else {
        die("Invalid email or password");
    }

    $stmt->close();
    $mysqli->close();
}
