<?php
include "php/init.php";
if(!isset($_SESSION["userName"]))
{
	header("Location: panel_b.php");
}
$_SESSION["oknoRobocze"]="ksiazki";
include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/dodaj_ksiazke.css">
	<style>
		#content{
			margin-top:10px;
		}
	</style>
</head>
<body>
<br><br><br>
<div class="container-fluid" id="tresc">
	<div class="row">
		<div class="col-1">
		</div>
		<div class="col-10" id="centrum" style="background-color:rgba(200,173,127,0.8)"><br>
			<h3><center>Dodaj Wypożyczenie:</center></h3><br>
			<table class='table table-striped'>
				<thead>
					<tr>
							<th>Id klienta</th>
							<th>Nazwisko</th>
							<th>Tytuł książki</th>
							<th>Działania</th>
					</tr>
				</thead>
				<tbody>
					<form action="dodaj_wypozyczenie_baza.php" method="POST">
					<tr>
						<td><input type="text" style="background-color:rgba(251,231,161,0.7)" name="id_klienta"></td>
						<td><input type="text" style="background-color:rgba(251,231,161,0.7)" name="nazwisko"></td>
						<td><input type="text" style="background-color:rgba(251,231,161,0.7)" name="tytul"></td>
						<td><input type="submit" style='background-color:#FDD017' value="Dodaj"></td>
					</tr>
					</form>
				</tbody>
			</table>
		</div>
	</div>
	<br><br>
	<div class="row">
		<form action="szukaj_wypozyczenia.php" method="POST">
			<center><input type="submit" class="button" value="Powrót"></center>
		</form>
	</div>
</div>

</body>
<script src="js/jQuery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
function brakGrafiki(item)
{
	item.src="img/brakGrafiki.png";
}
</script>
</html>