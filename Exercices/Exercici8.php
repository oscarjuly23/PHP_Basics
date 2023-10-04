<!DOCTYPE html>
<html>
<head>
	<title>Calculs varis</title>
</head>
<body>

<?php
//Exercici8
//Fem la funció per el número, i la suma. Una altre per la multiplicació i la tercera comproba si es cap i cua o no. Finalment imprimim el resultat per pantalla.
    function numero($n) {
        $n = str_split($n);
        $suma = 0;
        for ($i = 0; $i < count($n); $i++) {
            $suma += $n[$i];
        }
        if (count(str_split($suma)) <= 2)
            return $suma;
        else
            numero($suma);
    }

    function Multiplicació($n) {
        $n = str_split($n);
       $mult = 1;
       for ($i = 0; $i < count($n); $i++) {
            $mult *= $n[$i];
        }
        if (count(str_split($mult)) > 0)
            return $mult;
       else
            numero($mult);
    }

    function cc() {
        $calc = 0;
        $cocient = $_GET['enter'];
        while ($cocient != 0) {
            $residu = $cocient % 10;
            $calc = $calc * 10 + $residu;
            $cocient = (int) ($cocient / 10);
        }
        if ($_GET['enter'] == $calc)
            echo "El número " . $_GET['enter'] . " és capicua.<br/>";
        else
            echo "El número " . $_GET['enter'] . " no és capicua.<br/>";
    }
    echo "La suma dels números és = " . numero($_GET["enter"]) . "<br/>";
    echo "La multiplicació dels números és = " . Multiplicació($_GET["enter"])."<br/>";
    cc();
?>

</body>
</html>