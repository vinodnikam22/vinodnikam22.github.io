<?php
// Check for required fields
if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "No valid email provided!";
    exit;
}

// Sanitize inputs
$name = isset($_POST['name']) ? strip_tags(htmlspecialchars($_POST['name'])) : '';
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = isset($_POST['phone']) ? strip_tags(htmlspecialchars($_POST['phone'])) : '';
$message = isset($_POST['message']) ? strip_tags(htmlspecialchars($_POST['message'])) : '';

// Create the email and send the message
$to = 'info@nextremesystems.com';
$email_subject = "Website Contact Form: $name";
$email_body = "You have received a new message from your website contact form.\n\n".
              "Here are the details:\n\nName: $name\n\nEmail: $email_address\n\n".
              "Phone: $phone\n\nMessage:\n$message";
              
$headers = "From: noreply@nextremesystems.com\r\n";
$headers .= "Reply-To: $email_address\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Attempt to send email
if(mail($to, $email_subject, $email_body, $headers)) {
    echo "Message successfully sent!";
    return true;
} else {
    echo "Message delivery failed!";
    return false;
}
?>