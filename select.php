<?php
include "connection.php";
$sql = "SELECT id, name FROM std_tbl";
//$sql = "SELECT id , name FROM std_tbl Where id>1";
//$sql = "SELECT * FROM std_tbl ORDERBY id Desc";

$sql = "SELECT * FROM std_Tbl WHERE id = 1";


$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)> 0)
 {
    while ($row = mysqli_fetch_assoc($result)){
        echo "id: " .$row ["id"]. " . Name : " . $row["name"]. "<br>";
    }
}
else{
    echo "0 result";

}
mysqli_close($conn);

?>