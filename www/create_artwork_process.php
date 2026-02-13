<?php
require 'database_connection.php';

// Alleen POST toestaan
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo "Ongeldige aanvraag.";
    exit;
}

// VALIDATIE
if (empty($_POST['title'])) {
    echo "Titel mag niet leeg zijn";
    exit;
}

if (strlen($_POST['title']) < 3) {
    echo "Titel moet minstens 3 karakters hebben";
    exit;
}

if (empty($_POST['Schilder'])) {
    echo "Schilder mag niet leeg zijn";
    exit;
}

if (!is_numeric($_POST['Prijs'])) {
    echo "Prijs moet een getal zijn";
    exit;
}

if (!is_numeric($_POST['year_released'])) {
    echo "Jaar moet een getal zijn";
    exit;
}

if (strlen($_POST['year_released']) != 4) {
    echo "Jaar moet 4 cijfers hebben (bijv. 2024)";
    exit;
}

if (strlen($_POST['Descriptie']) < 10) {
    echo "Beschrijving moet minstens 10 karakters hebben";
    exit;
}

// Variabelen
$title      = $_POST['title'];
$schilder   = $_POST['Schilder'];
$desc       = $_POST['Descriptie'];
$prijs      = (float) $_POST['Prijs'];
$year       = (int) $_POST['year_released'];
$dimensies  = $_POST['Dimensies'] ?? null;

// FOTO UPLOAD
$targetDir = "uploads/";
if (!file_exists($targetDir)) {
    mkdir($targetDir, 0777, true);
}

if (!isset($_FILES['image']) || $_FILES['image']['error'] !== 0) {
    echo "Fout bij uploaden van afbeelding.";
    exit;
}

$fileName = time() . "_" . basename($_FILES["image"]["name"]);
$targetFilePath = $targetDir . $fileName;

if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
    $image = $fileName;
} else {
    echo "Er is een fout opgetreden bij het uploaden van de foto.";
    exit;
}

// INSERT MET PDO PREPARED STATEMENT
$sql = "INSERT INTO artworks 
        (title, artist, description, price, year_created, dimensions, image) 
        VALUES 
        (:title, :artist, :description, :price, :year_created, :dimensions, :image)";

$stmt = $conn->prepare($sql);

$result = $stmt->execute([
    ':title' => $title,
    ':artist' => $schilder,
    ':description' => $desc,
    ':price' => $prijs,
    ':year_created' => $year,
    ':dimensions' => $dimensies,
    ':image' => $image
]);

if ($result) {
    header("Location: index.php");
    exit;
} else {
    echo "Fout bij opslaan.";
}
