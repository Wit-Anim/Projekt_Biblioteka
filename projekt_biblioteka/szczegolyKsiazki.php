<?php
include "php/init.php";
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
		#opisSzczegolowy{
			margin-top:10px;
		}
	</style>
</head>
<body>

<?php include "header.php"; ?>

<div class="container-fluid" id="tresc">
	<div class="row">
	
		<div class="col-lg-2 bg-light">
		</div>
		
		<div class="col-lg-10">
			<div class="row bg-light" id="centrum">
				<!--<h3><center>Tutaj będzie się znajdować główna zawartość strony</center></h3>-->
				<div class="col-lg-1">
				</div>
				<div class="col-lg-10">
					<div class="row bg-light" id="centrum">
						<h3><center>Szczegóły książki:</center></h3><br><br>
						<?php
						if(isset($_GET["id"]))
						{
							$idKsiaz=$_GET["id"];
							if($sql=$conn->prepare("select * from ksiazki where id=?"))
							{
								$sql->bind_param("i", $idKsiaz);
								$sql->execute();
								$sql->bind_result($id, $tytul, $autor, $ilosc, $ilosc_wypozyczonych, $zdjecie);
								while($sql->fetch())
								{
									//echo "$id, $nazwa, $cena, $ilosc, $producent";
								}
								echo "<div class='row'>
										<div class='col-lg-5 mx-auto'>
											<center>
												<img class='card-img-top' src='".$zdjecie."' alt='brak grafiki' style='width:280px; height:280px;' onerror='this.onerror=null;brakGrafiki(this);'><br>
											</center>
										</div>
										
										<div class='col-lg-7'>
											<div class='row'>
												<div class='col-lg-8'>
													<font size=''5px'>
														<br>
														<h5>Tytul:</h5> ".$tytul."
														<br>
														<h5>Autor:</h5> ".$autor."
														<br>
														<h5>Dostępna ilość:</h5> ".($ilosc-$ilosc_wypozyczonych)."
														<br>
													</font>
												</div>
												<div class='col-lg-4'>
													<div class='btn-group'>
													<form class='form' method='POST' action='#'>
														<br>
														<!--<input type='number' class='form-control' name='koszykIlosc' placeholder='Ilość'><br>
														<center><button class='btn btn-info' type='submit'>Dodaj do koszyka</button></center>-->
														<a href='index.php'>Powrót do storny głównej</a>
													</form>
												</div>
												</div>
											</div>
										</div>
									</div>
									<div class='row' id='opisSzczegolowy'>
										<div class='col-lg-1'>
										</div>
										<div class='col-lg-10'>
											brak opisu<br>
										</div>
										<div class='col-lg-1'>
										</div>
									</div>";
								
								// stary model szczegolow
								/*echo "<div class='row'>
										<div class='col-lg-1'>
										</div>
										<div class='col-lg-4 mx-auto'>
											<center>
												<img class='card-img-top' src='".$zdjecie."' alt='brak grafiki' style='width:280px; height:280px;' onerror='this.onerror=null;brakGrafiki(this);'><br>
											</center>
										</div>
										
										<div class='col-lg-6'>
											<div class='row'>
												<center>
													<font size='5px' color='blue'>
														".$tytul."<br><br>
													</font>
												</center>
											</div>
											<div class='row'>
												<div class='col-lg-8'>
													<font size=''5px'>
														<h5>Cena:</h5> brak
														<br>
														<h5>Autor:</h5> ".$autor."
														<br>
														<h5>Dostępna ilość:</h5> ".($ilosc-$ilosc_wypozyczonych)."
														<br>
													</font>
												</div>
												<div class='col-lg-4'>
													<div class='btn-group'>
													<form class='form' method='POST' action='#'>
														<br>
														<!--<input type='number' class='form-control' name='koszykIlosc' placeholder='Ilość'><br>
														<center><button class='btn btn-info' type='submit'>Dodaj do koszyka</button></center>-->
													</form>
												</div>
												</div>
											</div>
										</div>
										<div class='col-lg-1'>
										</div>
									</div>
									<div class='row' id='opisSzczegolowy'>
										<div class='col-lg-1'>
										</div>
										<div class='col-lg-10'>
											brak opisu<br>
										</div>
										<div class='col-lg-1'>
										</div>
									</div>";*/
								$sql->close();
							}
							$conn->close();
						}
						
						// obsluga dodawania produktu do koszyka
						/*if(isset($_POST["koszykIlosc"]))
						{
							$koszykIlosc=$_POST["koszykIlosc"];
							//echo $koszykIlosc;
							// jesli $koszykIlosc nie jest puste
							if($koszykIlosc>0)
							{
							
								// jesli nie ma tablicy koszyk to ja tworzymy
								if(!isset($_SESSION["koszyk"]))
								{
									$_SESSION["koszyk"]=array();
								}
								
								// przeszukujemy koszyk w poszukiwaniu dodawanego produktu
								for($i=0;;$i++)
								{
									if(isset($_SESSION["koszyk"][$i][0]))// sprawdzenie czy element szukany istnieje
									{
										if($id==$_SESSION["koszyk"][$i][0])// jesli jest juz produkt o podanym id w koszyku
										{
											$_SESSION["koszyk"][$i][3]+=$koszykIlosc;
											break;
										}
									}
									else // tworzymy nowy wpis w koszyku i przerywamy szukanie
									{
										$_SESSION["koszyk"][]=array($id,$nazwa,$cena,$koszykIlosc);
										break;
									}
									if($i>=1000)// bezpiecznik przed wieczna petla
									{
										break;
									}
								}
								
								// wypisanie wszystkich zmiennych sesyjnych
								//print_r($_SESSION);
								
								// usuniecie koszyka ze zmiennych sesyjnych
								//unset($_SESSION["koszyk"]);
							}
						}*/
						?>
					</div>
				</div>
				<div class="col-lg-1">
				</div>
				
			</div>
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