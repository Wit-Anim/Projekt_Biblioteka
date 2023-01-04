<?php
include "php/init.php";
$id_wypozyczenia = $_POST["id_wypozyczenia"];
$id_klienta = $_POST["id_klienta"];
$nazwisko = $_POST["nazwisko"];
$tytul = $_POST["tytul"];

		if($sql=$conn->prepare("UPDATE wypozyczenia SET id_wypozyczenia=?,id_klienta=?,nazwisko=?,tytul_ksiazki=? WHERE id_wypozyczenia=?"))
    {
		$sql->bind_param("iissi",$id_wypozyczenia,$id_klienta,$nazwisko,$tytul,$id_wypozyczenia);
        $sql->execute();
		header("Location: szukaj_wypozyczenia.php");
	}
	else
	{
		echo "podczas dodawania wystapil blad. Skontaktuj sie z administratorem. (kod bledu: baza_nieudany_edit<br>
		<a href='szukaj_wypozyczenia.php'>Powrót</a>";
	}

?>