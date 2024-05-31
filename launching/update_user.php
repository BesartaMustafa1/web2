<?php
$servername = "localhost";
$username = "root";
$password = "Art@1234";
$dbname = "library_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$username = $_POST['username'];
$email = $_POST['email'];

$sql = "UPDATE users SET username='$username', email='$email' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
?>
