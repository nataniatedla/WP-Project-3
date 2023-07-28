<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty($_POST["email"])) {
        die("Email is required");
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

    // Check if the email exists in the database
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
        die("Email not found"); // Show message on screen if email doesn't exist
    }

    // Generate a unique token (you can use a library or a custom function for this)
    $token = rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');

    // Save the token in the database for password reset verification
    // ALTER TABLE user ADD reset_token VARCHAR(255);

    $sql = "UPDATE user SET reset_token = ? WHERE email = ?";
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("SQL error: " . $mysqli->error);
    }

    $stmt->bind_param("ss", $token, $email);

    if (!$stmt->execute()) {
        die("Error: " . $mysqli->error);
    }

    // Send password reset email to the user with the reset link containing the token
    $reset_link = "https://codd.cs.gsu.edu/~ijackson1/PHP_Testing/reset_password.html?token=" . urlencode($token);

    // You can use a library like PHPMailer to send emails, or use the built-in mail() function
    // For simplicity, let's use the mail() function here
    $to = $email;
    $subject = "Password Reset";
    $message = "Click the link below to reset your password:\n\n" . $reset_link;
    $headers = "From: ijackson1@gsu.com\r\n";

    if (mail($to, $subject, $message, $headers)) {
        // Password reset email sent successfully, redirect to reset_sent page
        header("Location: reset_email_sent.html");
        exit();
    } else {
        // Failed to send password reset email, redirect to reset_error page
        header("Location: reset_email_error.html");
        exit();
    }

    $stmt->close();
    $mysqli->close();
}
?>
