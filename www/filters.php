<?php
require 'database_connection.php';
include 'navbar.php';

/* BASIS */
$sql = "SELECT * FROM artworks WHERE 1=1";

/* FILTER: MEDIUM */
if (!empty($_GET['medium'])) {
    $medium = mysqli_real_escape_string($conn, $_GET['medium']);
    $sql .= " AND medium = '$medium'";
}

/* FILTER: PRIJSKLASSE */
if (!empty($_GET['price'])) {
    if ($_GET['price'] === 'budget') {
        $sql .= " AND price < 500";
    } elseif ($_GET['price'] === 'gemiddeld') {
        $sql .= " AND price BETWEEN 500 AND 1500";
    } elseif ($_GET['price'] === 'luxe') {
        $sql .= " AND price > 1500";
    }
}

/* SORTEREN (zoals opdracht) */
$sorteer = isset($_GET['sorteer']) ? $_GET['sorteer'] : '';
$orderBy = '';

switch ($sorteer) {
    case 'prijs_asc':
        $orderBy = ' ORDER BY price ASC';
        break;
    case 'prijs_desc':
        $orderBy = ' ORDER BY price DESC';
        break;
}

$sql .= $orderBy;

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
    <aside class="filter-sidebar">
        <div class="filter-group">
            <h3>Medium</h3>
            <ul>
                <li><a href="?medium=Olieverf">OlieVerf</a></li>
                <li><a href="?medium=Acryl">Acryl</a></li>
                <li><a href="?medium=Aquarel">Aquarel</a></li>
            </ul>
        </div>

        <div class="filter-group">
            <h3>Prijs</h3>
            <ul>
                <li><a href="?price=budget">Budget</a></li>
                <li><a href="?price=gemiddeld">Gemiddeld</a></li>
                <li><a href="?price=luxe">Luxe</a></li>
            </ul>
        </div>

        <div class="filter-group">
            <h3>Sorteren</h3>
            <form method="get">
                <select name="sorteer" id="sorteer" onchange="this.form.submit()">
                    <option value="">-- Prijs volgorde --</option>
                    <option value="prijs_asc">Laag → Hoog</option>
                    <option value="prijs_desc">Hoog → Laag</option>
                </select>
            </form>
        </div>

        <a href="filters.php" class="reset-btn">Filters resetten</a>
    </aside>


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