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
	<link rel="stylesheet" type="text/css" href="../css/chat.css">
    <script src="../js/jquery.js"></script>

  </head>
  <body>
    <div id="messages">

      <?php
        $Parsedown = new Parsedown(); //für Markdown
        $Parsedown->setSafeMode(true); //damit werden HTML-Tags automatisch umgewandelt
        foreach (auslesen($pdo) as $key => $value)
        {
          // überprüft ob der Post vom angemeldeten nutzer kommt oder nicht und weist passende klasse für CSS zu
          if($value->getVerfasser()==$_SESSION["NutzerID"])
          {
            echo "<div class='postOwn'>";
          }
          else
          {
            echo "<div class='postOther'>";
          }

          // gibt die eingentliche Nachricht aus
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

          $last = $value->getNachrichtID();
        }
       ?>
       <div id="newMessages"></div>

    </div>

     <div id="scroolTo"></div>

     <iframe id="scannForNew" src="scannForNew.php?chatid=<?php echo $_GET["chatid"]; ?>&last=<?php echo $last ?>" style="display: none;"></iframe>
     <script language="javascript" type="text/javascript">
       location.href = "#scroolTo";

       window.setInterval('addNew();',1000);

       function addNew()
       {
           document.getElementById("newMessages").innerHTML= document.getElementById('scannForNew').contentWindow.getMessages();
       }
     </script>
  </body>
</html>
