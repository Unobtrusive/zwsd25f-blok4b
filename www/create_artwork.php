<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employee') {

    header("Location: index.php");
    exit();
}
require 'navbar.php';
?>


<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuw Artwork</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Voeg nieuw Artwork toe</h1>
    <form action="create_artwork_process.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Titel</label>
            <input type="text" name="title" id="title" placeholder="Zonsondergang" required>
        </div>

        <div class="form-group">
            <label for="Schilder">Schilder</label>
            <input type="text" name="Schilder" id="Schilder" placeholder="Vincent Van Gogh" required>
        </div>

        <div class="form-group">
            <label for="Descriptie">Descriptie</label>
            <textarea name="Descriptie" id="Descriptie" placeholder="Beschrijving van het werk..."></textarea>
        </div>

        <div class="form-group">
            <label for="Prijs">Prijs</label>
            <input type="number" step="0.01" name="Prijs" id="Prijs" placeholder="200000">
        </div>

        <div class="form-group">
            <label for="year_released">Jaar</label>
            <input type="number" name="year_released" id="year_released" placeholder="2014">
        </div>

        <div class="form-group">
            <label for="Dimensies">Dimensies</label>
            <input type="text" name="Dimensies" id="Dimensies" placeholder="Bijv. 100x100cm">
        </div>

        <div class="form-group">
            <label for="image">Afbeelding selecteren</label>
            <input type="file" name="image" id="image" accept="image/*" required>
        </div>

        <button type="submit" name="submit">Artwork opslaan</button>
    </form>
    <a href="Dashboard.php" class="back-link">← Terug naar Dashboard</a>
</body>

</html>