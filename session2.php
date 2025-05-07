<?php
session_start();
?>
<html>
<head>
    
</head>
<body>
    <?php
    echo $_SESSION["name"];
    echo "<br>";
    echo $_SESSION["class"];

    ?>
</body>
</html>