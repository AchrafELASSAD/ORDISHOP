<?php

$emailValue = "";
$usernameValue = "";


$errorMesage = "";
$successMesage = "";

include('../../classes/connection.php');
   

//create in instance of class Connection
$connection = new Connection();


//call the selectDatabase method
$connection->selectDatabase('ordishop1');

    //include the client file
    include('../../classes/client.php');
if($_SERVER['REQUEST_METHOD']=='GET'){

    $id = $_GET['id'];

//call the staticbselectClientById method and store the result of the method in $row
$row=Client::selectClientById('Clients',$connection->conn,$id);

$emailValue = $row["email"];
$usernameValue = $row["username"];

}

else if(isset($_POST["submit"])){

    $emailValue = $_POST["email"];
    $usernameValue = $_POST["username"];
   
   

    if(empty($emailValue) || empty($usernameValue)  ){

            $errorMesage = "all fileds must be filed out!";

    }else{

        
        //create a new instance of client ($client) with inputs values
        $client = new Client($usernameValue,$emailValue,$_GET['password']);

        //call the static updateClient method and give $client in the parameters
        Client::updateClient($client,'Clients',$connection->conn, $_GET['id']);
            
    }
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
        
          <div class="grid gap-4 mb-4 sm:grid-cols-2 sm:gap-6 sm:mb-5">
              <div class="sm:col-span-2">
                  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">User name:</label>
                  <input type="text" value="<?php echo $usernameValue ?>"  id="fname" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  placeholder="Type product name" required="">
              </div>
             
              <div class="w-full">
                  <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email:</label>
                  <input type="text"  value=" <?php echo $emailValue ?>" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
              </div>
              
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
  </div>
</section>