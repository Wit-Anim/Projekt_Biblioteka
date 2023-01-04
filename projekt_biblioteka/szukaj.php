<?php
include "php/init.php";
$uery = $_POST["szukaj"];
$query = "%".$uery."%";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<style>
		#content{
			margin-top:10px;
		}
	</style>
</head>
<body>
<div class="row-lg-12">
		<?php include_once "header.php"; ?>
	</div>
<div class="container-fluid" id="tresc">
	<div class="row bg-light" id="centrum">
		<h3><center>Wyniki Wyszukiwania:</center></h3><br><br>
		<?php
		$iloscKafelkow=0;
		if($sql=$conn->prepare("select * from ksiazki where tytul like ?"))
		{
			$sql->bind_param("s", $query);
			$sql->execute();
			$sql->bind_result($id,$tytul,$autor,$ilosc,$ilosc_wypozyczonych,$zdjecie);
			while($sql->fetch())
			{
				if($iloscKafelkow==0)
				{
					echo "<div class='row' id='content'>";
				}
					echo "<div class='container-fluid col-lg-2'>
							<div class='card mx-auto' style='width:180px'>
								<img class='card-img-top' src='img/".$zdjecie."' alt='brak grafiki' onerror='this.onerror=null;brakGrafiki(this);'>
								<div class='card-body bg-dark text-light'>
									<p class='card-title'>".$tytul."</p>";
								echo "<p class='card-text'>Autor: ".$autor."</p>
									<p class='card-text'>Ilosc na stanie: <br>".$ilosc."";
								echo "
									</p>
									<a href='szczegolyKsiazki.php?id=$id' class='stretched-link'></a>
								</div>
							</div>
						</div>";
					$iloscKafelkow++;
				if($iloscKafelkow>=5)
				{
					echo "</div>";
					$iloscKafelkow=0;
				}
			}
			$sql->close();
		}
		?>
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