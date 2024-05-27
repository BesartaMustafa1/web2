<?php
session_start();
require_once("../mysql/dbconnector.php");

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Fetch user's name and surname from the database
    $sql = "SELECT first_name, last_name FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $emri = $row['emri'];
        $mbiemri = $row['mbiemri'];
    } else {
        $emri = $mbiemri = "Nuk u gjetën të dhëna";
    }
} else {
    $username = $emri = $mbiemri = "";
}

// Handle password update
if (isset($_POST['submit_password'])) {
    $new_password = $_POST['new_password'];
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql_update_password = "UPDATE users SET password='$hashed_password' WHERE username='$username'";
    if ($conn->query($sql_update_password) === TRUE) {
        echo "<p>Fjalëkalimi u përditësua me sukses!</p>";
    } else {
        echo "<p>Gabim gjatë përditësimit të fjalëkalimit: " . $conn->error . "</p>";
    }
}

// Handle bank info update
if (isset($_POST['submit_bank_info'])) {
    $new_bank_info = $_POST['new_bank_info'];
    $sql_update_bank_info = "UPDATE users SET bank_info='$new_bank_info' WHERE username='$username'";
    if ($conn->query($sql_update_bank_info) === TRUE) {
        echo "<p>Të dhënat bankare u përditësuan me sukses!</p>";
    } else {
        echo "<p>Gabim gjatë përditësimit të të dhënave bankare: " . $conn->error . "</p>";
    }
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libraria - Profili i Përdoruesit</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        form {
            margin-top: 20px;
        }

        input[type="password"],
        input[type="text"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Profili i Përdoruesit</h2>
    <p><strong>Emri:</strong> <?php echo htmlspecialchars($emri); ?></p>
    <p><strong>Mbiemri:</strong> <?php echo htmlspecialchars($mbiemri); ?></p>
    <form method="post" action="">
        <h3>Përditëso Fjalëkalimin</h3>
        <input type="password" name="new_password" placeholder="Fjalëkalimi i ri">
        <input type="submit" name="submit_password" value="Përditëso Fjalëkalimin">
    </form>
    <form method="post" action="">
        <h3>Të Dhënat Bankare</h3>
        <input type="text" name="new_bank_info" placeholder="Numri i llogarisë bankare të re">
        <input type="submit" name="submit_bank_info" value="Përditëso Të Dhënat Bankare">
    </form>
</div>

</body>
</html>
