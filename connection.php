<?php
$db_server="localhost";
$db_user = "root";
$db_password = "";
$db_name = "Web";
$conn = "";
try{
    $conn = mysqli_connect($db_server, $db_user,$db_password,$db_name);
}
catch (mysql_sql_excpetion){
    echo "could not connect ";
}

if ($conn){
    echo "Connection";
}else {
        echo "No Connection";
    }
?>