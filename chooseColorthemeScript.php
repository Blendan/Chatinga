<?php
session_start();
include "include.php\colorthemeFunctions.inc.php";
if(!isset($_SESSION["Nutzername"])) //Nutzer ist nicht eingeloggt
{
	header("Location: index.php");
}
else
{
	$pdo = new PDO("mysql:host=localhost;dbname=Chatinga;charset=utf8", "root", "");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/loginScript.css">
	<meta charset="UTF-8">
	<title>Chatinga - Farbthema auswählen</title>
</head>
<body>
	<p id="status">
<?php
if(isset($_GET["themeID"]))
{
	updateUserChosenTheme($_SESSION["NutzerID"], $_GET["themeID"], $pdo);

	header("Refresh:2; url=chatauswahl.php");
	echo "Thema geändert.";
}
else //Seite wurde anderweitig (manuell) aufgerufen
{
	header("Location: loginPage.php");
}
?>
	</p>
</body>
</html>
