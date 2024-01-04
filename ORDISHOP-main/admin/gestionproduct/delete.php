<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];

    include('../../classes/connection.php');

$connection = new Connection();
$connection->selectDatabase('ordishop1');

include('../../classes/product.php');

Product::deleteProduct('products',$connection->conn,$id);




}
?>
