<?php

$host = "103.149.71.103"; // Nama Host
$user = "remotslims"; // Nama User
$pass = "remotslims"; // Password
$db = "slims"; // Nama Database

// Koneksi
$koneksi = mysqli_connect($host, $user, $pass)
or die(mysqli_error());

//pilih database
mysqli_select_db($koneksi, $db)
or die(mysqli_error() . "Database Not Found!");

?>


