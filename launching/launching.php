<?php
session_start();
// Retrieve the username from session storage
$username = isset($_SESSION["username"]) ? $_SESSION["username"] : null;

// Display the welcome message with the username if it exists
if ($username) {
    echo '<script>';
    echo 'document.getElementById("username").textContent = "'.$username.'";';
    echo 'document.getElementById("welcomeMessage").style.display = "block";';
    echo '</script>';
}

// Function to handle sign-out action
function signOut() {
    // Clear the session storage
    unset($_SESSION["username"]);
    // Redirect to the login page
    header("Location: home2.php");
    exit;
}
?>

<script>
    $('#header').load('../header/header.php');
</script>

<?php
$countDownDate = strtotime("May 31, 2024 12:00:00");
echo '<script>';
echo 'var countDownDate = new Date('.json_encode(date("F d, Y H:i:s", $countDownDate) . ' GMT').' ).getTime();';
echo 'var x = setInterval(function(){';
echo 'var now = new Date().getTime();';
echo 'var distance = countDownDate - now;';
echo 'var days = Math.floor(distance / (1000 * 60 * 60 *24));';
echo 'var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));';
echo 'var minutes = Math.floor((distance % (1000 *60 * 60)) / (1000 * 60));';
echo 'var seconds = Math.floor((distance % (1000 * 60)) / 1000);';
echo 'document.getElementById("days").innerHTML = days;';
echo 'document.getElementById("hours").innerHTML = hours;';
echo 'document.getElementById("minutes").innerHTML = minutes;';
echo 'document.getElementById("seconds").innerHTML = seconds;';
echo 'if(distance < 0){';
echo 'clearInterval(x);';
echo 'document.getElementById("days").innerHTML = "00";';
echo 'document.getElementById("hours").innerHTML = "00";';
echo 'document.getElementById("minutes").innerHTML = "00";';
echo 'document.getElementById("seconds").innerHTML = "00";';
echo '}';
echo '},1000);';
echo '</script>';
?>


<!DOCTYPE html>
<head>
<html lang="en">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewpoint" content="width: device-width, initial-scale: 1.0">
    <title>TL</title>
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link rel="stylesheet" href="../courses/courses.css">
    <link rel="stylesheet" href="/launching/launching.php">
    <link rel="stylesheet" href="/launching/get_user.php">
    <link rel="stylesheet" href="/launching/update_user.php">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/htmlincludejs"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/htmlincludejs"></script>
    <script src="script.js" defer></script>
 
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
 </head>
    <body>

    <?php include '../header/header.php'; ?>
        <!-- <header 
            <nav>
                <div class="logo">
                    <img src="../home html/Home pic/logo.png">
                </div>
                <ul>
                    <li><a href="../home html/home2.html">Home</a></li>
                    <li><a href="../books/books.html">Books</a></li>
                    <li><a href="../spaces/spaces.html">Study places</a></li>
                    <li><a href="../launching/launching.html">Launching soon</a></li>
                    
                    <li><a href="../aboutus/aboutus.html">About us</a></li>
                </ul>
                <div class="social">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <i class="fa-solid fa-heart"></i>
                </div>
                <div class="user-info" id="welcomeMessage" style="display: none;">
                    <span>Welcome, <span id="username"></span></span>
                </div>
                  <div class="signin">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in">
                      <path d="M19 12H5M12 19l-7-7 7-7"/>
                    </svg>
                    <a href="../signup/signup.html" style="text-decoration: none; color:black"><span>Sign In</span></a>
                  </div>
            </nav>
        </header> -->

        <style>
          body{
            background-image:url('books.jpg');
            background-repeat: no repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
          }
        </style>
        <div id="header"></div>

        <link rel="stylesheet" href="launching.css">
        <div class="container">
           
            <div class="content">
                <p>Website Is Under Maintenance</p>
                <h1>We're <span>Launching</span> Soon ...</h1>
                <div class="launch-time">
                  <div>
                    <p id="days">00</p>
                    <span>Days</span>
                </div>
                <div>
                  <p id="hours">00</p>
                  <span>Hours</span>
              </div>
              <div>
                <p id="minutes">00</p>
                <span>Minutes</span>
            </div>
            <div>
              <p id="seconds">00</p>
              <span>Seconds</span>
          </div>
      </div>
    <!---- <a href="courses.html" class="button">Learn More<img src="triangle.png"></a>-->
    <a href="../courses/api.php" class="button">Learn More<img src="triangle.png"></a>
    </div>

<img src="rocket.png" class="rocket">
</div>


 <!-- AJAX Section -->
 <div class="ajax-section" style="display: block;">
    <h2>AJAX User Data</h2>
    <div id="user">User data will be loaded here.</div>
    <button onclick="loadData()" style="display: block;">Load User</button>
    <button onclick="updateUser()" style="display: block;">Update User</button>
</div>




<!-- 
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
<script>
    var countDownDate = new Date(" May 11, 2024 00:00:00").getTime();
  var x = setInterval(function(){
      var now = new Date().getTime();
      var distance = countDownDate - now;

      
var days = Math.floor(distance / (1000 * 60 * 60 *24));
var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
var minutes = Math.floor((distance % (1000 *60 * 60)) / (1000 * 60));
var seconds = Math.floor((distance % (1000 * 60)) / 1000);

document.getElementById("days").innerHTML = days;
document.getElementById("hours").innerHTML = hours;
document.getElementById("minutes").innerHTML = minutes;
document.getElementById("seconds").innerHTML = seconds;

if(distance < 0){
    clearInterval(x);
document.getElementById("days").innerHTML = "00";
document.getElementById("hours").innerHTML = "00";
document.getElementById("minutes").innerHTML = "00";
document.getElementById("seconds").innerHTML = "00";
}

    },1000);
</script> -->

<iframe src="../footer/footer.php" width=100% height="450vh"></iframe>

</body>
</html>

<?php 
include "../cookies\cookiefolder\cookies/Cookies.php";
?>