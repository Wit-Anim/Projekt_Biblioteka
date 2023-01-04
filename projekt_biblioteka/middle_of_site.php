<?php
	include_once 'php/init.php';
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

<div class="container-fluid" id="tresc">
	<div class="row">
		<br><br><br><br><br>		
	</div>
	
	<div class="row" style="background-color:rgba(200,173,127,0.7)">
		
		<div class="col-lg">
			<div class="row" id="centrum">
				<div class="col-lg-1">
				</div>
				<div class="col-lg-10">
					<div class="row" id="centrum">
						<?php
						$iloscKafelkow=0;
							if($sql=$conn->prepare("SELECT * FROM ksiazki"))
							{ 
								$sql->execute();
								$sql->bind_result($id, $tytul, $autor, $ilosc, $ilosc_wypozyczonych, $zdiecie);
								while($sql->fetch())
								{
									if($iloscKafelkow==0)
									{
										echo "<div class='row' id='content'>";
									}
									echo "<div class='container-fluid col-lg-2'>
										<div class='card' style='width:180px'>
											<img class='card-img-top' src='jakiesgupoty.jpg' alt='brak grafiki' onerror='this.onerror=null;brakGrafiki(this);'>
											<div class='card-body bg-dark text-light'>
												<p class='card-title'>".$tytul."</p>";
													echo "<p class='card-text'>Autor: ".$autor."</p>
														  <p class='card-text'>Dostępnych: <br>".$ilosc."";
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
				<div class="col-lg-1">
				</div>
			</div>
		</div>
	<!--<div class="row">
	
		<div class="col-lg-2">
		</div>
		
		<div class="col-lg-8" style="background-color:rgba(200,173,127,0.7)">
			<div class="row" id="centrum">
				<div class="col-lg-1">
				</div>
				<div class="col-lg-10">
					<div class="row" id="centrum">
						<?php
						/*$iloscKafelkow=0;
							if($sql=$conn->prepare("SELECT * FROM ksiazki"))
							{ 
								$sql->execute();
								$sql->bind_result($id, $tytul, $autor, $ilosc, $ilosc_wypozyczonych, $zdiecie);
								while($sql->fetch())
								{
									if($iloscKafelkow==0)
									{
										echo "<div class='row' id='content'>";
									}
									echo "<div class='container-fluid col-lg-2'>
										<div class='card' style='width:180px'>
											<img class='card-img-top' src='jakiesgupoty.jpg' alt='brak grafiki' onerror='this.onerror=null;brakGrafiki(this);'>
											<div class='card-body bg-dark text-light'>
												<p class='card-title'>".$tytul."</p>";
													echo "<p class='card-text'>Autor: ".$autor."</p>
														  <p class='card-text'>Dostępnych: <br>".$ilosc."";
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
							}*/
						?>
					</div>
				</div>
				<div class="col-lg-1">
				</div>
			</div>
		</div>
		
		<div class="col-lg-2">
		</div>
	</div>-->
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