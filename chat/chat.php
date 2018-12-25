<?php session_start(); ?>
<?php include "../include.php/post.php";  ?>

<?php
  $row = array('mesage' => "Test", 'user' => "hallo");
  $post[0] = new Post($row);
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
        echo $value->getUser();
        echo "</p>";
        echo "<p class='mesage'>";
        echo $value->getMesage();
        echo "</p>";
        echo "</div>";
      }
     ?>
  </body>
</html>
