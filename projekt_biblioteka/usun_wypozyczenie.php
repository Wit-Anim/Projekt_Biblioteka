<?php
include "php/init.php";
$id_wypozyczenia = $_POST["id"];

		if($sql=$conn->prepare("DELETE FROM wypozyczenia WHERE id_wypozyczenia=?"))
    {
		$sql->bind_param("i",$id_wypozyczenia);
        $sql->execute();
		header("Location: szukaj_wypozyczenia.php");
	}
	else
	{
		echo "podczas dodawania wystapil blad. Skontaktuj sie z administratorem. (kod bledu: baza_nieudany_edit<br>
		<a href='szukaj_wypozyczenia.php'>Powrót</a>";
	}
?>