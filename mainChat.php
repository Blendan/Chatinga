<?php if (isset($_GET["chatid"])): ?>
  <!DOCTYPE html>
  <html lang="de" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title></title>
    </head>
    <body>
      <iframe src="chat/chat.php?<?php echo $_GET["chatid"]; ?>" width="300px" height="300px"></iframe>
      <iframe src="chat/postline.php?<?php echo $_GET["chatid"]; ?>" width="300px" height="300px"></iframe>
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
