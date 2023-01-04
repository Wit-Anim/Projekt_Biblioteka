<?php
include "php/init.php";
if(!isset($_SESSION["userName"]))
{
	header("Location: panel_b.php");
}
$_SESSION["oknoRobocze"]="ksiazki";
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
				<?php
					if($query!="%%")
						{
						echo "<h3><center>Szukane: ".trim($query,"%")."</center></h3><br><br>";
					}
				?>
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
					if($sql=$conn->prepare("select * from ksiazki where tytul like ? or autor like ?"))
					{
						$sql->bind_param("ss", $query, $query);
						$sql->execute();
						$sql->bind_result($id,$tytul,$autor,$ilosc,$ilosc_wypozyczonych,$zdjecie);
						while($sql->fetch())
						{
						   echo " <tr>
									<td>".$tytul."</td>
									<td>".$autor."</td>
									<td>".$ilosc."</td>
									<td>".$ilosc_wypozyczonych."</td>
									<td>".$zdjecie."</td>
									<td><form action='edytuj_ksiazke.php' method='POST'><input type='hidden' name='id' value='".$id."'><input type='submit' style='background-color:#FDD017' value='Edytuj'></form></td>";
									if(isset($_SESSION["adminName"]))
									{
										if($_SESSION["adminName"]!="")
										{
											echo"<td><form action='usun_ksiazke.php' method='POST'><input type='hidden' name='id' value='".$id."'><input type='submit' style='background-color:#FDD017' value='Usuń'></form></td>";
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
			<form action="dodaj_ksiazke.php" method="POST">
				<center><input type="submit" class="button" value="Dodaj Ksiazke"></center>
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