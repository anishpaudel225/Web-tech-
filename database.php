<?php

include("connection.php");

$username ="sabin";
$password ="1234543rtw";

$sql = "INSERT INTO student (name, password)
VALUES('$username' , '$password')";

try{
    mysqli_query($conn, $sql);
        echo "data insertion done";

    }
    catch(mysql_sql_exception){
        echo "exception caught";

    }

    mysqli_close($conn);

?>