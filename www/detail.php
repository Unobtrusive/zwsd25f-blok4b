<?php
require 'database_connection.php';
include 'navbar.php';
$id = intval($_GET['id']);
$sql = "SELECT * FROM artworks WHERE id = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, 'i', $id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$artwork = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title><?php echo htmlspecialchars($artwork['title']); ?> - Art</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <main class="art-detail">
        <img src="images/<?php echo ($artwork['image']); ?>"
            alt="<?php echo ($artwork['title']); ?>">

        <div class="art-info">
            <h2><?php echo ($artwork['title']); ?></h2>


            <p><strong>Kunstenaar:</strong> <?php echo ($artwork['artist']); ?></p>

            <p><strong>Jaar:</strong> <?php echo ($artwork['year_created']); ?></p>

            <p><strong>Medium:</strong> <?php echo ($artwork['medium']); ?></p>

            <p><strong>Afmetingen:</strong> <?php echo ($artwork['dimensions']); ?></p>

            <p><strong>Prijs:</strong> €<?php echo ($artwork['price']); ?></p>

            <div class="description">
                <strong>Beschrijving:</strong>
                <p><?php echo nl2br(($artwork['description'])); ?></p>
            </div>

            <a href="index.php" class="back-link">← Terug naar overzicht</a>
        </div>
    </main>

</body>

</html>