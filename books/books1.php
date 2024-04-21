<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewpoint" content="width: device-width, initial-scale: 1.0">
    <title>TL</title>
    <link rel="stylesheet" href="../header/header.css">
    <link rel="stylesheet" href="../footer/footer.css">
    <link rel="stylesheet" href="../books/books.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/htmlincludejs"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>

    </style>
</head>
<body>
    <?php
        // Deklarimi dhe inicializimi i variablave
        $username = "JohnDoe";
        $welcomeMessage = "Welcome, " . $username . "!";
    ?>

    <header>
        <nav>
            <div class="logo">
                <img src="../home html/Home pic/logo.png ">
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
                <span><?php echo $welcomeMessage; ?></span>
                <button onclick="signOut()" style="padding: 20px">Sign Out</button>
            </div>
        
            <div class="signin">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-in">
                <path d="M19 12H5M12 19l-7-7 7-7"/>
              </svg>
              <a href="../signup/signup.html" style="text-decoration: none; color:black"><span>Sign In</span></a>
            </div>
        </nav>

    </header>
    <div class="web-cover">
    <div class="cover-text-1">
        <div class="heading-1">
          <h1 style="color: rgb(175, 156, 156); font: italic;  font-family:  Noto Serif Display, serif;">If you don't like to read then, you  haven't  </h1>
          </div>
          <div class="heading-2">
            <h1 style="color: rgb(175, 156, 156); font: italic;font-family:  Noto Serif Display, serif;">found the right book yet.</h1>
          </div>
          <div class="quote-1">
            <p style="color: rgb(175, 156, 156);font-family:  Noto Serif Display, serif;">There is more treasure in books than in all the </p>
           </div>
           <div class="quote-2">
             <p style="color: rgb(175, 156, 156);font-family:  Noto Serif Display, serif;">pirate's loot on Treasure Island. </p>
           </div>
       </div>
    </div>

    </header>  
        <section class="arrivals" id="arrivals">
            <p class="e">New books are here! Find the perfect book for you.</p>
        <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="tile"> 
                    <img src="8.jpg"/>
                    <div class="text">
                    <h2 class="animate-text">
                      <a href="../books/1.html">
                      A Dance with Dragons
                      Novel by George R. R. Martin
                      </h2>
                    </a>
                    
                  <div class="dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    </div>
                   </div>
            </div>
            <div class="col-md-3">
                <div class="tile"> 
                    <img src="9.jpg"/>
                    <div class="text">
                    <h2 class="animate-text">
                      <a href="../books/1.html">
                      One Hundred Years of Solitude
                      Novel by Gabriel García Márquez
                      </h2>
                    </a>
                    <p class="animate-text"> </p>
                  <div class="dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    </div>
                   </div>
            </div>
            <div class="col-md-3">
                <div class="tile"> 
                    <img src="10.jpg"/>
                    <div class="text">
                     
                    <h2 class="animate-text">
                      <a href="../books/1.html">
                      The Book Thief
                      Novel by Markus Zusak
                      </h2>
                    </a>
                    <p class="animate-text"> </p>
                  <div class="dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    </div>
                   </div>
            </div>
            <div class="col-md-3">
                <div class="tile"> 
                    <img src="PR.jpg"/>
                    <div class="text">
                      
                    <h2 class="animate-text">
                      <a href="../books/1.html">
                      The Hating Game: A Novel
                      Book by Sally Thorne
                      </h2>
                    </a>
                    <p class="animate-text"></p>
                  <div class="dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    </div>
                   </div>
            </div>
        </div>
        <main><span id="h"><h2 class="e">Picks of the month</h2></span></main>
        <div class="row">
            <div class="col-md-3">
                <div class="tile"> 
                    <img src="1.png"/>
                    <div class="text">
                      
                    <h2 class="animate-text">
                      <a href="../books/1.html">
                      The Underground Library
                      Book by Jennifer Ryan
                      </h2>
                    </a>
                    <p class="animate-text"> </p>
                  <div class="dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    </div>
                   </div>
            </div>
            <div class="col-md-3">
                <div class="tile"> 
                    <img src="2.jpg"/>
                    <div class="text">
                      
                    <h2 class="animate-text">
                      <a href="../books/1.html">
                        It Starts with Us
                      Novel by Colleen Hoover
                      </h2>
                    </a>
                    <p class="animate-text"> </p>
                  <div class="dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    </div>
                   </div>
            </div> 
            <div class="col-md-3">
                <div class="tile"> 
                    <img src="3..jpg"/>
                    <div class="text">
                     
                    <h2 class="animate-text">
                      <a href="../books/1.html">
                      The Alchemist
                      Novel by Paulo Coelho
                      </h2>
                    </a>
                    <p class="animate-text"> </p>
                  <div class="dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    </div>
                   </div>
            </div>
            <div class="col-md-3">
                <div class="tile"> 
                    <img src="AK.jpg"/>
                    <div class="text">
                      
                    <h2 class="animate-text">
                      <a href="../books/1.html">Anna Karenina
                      Novel by Leo Tolstoy
                      </h2>
                    </a>
                    <p class="animate-text"> </p>
                  <div class="dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    </div>
                   </div>
            </div>
        </div>
        <main><span id="h"><h2 class="e">All times favorite</h2></span></main>
        <div class="row">
            <div class="col-md-3">
                <div class="tile"> 
                    <img src="LOR.jpg"/>
                    <div class="text">
                      
                    <h2 class="animate-text">
                      <a href="../books/1.html">
                      The Lord of the Rings
                      Novel by John Ronald Reuel Tolkien</h2>
                    </a>
                    <p class="animate-text"></p>
                  <div class="dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    </div>
                   </div>
            </div>
            <div class="col-md-3">
                <div class="tile" >
                    <img src="5.jpg"/>
                    <div class="text">
                      
                    <h2 class="animate-text">
                      <a href="../books/1.html">Harry Potter and the 
                      Deathly Hallows: Part 1</h2>
                    </a>
                    <p class="animate-text"> </p>
                    <!-- <!<audio controls>
                        <source src="audio1.mp3" type="audio/mpeg">
                    </audio> -->
                    
                  <div class="dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    </div>
                   </div>
            </div> 
            <div class="col-md-3">
                <div class="tile"> 
                    <img src="6.jpg"/>
                    <div class="text">
                      
                    <h2 class="animate-text">
                      <a href="../books/1.html"></a>
                      Sikur t'isha djalë
                      Novel by Haki Stërmilli
                      </h2>
                    </a>
                    <p class="animate-text"> </p>
                  <div class="dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    </div>
                   </div>
            </div>
            <div class="col-md-3">
                <div class="tile"> 
                    <img src="7.jpg"/>
                    <div class="text">
                      
                    <h2 class="animate-text">
                      <a href="../books/1.html">
                      Doruntine (Kush e solli Doruntinën: roman)
                      Novel by Ismail Kadare
                      
                      </h2>
                    </a>
                    <p class="animate-text"> </p>
                  <div class="dots">
                      <span></span>
                      <span></span>
                      <span></span>
                    </div>
                    </div>
                   </div>
            </div>
        </div>
    </div> 
    </section>
        <iframe src="../footer/footer.html" width=100% height="450vh"></iframe>
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
