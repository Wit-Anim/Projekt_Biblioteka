<?php
include 'php/init.php';
$plikTworzony = "db_export.php";
	if(isset($_SESSION["userName"]))
		{			
			$plikTymczas = fopen("db_export.php", "a+") or die("Unable to open file!");
			$bufor = "";
			$bufor .=fgets($plikTymczas);
			$bufor .=fgets($plikTymczas);
			$bufor .=fgets($plikTymczas);
			$bufor .=fgets($plikTymczas);
			$bufor .=fgets($plikTymczas);
			$bufor .=fgets($plikTymczas);
			fclose($plikTymczas);
				$plik=fopen($plikTworzony,"w+");
				 fwrite($plik,strval($bufor));
				 
		if($sql=$conn->prepare("select * from bibliotekarze"))
		{     
				$sql->execute();
				$sql->bind_result($id_bib,$czy_adm,$imie,$nazwisko,$adres,$telefon);
				$plik=fopen($plikTworzony,"a+");
				 fwrite($plik,"echo \"<br>Table: bibliotekarze.<br>\";".PHP_EOL);
				while($sql->fetch())
				{
					fwrite($plik,"echo \"Id bibliotekarza: ".$id_bib." | Czy Admin: ".$czy_adm." |  Imie: ".$imie." | Nazwisko: ".$nazwisko." | Adres: ".$adres." | Telefon: ".$telefon."<br>\";".PHP_EOL);
				}
				$sql->close();
		}
		
		if($sql=$conn->prepare("select * from klienci"))
		{
				$sql->execute();
				$sql->bind_result($id,$imie,$nazwisko,$adres,$telefon);
				$plik=fopen($plikTworzony,"a+");
				 fwrite($plik,"echo \"<br><br>Table: klienci.<br>\";".PHP_EOL);
				while($sql->fetch())
				{
					fwrite($plik,"echo \"Id klienta: ".$id." | Imie: ".$imie." | Nazwisko: ".$nazwisko." | Adres: ".$adres." | Telefon: ".$telefon."<br>\";".PHP_EOL);
				}
				$sql->close();
		}
		
		if($sql=$conn->prepare("select * from ksiazki"))
		{
				$sql->execute();
				$sql->bind_result($id,$tytul,$autor,$ilosc,$ilosc_wypozyczonych,$zdjecie);
				$plik=fopen($plikTworzony,"a+");
				 fwrite($plik,"echo \"<br><br>Table: ksiazki.<br>\";".PHP_EOL);
				while($sql->fetch())
				{
					fwrite($plik,"echo \"Id ksiazki: ".$id." | Tytul: ".$tytul." | Autor: ".$autor." | Ilosc: ".$ilosc." | Ilosc Wypozyczonych: ".$ilosc_wypozyczonych." | Zdjecie: ".$zdjecie."<br>\";".PHP_EOL);
				}
				$sql->close();
		}
		
		if($sql=$conn->prepare("select * from logowania"))
		{
				$sql->execute();
				$sql->bind_result($id_wpisu,$id_bibliotekarza,$login,$haslo);
				$plik=fopen($plikTworzony,"a+");
				 fwrite($plik,"echo \"<br><br>Table: logowania.<br>\";".PHP_EOL);
				while($sql->fetch())
				{
					fwrite($plik,"echo \"Id wpisu: ".$id_wpisu." | Id biblio: ".$id_bibliotekarza." | Login: ".$login." | Haslo: ".$haslo."<br>\";".PHP_EOL);
				}
				$sql->close();
		}
		
			if($sql=$conn->prepare("select * from logowania_admin"))
		{
				$sql->execute();
				$sql->bind_result($id_wpisu,$id_bibliotekarza,$login,$haslo);
				$plik=fopen($plikTworzony,"a+");
				 fwrite($plik,"echo \"<br><br>Table: logowania_admin.<br>\";".PHP_EOL);
				while($sql->fetch())
				{
					fwrite($plik,"echo \"Id wpisu: ".$id_wpisu." | Id biblio: ".$id_bibliotekarza." | Login: ".$login." | Haslo: ".$haslo."<br>\";".PHP_EOL);
				}
				$sql->close();
		}
		
			if($sql=$conn->prepare("select * from wypozyczenia"))
		{
				$sql->execute();
				$sql->bind_result($id_wypozyczenia,$id_klienta,$nazwisko,$tytul_ksiazki);
				$plik=fopen($plikTworzony,"a+");
				 fwrite($plik,"echo \"<br><br>Table: wypozyczenia.<br>\";".PHP_EOL);
				while($sql->fetch())
				{
					fwrite($plik,"echo \"Id wypozyczenia: ".$id_wypozyczenia." | Id klienta: ".$id_klienta." | Nazwisko: ".$nazwisko." | Tytul ksiazki: ".$tytul_ksiazki."<br>\";".PHP_EOL);
				}
				$sql->close();
		}
		$plik=fopen($plikTworzony,"a+");
		//fwrite($plik,"}".);
	//	fwrite($plik,"}".);
		fwrite($plik,"}".PHP_EOL);
		fwrite($plik,"}".PHP_EOL);
		fwrite($plik,"else".PHP_EOL);
		fwrite($plik,"{".PHP_EOL);
		fwrite($plik,"header(\"Location: panel_b.php\");".PHP_EOL);
		fwrite($plik,"}".PHP_EOL);
		fwrite($plik,"?>");
			echo "<br><center><a href='db_export.php'>Zobacz plik</a><br><a href='panel_admin.php'>Pówrot</a></center>";
		}
		else
			{
					header("Location: panel_admin.php");
			}
?>