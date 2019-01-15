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

      window.setTimeout('window.location = "scannForNew.php?chatid=<?php echo $_GET["chatid"]; ?>"',1000);

      function getID()
      {
        return document.getElementById("lastMesageId").innerHTML;
      }

      function getMesage()
      {
        return document.getElementById("lastMesage").innerHTML;
      }
    </script>
  </head>
  <body>

    <div id="lastMesage">
      <?php
        foreach (auslesen($pdo) as $key => $value)
        {
          // überprüft ob der Post vom angemeldeten nutzer kommt oder nicht und weist passende klasse für CSS zu


          $last = $value;
        }

        if($last->getVerfasser()==$_SESSION["NutzerID"])
        {
          echo "<div class='postOwn'>";
        }
        else
        {
          echo "<div class='postOther'>";
        }
        // gibt die eingentliche Nachricht aus
        echo "<p class='user'>";
        echo $last->getVerfasserName();
        echo "</p>";
        echo "<p class='timestamp'>";
        echo $last->getZeitpunkt();
        echo "</p>";
        echo "<p class='message'>";
        echo $last->getNachricht();
        echo "</p>";
        echo "</div>";

       ?>
     </div>

    <div id="lastMesageId"><?php echo $last->getNachrichtID(); ?></div>




  </body>
</html>
