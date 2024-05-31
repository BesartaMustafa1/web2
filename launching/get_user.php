<?php
$servername = "localhost";
$username = "root";
$password = "Art@1234";
$dbname = "library_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT username, email FROM users WHERE id = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["username"]. " - Age: " . $row["age"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
