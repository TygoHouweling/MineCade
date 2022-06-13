<?php

require_once "model/DataHandler.php";


class UsersLogic
{
  public function __construct(){
    $this->DataHandler = new Datahandler("web0088.zxcs.nl", "mysql", "sderijknl_minecade", "sderijknl_minecade", "stan2022");
  }
  public function __destruct(){}
  
  public function collectReadAllUsers($firstname, $lastname, $email, $username){
    try {

        $sql = "INSERT INTO `users`(`firstname`, `lastname`, `email`, `username`) VALUES ('{$firstname}', '{$lastname}', '{$email}', '{$username}')";
        $html = $this->DataHandler->createData($sql);
        $html = $html->FetchAll(PDO::FETCH_ASSOC);
        return $html; 

    } catch (Exception $e) {
    throw $e;
    }
  }

  public function readUsers($id)
  {
    try {
      $sql = "SELECT * FROM users WHERE `users_id`='{$id}'";
      $res = $this->DataHandler->readData($sql);
  
      return $res;
      var_dump($res);
    } catch (Exception $e){
      throw $e;
    }

  }

  public function readAllEvents($limit, $perPage)
  {
    try {
      $sql = "SELECT FOUND_ROWS() as total FROM users";
      $res1 = $this->DataHandler->countPages($sql, $perPage);

      $sql = "SELECT users_id as id, firstname, lastname, email, username FROM events LIMIT $limit, $perPage";
      $res2 = $this->DataHandler->readsData($sql);

      $res2 = $res2->FetchAll(PDO::FETCH_ASSOC);
      $array = [$res1, $res2];
      return $array;


    } catch (Exception $e) {
      throw $e;
      }

  }

  public function updateEvent($id, $firstname, $lastname, $email, $username) {

    try{

      // if($event_image != ""){
      //   $image = $this->FileUpload->ImageUpload($_FILES['file']['name']);
      // }else{
      //   $sql = "SELECT event_image FROM `events` WHERE `event_id`='{$id}'";
      //   $result = $this->DataHandler->readData($sql);
      //   $row = $result->fetch(PDO::FETCH_ASSOC);
      //   $image = $row['event_image'];
      // }

      $sql = "UPDATE `users` SET `firstname`='{$firstname}', `lastname`='{$lastname}', `email`='{$email}', `username`='{$username}' WHERE `users_id`='{$id}'";
      $results = $this->DataHandler->updateData($sql);
      return $results;

    } catch (Exception $e){
      throw $e;
    }
  }

  public function deleteEvent($id)
  {
    try{

      $sql = "DELETE FROM `events` WHERE `event_id`='{$id}'";
      $result = $this->DataHandler->deleteData($sql);
      return $result;

    }catch(Exception $e){
      throw $e;
    }
  }
}

  
?>