
    <!DOCTYPE html>

    <html>

    <head>

        <meta charset="utf-8">

        <title>Ajouter une randonnée</title>

        <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">

    </head>

    <body>

    <a href="read.php">Liste des données</a>

    <h1>Ajouter</h1>

    <form action="" method="post">

        <div>

            <label for="name">Name</label>

            <input type="text" name="name" value="">

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

            <input type="text" name="distance" value="">

        </div>

        <div>

            <label for="duration">Durée</label>

            <input type="text" name="duration" value="">

        </div>

        <div>

            <label for="height_difference">Dénivelé</label>

            <input type="text" name="height_difference" value="">

        </div>

        <button type="submit" name="button">Envoyer</button>

    </form>

    </body>

    </html>

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

function creation()

{

    global $conn;

    $name = (isset($_POST['name'])?$_POST['name']:NULL);

    filter_var($name, FILTER_SANITIZE_STRING);

    $difficulty = (isset($_POST['difficulty'])?$_POST['difficulty']:NULL);

    filter_var($difficulty, FILTER_SANITIZE_STRING);

    $distance =(isset($_POST['distance'])?$_POST['distance']:NULL);

    filter_var($distance, FILTER_SANITIZE_NUMBER_FLOAT);

    $duration =(isset($_POST['duration'])?$_POST['duration']:NULL);

    filter_var($duration, FILTER_SANITIZE_STRING);

    $height_difference =(isset($_POST['height_difference'])?$_POST['height_difference']:NULL);

    filter_var($height_difference, FILTER_SANITIZE_NUMBER_FLOAT);

    $ana = $conn->prepare("insert into `hiking` (`name`,`difficulty`,`distance`,`duration`,`height_difference`)

                                values (?,?,?,?,?)");


    $ana->bind_param("ssisi",$name,$difficulty,$distance,$duration,$height_difference);

    $ana->execute();

    $ana -> close();
    if ($name&&$difficulty&&$distance&&$duration&&$height_difference==true){
        echo "bravo vous avez bien entrée les données";
    }
}

creation();

?>