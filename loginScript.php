<?php
/* Genutzte Resourcen:
 * Session-Lifetime, erster User-Beitrag: http://php.net/manual/de/function.session-set-cookie-params.php
 */
if(isset($_POST["keepLoggedIn"]))
{
	//Setze die Lebensdauer des Session Cookies auf 30 Tage
	$cookieLifetime = 30 * 86400;
}

session_start();
include "include.php\loginFunctions.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chatinga - Einloggen</title>
</head>
<body>
	<p id="status">
<?php
if(isset($_POST['login']))	//Seite wurde vom login-formular aufgerufen
{
	$pdo = new PDO("mysql:host=localhost;dbname=Chatinga;charset=utf8", "root", "");

	if(userExists($_POST["username"], $pdo))
	{
		$dbPassword = retrievePassword($_POST["username"], $pdo);

		if(password_verify($_POST["password"], $dbPassword))
		{
			//vorher angemeldeten Nutzer auf offline setzen
			if(isset($_SESSION["Nutzername"]))
			{
				setOffline($_SESSION["Nutzername"], $pdo);
				session_unset();
			}

			//Session Variable füllen
			$dbUser = retrieveUser($_POST["username"], $pdo);

			$_SESSION["Nutzername"] = $dbUser["Nutzername"];
			$_SESSION["gewaehltesThema"] = $dbUser["gewaehltesThema"];
			$_SESSION["NutzerID"] = $dbUser["NutzerID"];
			if(isset($_POST["keepLoggedIn"]))
			{
				setcookie(session_name(),session_id(),time()+$cookieLifetime);
			}

			setOnline($_SESSION["Nutzername"], $pdo);

			header("Refresh:2; url=chatauswahl.php");
			echo "Login erfolgreich! Du wirst gleich weitergeleitet.";
		}
		else
		{
			header("Refresh:2; url=loginPage.php");
			echo "Login fehlgeschlagen: Passwort inkorrekt.";
		}
	}
	else
	{
		header("Refresh:2; url=loginPage.php");
		echo "Login fehlgeschlagen: Nutzer exisitiert nicht.";
	}
}
elseif(isset($_POST['register'])) //Seite wurde vom Registrier-formular aufgerufen
{
	//TODO
	//checke, dass nutzername nicht schon vorhanden
	//schreibe neue Daten
	
	header("Refresh:2; url=loginPage.php");
	echo "Registrieren funktioniert noch nicht.";
}
else //Seite wurde anderweitig (manuell) aufgerufen
{
	header("Location: loginPage.php");
}
?>
	</p>
</body>
</html>
