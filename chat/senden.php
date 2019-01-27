<?php session_start(); ?>
<?php include "post.php";  ?>

<?php
  if (isset($_POST["Nachricht"])&&isset($_POST["chatid"])&&isset($_SESSION["NutzerID"])) // überprüfung ob alle daten gesendet wurden oder vorhanden sind
  {
    $row = array();
    $row["Nachricht"] = $_POST["Nachricht"];
    $row["Verfasser"]  = $_SESSION["NutzerID"];
    $row["Zeitpunkt"] = date("Y-m-d H:i");
    $row["Chatraum"] = $_POST["chatid"];

    $nachricht = new Post($row);

    echo $nachricht->addMesage(); //nachricht in DB schreiben

    print_r($row);
  }
  else
  {
    echo "error";
  }
 ?>

 <?php if (isset($_POST["Nachricht"])&&isset($_POST["chatid"])): ?>


   <script type="text/javascript">
    document.location.href = "postline.php?chatid=<?php echo $_POST["chatid"]; ?>"; // zurück zur postline damit weitere posts gesendet werden können
   </script>

 <?php else: ?>

   <h1>ERROR 404: Stuff not Found</h1>
   <h2>Please Relode Page</h2>

 <?php endif; ?>
