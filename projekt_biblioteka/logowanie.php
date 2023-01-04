<?php
include "php/init.php";

$login = $_POST["login"];
$haslo = $_POST["password"];
$haslo2 = md5($haslo);
if(isset($_POST["captcha"]))
{
	$captchaIn=$_POST["captcha"];
	if($_SESSION["randNum"]==1)
		{
			$szukanyCiag="2a63e";
		}
		else if($_SESSION["randNum"]==2)
		{
			$szukanyCiag="9tr8u";
		}
		else if($_SESSION["randNum"]==3)
		{
			$szukanyCiag="i1d5cd";
		}
	if($captchaIn!=$szukanyCiag)
	{
		echo "<html lang='pl-PL'>
						<head>
							<meta charset='UTF-8'>
							<title>Logowanie Do Biblioteki</title>
							<link rel='stylesheet' href='css/wyglad_login.css'>
						</head>
							<body>
								<div class='tresc'>
									<div class='zaloguj'>
										<font size=12>Błędne dane logowania.</font>
									</div>
									<form action='logowanieBibl.php'>
										<div class='form'>
											<input type='submit' value='Spróbuj ponownie' class='button'>
										</div>
									</form>
								</div>
							</body>
						</html>";
				$_SESSION["probyLoginBibl"]+=1;
	}
	else
	{
		if($sql=$conn->prepare("select * from logowania where login =? AND haslo=? "))
		{
			$sql->bind_param("ss",$login,$haslo2);
			$sql->execute();
			$sql->bind_result($id_wpisu,$id_bibl,$login,$haslo);
			if($sql->fetch()==1)
			{
				$_SESSION["userName"] = $login;
				header("Location: panel_b.php");
			}
			elseif($sql->fetch()==0)
			{
				echo "<html lang='pl-PL'>
						<head>
							<meta charset='UTF-8'>
							<title>Logowanie Do Biblioteki</title>
							<link rel='stylesheet' href='css/wyglad_login.css'>
						</head>
							<body>
								<div class='tresc'>
									<div class='zaloguj'>
										<font size=12>Błędne dane logowania.</font>
									</div>
									<form action='logowanieBibl.php'>
										<div class='form'>
											<input type='submit' value='Spróbuj ponownie' class='button'>
										</div>
									</form>
								</div>
							</body>
						</html>";
				$_SESSION["probyLoginBibl"]+=1;
			}
			elseif($sql->fetch()>1)
			{
				echo "<html lang='pl-PL'>
					<head>
						<meta charset='UTF-8'>
						<title>Logowanie Do Biblioteki</title>
						<link rel='stylesheet' href='css/wyglad_login.css'>
					</head>
						<body>
							<div class='tresc'>
								<div class='zaloguj'>
									<font size=12>coś poszło nie tak! skontaktuj się z administratorem!(kod błędu: usr.in.db>1).</font>
								</div>
								<form action='logowanieBibl.php'>
									<div class='form'>
										<input type='submit' value='Spróbuj ponownie' class='button'>
									</div>
								</form>
							</div>
						</body>
					</html>";
			}
			$sql->close();
		}
	}
}
else
{
	if($sql=$conn->prepare("select * from logowania where login =? AND haslo=? "))
		{
			$sql->bind_param("ss",$login,$haslo2);
			$sql->execute();
			$sql->bind_result($id_wpisu,$id_bibl,$login,$haslo2);
			if($sql->fetch()==1)
			{
				$_SESSION["userName"] = $login;
				header("Location: panel_b.php");
			}
			elseif($sql->fetch()==0)
			{
				echo "<html lang='pl-PL'>
						<head>
							<meta charset='UTF-8'>
							<title>Logowanie Do Biblioteki</title>
							<link rel='stylesheet' href='css/wyglad_login.css'>
						</head>
							<body>
								<div class='tresc'>
									<div class='zaloguj'>
										<font size=12>Błędne dane logowania.</font>
									</div>
									<form action='logowanieBibl.php'>
										<div class='form'>
											<input type='submit' value='Spróbuj ponownie' class='button'>
										</div>
									</form>
								</div>
							</body>
						</html>";
				$_SESSION["probyLoginBibl"]+=1;
			}
			elseif($sql->fetch()>1)
			{
				echo "<html lang='pl-PL'>
					<head>
						<meta charset='UTF-8'>
						<title>Logowanie Do Biblioteki</title>
						<link rel='stylesheet' href='css/wyglad_login.css'>
					</head>
						<body>
							<div class='tresc'>
								<div class='zaloguj'>
									<font size=12>coś poszło nie tak! skontaktuj się z administratorem!(kod błędu: usr.in.db>1).</font>
								</div>
								<form action='logowanieBibl.php'>
									<div class='form'>
										<input type='submit' value='Spróbuj ponownie' class='button'>
									</div>
								</form>
							</div>
						</body>
					</html>";
			}
			$sql->close();
		}
}
?>