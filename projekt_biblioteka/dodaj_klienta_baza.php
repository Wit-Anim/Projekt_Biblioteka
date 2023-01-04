
<?php
include "php/init.php";
$nazwisko = $_POST["nazwisko"];
$imie = $_POST["imie"];
$adres =  $_POST["adres"];
$telefon = $_POST["telefon"];

	if($sql=$conn->prepare("INSERT INTO klienci (imie,nazwisko,adres,telefon) VALUES (?,?,?,?)"))
    {
		$sql->bind_param("sssi",$imie,$nazwisko,$adres,$telefon);
        $sql->execute();
		header("Location: szukaj_klienta.php");
	}
	else
	{
		echo "podczas dodawania wystapil blad. Skontaktuj sie z administratorem. (kod bledu: baza_nieudane_dodawanie<br>
		<a href='szukaj_klienta.php'>Powrót</a>";
	}

?>