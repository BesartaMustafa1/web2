<?php 
include "../cookies/Cookies.php";
?>
<?php
session_start();

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
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewpoint" content="width: device-width, initial-scale: 1.0">
    <title>TL</title>
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link rel="stylesheet" href="aboutus.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/htmlincludejs"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/htmlincludejs"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body>
<?php include '../header/header.html'; ?>
<br>
<div class="container">
    <div class="row center-row">
        <div class="col">
            <pre>
Welcome to Town Library!
Town Library is a center that aims to connect the component of reading, 
learning and collective work focusing on creating new opportunities for
a more productive society.

Town Library was founded to support intellectual development,
work in groups as well as individuals. 
The center supports every individual/group who want to grow 
in terms of reading/learning.

Whether you're a student seeking resources for academic success, 
a professional looking to enhance your skills, or someone who loves to immerse 
themselves in the world of literature, Town Library is here to serve you.

Our library boasts a vast collection of books, ranging from classic literature 
to contemporary works, covering a myriad of subjects and genres. 
Additionally, we offer a variety of educational programs, workshops, 
and events designed to stimulate curiosity, foster creativity, 
and promote lifelong learning. 

From book clubs to computer literacy classes and language courses, 
there's something for everyone at Town Library.
            </pre>
        </div>

        <div class="col">
            <img src="1.jpg">
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6" width="50%" height="750vh" >
            <H2>Mission</H2>
            <pre>
At Town Library, we believe in the power of books and knowledge. 
Our mission is to cultivate a community of lifelong learners, 
where individuals can engage in meaningful discourse and expand 
their horizons. 
            </pre>
        </div>
        <br>
        <div class="col-md-6">
            <H2>Vision</H2>
            <pre>
Together, we envision a world where the power of reading, learning, 
and collective work creates boundless opportunities for advancement. 
At Town Library, our vision is to inspire minds, enrich lives, 
and build a brighter future for generations to come.
            </pre>
        </div>
    </div>
</div>
<br>
<div class="container1" style="background-color: gainsboro;">
    <div class="row">
        <h3><br>Our board</h3>
    </div>
    <div class="row">
        <pre style="text-align: center;"><italic>We have our own Board of Directors composed of four prominent members of society selected on the basis
            of their professional expertise and field.</italic></pre>
<main>
    <ul class="leadership-grid">
        <li>
            <h3><br>Board of Directors</h3>
        </li>
        <li>
            <a href="#">
                <div class="dropdown">
                    <span class="name">Tortor Ipsume<br></span>
                    <div class="dropdown-content">
                      <p>Extra information goes here.</p>
                      <p>This can include text, images, links, etc.</p>
                    </div>
                  </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="dropdown">
                    <span class="name">Justo Parturient<br></span>
                    <div class="dropdown-content">
                      <p>Extra information goes here.</p>
                      <p>This can include text, images, links, etc.</p>
                    </div>
                  </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="dropdown">
                    <span class="name">Elit Fringilla<br></span>
                    <div class="dropdown-content">
                      <p>Extra information goes here.</p>
                      <p>This can include text, images, links, etc.</p>
                    </div>
                  </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="dropdown">
                    <span class="name">Tortor Mollis<br></span>
                    <div class="dropdown-content">
                      <p>Extra information goes here.</p>
                      <p>This can include text, images, links, etc.</p>
                    </div>
                  </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="dropdown">
                    <span class="name">Ligula Euismod Condimentum<br></span>
                    <div class="dropdown-content">
                      <p>Extra information goes here.</p>
                      <p>This can include text, images, links, etc.</p>
                    </div>
                  </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="dropdown">
                    <span class="name">Nullam Ornare<br></span>
                    <div class="dropdown-content">
                      <p>Extra information goes here.</p>
                      <p>This can include text, images, links, etc.</p>
                    </div>
                  </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="dropdown">
                    <span class="name">Malesuada Lorem<br></span>
                    <div class="dropdown-content">
                      <p>Extra information goes here.</p>
                      <p>This can include text, images, links, etc.</p>
                    </div>
                  </div>
            </a>
        </li>
        <li>
            <a href="#">
                <div class="dropdown">
                    <span class="name">Justo Euismod<br></span>
                    <div class="dropdown-content">
                      <p>Extra information goes here.</p>
                      <p>This can include text, images, links, etc.</p>
                    </div>
                  </div>
            </a>
        </li>
    </ul>
    
</main>
</div>
</div>

<iframe src="../footer/footer.html" width=100% height="450px"></iframe>
<script>
      // Retrieve the username from session storage
      var username = sessionStorage.getItem("username");
      // Display the welcome message with the username if it exists
      if (username) {
          document.getElementById("username").textContent = username;
          document.getElementById("welcomeMessage").style.display = "block";
      }

      // Function to handle sign-out action
      function signOut() {
          // Clear the session storage
          sessionStorage.removeItem("username");
          // Redirect to the login page
          window.location.href = "home2.html";
      }
</script>
<script>
    
    $('#header').load('../header/header.html');
      </script>
</body>
</html>
