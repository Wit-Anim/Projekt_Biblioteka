<?php
include "php/init.php";

$tytul = $_POST["tytul"];
$autor = $_POST["autor"];
$ilosc = $_POST["ilosc"];
$ilosc_wypozyczonych = $_POST["ilosc_wypozyczonych"];
$zdjecie =  $_POST["zdjecie"];
 
 echo $tytul." ".$autor." ".$ilosc." ".$ilosc_wypozyczonych." ".$zdjecie;

	if($sql=$conn->prepare("INSERT INTO ksiazki (tytul,autor,ilosc,ilosc_wypozyczonych,zdjecie) VALUES (?,?,?,?,?)"))
    {
		$sql->bind_param("ssiis",$tytul,$autor,$ilosc,$ilosc_wypozyczonych,$zdjecie);
        $sql->execute();
		header("Location: szukaj_ksiazke.php");
	}
	else
	{
		echo "podczas dodawania wystapil blad. Skontaktuj sie z administratorem. (kod bledu: baza_ksiazki_nieudane_dodawanie<br>
		<a href='szukaj_klienta.php'>Powrót</a>";
	}

?>