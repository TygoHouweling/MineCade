<?php

require_once "model/DataHandler.php";


class AdminLogic
{
  public function __construct(){
    $this->DataHandler = new Datahandler("localhost", "mysql", "minecade", "root", "");
  }
  public function __destruct(){}
  
  public function createEvent($event_name, $event_desc, $event_date, $event_location, $event_zipcode){
    try {

        $sql = "INSERT INTO `events`(`event_name`, `event_desc`, `event_date`, `event_location`, `event_zipcode`) VALUES ('{$event_name}', '{$event_desc}', '{$event_date}', '{$event_location}', '{$event_zipcode}')";
        $html = $this->DataHandler->createData($sql);
        return $html; 

    } catch (Exception $e) {
    throw $e;
    }
  }
}

  