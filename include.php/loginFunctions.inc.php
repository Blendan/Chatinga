<?php
//Funktionen die vom Login-, Logout- und Registrierskript augerufen werden.

function retrieveUser($username, $pdo)
{
	//sucht den Usernamen in der Datenbank, gibt alle Infos in einem assoziativen Array zurück
	$statement = $pdo->prepare("SELECT * FROM Nutzer WHERE Nutzername = ?");
	$statement->execute([$username]);

	return $statement->fetch(PDO::FETCH_ASSOC);
}

function retrievePassword($username, $pdo)
{
	//sucht den Usernamen in der Datenbank, gibt das Passwort zurück
	$statement = $pdo->prepare("SELECT Passwort FROM Nutzer WHERE Nutzername = ?");
	$statement->execute([$username]);
	$row=$statement->fetch(PDO::FETCH_ASSOC);

	return $row["Passwort"]; //string
}

function userExists($username, $pdo)
{
	//sucht den Usernamen in der Datenbank, gibt true zurück wenn er existiert
	$statement = $pdo->prepare("SELECT NutzerID FROM Nutzer WHERE Nutzername = ?");
	$statement->execute([$username]);

	return $statement->rowCount();
}

function setOnline($username, $pdo)
{
	$pdo->prepare("Update Nutzer SET istOnline = 1 WHERE Nutzername = ?")->execute([$username]);
}

function setOffline($username, $pdo)
{
	$pdo->prepare("Update Nutzer SET istOnline = 0 WHERE Nutzername = ?")->execute([$username]);
}

function createUser($username, $password, $pdo)
{
	$passwordHash = password_hash($password, PASSWORD_DEFAULT);

	$statement = $pdo->prepare
	("
		INSERT INTO nutzer (Nutzername, Passwort)
		VALUES (?, ?);
	");
	$statement->execute([$username, $passwordHash]);
}
