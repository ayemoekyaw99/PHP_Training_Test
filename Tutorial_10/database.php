<?php
$host = "localhost"; // Database host
$username = "root"; // Database username
$password = "1234"; // Database password
$database = "tutorial_10"; // Database name
// Create a connection to the database
$conn = new mysqli($host, $username, $password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $database";

$sql = "CREATE TABLE IF NOT EXISTS users (
     id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    phone VARCHAR(20),
    image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($sql)) {
  echo "Error creating table: " . $conn->error;
}
?>