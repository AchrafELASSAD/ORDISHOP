<?php
 
 

//include connection file
include('../classes/connection.php');
   

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('ordishop1'); 

 //include the client file
 include('../classes/product.php');

    $id = $_GET['id'];
   //call the static selectAllClients method and store the result of the method in $clients
   $row=Product::selectProductById('products',$connection->conn,$id);

  
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/coffrets.css">

    
    
    <title>Home</title>
</head>
<body>
<div class = 'container'>
    <div class = 'row'>
<?php
  include('../pages/env/nav.php');
 ?>

 <?php
echo"
<section class='home' >
<div class='home-content' >
   <img src='../img/imgpc/" . $row["image"] . "' alt='...'>
</div>      

<div style='padding-left: 50px;'>
        <h2>". $row["nom"] . "</h2> 
        <h5>" . $row["description"] . "</h5>
        <ul>
                        <li>Windows 11 Home</li>
                        <li>15.6 inch (39.62 cm) Diagonal, FHD (1920 x 1080), micro-edge, anti-glare Display</li>
                        <li>13th Generation Core i5 Processor</li>
                        <li>16 GB DDR4-3200 MHz RAM (2 x 8 GB)</li>
                        <li>512 GB PCIe® NVMe™ M.2 SSD</li>
                        <li>Intel® Iris® Xe Graphics</li>
                        
        </ul>
        <h1 class='text-secondary' style='margin-left: auto;'>" . $row["prix"] . ".00MAD</h1>
        <a class='btn btn-warning text-light' style='width: 150px; font-size: large;'>Add to panier</a>
        <a href='our-product.php' class='btn btn-dark text-light' style='width: 150px; font-size: large;'>Back</a>
        </div>
        
</div>

</section>
";

 ?>
