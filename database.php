<?php
$servername = "localhost";
$username = "root";
$password = "root";

// Create connection
$conn = mysqli_connect($servername, $username, $password, 'blog');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>