<?php
session_start();
$errors = [];
$values = [];

function is_alphanumeric($str) {
    return preg_match('/^[a-zA-Z0-9\s]+$/', $str);
}

function is_alpha($str) {
    return preg_match('/^[a-zA-Z]+$/', $str);
}

// Get and trim inputs
$userid = trim($_POST['userid'] ?? '');
$password = trim($_POST['password'] ?? '');
$firstname = trim($_POST['firstname'] ?? '');
$address = trim($_POST['address'] ?? '');
$country = trim($_POST['country'] ?? '');
$zipcode = trim($_POST['zipcode'] ?? '');
$email = trim($_POST['email'] ?? '');
$sex = $_POST['sex'] ?? '';
$language = $_POST['language'] ?? '';
$about = $_POST['about'] ?? '';

// Validate inputs
if (empty($userid)) {
    $errors['userid'] = "User Id is required.";
} elseif (strlen($userid) < 5 || strlen($userid) > 12) {
    $errors['userid'] = "User Id should be of length 5 to 12.";
} else {
    $values['userid'] = $userid;
}

if (empty($password)) {
    $errors['password'] = "Password is required.";
} elseif (strlen($password) < 7 || strlen($password) > 12) {
    $errors['password'] = "Password should be of length 7 to 12.";
}

if (empty($firstname)) {
    $errors['firstname'] = "Firstname is required.";
} elseif (!is_alpha($firstname)) {
    $errors['firstname'] = "Firstname should only be alphabets.";
} else {
    $values['firstname'] = $firstname;
}

if (!empty($address) && !is_alphanumeric($address)) {
    $errors['address'] = "Address should have only alphanumeric characters.";
} else {
    $values['address'] = $address;
}

if (empty($country)) {
    $errors['country'] = "Country is required.";
} else {
    $values['country'] = $country;
}

if (empty($zipcode)) {
    $errors['zipcode'] = "Zip Code is required.";
} elseif (!is_numeric($zipcode)) {
    $errors['zipcode'] = "Zip Code should only be numeric.";
} else {
    $values['zipcode'] = $zipcode;
}

if (empty($email)) {
    $errors['email'] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "Email should be a valid email.";
} else {
    $values['email'] = $email;
}

if (empty($sex)) {
    $errors['sex'] = "Sex is required.";
} else {
    $values['sex'] = $sex;
}

$values['language'] = $language;
$values['about'] = $about;

// Return to form with errors or success
if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    $_SESSION['values'] = $values;
    header("Location: index.php");
    exit();
}

// No errors – show success message
echo "<h2>Registration Successful!</h2>";
foreach ($values as $key => $val) {
    echo "<strong>" . ucfirst($key) . "</strong>: " . htmlspecialchars($val) . "<br>";
}
?>
