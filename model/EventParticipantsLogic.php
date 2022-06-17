<?php

require_once "model/DataHandler.php";


class EventParticipantsLogic
{
  public function __construct(){
    $this->DataHandler = new Datahandler("web0088.zxcs.nl", "mysql", "sderijknl_minecade", "sderijknl_minecade", "stan2022");
  }
  public function __destruct(){}
  
  public function collectReadAllParticipants($userID, $eventID){
    try {

        $sql = "INSERT INTO `event_users`(`userID`, ) VALUES ('{$userID}', '{$eventID}')";
        $html = $this->DataHandler->createData($sql);
        $html = $html->FetchAll(PDO::FETCH_ASSOC);
        return $html; 

    } catch (Exception $e) {
    throw $e;
    }
  }

  public function readParticipants($id)
  {
    try {
      $sql = "SELECT * FROM event_users WHERE `userID`='{$id}'";
      $res = $this->DataHandler->readData($sql);
  
      return $res;
      var_dump($res);
    } catch (Exception $e){
      throw $e;
    }

  }

  public function readAllParticipants($limit, $perPage)
  {
    try {
      $sql = "SELECT FOUND_ROWS() as total FROM event_users";
      $res1 = $this->DataHandler->countPages($sql, $perPage);

      $sql = "SELECT userID as id, eventID FROM event_users LIMIT $limit, $perPage";
      $res2 = $this->DataHandler->readsData($sql);

      $res2 = $res2->FetchAll(PDO::FETCH_ASSOC);
      $array = [$res1, $res2];
      return $array;


    } catch (Exception $e) {
      throw $e;
      }

  }

  public function deleteParticipant($id)
  {
    try{

      $sql = "DELETE FROM `event_users` WHERE `eventID`='{$id}'";
      $result = $this->DataHandler->deleteData($sql);
      return $result;

    }catch(Exception $e){
      throw $e;
    }
  }
}

  
?>