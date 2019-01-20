<?php session_start(); ?>

<?php if (isset($_GET["chatid"])): ?>
  <!DOCTYPE html>
  <html lang="de" dir="ltr">
    <head>
<link rel="stylesheet" type="text/css" href="css/mainChat.css">
      <meta charset="utf-8">
      <title></title>
	  <a id="logout" href='logoutScript.php'>Ausloggen</a>
	  <a id="chatauswahl" href='chatauswahl.php'>Zur Chatauswahl</a>
    </head>
    <body>
	<div id="chatFenster">
      <iframe class="chat" src="chat/chat.php?chatid=<?php echo $_GET["chatid"]; ?>" width="100%" height="85%"></iframe>
      <iframe class="chatsenden" src="chat/postline.php?chatid=<?php echo $_GET["chatid"]; ?>" width="100%" height="20%" scrolling="no" style="float:right"></iframe>
	  </div>
    </body>
  </html>
<?php else: ?>
  <!DOCTYPE html>
  <html lang="de" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <h1>ERROR 404: Chat not Found!</h1>
    </body>
  </html>
<?php endif; ?>
