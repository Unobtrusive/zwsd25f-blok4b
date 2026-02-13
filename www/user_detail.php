<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employee') {

    header("Location: index.php");
    exit();
}
include 'navbar.php';
require 'database_connection.php';

$id = $_GET['id'];
$sql = "SELECT users.*, addresses.street, addresses.housenumber, addresses.zipcode, addresses.city, addresses.country,addresses.phone,addresses.mobile
        FROM users 
        JOIN addresses ON users.id = addresses.user_id 
        WHERE users.id = $id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<h2>Details van <?= $user['firstname'] ?></h2>
<p><strong>ID:</strong> <?= $user['id'] ?></p>
<p><strong>Naam:</strong> <?= $user['firstname'] ?> <?= $user['lastname'] ?></p>
<p><strong>Email:</strong> <?= $user['email'] ?></p>
<p><strong>Gebruikersnaam:</strong> <?= $user['username'] ?></p>
<p><strong>Wachtwoord:</strong> <?= $user['password'] ?></p>
<p><strong>Rol:</strong> <?= $user['role'] ?></p>
<p><strong>Straat:</strong> <?= $user['street'] ?></p>
<p><strong>Huisnummer:</strong> <?= $user['housenumber'] ?></p>
<p><strong>Postcode:</strong> <?= $user['zipcode'] ?></p>
<p><strong>Stad:</strong> <?= $user['city'] ?></p>
<p><strong>Land:</strong> <?= $user['country'] ?></p>
<p><strong>Telefoon:</strong> <?= $user['phone'] ?></p>
<p><strong>Mobiel:</strong> <?= $user['mobile'] ?></p>

<a href="users.php">Terug naar overzicht</a>