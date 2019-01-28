<?php
function retrieveThemeFilename($themeID, $pdo)
{
	$statement = $pdo->prepare("SELECT Dateiname
		FROM farbthema
		WHERE FarbthemaID = ?");
	$result = $statement->execute([$themeID]);
	$row=$statement->fetch(PDO::FETCH_ASSOC);
	return $row["Dateiname"]; //string
}
function retrieveThemeName($themeID, $pdo)
{
	$statement = $pdo->prepare("SELECT Name
		FROM farbthema
		WHERE FarbthemaID = ?");
	$result = $statement->execute([$themeID]);
	$row=$statement->fetch(PDO::FETCH_ASSOC);
	return $row["Name"]; //string
}
function retrieveAllThemes($pdo)
{
	$result = $pdo->query("SELECT * FROM farbthema");
	return $result;
}
function updateUserChosenTheme($userID, $themeID, $pdo)
{
	$_SESSION["gewaehltesThema"] = $themeID;
	$statement = $pdo->prepare("UPDATE nutzer 
		SET gewaehltesThema = ?
		WHERE NutzerID = ?");
	$statement->execute([$themeID, $userID]);
}