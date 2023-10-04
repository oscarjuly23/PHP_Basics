<html>
    <head>
        <title>
            Exercici 12
        </title>
    </head>
    <body>
        <?php
        echo "Exercici 12<br/>";
        //Creo una variable anomenada url y li donc com valor la url de Sallenet.
        $url = "https://gracia.sallenet.org/login/index.php";
        //Creo una variable anomeanda file y li donc com valor la part del final de la url (index.php).
        $file= substr($url, -9,9);
        //Creo una variable anomeanda array y com valor li donc el resultat de la funció explode que el que ho farà en función del . i la variable file.
        //Això em  separa en posicions cada vegada que hi ha un punt.
        $array = explode(".", $file);
        //Primera posició de l'array.
        $nom = $array [0];
        //Segona posició de l'array.
        $extensio = $array[1];
        //Mostro per pantalla el nom de l'arxiu.
        echo "El nom de l'arxiu és: ".$nom."<br/>";
        //Mostro per pantalla l'extensión de l'arxiu.
        echo "La extensió és: ".$extensio;
        
        ?>
    </body>
</html>
