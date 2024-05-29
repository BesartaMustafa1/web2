<?php
ob_start();
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$errors = []; // Vargu për të mbledhur gabimet

// Funksioni për trajtimin e gabimeve
function customErrorHandler($errno, $errstr, $errfile, $errline, $errcontext = []) {
    global $errors;
    $errorMessage = "[ERROR][$errno] $errstr in $errfile on line $errline\n";
    $errors[] = $errorMessage; // Shto gabimin në varg
    return true;
}

set_error_handler("customErrorHandler");

// Krijimi i një gabimi të personalizuar (shqip) dhe trajtimi i tij
function triggerCustomError($error_message, $error_type = E_USER_NOTICE) {
    trigger_error($error_message, $error_type);
}

// Funksioni për lidhjen me bazën e të dhënave
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "Art@1234";
    $dbname = "library_db"; // Zëvendësojeni me emrin e bazës së të dhënave tuaj

    // Krijimi i lidhjes
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kontrollo lidhjen
    if ($conn->connect_error) {
        triggerCustomError("Lidhja dështoi: " . $conn->connect_error, E_USER_ERROR);
        return null;
    }

    return $conn;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'] ?? '';
    $surname = $_POST['surname'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $card_number = $_POST['card_number'] ?? '';
    $expiry_date = $_POST['expiry_date'] ?? '';
    $ccv = $_POST['ccv'] ?? '';

    $hasError = false;

    try {
        if (empty($name)) {
            triggerCustomError("Emri është i detyrueshëm.", E_USER_WARNING);
            $hasError = true;
        }
        if (empty($surname)) {
            triggerCustomError("Mbiemri është i detyrueshëm.", E_USER_WARNING);
            $hasError = true;
        }
        if (empty($phone)) {
            triggerCustomError("Numri i telefonit është i detyrueshëm.", E_USER_WARNING);
            $hasError = true;
        } elseif (!preg_match("/^\+?\d{10,15}$/", $phone)) {
            triggerCustomError("Numri i telefonit nuk është i vlefshëm.", E_USER_WARNING);
            $hasError = true;
        }
        if (empty($card_number)) {
            triggerCustomError("Numri i kartës së kreditit është i detyrueshëm.", E_USER_WARNING);
            $hasError = true;
        } elseif (!preg_match("/^[0-9]{16}$/", $card_number)) {
            triggerCustomError("Numri i kartës së kreditit duhet të ketë 16 shifra.", E_USER_WARNING);
            $hasError = true;
        }
        if (empty($expiry_date)) {
            triggerCustomError("Data e skadimit është e detyrueshme.", E_USER_WARNING);
            $hasError = true;
        }
        if (empty($ccv)) {
            triggerCustomError("CCV është i detyrueshëm.", E_USER_WARNING);
            $hasError = true;
        } elseif (!preg_match("/^[0-9]{3,4}$/", $ccv)) {
            triggerCustomError("CCV duhet të ketë 3 ose 4 shifra.", E_USER_WARNING);
            $hasError = true;
        }

        if (!$hasError) {
            // Lidhja me bazën e të dhënave
            $conn = connectDB();
            if ($conn) {
                // Futja e të dhënave në bazën e të dhënave
                $stmt = $conn->prepare("INSERT INTO orders (name, surname, phone, card_number, expiry_date, ccv) VALUES (?, ?, ?, ?, ?, ?)");
                $stmt->bind_param("ssssss", $name, $surname, $phone, $card_number, $expiry_date, $ccv);

                if ($stmt->execute()) {
                    // Pastrimi i shportës
                    $_SESSION['cart'] = [];
                    setcookie('cart', '', time() - 3600, '/'); // Fshin cookie-n
                    header('Location: ../home html/home2.php');
                    exit;
                } else {
                    triggerCustomError("Dështoi futja e të dhënave: " . $stmt->error, E_USER_ERROR);
                }

                // Mbyllja e lidhjes
                $stmt->close();
                $conn->close();
            }
        }
    } catch (Exception $e) {
        triggerCustomError("Një gabim ndodhi: " . $e->getMessage(), E_USER_ERROR);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Order</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../header/header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h3 {
            margin-bottom: 20px;
            color: #004d40;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #004d40;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div id="header">
    <?php include '../header/header.php'; ?>
</div>

<div class="container">
    <h3 class="page-title">Confirm Order</h3>
    <form action="confirm.php" method="post">
        <h3>Billing Information</h3>
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" id="surname" name="surname" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone Number:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <div class="form-group">
            <label for="card_number">Card Number:</label>
            <input type="text" id="card_number" name="card_number" required>
        </div>
        <div class="form-group">
            <label for="expiry_date">Expiry Date:</label>
            <input type="text" id="expiry_date" name="expiry_date" required>
        </div>
        <div class="form-group">
            <label for="ccv">CCV:</label>
            <input type="text" id="ccv" name="ccv" required>
        </div>
        <input type="submit" name="confirm_order" value="Confirm Order" class="btn btn-primary">
    </form>
</div>
</body>
</html>
