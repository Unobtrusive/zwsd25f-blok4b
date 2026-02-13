<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employee') {

    header("Location: index.php");
    exit();
}
include 'navbar.php';
require 'database_connection.php';
?>

<div class="stats-container">
    <h1 class="stats-title">Dashboard</h1>

    <div class="stats-grid">
        <div class="stat-card">
            <h3></h3>
            <span class="stat-value"><a href="create_artwork.php">Create Art</a></span>

        </div>

        <div class="stat-card">
            <h3></h3>
            <span class="stat-value"><a href="artworks.php">Artworks</a></span>
        </div>

        <div class="stat-card premium">
            <h3></h3>
            <span class="stat-value"><a href="users.php">Users</a></span>
        </div>
    </div>
</div>