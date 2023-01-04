<?php
include 'php/init.php';
$plikTworzony = "db_export.txt";
	if(isset($_SESSION["userName"]) && isset($_SESSION["adminName"]))
	{
		if($sql=$conn->prepare("select * from bibliotekarze"))
		{
				$sql->execute();
				$sql->bind_result($id_bib,$czy_adm,$imie,$nazwisko,$adres,$telefon);
				$plik=fopen($plikTworzony,"w+");
				 fwrite($plik,PHP_EOL."Table: bibliotekarze.".PHP_EOL);
				while($sql->fetch())
				{
					fwrite($plik,"Id bibliotekarza: ".$id_bib." | Czy Admin: ".$czy_adm." |  Imie: ".$imie." | Nazwisko: ".$nazwisko." | Adres: ".$adres." | Telefon: ".$telefon."".PHP_EOL);
				}
				$sql->close();
		}
		
		if($sql=$conn->prepare("select * from klienci"))
		{
				$sql->execute();
				$sql->bind_result($id,$imie,$nazwisko,$adres,$telefon);
				$plik=fopen($plikTworzony,"a");
				 fwrite($plik,PHP_EOL."Table: klienci.".PHP_EOL);
				while($sql->fetch())
				{
					fwrite($plik,"Id klienta: ".$id." | Imie: ".$imie." | Nazwisko: ".$nazwisko." | Adres: ".$adres." | Telefon: ".$telefon."".PHP_EOL);
				}
				$sql->close();
		}
		
		if($sql=$conn->prepare("select * from ksiazki"))
		{
				$sql->execute();
				$sql->bind_result($id,$tytul,$autor,$ilosc,$ilosc_wypozyczonych,$zdjecie);
				$plik=fopen($plikTworzony,"a");
				 fwrite($plik,PHP_EOL."Table: ksiazki.".PHP_EOL);
				while($sql->fetch())
				{
					fwrite($plik,"Id ksiazki: ".$id." | Tytul: ".$tytul." | Autor: ".$autor." | Ilosc: ".$ilosc." | Ilosc Wypozyczonych: ".$ilosc_wypozyczonych." | Zdjecie: ".$zdjecie."".PHP_EOL);
				}
				$sql->close();
		}
		
		if($sql=$conn->prepare("select * from logowania"))
		{
				$sql->execute();
				$sql->bind_result($id_wpisu,$id_bibliotekarza,$login,$haslo);
				$plik=fopen($plikTworzony,"a");
				 fwrite($plik,PHP_EOL."Table: logowania.".PHP_EOL);
				while($sql->fetch())
				{
					fwrite($plik,"Id wpisu: ".$id_wpisu." | Id biblio: ".$id_bibliotekarza." | Login: ".$login." | Haslo: ".$haslo."".PHP_EOL);
				}
				$sql->close();
		}
		
			if($sql=$conn->prepare("select * from logowania_admin"))
		{
				$sql->execute();
				$sql->bind_result($id_wpisu,$id_bibliotekarza,$login,$haslo);
				$plik=fopen($plikTworzony,"a");
				 fwrite($plik,PHP_EOL."Table: logowania_admin.".PHP_EOL);
				while($sql->fetch())
				{
					fwrite($plik,"Id wpisu: ".$id_wpisu." | Id biblio: ".$id_bibliotekarza." | Login: ".$login." | Haslo: ".$haslo."".PHP_EOL);
				}
				$sql->close();
		}
		
			if($sql=$conn->prepare("select * from wypozyczenia"))
		{
				$sql->execute();
				$sql->bind_result($id_wypozyczenia,$id_klienta,$id_ksiazki);
				$plik=fopen($plikTworzony,"a");
				 fwrite($plik,PHP_EOL."Table: wypozyczenia.".PHP_EOL);
				while($sql->fetch())
				{
					fwrite($plik,"Id wypozyczenia: ".$id_wypozyczenia." | Id klienta: ".$id_klienta." | Id ksiazki: ".$id_ksiazki."".PHP_EOL);
				}
				$sql->close();
		}
			echo "<br><center><a href='db_export.txt'>Zobacz plik</a><br><a href='panel_admin.php'>Pówrot</a></center>";
	}
	else
	{
		header("Location: panel_admin.php");
	}
?>