<?php
include 'database_connection.php';
require 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Registratieformulier</h2>
    <form action="register_process.php" method="post">
        <label for="firstname_form">Voornaam:</label>
        <input type="text" id="firstname_form" name="firstname_form" required><br>

        <label for="lastname_form">Achternaam:</label>
        <input type="text" id="lastname_form" name="lastname_form" required><br>

        <label for="username_form">Gebruikersnaam:</label>
        <input type="text" id="username_form" name="username_form" required><br>

        <label for="email_form">E-mail:</label>
        <input type="email" id="email_form" name="email_form" required><br>

        <label for="password_form">Wachtwoord:</label>
        <input type="password" id="password_form" name="password_form" required><br>

        <label for="street">Straat:</label>
        <input type="text" id="street" name="street" required><br>

        <label for="housenumber">Huisnummer:</label>
        <input type="text" id="housenumber" name="housenumber" required><br>

        <label for="zipcode">Postcode:</label>
        <input type="text" id="zipcode" name="zipcode" required><br>

        <label for="city">Stad:</label>
        <input type="text" id="city" name="city" required><br>

        <label for="country">Land:</label>
        <input type="text" id="country" name="country" required><br>

        <label for="phone">Telefoon:</label>
        <input type="text" id="phone" name="phone"><br>

        <label for="mobile">Mobiel:</label>
        <input type="text" id="mobile" name="mobile"><br>


        <label for="role_form">Rol:</label>
        <select name="role_form" id="role_form" required>
            <option value="">Selecteer rol</option>
            <option value="1">Member</option>
            <option value="2">Employee</option>
        </select><br>

        <button type="submit">Registreren</button>
    </form>
</body>

</html>