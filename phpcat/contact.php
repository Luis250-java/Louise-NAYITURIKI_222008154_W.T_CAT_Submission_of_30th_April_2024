<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    // Email information
    $to = "your-email@example.com"; // Replace with your email address
    $subject = "Contact Form Submission";

    // Compose email message
    $email_message = "Name: $name\n";
    $email_message .= "Email: $email\n";
    $email_message .= "Phone: $phone\n\n";
    $email_message .= "Message:\n$message";

    // Send email
    if (mail($to, $subject, $email_message)) {
        echo "<p>Your message has been sent successfully!</p>";
    } else {
        echo "<p>Sorry, there was an error sending your message. Please try again later.</p>";
    }
}
?>