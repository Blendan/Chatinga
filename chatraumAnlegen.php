<?php
session_start();

if(!isset($_SESSION["Nutzername"]))
{
	header("Location: index.php");
}
else
{
	//TODO: Chatraum in der Datenbank anlegen

	header("Location: chatauswahl.php");
}

?>
