<?php
$host = 'mariadb';
$user = 'user';
$password = 'password';
$database = 'art_gallery';

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
