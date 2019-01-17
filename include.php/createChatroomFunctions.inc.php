<?php
function chatroomExists($name, $pdo) 
{
	$statement = $pdo->prepare("SELECT Name FROM chatraum WHERE Name = ?");
	$statement->execute([$name]);
	return $statement->rowCount();
}
function createChatroom($name, $thema, $ersteller, $pdo)
{
	$statement = $pdo->prepare
	("
		INSERT INTO chatraum (Name, Thema, Ersteller)
		VALUES (?, ?, ?);
	");
	$statement->execute([$name, $thema, $ersteller]);
}