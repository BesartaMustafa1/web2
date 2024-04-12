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
            <form action="process_form.php" method="post">
                <div class="input-box">
                    <input type="text" name="loginUsername" class="input-field" placeholder="Username or Email" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="loginPassword" class="input-field" placeholder="Password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In">
                </div>
            </form>
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
            <form action="process_form.php" method="post">
                <div class="two-forms">
                    <div class="input-box">
                        <input type="text" name="firstName" class="input-field" placeholder="Firstname" required>
                        <i class="bx bx-user"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" name="lastName" class="input-field" placeholder="Lastname" required>
                        <i class="bx bx-user"></i>
                    </div>
                </div>
                <div class="input-box">
                    <input type="text" name="registerEmail" class="input-field" placeholder="Email" required>
                    <i class="bx bx-envelope"></i>
                </div>
                <div class="input-box">
                    <input type="password" name="registerPassword" class="input-field" placeholder="Password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Register">
                </div>
            </form>
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
// Define some constants
define("MAX_USERNAME_LENGTH", 20);
define("MAX_PASSWORD_LENGTH", 20);

// Accessing variables from the HTML form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['registerEmail'];
    $password = $_POST['registerPassword'];

    // Dumping variables
    var_dump($username);
    var_dump($password);

    // Function to check if a string contains only alphabetic characters
    function isAlpha($str) {
        return ctype_alpha(str_replace(' ', '', $str));
    }

    // Checking if username and password are not empty
    if (!empty($username) && !empty($password)) {
        // Checking if username is valid (only alphabetic characters and within max length)
        if (isAlpha($username) && strlen($username) <= MAX_USERNAME_LENGTH) {
            // Checking if password is within max length
            if (strlen($password) <= MAX_PASSWORD_LENGTH) {
                // Assuming successful login, redirecting to home2.html
                header("Location: ../home html/home2.html");
                exit();
            } else {
                echo "Password must be less than or equal to " . MAX_PASSWORD_LENGTH . " characters.";
            }
        } else {
            echo "Invalid username. Username must contain only alphabetic characters and be less than or equal to " . MAX_USERNAME_LENGTH . " characters.";
        }
    } else {
        echo "Please fill in all required fields.";
    }
}
?>

</body>
</html>
