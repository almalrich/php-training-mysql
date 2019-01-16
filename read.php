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

$sql ="select * from hiking";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <title>Randonnées</title>

    <link rel="stylesheet" href="css/basics.css" media="screen" title="no title" charset="utf-8">

</head>

<body>

<h1>Liste des randonnées</h1>

<table>

    <tr>

        <th>Nom des ramdonnées</th>

        <th>Supprimer</th>

        <th>Difficulte</th>

        <th>Durée</th>

        <th>Distance</th>

        <th>Deniveler</th>

    </tr>

    <?php

    while($donnees = $result->fetch_assoc()) {

        ?>

        <tr>

            <td><a href="update.php?id=<?=$donnees['id']?>"><?php echo $donnees['name']; ?></a></td>

            <td><a href="delete.php?id=<?=$donnees['id']?>">supprimer</a></td>

            <td><?php echo $donnees['difficulty']; ?></td>

            <td><?php echo $donnees['distance']; ?></td>

            <td><?php echo $donnees['duration']; ?></td>

            <td><?php echo $donnees['height_difference']; ?></td>

        </tr>

        <?php

    }

    ?>

</table>

</body>

</html>
