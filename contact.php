<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get the form fields and sanitize the input
  $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

  // Set up the email
  $to = "abdulshaffayqazi@gmail.com"; // Replace with your own email address
  $subject = "New Contact Form Submission";
  $headers = "From: $email\r\n";
  $headers .= "Reply-To: $email\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/plain; charset=utf-8\r\n";

  // Compose the email body
  $email_body = "Name: $name\n";
  $email_body .= "Email: $email\n";
  $email_body .= "Message:\n$message";

  // Send the email
  if (mail($to, $subject, $email_body, $headers)) {
    // Email sent successfully
    echo "Thank you for contacting us. Your message has been sent.";
  } else {
    // Error sending email
    echo "Sorry, an error occurred while processing your request. Please try again.";
  }
} else {
  // Redirect back to the contact page if accessed directly without form submission
  header("Location: contact.html");
  exit;
}
?>
