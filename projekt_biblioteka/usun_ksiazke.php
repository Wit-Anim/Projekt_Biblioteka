<?php
include "php/init.php";
$id_ksiazki = $_POST["id"];

		if($sql=$conn->prepare("DELETE FROM ksiazki WHERE id=?"))
    {
		$sql->bind_param("i",$id_ksiazki);
        $sql->execute();
		header("Location: szukaj_ksiazke.php");
	}
	else
	{
		echo "podczas dodawania wystapil blad. Skontaktuj sie z administratorem. (kod bledu: baza_nieudany_edit<br>
		<a href='szukaj_ksiazke.php'>Powrót</a>";
	}
?>