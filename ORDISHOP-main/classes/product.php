
<?php

class Product{

public $id;
public $nom;
public $type;
public $libelle;
public $description; 
public $prix; 
public $image; 



public static $errorMsg = "";

public static $successMsg="";


public function __construct($nom,$type,$libelle,$description,$prix,$image){

    //initialize the attributs of the class with the parameters, and hash the password
    $this->nom = $nom;
    $this->type = $type;
    $this->description = $description;
    $this->libelle = $libelle;
    $this->prix = $prix;
    $this->image = $image;
   
    

}

public static function selectAllProducts($tableName, $conn)
{
    // Select all the products from the database and insert the rows' results into an array $data[]
    $sql = "SELECT id, nom, type, libelle, description, prix, image FROM $tableName";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        // Query execution failed, print error details
        echo "Error: " . mysqli_error($conn);
        return false;
    }

    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    return $data;
}



public function insertProduct($tableName, $conn)
{
    // Prepare and bind the SQL statement with parameters
    $sql = $conn->prepare("INSERT INTO $tableName (nom, type, libelle, description, prix, image) VALUES (?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssssds", $this->nom, $this->type, $this->libelle, $this->description, $this->prix, $this->image);

    // Execute the prepared statement
    if ($sql->execute()) {
        self::$successMsg = "New record created successfully";
    } else {
        self::$errorMsg = "Error: " . $sql->error;
    }

    // Close the prepared statement
    $sql->close();
}

    static function updatePoduct($product,$tableName,$conn,$id){
        //update a client of $id, with the values of $client in parameter
        //and send the user to read.php
        $sql = "UPDATE $tableName SET nom='$product->nom', type='$product->type', libelle='$product->libelle', description='$product->description', prix='$product->prix', image='$product->image' WHERE id='$id'";

            if (mysqli_query($conn, $sql)) {
            self::$successMsg= "New record updated successfully";
    header("Location:read.php");
            } else {
                self::$errorMsg= "Error updating record: " . mysqli_error($conn);
            }
    
    
    }

    
    static function deleteProduct($tableName,$conn,$id){
        //delet a client by his id, and send the user to read.php
        $sql = "DELETE FROM $tableName WHERE id='$id'";

    if (mysqli_query($conn, $sql)) {
        self::$successMsg= "Record deleted successfully";
        header("Location:read.php");
    } else {
        self::$errorMsg= "Error deleting record: " . mysqli_error($conn);
    }

    
    }

    static function selectProductById($tableName,$conn,$id){
        //select a client by id, and return the row result
        $sql = "SELECT nom, type, libelle, description, prix, image FROM $tableName  WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $row = mysqli_fetch_assoc($result);
        
        }
        return $row;
    }



    public static function selectproductByidcategory($tableName,$conn,$idcategorie){
    
        $sql = "SELECT * FROM $tableName  WHERE idcategorie='$idcategorie'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        $data=[];
        while($row = mysqli_fetch_assoc($result)) {
        
            $data[]=$row;
        }
        return $data;
    }

    }


    



}

?>
