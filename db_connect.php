<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "haruka_store";

$conn = new mysqli("localhost", "root", "", "haruka_store", 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
