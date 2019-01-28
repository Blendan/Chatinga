<?php 
session_start();
if(!isset($_SESSION["Nutzername"])) //Nutzer ist nicht eingeloggt
{
	header("Location: index.php");
}
else
{
	$pdo = new PDO("mysql:host=localhost;dbname=Chatinga;charset=utf8", "root", "");
    $rows = $pdo->query("SELECT ChatraumID, Name, Thema FROM Chatraum");
}
?>

  <!DOCTYPE html>
  <html lang="de" dir="ltr">
    <head>
	<link rel="stylesheet" type="text/css" href="css/chatauswahl.css">
      <meta charset="utf-8">
      <title>Chatauswahl</title>
    </head>
    <body>
	<a id="logout" href='logoutScript.php'>Ausloggen</a>
	<a id="themeauswahl" href='chooseColorthemePage.php'>Themes</a>
		<div class="chatauswahl">
			<h1>Wähle einen Chatraum aus</h1>
			<?php foreach ($rows as $key => $value): ?>
				<a href="mainChat.php?chatid=<?= $value['ChatraumID'] ?>">
					<div class="name"><?=$value['Name'] ?><div class="thema"><?=$value['Thema'] ?></div></div>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="anlegen">
			
			<h1>Lege einen neuen Chatraum an</h1>
			<form id="anlegen" method="post" action="createChatroom.php">
				<fieldset>
					<input type="text" name="name" placeholder="Thema">
					<textarea name="thema" cols="50" rows="2" placeholder="Themenbeschreibung"></textarea>
					<button name="createChatroom" value="1" type="submit">Anlegen</button>
				</fieldset>
			</form>
		</div>
    </body>
  </html>