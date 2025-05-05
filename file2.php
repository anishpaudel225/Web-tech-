<?php

$file = fopen ("abc.txt", "r");

//echo var_dump($file );
//$content = fread($file,filesize("abc.txt"));
//echo $content;
//fclose($file);
//echo fgetc($file);

echo fgets($file);
echo "<br>";
echo fgets($file);
?>