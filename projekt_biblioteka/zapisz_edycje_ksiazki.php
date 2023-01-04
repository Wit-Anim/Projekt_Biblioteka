<?php
include "php/init.php";
$id = $_POST["idd"];
$tytul = $_POST["tytul"];
$autor = $_POST["autor"];
$ilosc = $_POST["ilosc"];
$ilosc_wypozyczonych = $_POST["ilosc_wypozyczonych"];
$zdjecie = $_POST["zdjecie"];


		if($sql=$conn->prepare("UPDATE ksiazki set id=?,tytul=?,autor=?,ilosc=?,ilosc_wypozyczonych=?,zdjecie=? WHERE id=?"))
    {
		$sql->bind_param("issiisi",$id,$tytul,$autor,$ilosc,$ilosc_wypozyczonych,$zdjecie,$id);
        $sql->execute();
		header("Location: szukaj_ksiazke.php");
	}
	else
	{
		echo "podczas dodawania wystapil blad. Skontaktuj sie z administratorem. (kod bledu: baza_nieudany_edit<br>
		<a href='szukaj_klienta.php'>Powrót</a>";
	}

?>