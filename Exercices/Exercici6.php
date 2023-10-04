<!DOCTYPE html>
<html>
<head>
	<title>OPERATIONS</title>
</head>
<body>

<?php
//Exercici6
//Fem una fuction per cada operació utilitzant dos variambles (x i y), abaix donem valor a cada número i a continuació imprimim les funcions.

//Funcions:
 			function sum($x, $y) {
            	return $x + $y;
            }
            function rest($x, $y) {
            	return $x - $y;
            }
            function mult($x, $y) {
            	return $x * $y;
            }
            function div($x, $y) {
            	//Tenim en compte si es y es 0!
            	if ($y != 0) {
                	return ($x / $y);
            	} else {
            		echo "Dividim entre 0, compte!" . "</br>";
            		return 0;
            	}
            }
//valors:
            $x = 4; $y = 2;

//Imprimi per pantalla:
            echo "Suma: $x + $y = " . sum($x, $y) . "</br>";
            echo "Resta: $x - $y = " . rest($x, $y) . "</br>";
            echo "Multiplicació: $x * $y = " . mult($x, $y) . "</br>";
            echo "Divisió: $x / $y = " . div($x, $y) . "</br>";
?>

</body>
</html>