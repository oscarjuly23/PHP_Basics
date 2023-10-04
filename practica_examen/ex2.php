<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Exercici 1</title>
    </head>
    <body>
        Exercici 1 <br><br>
        <?php
        $numeros = array( //aqui es crea un array multidimensional del doraeamon. (segle XXII).
            array(3, 5, 8, 6, 5),
            array(8, 6, 4, 5, 6),
            array(5, 0, 2, 7, 5),
            array(3, 4, 7, 8, 3),
            array(2, 4, 3, 5, 9),
        );
        echo numMin($numeros);//llamamaos a la función nummin pasandole los numeros de el array.
        echo numMax($numeros); //lo mismo que arriba pero con numMax
        echo sumTotal($numeros); //lo mismo que arriba pero con numeros

        function numMin($numeros) { //declaracio de la funcio numMin
            $numMinim = 100; //declara numMin a 100 i no a 0
            foreach ($numeros as $values) { //guardes cada array que hi ha a dins de numeros a la variable values
                foreach ($values as $value) { //cada valor que hi ha adins del segon array el guarda com a value
                    if ($value < $numMinim) { //comproba si cada valor que hi ha a value es menor que el valor que hi ha nummin
                        $numMinim = $value; //es guarda a numMin el valor de value
                    }
                }
            }
            echo "Numero minimo: $numMinim <br>"; //mostra el nummin
        }

        function numMax($numeros) { //declara funcio nummax
            $numMaxim = 0; //el inicialitza a 0
            foreach ($numeros as $values) { //cada valor que hi ha adins del segon array el guarda com a value
                foreach ($values as $value) {//comproba si cada valor que hi ha a value es major que el valor que hi ha nummax
                    if ($value > $numMaxim) { //comproba si value es mes gran que nummax
                        $numMaxim = $value; //en el cas de ser mes gran guarda value a nummax
                    }
                }
            }

            echo "Numero maximo: $numMaxim <br>"; //mostra nummax
        }

        function sumTotal($numeros) { //declara funcio sumtotal
            $sumaTotal = 0; //set a 0
            foreach ($numeros as $values) { //cada valor que hi ha adins del segon array el guarda com a values
                foreach ($values as $value) {//comproba si cada valor que hi ha a value es major que el valor que hi ha a values
                    $sumaTotal += $value; //va afegint a la suma total cada value
                }
            }

            echo "Suma total: $sumaTotal <br>"; //treu suma total
            
        }
        ?>
    </body>
</html>
