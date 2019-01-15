<?php session_start(); ?>
<?php include "post.php";  ?>
<?php include "../include.php/parsedown-1.7.1/Parsedown.php" ?>

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

      function getMessages()
      {
        window.location = "scannForNew.php?chatid=<?php echo $_GET["chatid"]; ?>&last=<?php echo $_GET["last"]; ?>";
        return document.getElementById("lastMessages").innerHTML;
      }
    </script>
  </head>
  <body>

    <div id="lastMessages">
      <?php
        $Parsedown = new Parsedown(); //für Markdown
        $Parsedown->setSafeMode(true); //damit werden HTML-Tags automatisch umgewandelt

        foreach (auslesen($pdo) as $key => $value)
        {
          if($value->getNachrichtID()>$_GET["last"])
          {
            // gibt die eingentliche Nachricht aus
            if($value->getVerfasser()==$_SESSION["NutzerID"]) // überprüft ob der Post vom angemeldeten nutzer kommt oder nicht und weist passende klasse für CSS zu
            {
              echo "<div class='postOwn'>";
            }
            else
            {
              echo "<div class='postOther'>";
            }

            echo "<p class='user'>";
            echo $value->getVerfasserName();
            echo "</p>";
            echo "<p class='timestamp'>";
            echo $value->getZeitpunkt();
            echo "</p>";
            echo "<p class='message'>";
            echo $Parsedown->text($value->getNachricht());
            echo "</p>";
            echo "</div>";
          }
        }
       ?>
     </div>
  </body>
</html>
