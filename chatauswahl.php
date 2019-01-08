<?php session_start(); ?>

<?php if (!isset($_SESSION["NutzerID"])): ?>
  <?php header("Refresh:0; url=chatauswahl.php");?>
<?php else: ?>

  <?php
    $server ="mysql:dbname=chatinga;host=localhost";
    $user="root";
    $password = "";
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
    $pdo = new PDO($server,$user,$password,$options);

    $rows = $pdo->query("SELECT * FROM chatraum");
  ?>

  <!DOCTYPE html>
  <html lang="de" dir="ltr">
    <head>
      <meta charset="utf-8">
      <title>Chatasuwahl</title>
    </head>
    <body>
      <?php
        foreach ($rows as $key => $value)
        {
          echo "<a href='mainChat.php?chatid=".$value["ChatraumID"]."'>";
          echo "<div class='chatAuswahl'>";
          echo $value["Name"];
          echo "</div>";
          echo "</a>";
        }
      ?>
    </body>
  </html>
<?php endif; ?>
