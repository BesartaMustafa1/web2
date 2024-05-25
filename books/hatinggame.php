<?php
if (isset($_POST['submit_rating'])) {
    $rating = $_POST['rating'];
    // Connect to your database
    $conn = new mysqli('localhost', 'username', 'password', 'database');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert the rating into the database
    $stmt = $conn->prepare("INSERT INTO ratings (book_id, rating) VALUES (?, ?)");
    $book_id = 1; // Assuming 1 is the ID for "The Hating Game"
    $stmt->bind_param("ii", $book_id, $rating);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    // Redirect or display a success message
    echo "<script>alert('You rated the book $rating stars!');</script>";
    // header('Location: thank_you.php'); // Redirect to a thank you page if needed
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
            align-items: flex-start; /* Align items to the start */
        }

        .product-image {
            flex: 0 0 50%;
            margin-right: 40px; /* Add margin to the right */
            padding: 100px;
        }

        .product-image img {
            max-width: 100%;
            height: 500px;
            weight: 500px;
        }

        .product-details {
            margin-right: 40px;
            flex: 0 50% 50%;
            padding: 90px;
            align-self: flex-start; /* Align this section to the start */
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
            font-size: 60;
            text-align: center;
            border-top: 1px solid gray;
            border-bottom: 1px solid gray;
            font-family:  "Noto Serif Display", serif;
            box-shadow: #ccc;
        }

        .cart-form {
            margin: 50px 10px 75px 10px;
        }

        .cart-form {
            margin-bottom: 20px;
            border: 2px solid #ccc; /* Add border */
            padding: 20px; /* Add padding */
            border-radius: 10px; /* Add border radius for rounded corners */
            background-color: #f9f9f9; /* Add background color */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add box shadow for depth */
        }

        /* Style the quantity input and buttons */
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
            padding-left: 30px;
            padding: 10px 20px;
            background-color: lightgrey;
            color: #fff;
            border: none;
            cursor: pointer;
            display: block; /* Ensure button occupies full width */
            width: calc(100% - 10px); /* Make button occupy full width */
        }

        .cart {
            background-color: #212121;
            color: white;
            margin-top: 10px;
            font-size: 12px;
            font-weight: 900;
            width: 100%;
            height: 39px;
            padding-top: 9px;
            box-shadow: 0px 5px 10px #212121;
            margin-top: 10px;
            padding: 5px;
        }
        
        .rating {
            margin-top: 20px;
            text-align: center;
        }

        .stars {
            font-size: 24px;
            margin-top: 10px;
        }

        .star {
            cursor: pointer;
            color: #ccc; /* Default color of stars */
        }

        .star:hover,
        .star:hover ~ .star {
            color: #ffcc00; /* Color of stars when hovered */
        }
    </style>
</head>
<body>
<div id="header"></div>
<script>
    $('#header').load('../header/header.php');
</script>

<div class="product-container">
    <div class="product-image">
        <img src="../books/thehatinggame.jpg" alt="Product Image">
    </div>
    <div class="product-details">
        <h1 class="product-title">The Hating Game</h1>
        <p class="product-price">$20</p>
        <div class="product-description">
            <p>When a slew of bombs destroys the library, Juliet relocates the stacks to the local Underground station where the city's residents shelter nightly, determined to lend out stories that will keep spirits up. But tragedy after tragedy threatens to unmoor the women and sever the ties of their community.</p>
        </div>
        <form class="cart-form" action="../" method="post" enctype="multipart/form-data">
            <div class="quantity">
                <button class="minus" type="button">-</button>
                <input class="qty" type="number" value="1">
                <button class="plus" type="button">+</button>
            </div>
            <button class="add-to-cart-btn" type="button" onclick="addToCart(1, 'The Hating Game', 20)">Add to Cart</button>
        </form>
    </div>
</div>

<div class="rating">
    <p>Rate This Book:</p>
    <form action="" method="post">
        <div class="stars">
            <label class="star" for="star1">&#9733;</label>
            <input type="radio" id="star1" name="rating" value="1" style="display:none;">
            
            <label class="star" for="star2">&#9733;</label>
            <input type="radio" id="star2" name="rating" value="2" style="display:none;">
            
            <label class="star" for="star3">&#9733;</label>
            <input type="radio" id="star3" name="rating" value="3" style="display:none;">
            
            <label class="star" for="star4">&#9733;</label>
            <input type="radio" id="star4" name="rating" value="4" style="display:none;">
            
            <label class="star" for="star5">&#9733;</label>
            <input type="radio" id="star5" name="rating" value="5" style="display:none;">
        </div>
        <button type="submit" name="submit_rating">Submit Rating</button>
    </form>
</div>

<iframe src="../footer/footer.php" width="100%" height="450vh"></iframe>

<script>
    function addToCart(id, name, price) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let existingItem = cart.find(item => item.id === id);

        if (existingItem) {
            existingItem.quantity++;
        } else {
            cart.push({ id: id, name: name, price: price, quantity: 1 });
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        alert('Product added to cart');
    }
</script>
</body>
</html>

