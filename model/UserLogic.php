<?php

require_once "model/DataHandler.php";


class userLogic
{
    public function __construct(){
        $this->DataHandler = new Datahandler("web0088.zxcs.nl", "mysql", "sderijknl_minecade", "sderijknl_minecade", "stan2022");
        $this->Display = new Display();
      }

  public function __destruct(){}
  

  public function readAllusers($admin = false){

    try{
      if ($admin) {
        $sql = "SELECT users_id as id, firstname, lastname, email, username, user_admin as Admin FROM users WHERE user_admin = 1";
        $result = $this->DataHandler->readsData($sql);
      }

      $sql = "SELECT users_id as id, firstname, lastname, email, username, user_admin as Admin FROM users";
      $result = $this->DataHandler->readsData($sql);

      return $result;

  }catch (Exception $e){
      throw $e;
  }

  }


  public function readUser($id){

    try{

      $sql = "SELECT * FROM `user` WHERE user_id='{$id}'";
      $result = $this->DataHandler->readData($sql);
      $result = $result->fetch(PDO::FETCH_ASSOC);

      return $result;
      
    }catch (Exception $e){
      throw $e;
    }

  }

  public function deleteUser($id){

    try{

      $sql = "DELETE FROM `user` WHERE users_id='{$id}'";
      $result = $this->DataHandler->deleteData($sql);
      $_SESSION['success'] = "Gebruiker met ID:'{$id}' is verwijderd";

      return $result;

    }catch (Exception $e){
      throw $e;
    }

  }

  public function updateuser($id, $firstname, $lastname, $email, $street, $housenumber, $location, $zipcode){

    try{

      $sql = "UPDATE `user` SET `user_firstname`='{$firstname}', `user_lastname`='{$lastname}', `lastname`='{$email}', `user_street`='{$street}', `user_housenumber`='{$housenumber}', `user_location`='{$location}', `user_zipcode`='{$zipcode}' WHERE `user_id`='{$id}'";
      $results = $this->DataHandler->updateData($sql);
      $_SESSION['success'] = "Informatie is opgeslagen.";
      return $results;

    } catch (Exception $e){
      throw $e;
    }

  }

}
