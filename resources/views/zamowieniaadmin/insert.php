<!DOCTYPE html>
<html>
 
<head>
    <title>Insert Page page</title>
</head>
 
<body>
    <center>
        
<?php

$server = "localhost";
$username ="root";
$password ="";
$dbname ="nztk";

$conn = mysqli_connect($server, $username, $password, $dbname);

{    
     $status = $_POST['status'];
     $sql = "UPDATE `zamowienia` SET `status` = '$status' WHERE `zamowienia`.`id` = $id";
     if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
     }
    
}
if (mysqli_query($conn)) {
    echo "New record has been added successfully !";
 } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
 }
?>
    </center>
</body>
 
</html>