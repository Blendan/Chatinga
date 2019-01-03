<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chatinga - Einloggen</title>
</head>
<body>
<?php
if(isset($_SESSION["Nutzername"]))
{
	echo "Du bist angemeldet als " . $_SESSION["Nutzername"] . ".<br>";
	echo "<a href='logoutScript.php'>Ausloggen</a><br>";
}
?>
	<form id="loginForm" action="loginScript.php" method="post">
		<fieldset>
			<legend>Einloggen</legend>
			Benutzername: <input type="text" name="username">
			Passwort: <input type="password" name="password">
			<button name='login' value='1' type="submit">Einloggen</button>
		</fieldset>
	</form>
	<form id="registerForm" action="loginScript.php" method="post">
		<fieldset>
			<legend>Registrieren</legend>
			Benutzername: <input type="text" name="username">
			Passwort: <input type="password" name="password">
			<button name='register' value='1' type="submit">Registrieren</button>
		</fieldset>
	</form>
</body>
</html>
