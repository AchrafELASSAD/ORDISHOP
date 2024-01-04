<?php

//include the connection file
include('../classes/connection.php');

//create an instance of Connection class
$connection = new Connection();

//call the createDatabase methods to create database "chap4Db"

// $connection->createDatabase('ORDISHOP1');

// $query = "
// CREATE TABLE Clients (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// username VARCHAR(30) NOT NULL,
// email VARCHAR(50) UNIQUE,
// password VARCHAR(80),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP

// )
// ";


// $query1="
// CREATE TABLE products(
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// nom VARCHAR(100) ,
// type VARCHAR(100) ,
// libelle INT ,
// description VARCHAR(100),
// prix INT,
// image VARCHAR(200),
// idcategorie INT(6) UNSIGNED NOT NULL,
// FOREIGN KEY (idcategorie) REFERENCES categorie(id)

// )
// ";

// $query2="
// CREATE TABLE admin(
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// nom VARCHAR(100) ,
// email VARCHAR(50) UNIQUE, 
// password VARCHAR(80)
// )
// ";
// $query3 = "
// CREATE TABLE categorie(
//     id INT(6) UNSIGNED AUTO_INCREMENT ,
//     name VARCHAR(30) 
//     )
// ";



//call the selectDatabase method to select the chap4Db
$connection->selectDatabase('ORDISHOP1');

//call the createTable method to create table with the $query

// $connection->createTable($query);
// $connection->createTable($query1);
// $connection->createTable($query2);
// $connection->createTable($query3);

?>
