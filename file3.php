<?php
//$file = fopen("abcd.txt", "w");

$file = fopen("abcd.txt", "a");

fwrite ($file, "hello");

?>