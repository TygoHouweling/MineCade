<?php

require_once "model/DataHandler.php";

class AuthLogic
{
  public function __construct(){
    $this->DataHandler = new Datahandler("web0088.zxcs.nl", "mysql", "sderijknl_minecade", "sderijknl_minecade", "stan2022");
    $this->Display = new Display();
  }
  public function __destruct()
  {

  }

  public function readAuth($username,$password)
  {
    try {
      $sql = "SELECT * FROM `users` WHERE `username` = '{$username}' AND `password` = '{$password}'";
      $res = $this->DataHandler->readData($sql);

      if ($res ->rowCount() > 0) {
        $row = $res->fetch(PDO::FETCH_ASSOC);
        $_SESSION['currentuser'] = $row['username'];
        $_SESSION['loggedin'] = true;
        $_SESSION['currentuser'] = $row['username'];

        if ($row['user_admin'] == 1) {
          $_SESSION['user_admin'] = $row['user_admin'];
        } 
        return "<h3>U bent succesvol ingelogd</h3>";

      } else {
        $res = "Incorrecte gegevens";
      }

      return $res;

    } catch (Exception $e) {
      throw $e;
    }
  }
  public function createAuth($firstname, $lastname, $username, $password, $email)
  {
    try {
      $sql = "INSERT INTO `users` (firstname, lastname, username, password, email) "; 
      $sql .= "VALUES ('{$firstname}', '{$lastname}', '{$username}', '{$password}', '{$email}')";
      $res = $this->DataHandler->createData($sql);

      $_SESSION['currentuser'] = $username;
      $_SESSION['loggedin'] = true;

      return $res;

    } catch (Exception $e) {
      throw $e;
    }
  }
  
}


