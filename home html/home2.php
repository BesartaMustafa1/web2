<?php
session_start();
ob_start();
ini_set('display_errors', 0);
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
    <meta name="viewpoint" content="width: device-width, initial-scale: 1.0">
    <title>TL</title>
    <link rel="stylesheet" href="home2.css">
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/htmlincludejs"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.mySlides {display:none}
.w3-left, .w3-right, .w3-badge {cursor:pointer}
.w3-badge {height:13px;width:13px;padding:0}
</style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
   
    <body>
          <div id="header"> </div><script>
            $('#header').load('../header/header.php')</script>
          

          <div id="video-container">
            <video autoplay muted loop style="width: 100%;">
              <source src="Video1.mp4" type="video/mp4">
              Your browser does not support the video tag.
            </video>
        

          </div>
         <div class="t1"> <h3> Self-Help Books</h3></div>
         
    <div class="book-content">
       
       <div class="tile"> 
           <img src="12-rules.png"/>
           <div class="text">
           <h2 class="animate-text">12 Rules for Life: An Antidote to Chaos by Jordan B Peterson</h2>
           <p class="animate-text">"Compare yourself to who you were yesterday, not the useless person you are today." </p>
         <div class="dots">
             <span></span>
             <span></span>
             <span></span>
           </div>
           </div>
          </div>
         
         
         <div class="tile"> 
           <img src="maps.png"/>
           <div class="text">
           <h2 class="animate-text">Maps of Meaning: The Architecture of Belief by Jordan B. Peterson</h2>
           <p class="animate-text">"The world can be validly construed as forum for action, or as place of things." </p>
         <div class="dots">
             <span></span>
             <span></span>
             <span></span>
           </div>
           </div>
          </div>
           
           <div class="tile"> 
           <img src="power.png"/>
           <div class="text">
           <h2 class="animate-text">The 48 Laws of Power: Greene, Robert</h2>
           <p class="animate-text">"When Asking for Help, Appeal to People’s Self-Interest, Never to their Mercy or Gratitude."</p>
         <div class="dots">
             <span></span>
             <span></span>
             <span></span>
           </div>
           </div>
          </div>
         <div class="tile"> 
           <img src="atomic.png"/>
           <div class="text">
           <h2 class="animate-text">Atomic Habits: An Easy & Proven Way to Build Good Habits & Break Bad Ones</h2>
           <p class="animate-text">"Success is the product of daily habits—not once-in-a-lifetime transformations." </p>
         <div class="dots">
             <span></span>
             <span></span>
             <span></span>
           </div>
           </div>
         </div>
         </div>
         <br>
        <div class="t1"> <h3>Study spaces</h3></div>
         <div class="book-content">
          <div class="tile"> 
              <img src="../spaces/pictures/study8.jpg"/>
              <div class="text">
              <h2 class="animate-text">TL's Open Space Area</h2>
              <p class="animate-text">Designed for versatility and unity, this expansive environment offers ample room for students to study, and foster a sense of community while enjoying an accommodating workspace.<br> Price point: 8$ per Person. </p>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
              </div>
              </div>
             </div>
            
            
            <div class="tile"> 
              <img src="../spaces/pictures/study5.jpg"/>
              <div class="text">
              <h2 class="animate-text">TL's Annex Group Rooms</h2>
              <p class="animate-text">TL's Annex Group Rooms provide versatile spaces for teams to brainstorm, strategize, and collaborate effectively, fostering innovation and productivity.<br> Price point: 20$ per week. </p>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
              </div>
              </div>
             </div>
              
              <div class="tile"> 
              <img src="../spaces/pictures/study9.jpg"/>
              <div class="text">
              <h2 class="animate-text">TL's Collaborative Study Area</h2>
              <p class="animate-text">TL's collaborative study area fosters dynamic learning environments where students collaborate and thrive together.<br> Price point: 15$ per day. </p>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
              </div>
              </div>
             </div>
            <div class="tile"> 
              <img src="../spaces/pictures/conf1.jpg"/>
              <div class="text">
              <h2 class="animate-text">TL's Graduates' Office</h2>
              <p class="animate-text">TL's Graduates' Office offers a professional and supportive environment for alumni to network, access resources, and further their careers.<br> Price point: 12$ per day.</p>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
              </div>
              </div>
            </div>
            </div>
            <br><br>


            <div class="w3-container">
              <h2 style="text-align: center;">Latest News</h2><br>
              <p style="text-align: center;">📚 Exciting News Alert! 📚 Dive into the world of literature with our latest arrivals at the bookshop!<br> Stay tuned as we showcase our newest additions in our interactive slideshow. Get ready to embark on new literary adventures! 📖✨</p>
            </div>

            <div class="w3-content w3-display-container" style="max-width:800px">
              <img class="mySlides" src="list.webp" style="width:100%">
              <img class="mySlides" src="nytimes-bestseller.jpg" style="width:100%">
              <img class="mySlides" src="5.jpg" width="450" height="450"style="width:100%">
              <div class="w3-center w3-container w3-section w3-large w3-text-white w3-display-bottommiddle" style="width:100%">
                <div class="w3-left w3-hover-text-khaki" onclick="plusDivs(-1)">&#10094;</div>
                <div class="w3-right w3-hover-text-khaki" onclick="plusDivs(1)">&#10095;</div>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(1)"></span>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(2)"></span>
                <span class="w3-badge demo w3-border w3-transparent w3-hover-white" onclick="currentDiv(3)"></span> 
              </div>
            </div>

            <script>
            var slideIndex = 1;
            showDivs(slideIndex);

            function plusDivs(n) {
              showDivs(slideIndex += n);
            }

            function currentDiv(n) {
              showDivs(slideIndex = n);
            }

            function showDivs(n) {
              var i;
              var x = document.getElementsByClassName("mySlides");
              var dots = document.getElementsByClassName("demo");
              if (n > x.length) {slideIndex = 1}
              if (n < 1) {slideIndex = x.length}
              for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";  
              }
              for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" w3-white", "");
              }
              x[slideIndex-1].style.display = "block";  
              dots[slideIndex-1].className += " w3-white";
            }
            </script>



<iframe src="../footer/footer.php" width=100% height="450vh"></iframe>
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