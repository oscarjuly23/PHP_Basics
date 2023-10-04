<!-- Iniciem el codi PHP que ens permetrà realitzar la connexió amb la bbdd i fer les diverses operacions volgudes -->
<?php
$servername = "localhost";//Diem quin és el nostre servidor.
$username = "root";//Assignem quin serà el nostre usuari.
$password = "";//Assignem la contrasenya.
$count=0;//Fem una variable anomenada count, que ens permetrà contar els delete que fem.

//El següent if ens permet saber si el paràmetre opcioshow està buit.En cas afirmatiu s'assigna a la variable opcioshow en buit.
if(empty($_POST["opcioshow"])){
$opcioshow="";
}
//En cas contrari, assignem a la variable opcioshow el passat per post com a paràmetre opcioshow.
else {
	$opcioshow=$_POST["opcioshow"];
}
// Crear la connexió amb el mysql.
$conn = new mysqli($servername, $username, $password);

// Comprovem la connexió.
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// Creem la base de dades.
        $sql = "CREATE DATABASE IF NOT EXISTS PRACTICA_EXAM";
        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error creating database: " . $conn->error;
        }
        $conn->close();
        $dbname = "PRACTICA_EXAM";
// Creem la conexió amb la base de dades.
        $conn = new mysqli($servername, $username, $password, $dbname);
		
        // Comprovem la connexió.
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
		// SQL PER CREAR LA TAULA
        $sql = "CREATE TABLE IF NOT EXISTS practica (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
		titol VARCHAR(50) NOT NULL,
        temps DATETIME
        )";
	//Comprovem la creació de la taula
		if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error creant la base de taula: " . $conn->error;
        }
		
$matricula="";
//Si lo enviat és mitjançant el formulari és per POST, assignem a la variable matricula el resultat de passar per la funció test_input el títol.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $titol = test_input($conn,$_POST["titol"]);
}
//Serveix per a que no insertin caràcters especials, sql injection i xss.
function test_input($conn,$data) {
  $data = mysqli_real_escape_string($conn,$data);
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//Si s'ha premut el botó submit, es procedeix
if(isset($_POST["Actualiza"]))
{
	//Si hi ha com a mínim algun checkbox seleccionat.
	if(!empty($_POST["checkbox"]))
	{
		//Fem un bucle foreach que en anirà recorrent i cercant els checkbox que han estat seleccionats. Cada checkbox agafat com a interacció,
		//es guardarà ala variable checkbox.
		foreach($_POST["checkbox"] as $checkbox)
		{
			//Si el paràmetre matricula no està buit, es procedeix a fer el update i canviar les dades
			if(!empty($_POST["titol"]))
			{
				$sql = "UPDATE PRACTICA_EXAM.practica SET titol='".$titol."',temps=now() where id='".$checkbox."'";
				$result = $conn->query($sql);
				if ($conn->query($sql) === TRUE) {
					echo "UPDATE realizado correctamente";
				} else {
					echo "Error al crear el update: " . $sql . "<br>" . $conn->error;
				}
			}
			//Si matricula=buit, llavors es procedirà a eliminar.
		}
		//Comprovem si el contador és igual a 1 i matricula està buit.llavors indiquem que s'ha fet un borrat correcte.
	} 
	}
else if (isset($_POST["Añadir"])){
$sql = "INSERT INTO PRACTICA_EXAM.practica (titol, temps) VALUES ('$titol',now())";
		
			if ($conn->query($sql)==TRUE){
				echo "Insert successfull";
			}
			else {
				echo "Error!";
			}	
}
else if (isset($_POST["Borrar"])){
		foreach($_POST["checkbox"] as $checkbox)
		{
	$count=$count + 1;
				$sql = "DELETE FROM PRACTICA_EXAM.practica where id='".$checkbox."'";
				$result = $conn->query($sql);
				if ($conn->query($sql) === TRUE) {
				} else {
					echo "Error al fer el delete: " . $sql . "<br>" . $conn->error;
				}
if ($count==1 & empty($_POST["titol"])){
			echo "Se ha realizado un solo borrado";
		}
		//Comprovem si el contador és més gran que 1 i titol=buit.Llavors es procedeix a mostrar els borrats realitzats.
		else if ($count>1 & empty($_POST["titol"])) {
			echo $count." Borrados successfull";
		}
}
}
$conn->close();
?> 
<!DOCTYPE html>
<html>
<head>
<title>PHP cars With MySQL</title>
</head>
<body>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<h4><strong>TO DO List:</strong></h4>
Ordre:<select name="opcioshow">

<option value="Per defecte">Per defecte</option>

<option value="a-z">a-z</option>

<option value="Temps">Temps</option>
</select>
<br><br>
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }
		//Ordenar
		if ($opcioshow=='a-z'){
			$sql= "SELECT * FROM PRACTICA_EXAM.practica ORDER BY titol ASC";
			$result = $conn->query($sql);
		}
		else if($opcioshow=='Temps'){
			$sql= "SELECT * FROM PRACTICA_EXAM.practica ORDER BY temps DESC";
			$result = $conn->query($sql);
		}
		else {
			$sql= "SELECT * FROM PRACTICA_EXAM.practica";
			$result = $conn->query($sql);
		}

if ($result->num_rows > 0) {
     //Mostra les dades de cada registre de la taula
    while($row = $result->fetch_assoc()) {
        echo '<input type="checkbox" name="checkbox[]" value="'.$row["id"].'">';
        echo '<input name="input"  size="20" maxlength="30" type="text" id="input" value="'. $row["titol"]. '"/>'.$row["temps"]; 
     echo '<br>';
    }
} else {
    echo "0 results";
}
?>
<br>
<input type="text" name="titol">
<input type="submit" name="Borrar" value="Borrar">
<input type="submit" name="Actualiza" value="Actualiza">
<input type="submit" name="Añadir" value="Añadir">
</form>
</body>
</html>
