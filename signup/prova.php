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
<!----------------------------- Form box ----------------------------------->    
    <div class="form-box">   
        <!------------------- login form -------------------------->
        <div class="login-container" id="login">
            <div class="top">
                <span>Don't have an account? <a href="#" onclick="register()">Sign Up</a></span>
                <header>Login</header>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" id="loginUsername" placeholder="Username or Email" required>
                <i class="bx bx-user"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" id="loginPassword" placeholder="Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>
            <!-- Use onclick event to call login function and redirect to home2.html -->
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

        <!------------------- registration form -------------------------->
        <div class="register-container" id="register">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>
            <div class="two-forms">
                <div class="input-box">
                    <input type="text" class="input-field" id="firstName" placeholder="Firstname" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" id="lastName" placeholder="Lastname" required>
                    <i class="bx bx-user"></i>
                </div>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" id="registerEmail" placeholder="Email" required>
                <i class="bx bx-envelope"></i>
            </div>
            <div class="input-box">
                <input type="password" class="input-field" id="registerPassword" placeholder="Password" required>
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

<?php
    function signIn() {
        $username = $_POST["loginUsername"];
        $password = $_POST["loginPassword"];

        // Check if username and password are not empty
        if (!empty($username) && !empty($password)) {
            // Here, you would typically send a request to your backend server to verify the credentials
            // For demonstration purposes, I'm assuming a successful login
            // Extract username from email (assuming email is in the format username@example.com)
            $extractedUsername = explode('@', $username)[0];
            // Store the username in session storage
            $_SESSION["username"] = $extractedUsername;
            // Redirect to home2.html
            header("Location: ../home html/home2.html");
            exit();
        } else {
            echo "<script>alert('Please fill in all required fields.');</script>";
        }
    }
?>

</body>
</html>
