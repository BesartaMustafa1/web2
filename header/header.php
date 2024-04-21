<?php
session_start();

// Nëse keni vendosur username në sesion, atëherë merrni atë
if(isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
} else {
    $username = "";  // ose ndonjë vlerë tjetër e ndonjë lloji
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TL</title>
    <link rel="stylesheet" href="header.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/htmlincludejs"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <img src="../home html/Home pic/logo.png ">
            </div>
            <ul>
                <li><a href="../home html/home2.php">Home</a></li>
                <li><a href="../books/books.php">Books</a></li>
                <li><a href="../spaces/spaces.php">Study places</a></li>
                <li><a href="../launching/launching.php">Launching soon</a></li>
                <li><a href="../aboutus/aboutus.php">About us</a></li>
            </ul>
            <div class="social">
                <i class="fa-solid fa-magnifying-glass"></i>
                <a href="../spaces/shop.php" style="color: black; text-decoration: none;"><i class="fas fa-shopping-cart"></i></a>
            </div>
            
            <div id="welcomeMessage" style="display: none;">
                Welcome, <span id="username"></span>! <button onclick="signOut()">Sign Out</button>
            </div>   
            
            <div class="signin">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in">
                    <path d="M19 12H5M12 19l-7-7 7-7"/>
                </svg>
                <a href="../signup/signup.php" style="text-decoration: none; color:black"><span>Sign In</span></a>
            </div>
        </nav>
    </header>

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
