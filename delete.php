<?php
/**** Supprimer une randonnée ****/


$serverName = "localhost";

$userName = "root";

$password = "";

$dbname = "reunion_island";

$conn = new mysqli($serverName,$userName,$password);

if($conn->connect_error){

    die("connect failed: ".$conn->connect_error);

}else{

    $conn->select_db($dbname);

}







function delet()

{

    global $conn;


    $id=$_REQUEST['id'];

    $sql = "DELETE FROM hiking WHERE id='$id'";

    $conn->query($sql);

    header('Location:read.php');


}

delet();