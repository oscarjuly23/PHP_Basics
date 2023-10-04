<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>exercici 1</title>
    </head>
    <body>
        Exercici 1 <br><br>

        <?php
        // define variables and set to empty values
        $num1Err = $num2Err = $operacioErr = "";
        $num1 = $num2 = $operacio = $resultat = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") { //per saber si es post
            if (empty($_POST["num1"])) { //si el parametre num1 esta buit 
                $num1Err = "Es obligatori posar un numero"; //asignas a num1err que es obligatori ficar un numero, en text
            } else {
                $num1 = test_input($_POST["num1"]); //treu caracters especials. para el javascript
                if (!preg_match("/^[0-9]*$/", $num1)) { //comprova si no has posat els caracters correctes.
                    $num1Err = "Nomes numeros"; //en cas de que no s'hagin ficat diu nomes numeros
                }
            }

            if (empty($_POST["num2"])) { //el mateix que adalt pero per num2
                $num2Err = "Es obligatori posar un numero";
            } else {
                $num2 = test_input($_POST["num2"]);
                if (!preg_match("/^[0-9]*$/", $num2)) {
                    $num2Err = "Nomes numeros";
                }
            }

            if (empty($_POST["operacio"])) {//si l'operacio es buida ens dira que necesitem ficar quin tipos doperacio es tracta.
                $operacioErr = "Es obligatori posar quin tipus de operacio ha de realitzar";
            } else {
                $operacio = test_input($_POST["operacio"]); //treu caracters especials. para el javascript
                if (!preg_match("/^[a-zA-Z]*$/", $operacio)) { //comprova si no has ficat lletres minuscules o majuscules.
                    $operacioErr = "Nomes lletres"; //dira nomes lletres a operacioerr
                }
            }
        }

        function test_input($data) { //rep com a parametre el input corresponent.
            $data = trim($data); //borrara els espais
            $data = stripslashes($data); //elimina les contrabarres
            $data = htmlspecialchars($data); // treu caracters especials html.
            return $data; //retorna un altre cop el parametre sense els caracters innecesaris
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">  <!-- diu que el metode sera post, action diu que ho envii a si mateix -->
            Numero 1: <input type="text" name="num1" value="<?php echo $num1; ?>"> <!-- es el camp de text per el numero 1, com a valor es queda amb el numero 1 -->
            <span class="error">* <?php echo $num1Err; ?></span> <!-- printa num error i en el cas de que hi hagi sortira escrit, sino sortira amb blanc. -->
            <br><br>
            Numero 2: <input type="text" name="num2" value="<?php echo $num2; ?>"> <!-- mateix que adalt pero per num2 -->
            <span class="error">* <?php echo $num2Err; ?></span> <!-- printa num2 error, si esta buit es printara amb blanc -->
            <br><br> <!-- salts de linea -->
            Operació (minusculas): <input type="text" name="operacio" value="<?php echo $operacio; ?>"> <!-- camp de text per indicar el numero de  -->
            <span class="error">* <?php echo $operacioErr; ?></span>
            <br><br>
            <input type="submit" name="submit" value="Calcular">  <br> <!-- es el botó de submit -->
        </form>

        <?php
        //No se per que nomes entra a la condicio de si operacio es suma
        if ($operacio=="suma") { //si el pregatch es suma, que fagi la suma
            $resultat = $num1 + $num2; //operacio de la suma
        } else if ($operacio=="resta") {//si operacio = resta
            $resultat = $num1 - $num2;
        } else if ($operacio=="multiplicacio") {//si operacio = multi
            $resultat = $num1 * $num2;
        } else if ($operacio=="divisio") {//si operacio = divisio, comproba si el dicisor es 0 i salta error.
            if ($num2 == 0) {
                $resultat = "ERROR";
            } else {
                $resultat = $num1 / $num2;
            }
        }
        echo "Información introducida <br><br>"; //mostra la informacio tractada.
        echo "Numero 1: $num1";
        echo "<br><br>";
        echo "Numero 2: $num2";
        echo "<br><br>";
        echo "Operacio: $operacio";
        echo "<br><br>";
        echo "Resulatat: $resultat"
        ?>
    </body>
</html>
