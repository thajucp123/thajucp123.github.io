<!-- # This form will only work if webmail is set up in the hosting server # -->
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Validate input
  if (empty($name) || empty($email) || empty($mobile) || empty($subject) || empty($message)) {
    echo 'All fields are required.';
    exit;
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Invalid email format';
    exit;
  }

  // Set the recipient email address.
  $to = 'info@vsourcify.com'; // Change this to your email address

  // Set the email subject.
  $email_subject = "Contact Form: $subject";

  // Build the email content.
  $email_content = "Name: $name\n";
  $email_content .= "Email: $email\n";
  $email_content .= "Mobile: $mobile\n";
  $email_content .= "Message:\n$message\n";

  // Build the email headers.
  $email_headers = "From: $name <$email>";

  // Send the email.
  if (mail($to, $email_subject, $email_content, $email_headers)) {
    echo 'Your message has been sent. Thank you!';
  } else {
    echo 'Oops! Something went wrong and we couldn\'t send your message.';
  }
} else {
  echo 'There was a problem with your submission, please try again.';
}
?>