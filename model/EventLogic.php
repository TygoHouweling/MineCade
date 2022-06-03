<?php

require_once "model/DataHandler.php";


class AdminLogic
{
  public function __construct(){
    $this->DataHandler = new Datahandler("web0088.zxcs.nl", "mysql", "sderijknl_minecade", "sderijknl_minecade", "stan2022");
  }
  public function __destruct(){}
  
  public function collectReadAllEvents($event_name, $event_desc, $event_date, $event_location, $event_zipcode){
    try {

        $sql = "INSERT INTO `events`(`event_name`, `event_desc`, `event_date`, `event_location`, `event_zipcode`) VALUES ('{$event_name}', '{$event_desc}', '{$event_date}', '{$event_location}', '{$event_zipcode}')";
        $html = $this->DataHandler->createData($sql);
        return $html; 

    } catch (Exception $e) {
    throw $e;
    }
  }

  public function readEvents()
  {
    $sql = "SELECT * FROM events";
    $res = $this->DataHandler->readData($sql);

    return $res;
  }

  public function readAllEvents($limit, $perPage)
  {
    try {
      $sql = "SELECT FOUND_ROWS() as total FROM events";
      $res1 = $this->DataHandler->countPages($sql, $perPage);

      $sql = "SELECT event_id, event_name, event_date, event_desc, event_location, event_zipcode FROM events LIMIT $limit, $perPage";
      $res2 = $this->DataHandler->readsData($sql);

      $res2 = $res2->FetchAll(PDO::FETCH_ASSOC);
      $array = [$res1, $res2];
      return $array;


    } catch (Exception $e) {
      throw $e;
      }

  }
}

  