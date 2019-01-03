<?php
/* == Genutzte Ressourcen ==
 * User Friendly Install Scripts: https://calendarscripts.info/user-friendly-script-installation.html
 * PDO-Tutorials: https://phpdelusions.net/pdo , https://secure.php.net/manual/en/book.pdo.php
 */
try
{
	$pdo = new PDO("mysql:host=localhost;charset=utf8", "root", "");

	echo "Verbindung zur Datenbank erfolgreich. Aktion auswählen:<br><br>";
	echo "<a target='_blank' href='http://localhost/phpmyadmin/server_databases.php'>Vorhandene Datenbanken in phpMyAdmin anzeigen</a><br><br>";
	echo "<a href='install.php?action=create'>Chatinga Datenbank neu anlegen</a><br>";
	echo "<a href='install.php?action=dummy'>Dummy-Daten einfügen</a><br>";
	echo "<br>";

	if(($_GET['action']=="create"))
	{
		echo "Datenbank wird angelegt...<br>";

		$createScript = file_get_contents("sql\CreateDatabase.sql");

		if($pdo->exec($createScript) === false)
		{
			echo "Fehler: ";
			echo($pdo->errorInfo()[2]);
		}
		else
		{
			echo "Erfolgreich!";
		}
	}
	elseif(($_GET['action']=="dummy"))
	{
		echo "Dummy-Daten werden eingefügt...<br>";

		$dummyScript = file_get_contents("sql\InsertDummyData.sql");

		//Generiere 3 verschiedene Hashes und schreibe sie an die korrekte Stelle im Skript
		for($i=0;$i<3;$i++)
		{
			$passwordArray[] = password_hash("asdf", PASSWORD_DEFAULT);
		}
		$dummyScript = str_replace(array("PASSWORT1","PASSWORT2","PASSWORT3"), $passwordArray, $dummyScript);

		$pdo->exec("USE Chatinga");
		if($pdo->exec($dummyScript) === false)
		{
			echo "Fehler: ";
			echo($pdo->errorInfo()[2]);
		}
		else
		{
			echo "Erfolgreich!";
		}
	}
}
catch (PDOException $e)
{
	if ($e->getCode() == "2002")
	{
		echo "Fehler beim Verbinden mit der Datenbank. Ist der SQL-Service aktiviert?<br>";
	}
	else
	{
		throw new PDOException($e->getMessage(), (int)$e->getCode());
	}
}
  

?>
