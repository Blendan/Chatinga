<?php session_start(); ?>
<?php include "post.php";  ?>

<?php
  $server ="mysql:dbname=chatinga;host=localhost";
  $user="root";
  $password = "";
  $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
  $pdo = new PDO($server,$user,$password,$options);

  function auslesen($pdo)
  {
    $post = array();



    try
    {
      $rows = $pdo->query("SELECT * FROM nachricht WHERE Chatraum = ".$_GET["chatid"]);

      foreach ($rows as $key => $row)
      {
        $post[]  = new Post($row);
      }
    }
    catch (\Exception $e)
    {
      die("Insert ERROR:".$e->getMesage());
    }

    return $post;
  }
?>

<!DOCTYPE html>
<html lang="de" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <script language="javascript" type="text/javascript">
      location.href = "#scroolTo";

      window.setTimeout('window.location = "chat.php?chatid=<?php echo $_GET["chatid"]; ?>"',1000);
    </script>
  </head>
  <body>
    <?php if (isset($_GET["scroll"])): ?>
      <?php echo $_GET["scroll"]; ?>
    <?php endif; ?>
    <?php
      foreach (auslesen($pdo) as $key => $value)
      {
        echo "<div class='post'>";
        echo "<p class='user'>";
        echo $value->getVerfasserName();
        echo "</p>";
        echo "<p class='mesage'>";
        echo $value->getNachricht();
        echo "</p>";
        echo "</div>";

        $last = $value->getNachrichtID();
      }
     ?>
     <div id="scroolTo"></div>

  </body>
</html>
