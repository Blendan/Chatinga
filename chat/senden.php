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

<script type="text/javascript">
  document.location.href = "postline.php";
</script>
