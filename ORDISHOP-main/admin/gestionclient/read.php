


<?php

//include connection file
include('../../classes/connection.php');
   

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('ordishop1'); 

 //include the client file
 include('../../classes/client.php');
   //call the static selectAllClients method and store the result of the method in $clients
   $clients = Client::selectAllClients('Clients',$connection->conn);

 
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>

<?php
include('../dashbord.php');
?>

<main class="md:ml-64 " >  
      <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
          <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
              <!-- Start coding here -->
              <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                  <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                      <div class="w-full md:w-1/2">
                          <form class="flex items-center">
                              <label for="simple-search" class="sr-only">Search</label>
                              <div class="relative w-full">
                                  <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                      <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                          <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                      </svg>
                                  </div>
                                  <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                              </div>
                          </form>
                      </div>
                      <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                          <div class="flex items-center space-x-3 w-full md:w-auto">
                             
                              <div id="filterDropdown" class="z-10 hidden w-48 p-3 bg-white rounded-lg shadow dark:bg-gray-700">

                                  <ul class="space-y-2 text-sm" aria-labelledby="filterDropdownButton">
                                      <li class="flex items-center">
                                          <input id="apple" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                          <label for="apple" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Apple (56)</label>
                                      </li>
                                      <li class="flex items-center">
                                          <input id="fitbit" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                          <label for="fitbit" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Microsoft (16)</label>
                                      </li>
                                      <li class="flex items-center">
                                          <input id="razor" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                          <label for="razor" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Razor (49)</label>
                                      </li>
                                      <li class="flex items-center">
                                          <input id="nikon" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                          <label for="nikon" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">Nikon (12)</label>
                                      </li>
                                      <li class="flex items-center">
                                          <input id="benq" type="checkbox" value="" class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                          <label for="benq" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">BenQ (74)</label>
                                      </li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>

<div class="container my-5">
 
  <div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-4 py-3">Id</th>
                <th scope="col" class="px-4 py-3">Username</th>
                <th scope="col" class="px-4 py-3">email</th>
                <th scope="col" class="px-4 py-3">Action</th>
                
                
            </tr>
        </thead>
    <tbody>

        <?php
        foreach($clients as $row) {
            
        
          echo"

          <tr class='border-b dark:border-gray-700'>
              
              <td class='px-4 py-3'>$row[id]</td>
              <td class='px-4 py-3'>$row[username]</td>
              <td class='px-4 py-3'>$row[email]</td>
              <td>
              <div style='display:flex '>
                      <button class='bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded'>
                          <a class ='btn btn-success btn-sm' href='update.php?id=$row[id]'>edit</a>
                      </button>
                      <button class='bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded' style='margin-left:5px'>
                          <a class ='btn btn-success btn-sm' href='delete.php?id=$row[id]'>delite</a>
                      </button>
                      </td>
              </div>
              </tr>";
          }
        
        
        ?>
        </tbody>
        
    </table>
    </div>
</body>
</html>
