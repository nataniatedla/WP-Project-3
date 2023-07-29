<?php
//$token = generate_unique_token();
//$token = '1,2,3';
$token = rtrim(strtr(base64_encode(random_bytes(32)), '+/', '-_'), '=');

// Send password reset email to the user with the reset link containing the token
$reset_link = "https://codd.cs.gsu.edu/~ijackson1/PHP_Testing/reset_password.html?token=" . urlencode($token);

// You can use a library like PHPMailer to send emails, or use the built-in mail() function
// For simplicity, let's use the mail() function here

$to = "indiajacksonphd@gmail.com"; // Replace with your own email address
$subject = "Test Email";
$message = $message = "Click the link below to reset your password:\n\n" . $reset_link;
$headers = "From: ijackson1@gsu.com"; // Replace with your own "From" email address

if (mail($to, $subject, $message, $headers)) {
    echo "Test email sent successfully.";
} else {
    echo "Failed to send the test email.";
}
?>
