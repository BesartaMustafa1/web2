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
// Define some constants
define("MAX_USERNAME_LENGTH", 20);
define("MAX_PASSWORD_LENGTH", 20);

// Accessing variables from the HTML form
$username = $_POST['loginUsername'];
$password = $_POST['loginPassword'];

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

// Array example
$fruits = array("Apple", "Banana", "Orange");
echo $fruits[0]; // Outputs: Apple

// Associative array example
$person = array("name" => "John", "age" => 30, "city" => "New York");
echo $person["name"]; // Outputs: John

// Multidimensional array example
$employees = array(
    array("name" => "John", "age" => 30, "position" => "Developer"),
    array("name" => "Jane", "age" => 25, "position" => "Designer")
);

echo $employees[0]["name"]; // Outputs: John

// Sorting arrays
sort($fruits); // Sorts in ascending order
rsort($fruits); // Sorts in descending order
asort($person); // Sorts associative arrays by value, maintaining key association
ksort($person); // Sorts associative arrays by key
arsort($person); // Sorts associative arrays in descending order by value, maintaining key association
krsort($person); // Sorts associative arrays in descending order by key

// Global variables in PHP
$GLOBALS['global_var'] = "I am a global variable";

// Accessing global variable
echo $GLOBALS['global_var'];
?>

<!-- <script>
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
        
        // Check if username and password are not empty
        if (username.trim() !== "" && password.trim() !== "") {
            // Redirect to home2.html when Sign In button is clicked
            window.location.href = "../home html/home2.html";
        } else {
            alert("Please fill in all required fields.");
        }
    }

    function registerUser() {
        var firstName = document.getElementById("firstName").value;
        var lastName = document.getElementById("lastName").value;
        var email = document.getElementById("registerEmail").value;
        var password = document.getElementById("registerPassword").value;
        
        // Check if all fields are not empty
        if (firstName.trim() !== "" && lastName.trim() !== "" && email.trim() !== "" && password.trim() !== "") {
            // Redirect to login page after successful registration
            window.location.href = "#login";
        } else {
            alert("Please fill in all required fields.");
        }
    }

function signIn() {
    var username = document.getElementById("loginUsername").value;
    var password = document.getElementById("loginPassword").value;

    // Check if username and password are not empty
    if (username.trim() !== "" && password.trim() !== "") {
        // Here, you would typically send a request to your backend server to verify the credentials
        // For demonstration purposes, I'm assuming a successful login
        // Extract username from email (assuming email is in the format username@example.com)
        var extractedUsername = username.split('@')[0];
        // Store the username in session storage
        sessionStorage.setItem("username", extractedUsername);
        // Redirect to home2.html
        window.location.href = "../home html/home2.html";
    } else {
        alert("Please fill in all required fields.");
    }
}

</script> -->

</body>
</html>
