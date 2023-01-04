<?php
include "php/init.php";
$id_klienta = $_POST["id"];

		if($sql=$conn->prepare("DELETE FROM klienci WHERE id=?"))
    {
		$sql->bind_param("i",$id_klienta);
        $sql->execute();
		header("Location: szukaj_klienta.php");
	}
	else
	{
		echo "podczas dodawania wystapil blad. Skontaktuj sie z administratorem. (kod bledu: baza_nieudany_edit<br>
		<a href='szukaj_klienta.php'>Powrót</a>";
	}
?>