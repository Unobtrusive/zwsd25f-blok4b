<?php

if (
    empty($_POST['firstname_form']) || empty($_POST['lastname_form']) ||
    empty($_POST['username_form']) || empty($_POST['email_form']) ||
    empty($_POST['password_form']) || empty($_POST['role_form']) ||
    empty($_POST['street']) || empty($_POST['housenumber']) ||
    empty($_POST['zipcode']) || empty($_POST['city']) || empty($_POST['country']) ||
    empty($_POST['phone']) || empty($_POST['mobile'])
) {
    echo "Een van de velden is leeg";
    exit;
}

if (
    strlen($_POST['firstname_form']) < 3 ||
    strlen($_POST['lastname_form']) < 3 ||
    strlen($_POST['username_form']) < 3
) {
    echo "Voor elk veld moet er minstens drie karakters opgegeven worden";
    exit;
}

if (strlen($_POST['password_form']) < 8) {
    echo "Wachtwoord moet minstens 8 karakters hebben";
    exit;
}

if (!filter_var($_POST['email_form'], FILTER_VALIDATE_EMAIL)) {
    echo "Vul een geldig emailadres in";
    exit;
}

if (!empty($_POST['phone']) && strlen($_POST['phone']) < 5) {
    echo "Telefoonnummer en mobiel moet minstens 5 cijfers hebben";
    exit;
}

require 'database_connection.php';

// Variabelen
$firstname   = $_POST['firstname_form'];
$lastname    = $_POST['lastname_form'];
$email       = $_POST['email_form'];
$username    = $_POST['username_form'];
$password    = password_hash($_POST['password_form'], PASSWORD_DEFAULT);
$role        = (int) $_POST['role_form'];

$street      = $_POST['street'];
$housenumber = $_POST['housenumber'];
$zipcode     = $_POST['zipcode'];
$city        = $_POST['city'];
$country     = $_POST['country'];
$phone       = $_POST['phone'];
$mobile      = $_POST['mobile'];

try {

    // TRANSACTIE starten (belangrijk bij 2 inserts!)
    $conn->beginTransaction();

    // 1️⃣ User toevoegen
    $sql_user = "INSERT INTO users 
                (firstname, lastname, email, username, password, role) 
                VALUES 
                (:firstname, :lastname, :email, :username, :password, :role)";

    $stmt_user = $conn->prepare($sql_user);

    $stmt_user->execute([
        ':firstname' => $firstname,
        ':lastname'  => $lastname,
        ':email'     => $email,
        ':username'  => $username,
        ':password'  => $password,
        ':role'      => $role
    ]);

    // ID ophalen
    $new_user_id = $conn->lastInsertId();

    // 2️Adres toevoegen
    $sql_address = "INSERT INTO addresses 
                    (user_id, street, housenumber, zipcode, city, country, phone, mobile) 
                    VALUES 
                    (:user_id, :street, :housenumber, :zipcode, :city, :country, :phone, :mobile)";

    $stmt_address = $conn->prepare($sql_address);

    $stmt_address->execute([
        ':user_id'    => $new_user_id,
        ':street'     => $street,
        ':housenumber' => $housenumber,
        ':zipcode'    => $zipcode,
        ':city'       => $city,
        ':country'    => $country,
        ':phone'      => $phone,
        ':mobile'     => $mobile
    ]);

    // Alles ok → commit
    $conn->commit();

    header("Location: index.php?success=1");
    exit;
} catch (PDOException $e) {

    // Fout → rollback
    $conn->rollBack();
    echo "Er is iets misgegaan: " . $e->getMessage();
}
