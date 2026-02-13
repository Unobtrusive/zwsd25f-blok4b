<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employee') {

    header("Location: index.php");
    exit();
}
include 'navbar.php';
require 'database_connection.php';



if (isset($_GET['zoekterm']) && !empty($_GET['zoekterm'])) {
    $zoekterm = $_GET['zoekterm'];
    $sql = "SELECT id, firstname, lastname, email FROM users WHERE lastname LIKE ? OR email LIKE ?";
    $search_term = '%' . $zoekterm . '%';

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ss', $search_term, $search_term);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
} else {
    $sql = "SELECT id, firstname, lastname, email FROM users";
    $result = mysqli_query($conn, $sql);
    $users = mysqli_fetch_all($result, MYSQLI_ASSOC);
}
?>

<h2>Gebruikersoverzicht</h2>
<div class="filter-sidebar">
    <form action="users.php" method="GET">
        <div class="filter-group">
            <h3>Zoek gebruiker</h3>
            <input type="text" name="zoekterm" placeholder="Achternaam of email..." value="<?php echo isset($_GET['zoekterm']) ? $_GET['zoekterm'] : ''; ?>">
            <button type="submit" class="back-button">Zoek</button>
            <a href="users.php" class="reset-btn">Wis filters</a>
        </div>
    </form>
</div>
<table>
    <tr>
        <th>Voornaam</th>
        <th>Achternaam</th>
        <th>Email</th>
    </tr>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['firstname'] ?></td>
            <td><?= $user['lastname'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><a href="user_detail.php?id=<?= $user['id'] ?>">Bekijk Details</a></td>
        </tr>
    <?php endforeach; ?>
</table>
<a href="Dashboard.php" class="back-link">← Terug naar Dashboard</a>