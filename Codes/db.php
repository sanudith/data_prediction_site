<?php
// db.php

// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "data_prediction_website";

// Create a new MySQLi connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    die("Connection Okay");
}
?>
