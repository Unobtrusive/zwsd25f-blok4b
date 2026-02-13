<?php
include 'navbar.php';
require 'database_connection.php';

// Check of gebruiker is ingelogd
if (empty($_SESSION['role'])) {
    header("Location: login.php");
    exit;
}

// 1. Totaal aantal kunstwerken
$resCount = mysqli_query($conn, "SELECT COUNT(*) as totaal FROM artworks");
$rowCount = mysqli_fetch_assoc($resCount);

// 2. Gemiddelde prijs
$resAvg = mysqli_query($conn, "SELECT AVG(price) as gemiddelde FROM artworks");
$rowAvg = mysqli_fetch_assoc($resAvg);

// 3. Duurste kunstwerk
$resMax = mysqli_query($conn, "SELECT title, price FROM artworks ORDER BY price DESC LIMIT 1");
$rowMax = mysqli_fetch_assoc($resMax);
?>

<div class="stats-container">
    <h1 class="stats-title">Dashboard Statistieken</h1>

    <div class="stats-grid">
        <div class="stat-card">
            <h3>Totale Collectie</h3>
            <span class="stat-value"><?= $rowCount['totaal'] ?></span>
            <span class="stat-subtext">Unieke kunstwerken</span>
        </div>

        <div class="stat-card">
            <h3>Gemiddelde Waarde</h3>
            <span class="stat-value">€<?= number_format($rowAvg['gemiddelde']) ?></span>
            <span class="stat-subtext">Per kunstwerk</span>
        </div>

        <div class="stat-card premium">
            <h3>Topstuk</h3>
            <span class="stat-value">€<?= number_format($rowMax['price']) ?></span>
            <span class="stat-subtext"><?= $rowMax['title'] ?></span>
        </div>
    </div>
</div>