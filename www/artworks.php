<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employee') {

    header("Location: index.php");
    exit();
}
include 'navbar.php';
require 'database_connection.php';

$sql = "SELECT * FROM artworks";
$result = mysqli_query($conn, $sql);
$artworks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<h2>Voorraad Kunstwerken</h2>
<table border="1">
    <thead>
        <tr>
            <th>Titel</th>
            <th>Kunstenaar</th>
            <th>Details</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($artworks as $artwork): ?>
            <tr>
                <td><?= $artwork['title'] ?></td>
                <td><?= $artwork['artist'] ?></td>
                <td><a href="artwork_detail.php?id=<?= $artwork['id'] ?>" class="btn-detail">Bekijk Details</a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<a href="Dashboard.php" class="back-link">← Terug naar Dashboard</a>