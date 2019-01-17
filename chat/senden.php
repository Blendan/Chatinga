<?php session_start(); ?>
<?php include "post.php";  ?>

<?php
  if (isset($_POST["Nachricht"])&&isset($_POST["chatid"]))
  {
    $row = array();
    $row["Nachricht"] = $_POST["Nachricht"];
    $row["Verfasser"]  = $_SESSION["NutzerID"];
    $row["Zeitpunkt"] = date("Y-m-d H:i");
    $row["Chatraum"] = $_POST["chatid"];

    $nachricht = new Post($row);

    echo $nachricht->addMesage();

    //print_r($row);
  }
  else
  {
    echo "error";
  }
 ?>

 <?php if (isset($_POST["Nachricht"])&&isset($_POST["chatid"])): ?>


   <script type="text/javascript">
    document.location.href = "postline.php?chatid=<?php echo $_POST["chatid"]; ?>";
   </script>

 <?php else: ?>

   <h1>ERROR: Chat not Found!</h1>
   <h2>Please Relode Page</h2>

 <?php endif; ?>
