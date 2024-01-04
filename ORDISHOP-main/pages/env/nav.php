<?php
  session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>
<body>
    <header >
            <a class="navbar-brand d-none d-sm-block flex-shrink-0 " href="home.php">
              <img src="../img/logo.png" class="img-fluid" style="width: 200px; height: 50px;">
            </a>
      <nav class="navbar">
           <a href="../pages/home.php">Home</a>
           <a href="../pages/our-product.php">Our-Product</a>
           <a href="../pages/qui-nous.php">Who We Are?</a>
           <a href="../pages/blog.php">Blog</a>
      </nav>
      <nav class="navbar btn-box">
       
         <?php 
         if (!isset($_SESSION['username'])){
        ?>
         <a href="../login-page-main/login.php" class="login-link  ">Login </a>
        <a href="../login-page-main/login.php" class="register-link ">Sign Up</a>
        
        <?php 
         }else{
        ?>
       
         <p> 
                <nav class="navbar">
                  <?php
                  echo $_SESSION['username'] 
                  ?> 
                </nav>
          </p>
         <a href="../login-page-main/logout.php" class="login-link  ">Log out </a>
         <?php 
      }
        ?>
      </nav>
      <nav class="">
        <a class="btn btn-warning rounded-circle" href="panier.php">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
              <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
          </svg>
        </a>
</nav>

    </header>
    