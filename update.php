<?php

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




    $id=$_REQUEST['id'];




    $sql1 = "SELECT * FROM hiking where id=$id";

   $result = $conn->query($sql1);


    $donnees = $result->fetch_assoc();

    ?>
        <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ajouter une randonnée</title>
	<link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
	<a href="read.php">Liste des données</a>
	<h1>Editer</h1>
	<form action="update.php" method="post">
		<div>
			<label for="name">Name</label>
			<input type="text" name="name" value="<?= $donnees["name"]; ?>">
		</div>






            <div>
                <label for="difficulty">Difficulté</label>
                <select name="difficulty">
                    <option value="très facile">Très facile</option>
                    <option value="facile">Facile</option>
                    <option value="moyen">Moyen</option>
                    <option value="difficile">Difficile</option>
                    <option value="très difficile">Très difficile</option>
                </select>
            </div>




		<div>
			<label for="distance">Distance</label>
			<input type="text" name="distance" value="<?= $donnees["distance"]; ?>">
		</div>
		<div>
			<label for="duration">Durée</label>
			<input type="duration" name="duration" value="<?= $donnees["duration"]; ?>">
		</div>
		<div>
			<label for="height_difference">Dénivelé</label>
			<input type="text" name="height_difference" value="<?= $donnees["height_difference"]; ?>">
            <input type="hidden" name="id" value="<?= $id; ?>"
		</div>
        <input type="submit" name="modifier" value="modifier">
	</form>
</body>
</html>
    <?php


function update(){

    global $conn;

    global $id;

    $name = (isset($_POST['name'])?$_POST['name']:NULL);

    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $difficulty = (isset($_POST['difficulty'])?$_POST['difficulty']:NULL);

    $difficulty = filter_var($difficulty, FILTER_SANITIZE_STRING);

    $distance =(isset($_POST['distance'])?$_POST['distance']:NULL);

    $distance = filter_var($distance, FILTER_SANITIZE_NUMBER_FLOAT);

    $duration =(isset($_POST['duration'])?$_POST['duration']:NULL);

    $duration = filter_var($duration, FILTER_SANITIZE_STRING);

    $height_difference =(isset($_POST['height_difference'])?$_POST['height_difference']:NULL);

    $height_difference = filter_var($height_difference, FILTER_SANITIZE_NUMBER_FLOAT);

    //$id = $_POST['id'];

    $sql = "UPDATE  hiking  set name='$name' , difficulty = '$difficulty', distance = '$distance', duration = '$duration', height_difference = '$height_difference' where id='$id'";
    echo $sql;
    $conn->query($sql);

    echo $conn->error;

}

if(isset($_POST['name'])) {
    update();
}




