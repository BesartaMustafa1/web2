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
            margin: 50px 10px 75px 10px ;
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

        .star {
            cursor: pointer;
        }
    </style>
</head>
<body>
<div id="header"> </div><script>
            $('#header').load('../header/header.php')</script>
   
    <div class="product-container">
        <div class="product-image">
            <img src="../books/bookthief.jpg" alt="Product Image">
        </div>
        <div class="product-details">
            <h1 class="product-title">Book Thief</h1>
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
                <button class="add-to-cart-btn" type="button" onclick="addToCart(1, 'Book Thief', 20)">Add to Cart</button>
            </form>
        </div>
    </div>
    <script>
        // Initialize an empty cart array
        let cart = [];

        // Function to add a product to the cart
        function addToCart(id, name, price) {
            // Check if the item is already in the cart
            let existingItem = cart.find(item => item.id === id);

            if (existingItem) {
                // If the item exists, increase its quantity
                existingItem.quantity++;
            } else {
                // If the item does not exist, add it to the cart
                cart.push({
                    id: id,
                    name: name,
                    price: price,
                    quantity: 1
                });
            }

            // Save the cart to local storage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Display a confirmation message (Optional)
            alert('Product added to cart');

            // Optionally, you can redirect the user to the cart page after adding a product
            // window.location.href = 'cart.html';
        }
    </script>
     <div class="rating">
        <p>Rate This Book:</p>
        <div class="stars">
            <span class="star" onclick="rateBook(1)">&#9733;</span>
            <span class="star" onclick="rateBook(2)">&#9733;</span>
            <span class="star" onclick="rateBook(3)">&#9733;</span>
            <span class="star" onclick="rateBook(4)">&#9733;</span>
            <span class="star" onclick="rateBook(5)">&#9733;</span>
        </div>
    </div>
<iframe src="../footer/footer.php" width=100% height="450vh"></iframe>
<script>
    function rateBook(rating) {
    // Display a confirmation message
    alert('You rated the book ' + rating + ' stars!');

    // Here you can add code to save the rating to a database or perform any other action
}
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