<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action= " " method= "post" enctype="mutlipart/form-data">
    <input type = "file" name="file"/>
    <input type = "Submit" value="Submit"/>
</form>
</body>
</html>

<?php
$filenames = $_FILES['file']['name'];
$tempname = $_FILES['file']['tmp_name'];


$target_dir = "webs/";

if (move_uploaded_file($tempname, $target_dir.$filenames)){
    echo "file uploaded sucessfully";
}
else{
    echo "File upload failed";
    echo "<br>";
}



?>