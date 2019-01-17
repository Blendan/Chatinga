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
					<label>Name <input type="text" name="name"></label>
					<label>Thema <textarea name="thema" cols="50" rows="2"></textarea>
					<button name="createChatroom" value="1" type="submit">Anlegen</button>
				</fieldset>
			</form>
		</div>
    </body>
  </html>
