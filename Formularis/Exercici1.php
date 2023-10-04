<!DOCTYPE HTML>  
<html>
<head>
  <title>Formulario</title>
  <style>.error {color: #FF0000;}</style>
</head>
<body>  

<?php

//Creem les variables per els continguts i per els errors
$nom = "";
$email = "";
$comentari = "";
$Enom = "";
$errorm =""; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//Si esta buit com el nom es obligatori, posem l'error i buidem les altres variables en el cas que les haguessim introduit
  if (empty($_POST["nom"])) {
    $Enom = "El Nom es obligatori";
    $email = " ";
    $comentari = " ";
//Si la variable nom no esta buida endevant
  } else {
    $nom = test_input($_POST["nom"]);
//Hem de mirar que el que hagi introduit l'usuari en el nom sigui una lletra o un numero i si no es així buidem la variable i mostrem l'error
    if (!preg_match("/^[a-zA-Z0-9]*$/",$nom)) {
      $Enom = "Nomes pots escriure Lletres i Numeros!";
      $nom = " ";
    }
  }

//sempre mirem si el nom esta buit perque volia que si es així no s'omplís cap variable.
  if (empty($_POST["nom"])) {
    $email = " ";
//Si la variable nom no esta buida endevant
  } else {
//comprovem si mail esta buida o no ja que si no ho comprovem i no posem ens saltaría l'error de format i no volem que passi això, buidem la variable d'error
      if (empty($_POST["email"])) {
        $errorm = "";
      } else {
//Si no esta buida hem de validar que esta en format correcte i al no ser així buidem la variable
          $email = test_input($_POST["email"]);
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errorm = "Format de email incorrecte";
          $email = " ";
         }
        }
    }
// com abans sempre mirem si el nom esta buit perque volia que si es així no s'omplís cap variable.
 if (empty($_POST["nom"])) {
  $comentari = " ";
} else{
//no hem de comprobar res així que omplim la variable amb el que estigui introduit sense validar res
$comentari = test_input($_POST["comentari"]);
}
}


//Per a que no s'executi codi d'scripts
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<h2>FORMULARI OSCAR</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Nom: <input type="text" name="nom" value="<?php echo $nom ?>">
  <span class="error">* <?php echo $Enom; ?></span>
  <br><br>
  E-mail: <input type="text" name="email" value="<?php echo $email ?>">
  <span class="error"><?php echo $errorm; ?></span>
  <br><br>
  Comentari: <textarea name="comentari" rows="5" cols="40" value="<?php echo $comentari ?>"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

<?php
//mostrem totes les variables amb espais
echo "<h3>Dades introduides:</h3>";
  echo "Nom: " . $nom;
echo "<br>";
  echo "E-mail: " . $email;
echo "<br>";
  echo "Comentari: " . $comentari;
?>



</body>
</html>