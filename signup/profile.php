<?php
// Variablat për të ruajtur të dhënat personale të përdoruesit
$emri = "John";
$mbiemri = "Doe";
$password = "fjalkalimi";
$numri_llogarise = "1234567890";

// Kontrollo për ndryshimin e fjalëkalimit
if (isset($_POST['submit_password'])) {
    $new_password = $_POST['new_password'];
    // Kryeni validimin e fjalëkalimit dhe përditësoni fjalëkalimin në bazën e të dhënave
    $password = $new_password;
    echo "<p>Fjalëkalimi u përditësua me sukses!</p>";
}

// Kontrollo për ndryshimin e të dhënave bankare
if (isset($_POST['submit_bank_info'])) {
    $new_bank_info = $_POST['new_bank_info'];
    // Kryeni validimin e të dhënave bankare dhe përditësoni ato në bazën e të dhënave
    $numri_llogarise = $new_bank_info;
    echo "<p>Të dhënat bankare u përditësuan me sukses!</p>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Profili i Përdoruesit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
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
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        p {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Profili i Përdoruesit</h2>
    <p><strong>Emri:</strong> <?php echo $emri; ?></p>
    <p><strong>Mbiemri:</strong> <?php echo $mbiemri; ?></p>
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
