<?php 
session_start();

if(!isset($_SESSION["Nutzername"]))
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
      <meta charset="utf-8">
      <title>Chatauswahl</title>
    </head>
    <body>
		<div class="chatauswahl">
			<h1>Wähle einen Chatraum aus</h1>
			<?php foreach ($rows as $key => $value): ?>
				<a href="mainChat.php?chatid=<?= $value['ChatraumID'] ?>">
					<span class="name"><?=$value['Name'] ?></span> - 
					<span class="thema"><?=$value['Thema'] ?></span>
				</a>
			<?php endforeach; ?>
		</div>
		<div class="anlegen">
			<h1>Lege einen neuen Chatraum an</h1>
			<form id="anlegen" action="chatraumAnlegen.php">
				<fieldset>
					<label>Name <input type="text" name="Name"></label>
					<label>Thema <textarea name="Thema" cols="50" rows="2"></textarea>
					<button type="submit">Anlegen</button>
				</fieldset>
			</form>
		</div>
    </body>
  </html>
