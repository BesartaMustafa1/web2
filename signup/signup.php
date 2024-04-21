<?php
// Start session to store user data
session_start();

// Define some constants
define("MAX_USERNAME_LENGTH", 20);
define("MAX_PASSWORD_LENGTH", 20);
//Kushtezimet if, elseif, dhe else
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['loginUsername']) && isset($_POST['loginPassword'])) {
  //variablat $username, $password, $firstName, $lastName, $email, $password     
        $username = $_POST['loginUsername'];
        $password = $_POST['loginPassword'];

        // funksionet isset() dhe empty()
        if (!empty($username) && !empty($password)) {
            // Assuming successful login, redirecting to home2.html
            $_SESSION['username'] = $username;
            header("Location: ../home html/home2.php");
            exit();
        } else {
            echo "Please fill in all required fields.";
        }
    } elseif (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['registerEmail']) && isset($_POST['registerPassword'])) {
        
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['registerEmail'];
        $password = $_POST['registerPassword'];

      
        if (!empty($firstName) && !empty($lastName) && !empty($email) && !empty($password)) {
            
            header("Location: ../home html/home2.php");
            exit();
        } else {
            echo "Please fill in all required fields.";
        }
    } else {
        echo "Invalid form submission.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="signup.css">
    <title>Login</title>
</head>
<body>
<div class="wrapper">
    <div class="form-box">   
        <!-- login form -->
        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Login</header>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" id="loginUsername" name="loginUsername" placeholder="Username or Email" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" id="loginPassword" name="loginPassword" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="button" class="submit" value="Sign In" onclick="signIn()">
            </div>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="login-check">
                    <label for="login-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Forgot password?</a></label>
                </div>
            </div>
        </div>
        
        <!-- registration form -->
        <div class="register-container" id="register">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" class="input-field" id="firstName" name="firstName" placeholder="Firstname" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" id="lastName" name="lastName" placeholder="Lastname" required>
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" id="registerEmail" name="registerEmail" placeholder="Email" required>
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" id="registerPassword" name="registerPassword" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            <div class="input-box">
                <input type="button" class="submit" value="Register" onclick="registerUser()">
            </div>
            <div class="two-col">
                <div class="one">
                    <input type="checkbox" id="register-check">
                    <label for="register-check"> Remember Me</label>
                </div>
                <div class="two">
                    <label><a href="#">Terms & conditions</a></label>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var x = document.getElementById("login");
    var y = document.getElementById("register");

    function login() {
        x.style.left = "4px";
        y.style.right = "-520px";
    }

    function register() {
        x.style.left = "-510px";
        y.style.right = "5px";
    }

    function signIn() {
        var username = document.getElementById("loginUsername").value;
        var password = document.getElementById("loginPassword").value;
        
        if (username.trim() !== "" && password.trim() !== "") {
            window.location.href = "../home html/home2.php";
        } else {
            alert("Please fill in all required fields.");
        }
    }

    function registerUser() {
        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var email = document.getElementById("registerEmail").value;
        var password = document.getElementById("registerPassword").value;
        
        if (firstName.trim() !== "" && lastName.trim() !== "" && email.trim() !== "" && password.trim() !== "") {
            window.location.href = "../home html/home2.php";
        } else {
            alert("Please fill in all required fields.");
        }
    }
</script>

</body>
</html>
