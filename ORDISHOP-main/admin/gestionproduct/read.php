
<?php


//include connection file
include('../../classes/connection.php');

   

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('ordishop1'); 

 //include the client file
 include('../../classes/product.php');
   //call the static selectAllClients method and store the result of the method in $clients
   $products = Product::selectAllProducts('products',$connection->conn);

   if(isset($_POST['search'])){
    $products = Product::selectproductByidcategory('products',$connection->conn,$_POST['categorie']);
    
  }
  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    
</body>
</html>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<?php
include('../dashbord.php');
?>

<main class="md:ml-64 "  > 
      <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
          <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
              <!-- Start coding here -->
              <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                  <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                      <div class="w-full md:w-1/2">
                      <form class="flex items-center" method="post">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full flex"> <!-- Added the 'flex' class here -->
                            
                                <button name="search" type="search" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Search
                                </button>
                                
                                <select name="categorie" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected>Select products</option>
                                    <?php
                                    include("../../classes/categorie.php");
                                    $categories = Categorie::selectAllcategories('categorie', $connection->conn);
                                    
                                    foreach ($categories as $cat) {
                                        echo "<option value='$cat[id]'>$cat[name]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </form>

                      </div>
                      <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                          <a  href='insert.php'>+ Add product</a>
                      </button>
                          
                      </div>
                  </div>
                  <div class="overflow-x-auto">
                      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                              <tr>
                                  <th scope="col" class="px-4 py-3">id</th>
                                  <th scope="col" class="px-4 py-3">Product name</th>
                                  <th scope="col" class="px-4 py-3">Type</th>
                                  <th scope="col" class="px-4 py-3">libelle</th>
                                  <th scope="col" class="px-4 py-3">Description</th>
                                  <th scope="col" class="px-4 py-3">prix</th>
                                  <th scope="col" class="px-4 py-3">image</th>
                                  <th scope="col" class="px-4 py-3">Action</th>
                                  
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                          foreach($products as $row) {

                            
                              echo"

                              <tr class='border-b dark:border-gray-700'>
                                  
                                  <td class='px-4 py-3'>$row[id]</td>
                                  <td class='px-4 py-3'>$row[nom]</td>
                                  <td class='px-4 py-3'>$row[type]</td>
                                  <td class='px-4 py-3'>$row[libelle]</td>
                                  <td class='px-4 py-3'>$row[description]</td>
                                  <td class='px-4 py-3'>$row[prix]</td>
                                  <td class='px-4 py-3'><img src='../../img/imgpc/{$row['image']}'  style='width: 50px; height: 50px;'></td>
                                  <td>
                                  <div style='display:flex '>
                                  <button   type='button' class='text-green-600 inline-flex items-center hover:text-white border border-green-600 hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-green-500 dark:text-green-500 dark:hover:text-white dark:hover:bg-green-600 dark:focus:ring-green-900'>
                                              <a class ='btn btn-success btn-sm' href='update.php?id=$row[id]'>edit</a>
                                  </button>
                                          
                                          <button type='button' style='margin-left:10px' class='text-red-600 inline-flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900'>
                                                <svg class='w-5 h-5 mr-1 -ml-1' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z' clip-rule='evenodd'></path></svg>
                                                <a class ='btn btn-success btn-sm' href='delete.php?id=$row[id]'>Delete</a>
                                            </button>
                                          </td>
                                  </div>
                                  </tr>";
                              }
                            ?>
                          </tbody>
                          
                      </table>
                  </div>
                  <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
                      <span class="text-sm font-normal text-gray-500 dark:text-gray-400">
                          Showing
                          <span class="font-semibold text-gray-900 dark:text-white">1-10</span>
                          of
                          <span class="font-semibold text-gray-900 dark:text-white">1000</span>
                      </span>
                      <ul class="inline-flex items-stretch -space-x-px">
                          <li>
                              <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                  <span class="sr-only">Previous</span>
                                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                  </svg>
                              </a>
                          </li>
                          <li>
                              <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                          </li>
                          <li>
                              <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                          </li>
                          <li>
                              <a href="#" aria-current="page" class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 hover:bg-primary-100 hover:text-primary-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                          </li>
                          <li>
                              <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">...</a>
                          </li>
                          <li>
                              <a href="#" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">100</a>
                          </li>
                          <li>
                              <a href="#" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                                  <span class="sr-only">Next</span>
                                  <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                      <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                  </svg>
                              </a>
                          </li>
                      </ul>
                  </nav>
              </div>
          </div>
        </section>
</main>