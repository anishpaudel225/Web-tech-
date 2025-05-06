<?php

setcookie ("lagrandee","bca", time() + 86400);
print_r($_COOKIE)
if (isset($_COOKIE["lagrandee"])){
    echo "cookie is " . $_COOKIE["lagrandee"];
}
else {
    echo "cookie is not set";
}
print_r($_COOKIE);

?>


