<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
 <link rel="stylesheet" type="text/css" href="../css/postline.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="senden.php" method="post">
      <textarea name="Nachricht"></textarea>
      <button type="submit" name="chatid" value="<?php echo $_GET["chatid"]; ?>"> &#11166; </button> <!-- sendet die Posts -->
    </form>
  </body>
</html>
