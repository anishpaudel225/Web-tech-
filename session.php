<?php
    session_start();

?>
<html>
<head>
    
</head>
<body>
    <?php
    $_SESSION["name"] = "lagrandee";
    $_SESSION["class"] = "webii";

    echo "session variable are set";
    ?>
</body>
</html>
