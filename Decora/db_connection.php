<?php
// Database configuration
$dbHost     = 'localhost';
$dbUsername = 'decora';
$dbPassword = 'root';
$dbName     = 'root';

// Connect to the database
$conn = mysqli_connect($dbHost,$dbPassword,$dbName,$dbUsername);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
