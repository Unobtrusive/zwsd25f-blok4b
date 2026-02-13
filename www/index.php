<?php
require 'database_connection.php';
include 'navbar.php';

$sql = "SELECT * FROM artworks";


$result = mysqli_query($conn, $sql);
$artworks = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>


<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Art</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="filter-sidebar">
        <form action="index.php" method="GET" style="display: flex; gap: 10px; align-items: center;">
            <div class="filter-group">
                <h3>Zoek kunstwerk</h3>
                <input type="text" name="zoekterm" placeholder="Titel of kunstenaar..."
                    value="<?php echo isset($_GET['zoekterm']) ? ($_GET['zoekterm']) : ''; ?>">
            </div>
            <button type="submit" class="back-button" style="border:none; cursor:pointer;">Zoek!</button>
            <?php if (isset($_GET['zoekterm'])): ?>
                <a href="index.php" class="reset-btn">Reset</a>
            <?php endif; ?>
        </form>
    </div>
    <div class="container">
        <?php foreach ($artworks as $artwork): ?>
            <div class="card">

                <img src="<?php
                            // Controleer of de image begint met http (externe link)
                            if (strpos($artwork['image'], 'http') === 0) {
                                echo $artwork['image'];
                            } else {
                                // Zo niet, voeg de map 'uploads/' toe voor het pad
                                echo 'uploads/' . $artwork['image'];
                            }
                            ?>" alt="art Image" class="art-image">

                <p><strong>Titel:</strong> <?php echo ($artwork['title']); ?></p>
                <p><strong>Kunstenaar:</strong> <?php echo ($artwork['artist']); ?></p>
                <p><strong>Prijs:</strong> €<?php echo ($artwork['price']); ?></p>

                <a href="detail.php?id=<?php echo $artwork['id']; ?>" class="back-button">
                    Details
                </a>

            </div>
        <?php endforeach; ?>
    </div>


    <footer class="footer">
        <p></p>
    </footer>

</body>

</html>