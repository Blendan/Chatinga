<?php session_start(); ?>
<?php include "../include.php/post.php";  ?>

<?php
  $post = array();

  $server ="mysql:dbname=chatinga;host=localhost";
  $user="root";
  $password = "";
  $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
  $pdo = new PDO($server,$user,$password,$options);

  $i = 0;
  try
  {
    $rows = $pdo->query("SELECT * FROM nachricht WHERE Chat = ".$_GET["chatid"]);

    foreach ($rows as $key => $row)
    {
      $post[$i]  = new Post($row);
    }
  }
  catch (\Exception $e)
  {
    die("Insert ERROR:".$e->getMesage());
  }
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
      foreach ($post as $key => $value)
      {
        echo "<div class='post'>";
        echo "<p class='user'>";
        echo $value->getVerfasser();
        echo "</p>";
        echo "<p class='mesage'>";
        echo $value->getNachricht();
        echo "</p>";
        echo "</div>";
      }
     ?>
  </body>
</html>
