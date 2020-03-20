<?php
$servername = "localhost";
$dbUser = "root";
$dbPass = "";
$dbName = "login";

$conn = mysqli_connect($servername, $dbUser, $dbPass, $dbName);

if (!$conn) {
    die("Connection failed: ".mysqli_connect_error());
}
?>