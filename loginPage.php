<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/loginPage.css">
<script src="js/jquery.js"></script>
<script src="js/login.js"></script>
	<meta charset="UTF-8">
	<title>Chatinga - Einloggen</title>
</head>
<body>
<?php
if(isset($_SESSION["Nutzername"]))
{
	header("Location: index.php");
}
?>
	<form id="loginForm" action="loginScript.php" method="post">
		<fieldset>
			<legend>Einloggen</legend>
			<input type="text" name="username" placeholder="Benutzername">
			<input type="password" name="password" placeholder="Kennwort">
			<label><input class="customCheckbox" name="keepLoggedIn" type="checkbox">Angemeldet bleiben</label>
			<br>
			<button name='login' value='1' type="submit">Einloggen</button>
		</fieldset>
	</form>
	<form id="registerForm" action="loginScript.php" method="post">
		<fieldset>
			<legend>Registrieren</legend>
			<input type="text" name="username" placeholder="Benutzername">
			<input type="password" name="password" placeholder="Kennwort">
			<button name='register' value='1' type="submit">Registrieren</button>
		</fieldset>
	</form>
	<button type="button" name="button" id="toggelType">Registrieren</button>
</body>
</html>
