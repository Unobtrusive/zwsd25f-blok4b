<?php include 'navbar.php';
require 'database_connection.php';

if (empty($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Mijn profiel</h1>

    <p><strong>Voornaam:</strong> <?= ($_SESSION['firstname']) ?></p>
    <p><strong>Achternaam:</strong> <?= ($_SESSION['lastname']) ?></p>
    <p><strong>Gebruikersnaam:</strong> <?= ($_SESSION['username']) ?></p>
    <p><strong>E-mailadres:</strong> <?= ($_SESSION['email']) ?></p>
    <p><strong>Rol:</strong> <?= ($_SESSION['role']) ?></p>
    <p><strong>Straat:</strong> <?= ($_SESSION['street']) ?></p>
    <p><strong>Huisnummer:</strong> <?= ($_SESSION['housenumber']) ?></p>
    <p><strong>Postcode:</strong> <?= ($_SESSION['zipcode']) ?></p>
    <p><strong>Stad:</strong> <?= ($_SESSION['city']) ?></p>
    <p><strong>Land:</strong> <?= ($_SESSION['country']) ?></p>
    <p><strong>Telefoon:</strong> <?= ($_SESSION['phone']) ?></p>
    <p><strong>Mobiel:</strong> <?= ($_SESSION['mobile']) ?></p

        </body>

</html>