<?php
session_start(); // Start the session at the beginning of your script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Perform validation and sanitation here

    // Send email
    $to = "h.r.jahangir@gmail.com";
    $subject = "Contact Form Submission";
    $headers = "From: $email";
    $message_body = "First Name: $fname\nLast Name: $lname\nEmail: $email\nMessage: $message";
    
    mail($to, $subject, $message_body, $headers);
    $_SESSION["form_success"] = true;

}
?>

<?php
if (isset($_SESSION["form_success"]) && $_SESSION["form_success"] === true) {
    echo "<p class='success-message'>Thank you for your submission!</p>";
    // Clear the session variable to show the message only once
    unset($_SESSION["form_success"]);
}
?>
