<?php
include 'php/init.php';
if(isset($_SESSION["adminName"]))
{
	if($_SESSION["adminName"]!="")
	{
echo "<br>Table: bibliotekarze.<br>";
echo "Id bibliotekarza: 1 | Czy Admin: 1 |  Imie: Klaudia | Nazwisko: Gwania | Adres: Pierniczkowa 2/3 Kraków | Telefon: 654258945<br>";
echo "<br><br>Table: klienci.<br>";
echo "Id klienta: 1 | Imie: Klaudia | Nazwisko: Wania | Adres: Pierniczkowa 3/69 Kraków | Telefon: 696969697<br>";
echo "Id klienta: 2 | Imie: Ronald | Nazwisko: Brzenczyszczykiewicz | Adres: Maślana 2/4 Poznań | Telefon: 123123123<br>";
echo "Id klienta: 3 | Imie: Andrzej | Nazwisko: Kowalski | Adres: Kowalska 12 Kowal | Telefon: 123321555<br>";
echo "<br><br>Table: ksiazki.<br>";
echo "Id ksiazki: 1 | Tytul: Hobbit | Autor: Tolkien | Ilosc: 20 | Ilosc Wypozyczonych: 2 | Zdjecie: hobbit.jpg<br>";
echo "Id ksiazki: 2 | Tytul: Harry Potter i komnata tajemnic | Autor: J.K Rowling | Ilosc: 10 | Ilosc Wypozyczonych: 0 | Zdjecie: harry_potter_komnata.jpg<br>";
echo "Id ksiazki: 3 | Tytul: Inny świat | Autor: G. Herling-Grudziński | Ilosc: 8 | Ilosc Wypozyczonych: 0 | Zdjecie: innySwiat.jpg<br>";
echo "Id ksiazki: 5 | Tytul: Hari Pota | Autor: Rollin | Ilosc: 12 | Ilosc Wypozyczonych: 1 | Zdjecie: hari_pota.png<br>";
echo "<br><br>Table: logowania.<br>";
echo "Id wpisu: 1 | Id biblio: 1 | Login: Klaudia2323 | Haslo: 5e40d09fa0529781afd1254a42913847<br>";
echo "<br><br>Table: logowania_admin.<br>";
echo "Id wpisu: 1 | Id biblio: 1 | Login: Klaudmin | Haslo: 88273e2504605249cc1edd4af46fdb40<br>";
echo "<br><br>Table: wypozyczenia.<br>";
echo "Id wypozyczenia: 5 | Id klienta: 1 | Nazwisko: Wania-Egorova | Tytul ksiazki: Hari Pota<br>";
}
}
else
{
header("Location: panel_b.php");
}
?>