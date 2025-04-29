<?php
if(isset($_POST['submit'])){
    $name =$_POST['name'];
    $email =$_POST['email'];
    $phone = $_POST['phone'];


    if(empty($name)){
        echo"nameis required ";

    }
    else{
        //echo $name;
        echo"helo," . htmlspecialchars($name)."!";

    }

    if (empty (phone)){
        echo "PHone number is required! <br>";

    } elseif (!preg_match('[0-9] {10} $/', $phone)){
        echo " invalid phone number! It should be 10 digit.<br>";
    }else {
        echo " Your phone number : " .htmlspecialchars($phone). "<br>"
    } 

    if (empty($email)){
        echo "email is required! <br>";

    } elseif(!filter_var($email. FILTER_VALIDATE_EMAIL)){
        echo "invalid email format! <br>";

    } else{
         echo " email : " .htmlspecialchars($email). "<br>"
    }
    //mobile no thats start with 98 total digit 10

// for email validation
// [a-z A-Z 0-9 _\ -\.]+[@] [ a-z] + [\.] + [a-z] {2,3}

}
?>

<form method = "post">
    name: <input type = "text" name="name">
    Email: <input type="text" nam="email">
    Phone:<input type = "text" name ="phone">
    <input type="submit" name="submit">
</form>