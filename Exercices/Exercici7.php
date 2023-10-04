<!DOCTYPE html>
<html>
<head>
	<title>Enters</title>
</head>
<body>
<?php

//Exercici7
//Tenim un altre arxiu, un formulari, quan introduim el numero (enter i positiu) comença el FOR, el bucle fins que arribi a al numero introduit.
	$x = 1;
	$y = 0;
	for ($i = 0; $i < $_GET["n"]; $i++) {
		$sum = $x + $y;
		$x = $y;
		$y = $sum;
		echo $sum;
		echo ", ";
	}
?>

</body>
</html>