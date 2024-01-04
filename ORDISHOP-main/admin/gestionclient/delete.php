<?php

if($_SERVER['REQUEST_METHOD']=='GET'){

    $id=$_GET['id'];

    include('../../classes/connection.php');

$connection = new Connection();
$connection->selectDatabase('ordishop1');

include('../../classes/client.php');

Client::deleteClient('Clients',$connection->conn,$id);




}
?>
