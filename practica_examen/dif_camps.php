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
        $sql = "CREATE DATABASE IF NOT EXISTS datos";
        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error creating database: " . $conn->error;
        }
        $conn->close();
        $dbname = "datos";
// Creem la conexió amb la base de dades.
        $conn = new mysqli($servername, $username, $password, $dbname);
		
        // Comprovem la connexió.
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
		// SQL PER CREAR LA TAULA
        $sql = "CREATE TABLE IF NOT EXISTS info (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	    usuario VARCHAR(50) NOT NULL,
		edad int,
        passworde VARCHAR(50) NOT NULL,
		mail varchar(50) NOT NULL,
		direccion varchar(200) NOT NULL,
        codigo_postal int
        )";
	//Comprovem la creació de la taula
		if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error creant la base de taula: " . $conn->error;
        }
		
//Si lo enviat és mitjançant el formulari és per POST, assignem a la variable matricula el resultat de passar per la funció test_input el títol.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $usuario = test_input($conn,$_POST["usuario"]);
  $passworde = test_input($conn,$_POST["passworde"]);
  $direccion = test_input($conn,$_POST["direccion"]);
  $codigo_postal = test_input($conn,$_POST["codigo_postal"]);
  $edad = test_input($conn,$_POST["edad"]);
   //Si mail està buit.
			if (empty($_POST["mail"])){
				//Deixo el camp mail sense contingut (buit).
				$mail="";
			}
			else {
                //Si el camp mail està enviat per POST no està buit.
            if ($_POST["mail"]!= "") {
                
                //Passo el contingut de mail rebut per post a la funció test_input.
                $mail = ($_POST["mail"]);
                //Validar mail.Ho fa agafant el valor de la variable mail, i passant-ho a FILTER_VALIDATE_EMAIL.
                if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
					//En cas d'error, passo com a valor de la variable mailErr el contingut "Format de mail invàlid".
                    $mailErr = "Format de mail invàlid.";
					echo $mailErr;
					$mail="";
                }
            }
			}
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
if(isset($_POST["submit"]))
{
	
	//Si hi ha com a mínim algun checkbox seleccionat.
	if(!empty($_POST["checkbox"]))
	{
		//Fem un bucle foreach que en anirà recorrent i cercant els checkbox que han estat seleccionats. Cada checkbox agafat com a interacció,
		//es guardarà ala variable checkbox.
		
		foreach($_POST["checkbox"] as $checkbox)
		{   
			//Si el paràmetre matricula no està buit, es procedeix a fer el update i canviar les dades
			if(!empty($_POST["usuario"]))
			{
				if ($edad>=18){
				if(!preg_match("/^[a-zA-Z]*$/",$usuario)){
				echo "Només lletres!";
				}
				else{
					$sql = "UPDATE datos.info SET usuario='".$usuario."' where id='".$checkbox."'";
				$result = $conn->query($sql);
				if ($conn->query($sql) === TRUE) {
					echo "UPDATE usuario realizado correctamente";
				} else {
					echo "Error al crear el update: " . $sql . "<br>" . $conn->error;
				}
				}
				}
				else{
					echo "Ets menor!";
				}
				}
			else if(!empty($_POST["passworde"]))
			{
				if ($edad>=18){
				$sql = "UPDATE datos.info SET passworde='".$passworde."' where id='".$checkbox."'";
				$result = $conn->query($sql);
				if ($conn->query($sql) === TRUE) {
					echo "UPDATE password  realizado correctamente";
				} else {
					echo "Error al crear el update: " . $sql . "<br>" . $conn->error;
				}
				}
				else{
					echo "Ets menor!";
				}
			}
			else if(!empty($_POST["direccion"]))
			{
				if ($edad>=18){
				$sql = "UPDATE datos.info SET direccion='".$direccion."' where id='".$checkbox."'";
				$result = $conn->query($sql);
				if ($conn->query($sql) === TRUE) {
					echo "UPDATE direccion  realizado correctamente";
				} else {
					echo "Error al crear el update: " . $sql . "<br>" . $conn->error;
				}
				}
				else{
					echo "Ets menor!";
				}
			}
				else if(!empty($_POST["codigo_postal"]))
			{
				if ($edad>=18){
				$sql = "UPDATE datos.info SET codigo_postal='".$codigo_postal."' where id='".$checkbox."'";
				$result = $conn->query($sql);
				if ($conn->query($sql) === TRUE) {
					echo "UPDATE codigo_postal  realizado correctamente";
				} else {
					echo "Error al crear el update: " . $sql . "<br>" . $conn->error;
				}
				}
				else{
					echo "Ets menor!";
				}
			}
				else if(!empty($_POST["edad"]))
			{
				if ($edad >=18){
				$sql = "UPDATE datos.info SET edad='".$edad."' where id='".$checkbox."'";
				$result = $conn->query($sql);
				if ($conn->query($sql) === TRUE) {
					echo "UPDATE edad  realizado correctamente";
				} else {
					echo "Error al crear el update: " . $sql . "<br>" . $conn->error;
				}
				}
				else{
					echo "Ets menor!";
				}
			}
				else if(!empty($_POST["mail"]))
			{
				if ($edad>=18){
				$sql = "UPDATE datos.info SET mail='".$mail."' where id='".$checkbox."'";
				$result = $conn->query($sql);
				if ($conn->query($sql) === TRUE) {
					echo "UPDATE mail   realizado correctamente";
				} else {
					echo "Error al crear el update: " . $sql . "<br>" . $conn->error;
				}
				}
				else{
					echo "Ets menor!";
				}
			}
				else if(!empty($_POST["usuario"])&!empty($_POST["edad"])&!empty($_POST["direccion"])&!empty($_POST["mail"])&!empty($_POST["codigo_postal"])&!empty($_POST["passworde"]))
			{
				if ($edad>=18){
				$sql = "UPDATE datos.info SET usuario='".$usuario."',direccion='".$direccion."',edad='".$edad."',codigo_postal='".$codigo_postal."',mail='".$mail."',passworde='".$passworde."' where id='".$checkbox."'";
				$result = $conn->query($sql);
				if ($conn->query($sql) === TRUE) {
					echo "UPDATE all  realizado correctamente";
				} else {
					echo "Error al crear el update: " . $sql . "<br>" . $conn->error;
				}
			}
			else{
					echo "Ets menor!";
				}
		}
		
		
	
		
			//Si matricula=buit, llavors es procedirà a eliminar.
			else {
				$count=$count + 1;
				$sql = "DELETE FROM datos.info where id='".$checkbox."'";
				$result = $conn->query($sql);
				if ($conn->query($sql) === TRUE) {
				} else {
					echo "Error al fer el delete: " . $sql . "<br>" . $conn->error;
				}
			}
		}
		//Comprovem si el contador és igual a 1 i matricula està buit.llavors indiquem que s'ha fet un borrat correcte.
		if ($count==1 & empty($_POST["usuario"])&empty($_POST["edad"])&empty($_POST["direccion"])&empty($_POST["mail"])&empty($_POST["codigo_postal"])&empty($_POST["passworde"])){
			echo "Se ha realizado un solo borrado";
		}
		//Comprovem si el contador és més gran que 1 i matricula=buit.Llavors es procedeix a mostrar els borrats realitzats.
		else if ($count>1 & empty($_POST["usuario"])&empty($_POST["edad"])&empty($_POST["direccion"])&empty($_POST["mail"])&empty($_POST["codigo_postal"])&empty($_POST["passworde"])) {
			echo $count." Borrados successfull";
		}
	} 
		else {
			if ($edad >=18){
			if(!preg_match("/^[a-zA-Z]*$/",$usuario)){
			echo "Només lletres!";
			}
			else {
				$sql = "INSERT INTO datos.info (usuario,edad,direccion,mail,codigo_postal,passworde) VALUES ('$usuario','$edad','$direccion','$mail','$codigo_postal','$passworde')";
		
			if ($conn->query($sql)==TRUE){
				echo "Insert successfull";
			}
			else {
				echo "Error!";
			}
			}
			
			
			}
			else{
					echo "Ets menor!";
				}
		}
}
$conn->close();
?> 
<!DOCTYPE html>
<html>
<head>
<title>PHP Datos info With MySQL</title>
</head>
<body>
<form name="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<h4><strong>TO DO List:</strong></h4>
Ordre:<select name="opcioshow">

<option value="Per defecte">Per defecte</option>

<option value="a-z">a-z</option>

</select>
<br><br>
<?php
$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
               die("Connection failed: " . $conn->connect_error);
            }
		//Ordenar
		if ($opcioshow=='a-z'){
			$sql= "SELECT * FROM datos.info ORDER BY usuario ASC";
			$result = $conn->query($sql);
		}
		else {
			$sql= "SELECT * FROM datos.info";
			$result = $conn->query($sql);
		}

if ($result->num_rows > 0) {
     //Mostra les dades de cada registre de la taula
    while($row = $result->fetch_assoc()) {
        echo '<input type="checkbox" name="checkbox[]" value="'.$row["id"].'">';
        echo '<input name="input"  size="20" maxlength="30" type="text" id="input" value="'. $row["usuario"]. '"/>'; 
		echo '<input name="input"  size="20" maxlength="30" type="text" id="input" value="'. $row["passworde"]. '"/>'; 
		echo '<input name="input"  size="20" maxlength="30" type="text" id="input" value="'. $row["edad"]. '"/>'; 
		echo '<input name="input"  size="20" maxlength="30" type="text" id="input" value="'. $row["direccion"]. '"/>'; 
		echo '<input name="input"  size="20" maxlength="30" type="text" id="input" value="'. $row["mail"]. '"/>'; 
		echo '<input name="input"  size="20" maxlength="30" type="text" id="input" value="'. $row["codigo_postal"]. '"/>'; 
     echo '<br>';
    }
} else {
    echo "0 results";
}
?>
<br>
<p>user</p><input type="text" name="usuario"><br><br>
<p>password</p><input type="text" name="passworde"><br><br>
<p>edad</p><input type="text" name="edad"><br><br>
<p>direccion</p><input type="text" name="direccion"><br><br>
<p>email</p><input type="text" name="mail"><br><br>
<p>codigo postal</p><input type="text" name="codigo_postal"><br><br>
<input type="submit" name="submit" value="Actualitza">
</form>
</body>
</html>
