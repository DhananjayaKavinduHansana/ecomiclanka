<?php
$serverName ="localhost";
$dbUsername ="root";
$dbPassword ="root";
$dbName ="ecomic_lanka";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die("Connection failed;".mysqli_connect_error());
} else {
    //print("Connection successful");
}


?>