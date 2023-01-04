<?php
$nazwa = "localhost";
$uzytkownik = "root";
$haslo = "";
$nazwa_db = "biblioteka";
$conn = new mysqli($nazwa, $uzytkownik, $haslo, $nazwa_db);
if ($conn->connect_error) {
    die("Połączenie z bazą nie zostało nawiązane: " . $conn->connect_error);
}

session_start();

?>
