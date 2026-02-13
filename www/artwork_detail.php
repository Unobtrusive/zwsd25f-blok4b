<?php
include 'navbar.php';
require 'database_connection.php';


if (empty($_SESSION['role']) || $_SESSION['role'] !== 'employee') {
    header("Location: login.php");
    exit;
}

$id = intval($_GET['id']);

if (!$id) {
    echo "Geen kunstwerk geselecteerd.";
    exit;
}

// Gegevens ophalen uit de database - Prepared statement
$sql = "SELECT * FROM artworks WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$artwork = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

if (!$artwork) {
    echo "Kunstwerk niet gevonden.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Detail - <?= ($artwork['title']) ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <main class="art-detail">
        <img src="images/<?= ($artwork['image']) ?>" alt="<?= ($artwork['title']) ?>">

        <div class="art-info">
            <h2><?= ($artwork['title']) ?></h2>
            <p><strong>Kunstenaar:</strong> <?= ($artwork['artist']) ?></p>
            <p><strong>Jaar:</strong> <?= ($artwork['year_created']) ?></p>
            <p><strong>Medium:</strong> <?= ($artwork['medium']) ?></p>
            <p><strong>Prijs:</strong> €<?= number_format($artwork['price']) ?></p>

            <p class="description">
                <?= nl2br(($artwork['description'])) ?>
            </p>

            <a href="artworks.php" class="back-link">← Terug naar overzicht</a>
        </div>
    </main>

</body>

</html>