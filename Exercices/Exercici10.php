<!DOCTYPE html>
<html>
<head>
	<title>array multidimensional</title>
</head>
<body>

<?php
//Exercici10

$countUSA = 0;
        $countNA = 0;
$main = array(
        array("Tokyo", "Japan", "Asia"),
        array("Mexico City", "Mexico", "North America"),
        array("New York City", "USA", "North America"),
        array("Mumbai", "India", "Asia"),
        array("Seoul", "Korea", "Asia"),
        array("Shanghai", "China", "Asia"),
        array("Chicago", "USA", "North America"),
        array("Buenos Aires", "Argentina", "South America"),
        array("Cairo", "Egypt", "Africa"),
        array("London", "UK", "Europe")
        );
//Recorro l'array i eguardo primera varianle.
    foreach ($main as $first) {
//Recorro la primera variable i comprobo si es igual a USA o si es igual a North America i ho conto amb cntadors diferents.
        foreach ($first as $second) {
            if ($second == "USA") {
                $countUSA++;
            }
            if ($second == "North America") {
                $countNA++;
            }
        }
    }
        echo "USA: " . $countUSA . " vegades. <br/>";
        echo "North America: " . $countNA . " vegades.";
      
?>

</body>
</html>