<?php

$nomValue = "";
$typeValue = "";
$libelleValue = "";
$descriptionValue = "";
$imageValue = "";
$prixValue = "";


$errorMesage = "";
$successMesage = "";

include('../../classes/connection.php');
   

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('ordishop1');

    //include the client file
    include('../../classes/product.php');
if($_SERVER['REQUEST_METHOD']=='GET'){

    $id = $_GET['id'];

//call the staticbselectClientById method and store the result of the method in $row
$row=Product::selectProductById('products',$connection->conn,$id);


$nomValue = $row["nom"];
$typeValue = $row["type"];
$libelleValue = $row["libelle"];
$descriptionValue = $row["description"];
$prixValue = $row["prix"];
$imageValue = $row["image"];



}

else if(isset($_POST["submit"])){

    
    $nomValue =  $_POST["nom"];
    $typeValue =  $_POST["type"];
    $libelleValue =  $_POST["libelle"];
    $descriptionValue =  $_POST["description"];
    $prixValue =  $_POST["prix"];
    $imageValue =  $_POST["image"];
     
        //create a new instance of client ($client) with inputs values
        $product = new Product($nomValue ,$typeValue,$libelleValue,$descriptionValue , $prixValue,$imageValue );

        //call the static updateClient method and give $client in the parameters
        Product::updatePoduct($product,'products',$connection->conn, $_GET['id']);
            
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
</head>
<body>
<?php
include('../dashbord.php');
?>
<main class="md:ml-64 " >
    
    <section class="bg-white dark:bg-gray-900">
     <div class="max-w-2xl px-4 py-8 mx-auto lg:py-16">
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Update product</h2>
   

        
        <form action="#" method="post">

            

            
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nom:</label>
                  <input type="text"  value="<?php echo $nomValue ?>"  id="nom" name="nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"   >
              </div>

              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type:</label>
                  <input type="text"  value="<?php echo $typeValue ?>"  id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"   >
              </div>


              <div class="sm:col-span-2">
                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">libelle</label>
                  <input type="text" value="<?php echo $libelleValue ?>"   name="libelle" id="libelle" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"   required="">
              </div>
        
              <div class="sm:col-span-2">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                <textarea id="description" name="description" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write a product description here..."><?php echo $descriptionValue ?></textarea>
              </div>
            
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">prix:</label>
                  <input type="text" value="<?php echo $prixValue ?>"  id="prix" name="prix" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"   required="">
              </div>

            
              <div class="sm:col-span-2">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image:</label>
                    <input type="file" id="image" name="image"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                </div>


          
      

      <div class="flex items-center space-x-4">
              <button type="submit" name="submit"class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                  Update product
              </button>
              <button type="submit" name="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                  <a href='read.php'>Cancel</a>
              </button>
      </div>
        </form>
</section>
   
</main>
</body>
</html>
