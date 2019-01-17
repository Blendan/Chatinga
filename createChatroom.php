<?php
session_start();
include "include.php\createChatroomFunctions.inc.php";
if(!isset($_SESSION["Nutzername"])) //Nutzer ist nicht eingeloggt
{
	header("Location: index.php");
}
elseif(isset($_POST["createChatroom"])) //Seite wurde von chautauswahl.php aufgerufen
{
	$pdo = new PDO("mysql:host=localhost;dbname=Chatinga;charset=utf8", "root", "");
	
	if(chatroomExists($_POST["name"], $pdo))
	{
		header("Refresh:2; url=chatauswahl.php");
		echo "Ein Raum mit diesem Namen existiert bereits.";
	}
	elseif($_POST["name"] == "" || $_POST["thema"] == "")
	{
		header("Refresh:2; url=chatauswahl.php");
		echo "Bitte gib einen Namen und ein Thema ein.";
	}
	else
	{
		createChatroom($_POST["name"], $_POST["thema"], $_SESSION["NutzerID"], $pdo);
		header("Refresh:2; url=chatauswahl.php");
		echo "Anlegen erfolgreich! Du wirst gleich weitergeleitet.";
	}
}
else //Seite wurde manuell aufgerufen
{
	header("Location: index.php");
}
?>