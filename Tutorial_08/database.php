<?php
$host = "localhost"; // Database host
$username = "root"; // Database username
$password = "1234"; // Database password
$database = "tutorial_08"; // Database name
// Create a connection to the database
$conn = new mysqli($host, $username, $password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $database";

$sql = "CREATE TABLE IF NOT EXISTS posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT,
  is_published BOOLEAN,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP
)";
if (!$conn->query($sql)) {
  echo "Error creating table: " . $conn->error;
}
?>
