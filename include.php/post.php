<?php
  class Post
  {
    private $mesage = "ERROR: 404! Mesage not Found";
    private $user = "ERROR: 404! User not Found";

    function __construct($row)
    {
      $this->mesage = $row["mesage"];
      $this->user = $row["user"];
    }

    public function getMesage()
    {
      return $this->mesage;
    }

    public function getUser()
    {
      return $this->user;
    }
  }
 ?>
