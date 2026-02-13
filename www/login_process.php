<?php
require 'database_connection.php';
$email = $_POST['email_form'];
$password = $_POST['password_form'];


if (empty($email)) {
    echo "Email mag niet leeg zijn";
    exit;
}

if (empty($password)) {
    echo "Wachtwoord mag niet leeg zijn";
    exit;
}


// SQL query met een standaard JOIN
$sql = "SELECT users.*, addresses.street, addresses.housenumber, addresses.zipcode, addresses.city, addresses.country, addresses.phone, addresses.mobile
        FROM users 
        left JOIN addresses ON users.id = addresses.user_id 
        WHERE users.email = '$email'";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

if (is_array($user)) {



    if (password_verify($password, $user['password'])) {


        session_start();

        $_SESSION['id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['firstname'] = $user['firstname'];
        $_SESSION['lastname'] = $user['lastname'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        $_SESSION['street'] = $user['street'];
        $_SESSION['housenumber'] = $user['housenumber'];
        $_SESSION['zipcode'] = $user['zipcode'];
        $_SESSION['city'] = $user['city'];
        $_SESSION['country'] = $user['country'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['mobile'] = $user['mobile'];

        header("location: index.php");
        exit;
    }

    echo "Wachtwoord is onjuist";
    exit;
}

echo "Email is bij ons onbekend";
