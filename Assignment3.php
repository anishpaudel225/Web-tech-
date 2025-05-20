<?php
// db.php - Database connection
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'address_book';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!-- index.html - Main Form -->
<!DOCTYPE html>
<html>
<head><title>Address Book</title></head>
<body>
    <h2>Address Book</h2>
    <form action="action.php" method="post">
        First Name: <input type="text" name="firstname"><br>
        Designation: <input type="text" name="designation"><br>
        Address 1: <input type="text" name="address1"><br>
        Address 2: <input type="text" name="address2"><br>
        City: <input type="text" name="city"><br>
        State: <input type="text" name="state"><br>
        Email ID: <input type="email" name="emailid"><br>
        <input type="submit" name="action" value="Add">
        <input type="submit" name="action" value="Update">
        <input type="submit" name="action" value="Delete">
    </form>

    <form action="search.php" method="get">
        <h3>Search by Email</h3>
        Email ID: <input type="email" name="emailid">
        <input type="submit" value="Search">
    </form>
</body>
</html>

<?php
// action.php - Handles Add, Update, Delete
include 'db.php';

$firstname = $_POST['firstname'];
$designation = $_POST['designation'];
$address1 = $_POST['address1'];
$address2 = $_POST['address2'];
$city = $_POST['city'];
$state = $_POST['state'];
$emailid = $_POST['emailid'];
$action = $_POST['action'];

if ($action == 'Add') {
    $sql = "INSERT INTO addresses (firstname, designation, address1, address2, city, state, emailid)
            VALUES ('$firstname', '$designation', '$address1', '$address2', '$city', '$state', '$emailid')";
} elseif ($action == 'Update') {
    $sql = "UPDATE addresses SET firstname='$firstname', designation='$designation', address1='$address1',
            address2='$address2', city='$city', state='$state' WHERE emailid='$emailid'";
} elseif ($action == 'Delete') {
    $sql = "DELETE FROM addresses WHERE emailid='$emailid'";
}

if ($conn->query($sql) === TRUE) {
    echo "Operation successful.";
} else {
    echo "Error: " . $conn->error;
}
$conn->close();
?>

<?php
// search.php - Search by Email ID
include 'db.php';

$emailid = $_GET['emailid'];
$sql = "SELECT * FROM addresses WHERE emailid='$emailid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h3>Address Details</h3>";
    echo "Name: " . $row['firstname'] . "<br>";
    echo "Designation: " . $row['designation'] . "<br>";
    echo "Address1: " . $row['address1'] . "<br>";
    echo "Address2: " . $row['address2'] . "<br>";
    echo "City: " . $row['city'] . "<br>";
    echo "State: " . $row['state'] . "<br>";
    echo "Email: " . $row['emailid'] . "<br>";
} else {
    echo "No record found.";
}
$conn->close();
?>

-- SQL to Create Table --
CREATE DATABASE address_book;
USE address_book;
CREATE TABLE addresses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50),
    designation VARCHAR(50),
    address1 VARCHAR(100),
    address2 VARCHAR(100),
    city VARCHAR(50),
    state VARCHAR(50),
    emailid VARCHAR(100) UNIQUE
);