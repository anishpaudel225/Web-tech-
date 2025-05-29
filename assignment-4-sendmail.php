<?php
// This code runs when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = $_POST["to"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $headers = "From: anishpaudel582@gmail.com";  // Replace with your sender email

    // Try to send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "<p>Email sent successfully to $to!</p>";
    } else {
        echo "<p>Failed to send email. Please check server configuration.</p>";
    }
}
?>

<!-- HTML form for input -->
<h2>Send Email using PHP (without PHPMailer)</h2>
<form method="post" action="">
    To: <input type="email" name="to" required><br><br>
    Subject: <input type="text" name="subject" required><br><br>
    Message:<br>
    <textarea name="message" rows="5" cols="40" required></textarea><br><br>
    <input type="submit" value="Send Email">
</form>
