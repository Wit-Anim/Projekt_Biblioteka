<?php
include "php/init.php";

$id_klienta = $_POST["id_klienta"];
$nazwisko = $_POST["nazwisko"];
$tytul = $_POST["tytul"];

echo $id_klienta." ".$nazwisko." ".$tytul;

if($sql=$conn->prepare("INSERT INTO wypozyczenia (id_klienta,nazwisko,tytul_ksiazki) VALUES (?,?,?)"))
    {
		$sql->bind_param("iss",$id_klienta,$nazwisko,$tytul);
        $sql->execute();
		header("Location: szukaj_wypozyczenia.php");
	}
	else
	{
		echo "podczas dodawania wystapil blad. Skontaktuj sie z administratorem. (kod bledu: baza_nieudane_dodawanie<br>
		<a href='szukaj_wypozyczenia.php'>Powrót</a>";
	}

?>