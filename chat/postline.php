<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="senden.php" method="post">
      <textarea name="Nachricht"></textarea>
      <button type="submit" name="chatid" value="<?php echo $_GET["chatid"]; ?>">Senden</button>
    </form>
  </body>
</html>
