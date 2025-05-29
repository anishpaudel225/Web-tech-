<?php
// Start the session
session_start();

// --- Part a: Create a cookie with username and roll number ---
// Set cookie values
$username = "JohnDoe";
$rollNumber = "123456";

// Combine values into one cookie (or use separate cookies if needed)
$cookie_value = $username . "|" . $rollNumber;

// Set cookie to expire in 3 days (3 * 24 * 60 * 60 seconds)
setcookie("user_info", $cookie_value, time() + (3 * 24 * 60 * 60));

// Check if cookie is set
if(isset($_COOKIE["user_info"])) {
    echo "<p>Cookie 'user_info' is set.<br>";

    // Split the cookie value into name and roll number
    list($nameFromCookie, $rollFromCookie) = explode("|", $_COOKIE["user_info"]);

    echo "Username from cookie: " . $nameFromCookie . "<br>";
    echo "Roll number from cookie: " . $rollFromCookie . "</p>";
} else {
    echo "<p>Cookie 'user_info' is not set.</p>";
}

// --- Get user input for name and show email from cookie if matched ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredName = $_POST["name"];

    if(isset($_COOKIE["user_info"])) {
        list($nameFromCookie, $rollFromCookie) = explode("|", $_COOKIE["user_info"]);

        if ($enteredName == $nameFromCookie) {
            echo "<p>Email from cookie (generated): " . strtolower($nameFromCookie) . "@college.edu</p>";
        } else {
            echo "<p>Name does not match cookie data.</p>";
        }
    }
}
?>

<!-- HTML Form to enter name -->
<form method="post">
    Enter your name: <input type="text" name="name" required>
    <input type="submit" value="Check Email">
</form>

<?php
// --- Part b I: Check if cookies are enabled ---
if (count($_COOKIE) > 0) {
    echo "<p>Cookies are enabled.</p>";
} else {
    echo "<p>Cookies are disabled or not working properly.</p>";
}

// --- Part b II: Delete the cookie by setting it to expire an hour ago ---
if (isset($_COOKIE["user_info"])) {
    setcookie("user_info", "", time() - 3600); // Expire 1 hour ago
    echo "<p>Cookie 'user_info' has been deleted.</p>";
}
?>
