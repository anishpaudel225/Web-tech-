<?php
include ("connection.php");

$id_deletion =2;


$sql ="DETETE FROM user WHERE id='2' '$id_deletion'";
try {
    mysqli_query($conn, $sql);
    echo "User deleted successfully ";

}
catch(mysqli_sql_exception $e){
    echo " could not deleted:" , $e -> getMessage();

}
mysqli_close($conn);
?>
