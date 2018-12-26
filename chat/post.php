<?php
  class Post
  {
    private $Nachricht = "ERROR: 404! Mesage not Found";
    private $Verfasser = "ERROR: 404! User not Found";
    private $Zeitpunkt = "ERROR: 404! Timestamp not Found";
    private $Chat = "ERROR: 404! Chat not Found";

    function __construct($row)
    {
      $this->Nachricht = $row["Nachricht"];
      $this->Verfasser = $row["Verfasser"];
      $this->Zeitpunkt = $row["Zeitpunkt"];
      $this->Chat = $row["Chat"];
    }

    public function addMesage()
    {
      $server ="mysql:dbname=chatinga;host=localhost";
      $user="root";
      $password = "";
      $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
      $pdo = new PDO($server,$user,$password,$options);

      $newMesage = array();
      $newMesage["Verfasser"] = $this->Verfasser;
      $newMesage["Nachricht"] = $this->Nachricht;
      $newMesage["Zeitpunkt"] = $this->Zeitpunkt;
      $newMesage["Chat"] = $this->Chat;

      $stadement = $pdo->prepare("INSERT INTO `nachricht` ('Verfasser','Nachricht','Zeitpunkt','Chat') VLAUES (:Verfasser,:Nachricht,:Zeitpunkt,:Chat)");

      try
      {
        $stadement->execute($newMesage);
      }
      catch (PDOException $e)
      {
        die("Insert ERROR:".$e->getMesage());
      }


    }

    public function getMesage()
    {
      return $this->Nachricht;
    }

    public function getVerfasser()
    {
      return $this->Verfasser;
    }

    public function getZeitpunkt()
    {
      return $this->Zeitpunkt;
    }
  }
 ?>
