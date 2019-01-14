<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chatinga - Einloggen</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<h1>Herzlich Willkommen bei Chatinga!</h1>

<?php
if(isset($_SESSION["Nutzername"]))
{
	echo "Du bist angemeldet als " . $_SESSION["Nutzername"] . "<br>";
	echo "<a href='logoutScript.php'>Ausloggen</a><br>";
	echo "<a href='chatauswahl.php'>Zur Chatauswahl</a><br>";
}
else
{
	echo "<a href='loginPage.php'>Einloggen oder Registrieren</a><br>";
}
?>
</body>
</html>
