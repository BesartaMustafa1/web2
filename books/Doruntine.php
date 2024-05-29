<?php
session_start();

// Funksioni për të vendosur cookie për sfondin
function setBackgroundCookie($value) {
    setcookie('background', $value, time() + (86400 * 30), "/"); // 86400 = 1 day
}

// Inicializimi i sesionit të karrocës nëse nuk ekziston
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// 2. Përcjellja përmes referencës
// Funksioni për shtimin e një produkti në karrocë
function addToCart(&$cart, $item) {
    foreach ($cart as &$existingItem) { // 3. Vendosja e referencave në mes të anëtarëve të vargut
        if ($existingItem['id'] == $item['id']) {
            $existingItem['quantity'] += $item['quantity'];
            return;
        }
    }
    $cart[] = $item;
}

// Menaxhimi i kërkesave POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['add_to_cart'])) {
        $item_id = $_POST['item_id'];
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_quantity = $_POST['quantity'];

        $item = [
            'id' => $item_id,
            'name' => $item_name,
            'price' => $item_price,
            'quantity' => $item_quantity
        ];

        addToCart($_SESSION['cart'], $item); // 4. Përcjellja e vlerës përmes referencës
        echo json_encode(['success' => true]);
        exit;
    }

    if (isset($_POST['remove_item'])) {
        $remove_id = $_POST['item_id'];
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['id'] == $remove_id) {
                unset($_SESSION['cart'][$index]); // 5.3 Përdorimi i funksionit unset()
                break;
            }
        }
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        echo json_encode(['success' => true]);
        exit;
    }
}

// Menaxhimi i cookies për sfondin
if (isset($_COOKIE['background'])) {
    $background = $_COOKIE['background'];
    if ($background === 'dark') {
        setBackgroundCookie('dark');
    } else {
        setBackgroundCookie('default');
    }
} else {
    setBackgroundCookie('default');
}

// 5. Përdorimi i funksioneve me referencë
// Funksioni për shtimin e një produkti në bazën e të dhënave me mbrojtje nga SQL Injection
function addProduct($name, $description, $price) {
    $dsn = 'mysql:host=localhost;dbname=your_database';
    $username = 'your_username';
    $password = 'your_password';

    try {
        $pdo = new PDO($dsn, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // 5.1 Kthimi përmes references, psh. Çasje në variablat globale etj.
        $sql = 'INSERT INTO products (name, description, price) VALUES (:name, :description, :price)';
        $stmt = $pdo->prepare($sql);

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':price', $price);

        $stmt->execute();

    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home2.css">
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        .product-container {
            display: flex;
            align-items: flex-start;
        }

        .product-image {
            flex: 0 0 50%;
            margin-right: 40px;
            padding: 100px;
        }

        .product-image img {
            max-width: 100%;
            height: 500px;
            width: 500px;
        }

        .product-details {
            margin-right: 40px;
            flex: 0 50% 50%;
            padding: 90px;
            align-self: flex-start;
        }

        .product-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 20px;
            margin-bottom: 20px;
            padding-top: 20px;
        }

        .product-description {
            margin-bottom: 20px;
            padding-top: 40px;
            font-size: 16px;
            text-align: center;
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            font-family: "Noto Serif Display", serif;
            box-shadow: #ccc;
        }

        .cart-form {
            margin: 50px 10px 75px 10px;
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .quantity {
            display: flex;
            align-items: center;
        }

        .qty {
            width: 50px;
            text-align: center;
            margin: 0 10px;
        }

        .minus,
        .plus {
            padding: 5px 10px;
            background-color: lightgray;
            color: #fff;
            border: none;
            cursor: pointer;
            margin-right: 5px;
        }

        .add-to-cart-btn {
            padding: 10px 20px;
            background-color: lightgrey;
            color: #fff;
            border: none;
            cursor: pointer;
            display: block;
            width: calc(100% - 10px);
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }

        .add-to-cart-btn:hover {
            background-color: lightblue;
        }
    </style>
</head>
<body>
<div id="header"></div>
<script>
    $('#header').load('../header/header.php');
</script>
    <header>
        <div id="welcomeMessage" style="display: none;">
            Welcome, <span id="username"></span>!
            <button onclick="signOut()">Sign Out</button>
        </div>
    </header>

    <div class="container">
        <div class="product-container">
            <div class="product-image">
                <img src="kadare.jpg" alt="Product Image">
            </div>
            <div class="product-details">
                <h2 class="product-title">Kush e solli Dorutinen</h2>
                <p class="product-price">$10.99</p>
                <p class="product-description">>When a slew of bombs destroys the library, Juliet relocates the stacks to the local Underground station where the city's residents shelter nightly, determined to lend out stories that will keep spirits up. But tragedy after tragedy threatens to unmoor the women and sever the ties of their community.</p>
                <form class="cart-form" onsubmit="addToCart(event)">
                    <input type="hidden" id="item_id" value="10">
                    <input type="hidden" id="item_name" value="Kush e solli Dorutinen">
                    <input type="hidden" id="item_price" value="10.99">
                    <div class="quantity">
                        <button type="button" class="minus">-</button>
                        <input type="text" class="qty" value="1">
                        <button type="button" class="plus">+</button>
                    </div>
                    <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Funksioni për të shtuar një produkt në karrocë përmes AJAX
        function addToCart(event) {
            event.preventDefault();
            let item_id = $('#item_id').val();
            let item_name = $('#item_name').val();
            let item_price = $('#item_price').val();
            let quantity = $('.qty').val();

            $.ajax({
                url: '../spaces/shop.php', // Ndryshoni këtë me rrugën e skedarit tuaj PHP
                type: 'POST',
                data: {
                    add_to_cart: true,
                    item_id: item_id,
                    item_name: item_name,
                    item_price: item_price,
                    quantity: quantity
                },
                success: function(response) {
                    let result = JSON.parse(response);
                    if (result.success) {
                        alert('Product added to cart'); // Shfaq një alert kur produkti shtohet në karrocë
                    }
                }
            });
        }

        // Menaxhimi i butonave plus dhe minus për sasinë e produktit
        $('.minus').on('click', function() {
            let qty = parseInt($('.qty').val());
            if (qty > 1) {
                $('.qty').val(qty - 1);
            }
        });

        $('.plus').on('click', function() {
            let qty = parseInt($('.qty').val());
            $('.qty').val(qty + 1);
        });
    </script>
    <iframe src="../footer/footer.php" width="100%" height="450vh"></iframe>

    <script>
        // Merrni username nga sessionStorage
        var username = sessionStorage.getItem("username");
        // Shfaqeni në elementin me id 'username'
        if (username) {
            document.getElementById("username").textContent = username;
            // Shfaqeni mesazhin e mirëseardhjes
            document.getElementById("welcomeMessage").style.display = "block";
        }

        // Funksioni për të çkyçur
        function signOut() {
            // Fshini username nga sessionStorage
            sessionStorage.removeItem("username");
            // Ridrejtohuni tek faqja e login
            window.location.href = "home2.php";
        }
    </script>
</body>
</html>
