<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<link href="css/style1.css" rel="stylesheet">
	<style>
		#content{
			margin-top:10px;
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-warning">
		<?php
		if(isset($_SESSION["userName"]) && isset($_SESSION["oknoRobocze"]))
		{
			if(isset($_SESSION["adminName"]))
			{
				echo "
				<ul class='navbar-nav me-auto mx-auto'>
					<li class='nav-item dropdown'>
						<a class='nav-link dropdown-toggle text-dark font-weight-bold' id='navbardrop' data-toggle='dropdown'>".$_SESSION["adminName"]."</a>
						<div class='dropdown-menu'>
							<a class='dropdown-item' href='panel_b.php'>Wyloguj się</a>
						</div>
					</li>
				</ul>";
			}
			else
			{
				echo "
				<ul class='navbar-nav me-auto mx-auto'>
					<li class='nav-item dropdown'>
						<a class='nav-link dropdown-toggle text-dark font-weight-bold' id='navbardrop' data-toggle='dropdown'>".$_SESSION["userName"]."</a>
						<div class='dropdown-menu'>
							<a class='dropdown-item' href='index.php'>Wyloguj się</a>
						</div>
					</li>
				</ul>";
			}
			if($_SESSION["oknoRobocze"]=="klienci")
			{
				echo "<form class='d-flex' action='szukaj_klienta.php' method='POST'>
						<input class='form-control me-2' name='szukaj' type='search' placeholder='Wyszukaj klienta...' aria-label='Search'>
						<button class='btn btn-success' type='submit'>Szukaj</button>
					</form>
				";
			}
			else if($_SESSION["oknoRobocze"]=="ksiazki")
			{
				echo "<form class='d-flex' action='szukaj_ksiazke.php' method='POST'>
						<input class='form-control me-2' name='szukaj' type='search' placeholder='Wyszukaj książkę...' aria-label='Search'>
						<button class='btn btn-success' type='submit'>Szukaj</button>
					</form>
				";
			}
			else if($_SESSION["oknoRobocze"]=="wypozyczenia")
			{
				echo "<form class='d-flex' action='szukaj_wypozyczenie.php' method='POST'>
						<input class='form-control me-2' name='szukaj' type='search' placeholder='Szukaj wypożyczenia..' aria-label='Search'>
						<button class='btn btn-success' type='submit'>Szukaj</button>
					</form>
				";
			}
		}
		else
		{
			echo "
				<ul class='navbar-nav me-auto mx-auto'>
				<li class='nav-item dropdown'>
					<a class='nav-link dropdown-toggle text-dark font-weight-bold' href='#' id='navbardrop' data-toggle='dropdown'> 
						Kategorie
					</a>
					<div class='dropdown-menu'>
						<a class='dropdown-item' href='#'>Page 1-1</a>
						<a class='dropdown-item' href='#'>Page 1-2</a>
						<a class='dropdown-item' href='#'>Page 1-3</a>
					</div>
				</li>
				
				<li class='nav-item dropdown'>
					<a class='nav-link dropdown-toggle text-dark font-weight-bold' href='#' id='navbardrop' data-toggle='dropdown'>
						Autorzy
					</a>
					<div class='dropdown-menu'>
						<a class='dropdown-item' href='filtrowane_wyniki.php?kat=Page_2_1'>Page 2-1</a>
						<a class='dropdown-item' href='#'>Page 2-2</a>
						<a class='dropdown-item' href='#'>Page 2-3</a>
					</div>
				</li>
				
				<li class='nav-item'>
					<a class='nav-link text-dark font-weight-bold' href='#'> Książki wyróżnione</a>
				</li>
				<li class='nav-item'>
					<a class='nav-link text-dark font-weight-bold' href='logowanieBibl.php'> Logowanie</a>
				</li>
			</ul>
			<form class='d-flex' action='szukaj.php' method='POST'>
				<input class='form-control me-2' name='szukaj' type='search' placeholder='Wyszukaj książkę...' aria-label='Search'>
				<button class='btn btn-success' type='submit'>Szukaj</button>
			</form>
				";
		}
		?>
		<!--<ul class="navbar-nav me-auto mx-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-dark font-weight-bold" href="#" id="navbardrop" data-toggle="dropdown"> 
					Kategorie
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="#">Page 1-1</a>
					<a class="dropdown-item" href="#">Page 1-2</a>
					<a class="dropdown-item" href="#">Page 1-3</a>
				</div>
			</li>
			
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle text-dark font-weight-bold" href="#" id="navbardrop" data-toggle="dropdown">
					Autorzy
				</a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="filtrowane_wyniki.php?kat=Page_2_1">Page 2-1</a>
					<a class="dropdown-item" href="#">Page 2-2</a>
					<a class="dropdown-item" href="#">Page 2-3</a>
				</div>
			</li>
			
			<li class="nav-item">
				<a class="nav-link text-dark font-weight-bold" href="#"> Książki wyróżnione</a>
			</li>-->
				<?php
					/*if(isset($_SESSION["userName"]))
					{
						echo "<li class='nav-item dropdown'>
								<a class='nav-link dropdown-toggle text-dark font-weight-bold' id='navbardrop' data-toggle='dropdown'>".$_SESSION["userName"]."</a>
								<div class='dropdown-menu'>
									<a class='dropdown-item' href='index.php'>Wyloguj się</a>
								</div>";
					}
					else
					{
						echo "<li class='nav-item'>
								<a class='nav-link text-dark font-weight-bold' href='logowanieBibl.php'> Logowanie</a>";
					}*/
				?>
			<!--</li>
		</ul>-->
		<?php
			/*if(isset($_SESSION["userName"]) && isset($_SESSION["oknoRobocze"]))
			{
				if($_SESSION["oknoRobocze"]=="klienci")
				{
					echo "<form class='d-flex' action='szukaj_klienta.php' method='POST'>
							<input class='form-control me-2' name='szukaj' type='search' placeholder='Wyszukaj klienta...' aria-label='Search'>
							<button class='btn btn-success' type='submit'>Szukaj</button>
						</form>
					";
				}
				else if($_SESSION["oknoRobocze"]=="ksiazki")
				{
					echo "<form class='d-flex' action='szukaj_ksiazke.php' method='POST'>
							<input class='form-control me-2' name='szukaj' type='search' placeholder='Wyszukaj książkę...' aria-label='Search'>
							<button class='btn btn-success' type='submit'>Szukaj</button>
						</form>
					";
				}
			}
			else
			{
				echo "<form class='d-flex' action='szukaj.php' method='POST'>
							<input class='form-control me-2' name='szukaj' type='search' placeholder='Wyszukaj książkę...' aria-label='Search'>
							<button class='btn btn-success' type='submit'>Szukaj</button>
						</form>
					";
			}*/
		?>
	</nav>
</body>
<script src="js/jQuery.js"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>-->
</html>