<!DOCTYPE html>
<html>
<head>
	<title>BUCLE</title>
</head>
<body>

<?php
//Exercici4
//Amb el while es fa un bucle que el contador va sumant fins a 10 i para
$x=2;
$y=0;
$count=0;
while($count<10){
	$y=pow($x,$count);
	echo "2^".$count."=".$y."<br/>";
	$count++;
	}
?>

</body>
</html>