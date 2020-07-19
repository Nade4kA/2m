<?php
$servername = "localhost";
$username = "olivam_first";
$password = "gfgfDfyz22";
$dbname = "olivam_shop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>