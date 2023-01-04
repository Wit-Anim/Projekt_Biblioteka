<?php
include "php/init.php";
if(!isset($_SESSION["probyLoginBibl"]))
{
	$_SESSION["probyLoginBibl"]=0;
}
?>
<html lang="pl-PL">
<head>
	<meta charset="UTF-8">
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="stylesheet" href="https://www.markuptag.com/bootstrap/5/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<title>Logowanie Do Biblioteki</title>
	<link rel="stylesheet" href="css/wyglad_login.css">
</head>
	<body>
		<?php
			if($_SESSION["probyLoginBibl"]<3)
			{
				echo "
				<div class='tresc'>
					<div class='zaloguj'>
						<font size=12>Zaloguj się:</font>
					</div>
					<form action='logowanie.php' method='POST'>
						<br>
						<div class='form'>
						<input type='text' name='login' placeholder='Login'>
						</div>
						<br>
						<div class='form'>
						<input type='password' name='password' placeholder='Hasło'>
						</div>
						<br>
						<div class='form'>
						<input type='submit' value='Zaloguj się' class='button'>
						</div>
					</form>
					<form action='index.php' method='POST'>
						<center><input type='submit' class='button' value='Powrót'></center>
					</form>
				</div>";
			}
			else
			{
				$_SESSION["randNum"]=rand(1,3);
				$captchaImg="img/captcha_";
				if($_SESSION["randNum"]==1)
				{
					$captchaImg.="1";
				}
				else if($_SESSION["randNum"]==2)
				{
					$captchaImg.="2";
				}
				else if($_SESSION["randNum"]==3)
				{
					$captchaImg.="3";
				}
				$captchaImg.=".png";
				echo "
				<br><br><br><br><br><br>
				<div class='container' id='tresc'>
					<div class='row'>
						<div class='col-3'>
						</div>
						<div class='col-6' style='background-color:rgba(200,173,127,0.8)'>
							<div class='row' id='centrum'>
								<font size=12 style='color:#5C3317'>Zaloguj się:</font>	

								<form action='logowanie.php' method='post'>
								<br>
									<div class='form-group'>
										<input type='text' name='login' style='background-color:rgba(251,231,161,0.7)' placeholder='Login'>
									</div>
									<div class='form-group'>
										<input type='password' name='password' style='background-color:rgba(251,231,161,0.7)' placeholder='Hasło'>
									</div>
									<br>
									
									<div class='row'>
										<div class='col-sm-5'>
										<img src='".$captchaImg."' id='captcha_image'/><br/> <a id='captcha_reload' href='logowanieBibl.php'>reload</a>
										</div>
										<div class='col-sm-5' style='margin-left:30px'>
										<input type='text' required id='captcha' name='captcha' style='background-color:rgba(251,231,161,0.7)' placeholder='Wpisz znaki'>
										</div>
									</div>
									
									<br>
									<input type='submit' value='Zaloguj się' class='button'>
								</form>
								<form action='index.php' method='POST'>
									<center><input type='submit' class='button' value='Powrót'></center>
								</form>
							</div>
						</div>
						<div class='col-3'>
						</div>
					</div>
				</div>";
			}
		?>
	</body>
</html>