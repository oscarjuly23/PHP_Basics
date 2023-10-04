<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "referendum";

$conn = new mysqli($servername, $username, $password, $dbname);
$DNI="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $DNI = test_input($_POST["DNI"]);
}
$vot="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $vot = test_input($_POST["vot"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(!empty($_POST["DNI"])) {
	$sql = "INSERT INTO referendum.votacions (DNI,vot) VALUES ('$DNI','$vot')";
	$result = $conn->query($sql);	
}
$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
<title>PHP With MySQL</title>
</head>
<body>
<form name="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<br>
<h1>Trobeu convenient que es pugui posar exàmens finals un dissabte al matí?</h1>
<p>El teu DNI:</p><input type="text" name="DNI"><br><br>
<p>Vot? ('si'/'no'/'ns/n'c)</p><input type="text" name="vot"><br><br>
<input type="submit" name="submit" value="Votar">
</form>
</body>
</html>
