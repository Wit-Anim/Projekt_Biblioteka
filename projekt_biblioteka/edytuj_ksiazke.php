<?php
include "php/init.php";
if(!isset($_SESSION["userName"]))
{
	header("Location: panel_b.php");
}
include "header.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/szukaj_ksiazke.css">
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
		<div class="col-10" style="background-color:rgba(200,173,127,0.8)">
			<div class="row" id="centrum">
				<h3><center>Edycja Klienta:</center></h3><br><br>
				<table class='table table-striped'>
					<thead>
						<tr>
							<th>Tytuł</th>
							<th>Autor</th>
							<th>Ilość</th>
							<th>Ilość Wypożyczonych</th>
							<th>Zdjecie</th>
							<th>Działania</th>
						</tr>
					</thead>
					<tbody>
					<?php
					$id = $_POST["id"];
					if($sql=$conn->prepare("select * from ksiazki where id =?"))
					{
						$sql->bind_param("i", $id);
						$sql->execute();
						$sql->bind_result($id,$tytul,$autor,$ilosc,$ilosc_wypozyczonych,$zdjecie);
						while($sql->fetch())
						{
						   echo " <form action='zapisz_edycje_ksiazki.php' method='POST'<tr>
										<input type='hidden' name='idd' value='".$id."'>
										<td><input type='text' name='tytul' style='background-color:rgba(251,231,161,0.7)' value='".$tytul."'></td>
										<td><input type='text' name='autor' style='background-color:rgba(251,231,161,0.7)' value='".$autor."'></td>
										<td><input type='text' name='ilosc' style='background-color:rgba(251,231,161,0.7)' value='".$ilosc."'></td>
										<td><input type='text' name='ilosc_wypozyczonych' style='background-color:rgba(251,231,161,0.7)' value='".$ilosc_wypozyczonych."'></td>
										<td><input type='text' name='zdjecie' style='background-color:rgba(251,231,161,0.7)' value='".$zdjecie."'></td>
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
		<form action="szukaj_ksiazke.php" method="POST">
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