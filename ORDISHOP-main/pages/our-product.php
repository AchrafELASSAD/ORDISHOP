<?php
 
 

//include connection file
include('../classes/connection.php');
   

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('ordishop1'); 

 //include the client file
 include('../classes/product.php');
   //call the static selectAllClients method and store the result of the method in $clients
   $Products = Product::selectAllProducts('products',$connection->conn);

 
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/home.css">
    <link rel="stylesheet" href="../css/coffrets.css">
    <link rel="stylesheet" href="../css/style.css">

    
    
    <title>Home</title>
</head>
<?php
        include('../pages/env/nav.php');
        
?>
<body>
<div class="container">
        <select class="form-select" aria-label="Default select example">
        <option selected>Select your Categorie</option>
        <?php
                        include("../classes/categorie.php");
                        $categorie=Categorie::selectAllcategories('categorie',$connection->conn);
                        foreach($categorie as $cat){
                                echo "<option value='$cat[id]' >$cat[name]</option>";
                        }
                    ?>
        </select>
</div>
<div class = 'container'>
    <div class = 'row'>
    <h2 style="text-align:center">Our-Product</h2>
    
<?php


foreach ($Products as $row) {
    echo "
    <div class='col-4'>
        <div class='card h-100'>
            <div class='card-header' style='border: none; background-color: white;'>
                <img src='../img/imgpc/" . $row["image"] . "' alt='...'>
            </div>
            <div class='card-body'>
                <div class='d-flex'>
                    <span class='badge badge-pill badge-primary'
                        style='width: 70px; height: 20px; border-radius:15px;background-color:  rgb(4, 121, 254); '>" . $row["nom"] . "</span>
                    <h4 class='text-secondary' style='margin-left: auto;'>" . $row["prix"] . ".00MAD</h4>
                </div>  
                <p>" . $row["description"] . "</p>
            </div>
            <div class='card-footer text-center' style='background-color: white; border: none; '>
                <button class='btn btn-warning shop-item-button' id='bb'>+Add to panier</button>
                <button class='btn btn-secondary'>
                    <a href='details.php?id=" . $row["id"] . "' style='text-decoration: none; color: inherit;' >Details</a>
                </button>
            </div>
        </div>
    </div>
    ";
}

?>

                 
<section class="container content-section">
            <h2 class="section-header">CART</h2>
            <div class="cart-row">
                <span class="cart-item cart-header cart-column">ITEM</span>
                <span class="cart-price cart-header cart-column">PRICE</span>
                <span class="cart-quantity cart-header cart-column">QUANTITY</span>
            </div>
            <div class="cart-items">
              
            </div>
            <div class="cart-total">
                <strong class="cart-total-title">Total</strong>
                <span class="cart-total-price">$0</span>
            </div>
            <button class="btn btn-primary btn-purchase" type="button">PURCHASE</button>
        </section>

           
     
    <footer>
          <?php
            include('../pages/env/footer.php');
          ?>
    </footer>
    <script src="../js/scripte.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>