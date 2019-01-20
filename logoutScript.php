<?php
session_start();
include "include.php\loginFunctions.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/logoutScript.css">
	<meta charset="UTF-8">
	<title>Chatinga - Einloggen</title>
</head>
<body>
	<p id="status">
<?php
if(isset($_SESSION["Nutzername"]))
{
	$pdo = new PDO("mysql:host=localhost;dbname=Chatinga;charset=utf8", "root", "");
	setOffline($_SESSION["Nutzername"], $pdo);

	session_destroy();

	header("Refresh:2; url=index.php");
	echo "Logout erfolgreich. Danke für Deinen Besuch!";
}
else
{
	header("Location: index.php");
}
?>
	</p>
</body>
</html>
