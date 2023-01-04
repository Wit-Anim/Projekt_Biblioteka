<?php
	include 'php/init.php';
?>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<title>Panel bibliotekarza</title>
	<link rel="stylesheet" href="css/wyglad_panel_a.css">
</head>
	<body>
	<div class="container-fluid" id="tresc">
<?php
	if(isset($_SESSION["userName"]) && isset($_SESSION["adminName"]))
	{
		echo "<br><br><br><br><br>
			<div class='row'>
				<div class='col-2'>
				</div>
				<div class='col-8'>
					<form action='szukaj_klienta.php' method='POST'>
						<center><input type='submit' class='button custom' value='Zarządzaj klientami'></center>
					</form>
				</div>
				<div class='col-2'>
				</div>
			</div>
			<br>
			<div class='row'>
				<div class='col-2'>
				</div>
				<div class='col-8'>
					<form action='szukaj_ksiazke.php' method='POST'>
						<center><input type='submit' class='button custom' value='Zarządzaj ksiażkami'></center>
					</form>
				</div>
				<div class='col-2'>
				</div>
			</div>
			<br>
			<div class='row'>
				<div class='col-2'>
				</div>
				<div class='col-8'>
					<form action='szukaj_wypozyczenia.php' method='POST'>
						<center><input type='submit' class='button custom' value='Zarządzaj wypożyczeniami'></center>
					</form>
				</div>
				<div class='col-2'>
				</div>
			</div>
			<br>
			<div class='row'>
				<div class='col-2'>
				</div>
				<div class='col-8'>
					<form action='eksport_bazy.php' method='POST'>
						<center><input type='submit' class='button custom' value='Eksportuj bazę danych'></center>
					</form>
				</div>
				<div class='col-2'>
				</div>
			</div>
			<br><br><br><br><br><br>
			<div class='row'>
				<div class='col-2'>
				</div>
				<div class='col-8'>
					<form action='panel_b.php' method='POST'>
						<center><input type='submit' class='button custom' value='Wyoguj się'></center>
					</form>
				</div>
				<div class='col-2'>
				</div>
			</div>";
	}
	else
	{
		header("Location: panel_b.php");
	}
?>
	</div>
</body>
<script src="js/jQuery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</html>