<?php

$nomValue = "";
$typeValue = "";
$libelleValue = "";
$descriptionValue = "";
$imageValue = "";
$prixValue = "";


include('../../classes/connection.php');

// Create an instance of the Connection class
$connection = new Connection();

// Call the selectDatabase method
$connection->selectDatabase('ordishop1');

// Include the product file
include('../../classes/product.php');

if (isset($_POST["submit"])) {

    $nomValue = $_POST["nom"];
    $typeValue = $_POST["type"];
    $libelleValue = $_POST["libelle"];
    $descriptionValue = $_POST["description"];
    $prixValue = $_POST["prix"];

    // Handle file upload
    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $targetDir = "../../img/imgpc/";
        $targetFile = $targetDir . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $imageValue = $targetFile;
        } else {
            $errorMesage = "Sorry, there was an error uploading your image.";
        }
    }

    // create a new instance of the Product class with the values of the inputs
    $product = new Product($nomValue, $typeValue, $libelleValue, $descriptionValue, $prixValue, $imageValue);

    // call the insertProduct method
    $product->insertProduct('products', $connection->conn);

    // give the $successMesage the value of the static $successMsg of the class
    $successMesage = Product::$successMsg;

    // give the $errorMesage the value of the static $errorMsg of the class
    $errorMesage = Product::$errorMsg;

    $nomValue = "";
    $typeValue = "";
    $libelleValue = "";
    $descriptionValue = "";
    $imageValue = "";
    $prixValue = "";
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
      <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Ajouter product</h2>

        

            <br>
            <form method="post" enctype="multipart/form-data">
            <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">nom:</label>
                  <input type="text"  value="<?php echo $nomValue ?>"  id="nom" name="nom" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"   >
              </div>

              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type:</label>
                  <input type="text"  value=" <?php echo $typeValue ?>"  id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"   >
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
                  Ajouter
              </button>
              <button type="submit" name="submit" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                  <a href='read.php'>Cancel</a>
              </button>
           </div>
            </form>

        </div>
    </main>
</body>

</html>
