<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn and SignUp</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Cairo&family=Open+Sans:wght@300;400;600;700&family=Pacifico&family=Poppins:wght@300;400;500;600;700;800;900&family=Rubik:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/login.css">
</head>

<?php
// include connection file
include('../classes/connection.php');
include('../classes/client.php');

session_start();
// create an instance of class Connection
$connection = new Connection();

// call the selectDatabase method
$connection->selectDatabase('ORDISHOP1');

$emailValue = "";
$passwordValue = "";
$errorMessage = "";

if (isset($_POST["log"])) {
    $emailValue = isset($_POST['email']) ? $_POST['email'] : '';
    $passwordValue = isset($_POST['password']) ? $_POST['password'] : '';

    if (empty($emailValue) || empty($passwordValue)) {
        $errorMessage = "Please provide both email and password";
    } else {
        $client = Client::Authentif('clients', $connection->conn, $emailValue);

        if (!empty($client)) {
            $row = $client;
            $hashedPassword = $row['password'];

            if (password_verify($passwordValue, $hashedPassword)) {
                $_SESSION['username'] = $row['username'];
                header('location: ../pages/home.php');
                exit();
            } else {
                $errorMessage = "Incorrect email or password";
            }
        } else {
            $errorMessage = "No client found with the given email";
        }
    }
}
?>











<body> 
    <!-- LOGIN -->
    <div class="wrapper">
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>
        
        <div class="form-box login">
            <h2 class="animation" style="--i:0; --j:21;">Login</h2>
            <form action="#" method="post">
                <div class="input-box animation" style="--i:1; --j:22;">
                    <input type="text" name="email" required>
                    <label>Email</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:2; --j:23;">
                <input type="password" name="password" required>
                    <label>Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit"  name="log" class="btn animation" style="--i:3; --j:24;">Login</button>
                <div class="logreg-link  animation" style="--i:4; --j:25;">
                    <p>Don't have an account ?
                        <a href="#" class="register-link">Sign Up</a>
                    </p>
                </div>
            </form>
        </div>
        <div class="info-text login">
            <h2 class="animation" style="--i:0; --j:20;">Welcome Back!</h2>
            <p class="animation" style="--i:1; --j:21;">Join to our group</p>
        </div>
  




        <!-- Sign up -->



        <?php
// include connection file


// create an instance of class Connection
$connection = new Connection();

// call the selectDatabase method
$connection->selectDatabase('ORDISHOP1');

$emailValue = "";
$usernameValue = "";
$passwordValue = "";


if (isset($_POST["submit"])) {
    $usernameValue = $_POST["username"];
    $emailValue = $_POST["email"];
    $passwordValue = $_POST["password"];

    if (empty($emailValue) || empty($usernameValue) || empty($passwordValue)) {
        $errorMesage = "All fields must be filled out!";
    } else if (strlen($passwordValue) < 6) {
        $errorMesage = "Password must contain at least 8 characters";
    } else if (preg_match("/[A-Z]+/", $passwordValue) == 0) {
        $errorMesage = "Password must contain at least one capital letter!";
    } else {
        // include the client file
        // include('../classes/client.php');

        // create a new instance of the Client class with the values of the inputs
        $client = new Client($usernameValue, $emailValue, $passwordValue);

        // call the insertClient method
        $client->insertClient('Clients', $connection->conn);

        // give the $successMesage the value of the static $successMsg of the class
        $successMesage = Client::$successMsg;

        // give the $errorMesage the value of the static $errorMsg of the class
        $errorMesage = Client::$errorMsg;

        $usernameValue = "";
        $emailValue = "";
        $passwordValue = "";
    }
}
?>

        <div class="form-box register">
            <h2 class="animation" style="--i:17; --j:0;">Sign Up</h2>
      
            <form action="#" method="post">
                <div class="input-box animation" style="--i:18; --j:1;">
                    
                    <input value="<?php echo $usernameValue ?>" class="form-control" type="text" id="username" name="username" required>
                    <label>Username</label>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box animation" style="--i:19; --j:2;">
                <input value=" <?php echo $emailValue ?>" class="form-control" type="email" id="email" name="email" required>
                    <label>Email</label>
                    <i class='bx bxs-envelope'></i>
                </div>
                <div class="input-box animation" style="--i:20; --j:3;">
                <input  class="form-control" type="password" id="password" name="password" required>
                    <label>Password</label>
                    <i class='bx bxs-lock-alt'></i>
                </div>
                <button type="submit" name="submit" class="btn animation" style="--i:21; --j:4;">Sign Up</button>
                
             
                <div class="logreg-link animation" style="--i:22; --j:5;">
                    <p>Already have an account ?
                        <a href="#" class="login-link">Login</a>
                    </p>
                </div>
            </form>
        </div>
        <div class="info-text register">
            <h2 class="animation" style="--i:17; --j:0;">Welcome Back!</h2>
            <p class="animation" style="--i:18; --j:1;">Join our group</p>
        </div>
    </div>

    <script src="../js/login.js"></script>
</body>

</html>