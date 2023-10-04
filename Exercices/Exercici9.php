<!DOCTYPE html>
<html>
<head>
	<title>Colors</title>
</head>
<body>
	
<?php
//Exercici9
//Faig un array dels colors
    $color = array("Lila", "Rosa", "Vermell", "Blanc", "Negre");
    $arrlength = count($color);
    for ($x = 0; $x < $arrlength; $x++) {
    	//Recorro la variable
 echo $color[$x] . " , "; //per posar les comes
    }
?>
</body>
</html>