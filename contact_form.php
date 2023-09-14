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
    
    if (mail($to, $subject, $message_body, $headers)) {
        $_SESSION["form_success"] = true;
    }
    

}
?>

<?php
if (isset($_SESSION["form_success"]) && $_SESSION["form_success"] === true) {
    echo "<p class='success-message'>Thank you for your submission!</p>";
    // Clear the session variable to show the message only once
    unset($_SESSION["form_success"]);
}
?>

<div>
        <div style="border: 4mm ridge rgba(69, 80, 83, 0.6); padding: 5%; background-color: rgb(68, 53, 92); border-radius: 10%;">
          <h2>Contact Us</h2>
          <p>Feel free to get in touch with us using the form below:</p>
          <form action="contact_form.php" method="post">
            <table>
              <tr>
                <td>
                  First Name:
                </td>
                <td>
                  <input type="text" name="fname">
                </td>
              </tr>
              <tr>
                <td>
                  Last Name:
                </td>
                <td>
                  <input type="text" name="lname">
                </td>
              </tr>
              <tr>
                <td>
                  Email Address:
                </td>
                <td>
                  <input type="text" name="email">
                </td>
              </tr>
              <tr>
                <td>
                  Message:
                </td>
                <td>
                  <input type="text" placeholder="Type your message" name="message">
                </td>
              </tr>  
            </table>
            <input class="submit" type="submit" value="submit">
          </form>

          <?php
            if (isset($_SESSION["form_success"]) && $_SESSION["form_success"] === true) {
                echo "<p class='success-message'>Thank you for your submission!</p>";
                // Clear the session variable to show the message only once
                unset($_SESSION["form_success"]);
          }
          ?>
        </div>
      </div>
