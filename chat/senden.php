<?php session_start(); ?>

<?php
  if (isset($_POST["Post"])&&isset($_GET["chatid"]))
  {

  }
  else
  {
    echo "error";
  }
 ?>

 <?php if (isset($_POST["Post"])&&isset($_GET["chatid"])): ?>

   <script type="text/javascript">
     document.location.href = "postline.php&chatid=<?php echo $_GET["chatid"]; ?>";
   </script>

 <?php else: ?>

   <h1>ERROR: Chat not Found!</h1>
   <h2>Please Relode Page</h2>

 <?php endif; ?>
