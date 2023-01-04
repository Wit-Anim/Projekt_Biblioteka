<?php 
	include "php/init.php"; 
	if(isset($_SESSION["userName"]))
	{
		$_SESSION["oknoRobocze"]="panel_b";
	}
	if(isset($_SESSION["adminName"]))
	{
		unset($_SESSION["adminName"]);
	}
	include "header.php";
?>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<title>Panel bibliotekarza</title>
	<link rel="stylesheet" href="css/wyglad_panel_b.css">
</head>
	<body>
	<div class="container-fluid" id="tresc">
	<?php
		if(isset($_SESSION["userName"]))
		{
			echo "<br><br><br><br><br><br><br><br>
			<div class='row'>
				<div class='col-1'>
				</div>
				<div class='col-3' style='margin-left:55px'>
					<form action='szukaj_ksiazke.php' method='POST'>
						<center><input type='submit' class='button' value='Dodaj lub przejrzyj zbiór książek'></center>
					</form>
				</div>	
				<div class='col-3' style='margin-left:10px'>
					<form action='szukaj_klienta.php' method='POST'>
						<center><input type='submit' class='button' value='Dodaj lub zarządzaj klientem'></center>
					</form>
				</div>
				<div class='col-3' style='margin-left:10px'>
					<form action='szukaj_wypozyczenia.php' method='POST'>
						<center><input type='submit' class='button' value='Dodaj lub usuń wypożyczenie'></center>
					</form>
				</div>
			</div>
			<br><br><br><br><br><br>
			<div class='row'>
				<div class='col-12'>
					<form action='logowanieAdmin.php' method='POST'>
						<center><input type='submit' class='button' value='Logowanie administratora'></center>
					</form>
				</div>
			</div>
			<br><br><br><br><br><br>
			<div class='row'>
				<div class='col-12'>
					<form action='index.php' method='POST'>
						<center><input type='submit' class='button' value='Wyoguj się'></center>
					</form>
				</div>
			</div>";
		}
		else
		{
			echo "<div class='tresc'>
					<center>
					<font size=6 color='black'>
						Wystąpił problem z uwierzytelnieniem bibliotekarza. Prosimy zalogować się ponownie.
					</font>
					<form action='logowanieBibl.php'>
						<div class='form'>
							<input type='submit' value='Spróbuj ponownie' class='button'>
						</div>
					</form>
					</center>
				</div>";
		}
		?>
	</div>
</body>
<script src="js/jQuery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>