<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname= "M09";

if(empty($_POST["show"])){
$show="";
}
else {
	$show=$_POST["show"];
}

$conn = new mysqli($servername, $username, $password, $dbname);
$title="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = test_input($_POST["title"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if(isset($_POST["submit"])) {
	if(!empty($_POST["checkbox"])) 	{
		foreach($_POST["checkbox"] as $checkbox) {
			if(!empty($_POST["title"])) {
				$sql = "UPDATE M09.tasks SET title='".$title."',temps=now() where id='".$checkbox."'";
				$result = $conn->query($sql);
			}
			else {
				$sql = "DELETE FROM M09.tasks where id='".$checkbox."'";
				$result = $conn->query($sql);
			}
		}
	} else {
		if (empty($_POST["title"])){
		}
		else {
			$sql = "INSERT INTO M09.tasks (title, temps) VALUES ('$title',now())";
			$result = $conn->query($sql);
		}
	}
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
Ordenar por<select name="show">

<option value="-">-</option>

<option value="A-Z">A-Z</option>

<option value="Time">Time</option>
</select>
<br><br>

<?php
$conn = new mysqli($servername, $username, $password, $dbname);

		if ($show=='A-Z'){
			$sql= "SELECT * FROM M09.tasks ORDER BY title ASC";
			$result = $conn->query($sql);
		}
		else if($show=='Time'){
			$sql= "SELECT * FROM M09.tasks ORDER BY temps DESC";
			$result = $conn->query($sql);
		}
		else {
			$sql= "SELECT * FROM M09.tasks";
			$result = $conn->query($sql);
		}

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<input type="checkbox" name="checkbox[]" value="'.$row["id"].'">';
        echo '<input name="hol"  size="20" maxlength="30" type="text" id="hola" value="'. $row["title"]. '"/>'.$row["temps"];
     echo '<br>';
    }
} else {
    echo "0 results";
}
?>

<br>
<input type="text" name="title">
<input type="submit" name="submit" value="Actualitza">
</form>
</body>
</html>
