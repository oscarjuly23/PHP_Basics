<!DOCTYPE html>
<html>
<head>
	<title>IVA</title>
</head>
<body>

<?php
//Exercici5
//Amb el get hem de posar el preu a la URL,
//Exemple: http://localhost/php/Exercici5.php?preu=20
		$preu=$_GET["preu"];
		$preufinal=($preu*0.21)+$preu;
		echo "Preu amb IVA: ".$preufinal;
?>

</body>
</html>