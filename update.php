<?php
include ("connection.php");


$new_username ="sabinn";
$new_password ="123rtw";

$sql ="UPDATE std_tbl set password = '$new_password' , users='$new_password' where id='1'";
try {
    mysqli_query($conn, $sql);
    echo "User password updated successfully ";

}
catch(mysqli_sql_exception $e){
    echo " could not update:" , $e -> getMessage();

}
mysqli_close($conn);
?>
