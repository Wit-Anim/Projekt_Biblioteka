<!DOCTYPE html>
<html>
<head>
	<?php
	include "php/init.php";
	if(isset($_SESSION["userName"]) || isset($_SESSION["oknoRobocze"]))
	{
		session_unset();
		//print_r($_SESSION);
	}
	?>
	<meta charset="UTF-8">
	<title>Biblioteka</title>
</head>
<body>

	<div class="row-lg-12">
		<?php include_once "header.php"; ?>
	</div>
	<div class="row-lg-12">
		<?php include_once "middle_of_site.php"; ?>
	</div>
	<div class="row-lg-12">
		<?php include_once "footer.php";?>
	</div>

</body>
</html>