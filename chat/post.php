<?php
  class Post
  {
    private $Nachricht = "ERROR: 404! Mesage not Found";
    private $NachrichtID = "ERROR: 404! MesageID not Found";
    private $Verfasser = "ERROR: 404! User not Found";
    private $Zeitpunkt = "ERROR: 404! Timestamp not Found";
    private $Chat = "ERROR: 404! Chat not Found";

    function __construct($row)
    {
      if(isset($row["NachrichtID"]))
      {
        $this->NachrichtID = $row["NachrichtID"];
      }
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

      $stadement = $pdo->prepare("INSERT INTO `nachricht` (`NachrichtID`, `Verfasser`, `Nachricht`, `Zeitpunkt`, `Chat`) VALUES (NULL,:Verfasser,:Nachricht,:Zeitpunkt,:Chat)");

      try
      {
        $stadement->execute($newMesage);
      }
      catch (PDOException $e)
      {
        return "Insert ERROR:".$e->getNachricht();
      }


    }

    public function getNachricht()
    {
      return $this->Nachricht;
    }

    public function getNachrichtID()
    {
      return $this->NachrichtID;
    }

    public function getVerfasser()
    {
      return $this->Verfasser;
    }

    public function getVerfasserName()
    {
      $server ="mysql:dbname=chatinga;host=localhost";
      $user="root";
      $password = "";
      $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
      $pdo = new PDO($server,$user,$password,$options);

      try
      {
        $row = $pdo->query("SELECT n.Nutzername FROM nutzer n WHERE NutzerID = ".$this->getVerfasser());
        return $row->fetchColumn();
      }
      catch (PDOException $e)
      {
        return "Insert ERROR:".$e->getNachricht();
      }
    }

    public function getZeitpunkt()
    {
      return $this->Zeitpunkt;
    }
  }
 ?>
