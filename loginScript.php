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
<link rel="stylesheet" type="text/css" href="css/loginScript.css">
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
	$pdo = new PDO("mysql:host=localhost;dbname=Chatinga;charset=utf8", "root", "");

	if(userExists($_POST["username"], $pdo))
	{
		header("Refresh:2; url=loginPage.php");
		echo "Ein User mit diesem Namen existiert bereits.";
	}
	elseif($_POST["username"] == "" || $_POST["password"] == "")
	{
		header("Refresh:2; url=loginPage.php");
		echo "Bitte einen Nutzernamen und ein Passwort eingeben.";
	}
	else
	{
		createUser($_POST["username"], $_POST["password"], $pdo);
		header("Refresh:2; url=loginPage.php");
		echo "Registrieren erfolgeich! Du wirst gleich weitergeleitet.";
	}
}
else //Seite wurde anderweitig (manuell) aufgerufen
{
	header("Location: loginPage.php");
}
?>
	</p>
</body>
</html>
