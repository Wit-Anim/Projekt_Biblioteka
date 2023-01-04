<?php
include "php/init.php";
if(!isset($_SESSION["userName"]))
{
	header("Location: panel_b.php");
}
include_once "header.php";

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/dodaj_klienta.css">
	<style>
		#content{
			margin-top:10px;
		}
	</style>
</head>
<body>
<br><br><br>
<div class="container-fluid" id="tresc">
	<div class="row" id="centrum">
		<div class="col-1">
		</div>
		<div class="col-10" id="centrum" style="background-color:rgba(200,173,127,0.8)">
			<div class="row">
				<h3><center>Edycja Wypożyczenia:</center></h3><br><br>
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
					<?php
					$id = $_POST["id"];
					if($sql=$conn->prepare("select * from wypozyczenia where id_wypozyczenia =?"))
					{
						$sql->bind_param("i", $id);
						$sql->execute();
							$sql->bind_result($id_wypozyczenia,$id_klienta,$nazwisko,$tytul_ksiazki);
						while($sql->fetch())
						{
						   echo " <form action='zapisz_edycje_wypozyczenia.php' method='POST'<tr>
									<input type='hidden' name='id_wypozyczenia' value='".$id_wypozyczenia."'>
									<td><input type='text' style='background-color:rgba(251,231,161,0.7)' name='id_klienta' value='".$id_klienta."'></td>
									<td><input type='text' style='background-color:rgba(251,231,161,0.7)' name='nazwisko' value='".$nazwisko."'></td>
									<td><input type='text' style='background-color:rgba(251,231,161,0.7)' name='tytul' value='".$tytul_ksiazki."'></td>
									<td><input type='submit' style='background-color:#FDD017' value='Zapisz'></form></td>
								</tr>";
						}
						$sql->close();
					}
					?>
					</tbody>
				</table>
			</div>
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
	item.src='img/brakGrafiki.png';
}
</script>
</html>