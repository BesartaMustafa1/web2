<?php
$servername = "localhost";
$username = "root"; 
$password = "Art@1234"; 
$dbname = "library_db"; 


$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>