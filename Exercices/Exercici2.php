<!DOCTYPE html>
<html>
<head>
	<title>HTTP_HOST-USER_AGENT</title>
</head>
<body>

<?php
//Exercici2
//El 'HTTP_HOST' mostra l'usuari que ha enviat la petició, el client
//I amb 'HTTP_USER_AGENT' mostrem una cadena que indica el agent de unuari utilitzat per a accedir a la pàgina
	echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
	echo $_SERVER['HTTP_HOST'];
?>

</body>
</html>