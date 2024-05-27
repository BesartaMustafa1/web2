<?php
session_start();
ob_start();
ini_set('display_errors', 1);

require_once ( "../mysql/dbconnector.php");

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

class User {
    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $email;

    public function __construct($username, $password, $firstName, $lastName, $email) {
        $this->username = $username;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function isValidLogin() {
        return !empty($this->username) && !empty($this->password);
    }

    public function isValidRegistration() {
        return !empty($this->firstName) && !empty($this->lastName) && !empty($this->email) && !empty($this->password);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // login
    if (isset($_POST['loginUsername']) && isset($_POST['loginPassword'])) {
        $user = new User($_POST['loginUsername'], $_POST['loginPassword'], '', '', '');

        if ($user->isValidLogin()) {
            $sql = "SELECT * FROM users WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $user->getUsername());
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $userData = $result->fetch_assoc();
                if (password_verify($_POST['loginPassword'], $userData['password'])) {
                    $_SESSION['username'] = $userData['username'];
                    header("Location: ../home html/home2.php");
                    exit();
                } else {
                    echo "Invalid password.";
                }
            } else {
                echo "User does not exist.";
            }
        } else {
            echo "Please fill in all required fields.";
        }
    }
   #register
    elseif (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['registerEmail']) && isset($_POST['registerPassword'])) {
    $user = new User('', $_POST['registerPassword'], $_POST['firstName'], $_POST['lastName'], $_POST['registerEmail']);

    if ($user->isValidRegistration()) {
        $passwordHash = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (username, password, first_name, last_name, email) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $user->getEmail(), $passwordHash, $user->getFirstName(), $user->getLastName(), $user->getEmail());

        if ($stmt->execute()) {
            $_SESSION['username'] = $user->getEmail();
            header("Location: ../home html/home2.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
     } else {
        echo "Please fill in all required fields.";
         }
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
            <form method="POST" action="">
                <div class="input-box">
                    <input type="text" class="input-field" id="loginUsername" name="loginUsername" placeholder="Username or Email" required>
                    <i class="bx bx-user"></i>
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" id="loginPassword" name="loginPassword" placeholder="Password" required>
                    <i class="bx bx-lock-alt"></i>
                </div>
                <div class="input-box">
                    <input type="submit" class="submit" value="Sign In">
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
            </form>
        </div>
        
        <!-- registration form -->
        <div class="register-container" id="register">
            <div class="top">
                <span>Have an account? <a href="#" onclick="login()">Login</a></span>
                <header>Sign Up</header>
            </div>
            <form method="POST" action="">
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
                    <input type="submit" class="submit" value="Register">
                </div>
                <div class="two-col">
                    <div class="one">
                        <input type="checkbox" id="register-check">
                        <label for="register-check"> Remember Me</label>
                      
                    </div>

                    <div class="two">
                        <label><a href="../extras/terms-condiction">Terms & conditions</a></label>
                    </div>
                </div>
            </form>
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

  
</script>

</body>
</html>
