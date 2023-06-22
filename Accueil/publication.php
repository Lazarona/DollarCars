<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../Style/Detail.css" />


</head>

<body>
<header>
        <menu>
            <h1>Annonce</h1> 
            <a href="../Accueil/indexHome.php" class="lienmenu">Accueil</a>
            
        </menu>
    </header>
    



   

</body>

</html>

<?php

include_once __DIR__ . "/../models/Annonce.php";
include_once __DIR__ . "/../models/Database.php";
include_once __DIR__ . "/../Models/Encherir.php";

use Models\Encherir;
use Models\Annonce;
use Models\Database;

session_start();

$dbh = Database::createDBConnection();
Annonce::afficherDetails($dbh);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $enchere = new Encherir(
        null,
        $_SESSION['userId'],
        $_GET['id'],
        $_POST['enchere'],
        date("Y-m-d"),
        $dbh
    );

    $enchere->insert();

    $enchere->fetchEnchere($dbh);

    $enchere->getWinner($dbh);
}

// $value 
// Annonce::afficherDetails($value);
?>




