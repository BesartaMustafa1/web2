<?php
session_start();

// Function to set background cookie
function setBackgroundCookie($value) {
    setcookie('background', $value, time() + (86400 * 30), "/"); // 86400 = 1 day
}

// Check if the cart is set in the session, if not initialize it
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item to cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];

    $item = [
        'id' => $item_id,
        'name' => $item_name,
        'price' => $item_price
    ];

    // Add item to cart array
    $_SESSION['cart'][] = $item;

    // Redirect to cart page
    header('Location: shop.php');
    exit;
}

if (isset($_GET['remove_item'])) {
    $remove_id = $_GET['remove_item'];

    // Remove item from cart array
    foreach ($_SESSION['cart'] as $index => $item) {
        if ($item['id'] == $remove_id) {
            unset($_SESSION['cart'][$index]);
            break;
        }
    }

    // Reset array keys
    $_SESSION['cart'] = array_values($_SESSION['cart']);

    // Redirect to home page
    header('Location: spaces.php');
    exit;
}

// Check if the background cookie is set
if (isset($_COOKIE['background'])) {
    $background = $_COOKIE['background'];
    // Apply background based on cookie value
    if ($background === 'dark') {
        // Set background color to dark mode
        setBackgroundCookie('dark');
    } else {
        // Set background color to default
        setBackgroundCookie('default');
    }
} else {
    // Set default background color and cookie
    setBackgroundCookie('default');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TL</title>
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link rel="stylesheet" href="spaces.css">
    <link rel="stylesheet" href="checkout.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        <?php
        // Apply background color based on cookie value
        if (isset($_COOKIE['background']) && $_COOKIE['background'] === 'dark') {
            echo 'body { background-color: #222222; }';
        } else {
            echo 'body { background-color: #ffffff; }'; // Default background color
        }
        ?>
    </style>
</head>
<body>
<div id="header"></div>
    <div class="container">
    <!-- Single Studies Display Section -->
    <div class="title"><h3 class="page-title">Single studies</h3></div>
    <div class="row">
        <!-- TL's Botanic -->
        <div class="col-md-4">
            <div class="card">
                <img class="img-thumbnail" src="pictures/study1.jpg" width="auto" height="auto"/>
                <div class="card-body text-center">
                    <div class="cvp">
                        <h5 class="card-title font-weight-bold">TL's Botanic</h5>
                        <p class="card-text">$15</p>
                        <a href="TLBotanic.html" class="btn details d-block mx-auto mb-2">View details</a>
                        <form action="shop.php" method="post">
                            <input type="hidden" name="item_id" value="1">
                            <input type="hidden" name="item_name" value="TL's Botanic">
                            <input type="hidden" name="item_price" value="15">
                            <button type="submit" name="add_to_cart" class="btn cart d-block mx-auto mt-2">Book now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- TL's Lounge -->
        <div class="col-md-4">
            <div class="card">
                <img class="img-thumbnail" src="pictures/study2.jpg" width="auto" height="auto"/>
                <div class="card-body text-center">
                    <div class="cvp">
                        <h5 class="card-title font-weight-bold">TL's Lounge</h5>
                        <p class="card-text">$10</p>
                        <a href="TLLounge.html" class="btn details d-block mx-auto mb-2">View details</a>
                        <form action="shop.php" method="post">
                            <input type="hidden" name="item_id" value="2">
                            <input type="hidden" name="item_name" value="TL's Lounge">
                            <input type="hidden" name="item_price" value="10">
                            <button type="submit" name="add_to_cart" class="btn cart d-block mx-auto mt-2">Book now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- TL's Corner -->
        <div class="col-md-4">
            <div class="card">
                <img class="img-thumbnail" src="pictures/study3.jpg" width="auto" height="auto"/>
                <div class="card-body text-center">
                    <div class="cvp">
                        <h5 class="card-title font-weight-bold">TL's Corner</h5>
                        <p class="card-text">$99</p>
                        <a href="TLCorner.html" class="btn details d-block mx-auto mb-2">View details</a>
                        <form action="shop.php" method="post">
                            <input type="hidden" name="item_id" value="3">
                            <input type="hidden" name="item_name" value="TL's Corner">
                            <input type="hidden" name="item_price" value="99">
                            <button type="submit" name="add_to_cart" class="btn cart d-block mx-auto mt-2">Book now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <br>
    <div class="title"><h3 class="page-title">Coworking</h3></div>
    <div class="row">
        <!-- TL's Boho -->
        <div class="col-md-4">
            <div class="card">
                <img class="img-thumbnail" src="pictures/coworking1.jpg" width="auto" height="auto"/>
                <div class="card-body text-center">
                    <div class="cvp">
                        <h5 class="card-title font-weight-bold">TL's Boho</h5>
                        <p class="card-text">$59</p>
                        <a href="tlboho.html" class="btn details d-block mx-auto mb-2">View details</a>
                        <form action="shop.php" method="post">
                            <input type="hidden" name="item_id" value="4">
                            <input type="hidden" name="item_name" value="TL's Boho">
                            <input type="hidden" name="item_price" value="59">
                            <button type="submit" name="add_to_cart" class="btn cart d-block mx-auto mt-2">Book now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- TL's Industrial -->
        <div class="col-md-4">
            <div class="card">
                <img class="img-thumbnail" src="pictures/conf2.jpg" width="auto" height="auto"/>
                <div class="card-body text-center">
                    <div class="cvp">
                        <h5 class="card-title font-weight-bold">TL's Industrial</h5>
                        <p class="card-text">$75</p>
                        <a href="tlindustrial.html" class="btn details d-block mx-auto mb-2">View details</a>
                        <form action="shop.php" method="post">
                            <input type="hidden" name="item_id" value="5">
                            <input type="hidden" name="item_name" value="TL's Industrial">
                            <input type="hidden" name="item_price" value="75">
                            <button type="submit" name="add_to_cart" class="btn cart d-block mx-auto mt-2">Book now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- TL's Lux -->
        <div class="col-md-4">
            <div class="card">
                <img class="img-thumbnail" src="pictures/coworking2.jpg" width="auto" height="auto"/>
                <div class="card-body text-center">
                    <div class="cvp">
                        <h5 class="card-title font-weight-bold">TL's Lux</h5>
                        <p class="card-text">$90</p>
                        <a href="tllux.html" class="btn details d-block mx-auto mb-2">View details</a>
                        <form action="shop.php" method="post">
                            <input type="hidden" name="item_id" value="6">
                            <input type="hidden" name="item_name" value="TL's Lux">
                            <input type="hidden" name="item_price" value="90">
                            <button type="submit" name="add_to_cart" class="btn cart d-block mx-auto mt-2">Book now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <br>
    <div class="title"><h3 class="page-title">Events</h3></div>
    <div class="row">
       
        <div class="col-md-4">
            <div class="card">
                <img class="img-thumbnail" src="pictures/event3.jpg" width="auto" height="auto"/>
                <div class="card-body text-center">
                    <div class="cvp">
                        <h5 class="card-title font-weight-bold">TL's Workshop</h5>
                        <p class="card-text">$39</p>
                        <a href="TLWorkshop.html" class="btn details d-block mx-auto mb-2">View details</a>
                        <form action="shop.php" method="post">
                            <input type="hidden" name="item_id" value="7">
                            <input type="hidden" name="item_name" value="TL's Workshop">
                            <input type="hidden" name="item_price" value="39">
                            <button type="submit" name="add_to_cart" class="btn cart d-block mx-auto mt-2">Book now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="img-thumbnail" src="pictures/event2.jpg" width="auto" height="auto"/>
                <div class="card-body text-center">
                    <div class="cvp">
                        <h5 class="card-title font-weight-bold">TL's Cinema</h5>
                        <p class="card-text">$69</p>
                        <a href="TLCinema.html" class="btn details d-block mx-auto mb-2">View details</a>
                        <form action="shop.php" method="post">
                            <input type="hidden" name="item_id" value="8">
                            <input type="hidden" name="item_name" value="TL's Cinema">
                            <input type="hidden" name="item_price" value="69">
                            <button type="submit" name="add_to_cart" class="btn cart d-block mx-auto mt-2">Book now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img class="img-thumbnail" src="pictures/event5.jpg" width="auto" height="auto"/>
                <div class="card-body text-center">
                    <div class="cvp">
                        <h5 class="card-title font-weight-bold">TL's Terrace</h5>
                        <p class="card-text">$99</p>
                        <a href="TLTerrace.html" class="btn details d-block mx-auto mb-2">View details</a>
                        <form action="shop.php" method="post">
                            <input type="hidden" name="item_id" value="9">
                            <input type="hidden" name="item_name" value="TL's Terrace">
                            <input type="hidden" name="item_price" value="99">
                            <button type="submit" name="add_to_cart" class="btn cart d-block mx-auto mt-2">Book now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   

    <!-- Footer -->
    <iframe src="../footer/footer.php" width="100%" height="450vh"></iframe>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-..." crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(function () {
            $('#header').load('../header/header.php');
        });
    </script>
    <?php 
        include "../cookies\cookiefolder/cookies/Cookies.php";
    ?>
</body>
</html>
