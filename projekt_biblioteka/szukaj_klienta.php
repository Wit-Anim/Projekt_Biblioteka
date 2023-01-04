<?php
include "php/init.php";
if(!isset($_SESSION["userName"]))
{
	header("Location: panel_b.php");
}
$_SESSION["oknoRobocze"]="klienci";
include "header.php";

if(isset($_POST["szukaj"]))
{
	$uery = $_POST["szukaj"];
	$query = "%".$uery."%";
}
else
{
	$query="%%";
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/szukaj_klienta.css">
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
				<?php
					if($query!="%%")
					{
						echo "<h3><center>Szukane: ".trim($query,"%")."</center></h3><br><br>";
					}
				?>
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
						$iloscKafelkow=0;
						if($sql=$conn->prepare("select * from klienci where imie like ? or nazwisko like ?"))
						{
							$sql->bind_param("ss", $query, $query);
							$sql->execute();
							$sql->bind_result($id,$imie,$nazwisko,$adres,$telefon);
							while($sql->fetch())
							{
							   echo " <tr>
										<td class='w-10'>".$id."</td>
										<td class='w-20'>".$imie."</td>
										<td class='w-20'>".$nazwisko."</td>
										<td class='w-20'>".$adres."</td>
										<td class='w-20'>".$telefon."</td>
										<td><form action='edytuj_klienta.php' method='POST'><input type='hidden' name='id' value='".$id."'><input type='submit' style='background-color:#FDD017' value='Edytuj'></form></td>";
										if(isset($_SESSION["adminName"]))
											{
												if($_SESSION["adminName"]!="")
												{
													echo"<td><form action='usun_klienta.php' method='POST'><input type='hidden' name='id' value='".$id."'><input type='submit' style='background-color:#FDD017' value='Usuń'></form></td>";
												}
											}
								echo "</tr>";
							}
							$sql->close();
						}
					?>
					</tbody>
				</table>
			</div>
		</div>
		<div class="col-1">
		</div>
	</div>
	<br><br>
	<div class="row">
		<div class="col-4">
		</div>
		<div class="col-2" style='margin-left:10px'>
			<form action="dodaj_klienta.php" method="POST">
				<center><input type="submit" class="button" value="Dodaj Klienta"></center>
			</form>
		</div>	
		<div class="col-2" style='margin-left:10px'>
			<?php
			if(isset($_SESSION["adminName"]))
				{
					if($_SESSION["adminName"]!="")
					{
						echo "<form action='panel_admin.php' method='POST'>
			        	<center><input type='submit' class='button' value='Powrót'></center>
			            </form>";
					}
					
				}
				else
				{
					echo "<form action='panel_b.php' method='POST'>
			        	<center><input type='submit' class='button' value='Powrót'></center>
			            </form>";
				}
				?>
		</div>
		<div class="col-4">
		</div>
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