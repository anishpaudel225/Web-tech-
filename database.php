<?php

include("connection.php");
//$userid = "10";
$username ="saron";
$password ="1dvbuy3";

$sql = "INSERT INTO std_tbl ( name, password)
VALUES('$username' , '$password' )";

try{
    mysqli_query($conn, $sql);
        echo "data insertion done";

    }
    catch(mysql_sql_exception){
        echo "exception caught";

    }

    mysqli_close($conn);

?>