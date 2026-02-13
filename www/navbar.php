<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<link rel="stylesheet" href="style.css">
<header class="header">
    <div class="nav-container">
        <h1 class="logo">Art Gallery</h1>

        <nav class="nav-links">
            <a href="index.php">Home</a>
            <a href="filters.php">filters</a>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'employee'): ?>
                <a href="dashboard.php">Dashboard</a>
                <a href="statistics.php">Statistics</a>
                <a href="profile.php">Profile</a>
                <a href="logout.php">Uitloggen</a>

            <?php elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'member'): ?>
                <a href="statistics.php">Statistics</a>
                <a href="profile.php">Profile</a>
                <a href="logout.php">Uitloggen</a>

            <?php else: ?>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'member'): ?>
                <div id="page-timer-box">
                    Tijd op deze pagina: <span id="timer-seconds">0</span> seconden
                </div>

                <script src="timer.js"></script>
            <?php endif; ?>
        </nav>
    </div>
</header>