<?php
session_start();
if (isset($_SESSION['role']) && ($_SESSION['role'] === 'employee' || $_SESSION['role'] === 'member')) {

    header("Location: index.php");
    exit();
}
require 'navbar.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Login</h2>
    <form action="login_process.php" method="post">
        <label for="email_form">E-mail:</label>
        <input type="email" id="email_form" name="email_form"><br>

        <label for="password_form">Wachtwoord:</label>
        <input type="password" id="password_form" name="password_form" required><br>

        <button type="submit">Inloggen</button>
    </form>
</body>

</html>