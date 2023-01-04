<?php
include "php/init.php";
$id = $_POST["idd"];
$imie = $_POST["imie"];
$nazwisko = $_POST["nazwisko"];
$adres = $_POST["adres"];
$telefon = $_POST["telefon"];

	if($sql=$conn->prepare("UPDATE klienci set id=?,imie=?,nazwisko=?,adres=?,telefon=? WHERE id=?"))
    {
		$sql->bind_param("isssii",$id,$imie,$nazwisko,$adres,$telefon,$id);
        $sql->execute();
		header("Location: szukaj_klienta.php");
	}
	else
	{
		echo "podczas dodawania wystapil blad. Skontaktuj sie z administratorem. (kod bledu: baza_nieudany_edit<br>
		<a href='szukaj_klienta.php'>Powrót</a>";
	}

?>