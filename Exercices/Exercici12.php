<!DOCTYPE html>
<html>
<head>
	<title>Conseguir nom</title>
</head>
<body>

<?php
//Exercici12
//Amb el sustr treiem dels caracters de la url amb les seves posicions
//Fem un array separant l'arxiu i la ext amb el explode i mostrem els valors.

$adreça = "https://gracia.sallenet.org/login/index.php";
$arxiu= substr($adreça, -9,9);
$array = explode(".", $arxiu);
$nom = $array [0];
$ext = $array[1];
echo "Nom arxiu: " . $nom . "<br/>";
echo "Extensió: ." . $ext;
?>

</body>
</html>