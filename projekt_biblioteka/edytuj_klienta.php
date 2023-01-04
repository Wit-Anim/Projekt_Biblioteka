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
				<h3><center>Edycja Klienta:</center></h3><br><br>
				<table class='table table-striped'>
					<thead>
						<tr>
							<th>ID</th>
							<th>Imie</th>
							<th>Nazwisko</th>
							<th>Adres</th>
							<th>Telefon</th>
							<th>Działania</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$id = $_POST["id"];
					if($sql=$conn->prepare("select * from klienci where id =?"))
					{
						$sql->bind_param("i", $id);
						$sql->execute();
						$sql->bind_result($id,$imie,$nazwisko,$adres,$telefon);
						while($sql->fetch())
						{
						   echo " <form action='zapisz_edycje_klienta.php' method='POST'<tr>
									<input type='hidden' name='idd' value='".$id."'>
									<td><input type='text' style='background-color:rgba(251,231,161,0.7)' name='id' value='".$id."' disabled></td>
									<td><input type='text' style='background-color:rgba(251,231,161,0.7)' name='imie' value='".$imie."'></td>
									<td><input type='text' style='background-color:rgba(251,231,161,0.7)' name='nazwisko' value='".$nazwisko."'></td>
									<td><input type='text' style='background-color:rgba(251,231,161,0.7)' name='adres' value='".$adres."'></td>
									<td><input type='text' style='background-color:rgba(251,231,161,0.7)' name='telefon' value='".$telefon."'></td>
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
		<form action="szukaj_klienta.php" method="POST">
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