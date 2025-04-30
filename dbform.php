<?php
include ("connection.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "<?php echo htmlspecialchars($_SERVER ["PHP_SELF"]);
    

    Name:< input type = "name" name = "name">
    Email:< i type = "name" name = "email">
    <input type="submit" name="submit">


</body>
</html>

<?php

if ($_SERVER ["REQUEST_METHOD"]=="POST"){
    $name =$_POST ['name'];
    $email =$_POST ['password'];

    if (empty($name)){
        echo " please enter a username.";
        
    }elseif (empty($password)) {
        echo "Please enter a password"


    }
    else{
        $hash = password_hash ($passwod, PASSWORD_DEFAULT);
        $sql= "insert into users (user, password) VALUES('$username', '$hash')":
        
        if (mysqli_query($conn, $sql)){
            echo "New record created sucessfully";
        }else {
           echo "Error:" ,mysqli _close($conn);

        }
        


    }
}
?>





