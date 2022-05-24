<?php

require_once "model/DataHandler.php";


class ContactsLogic
{
  public function __construct(){
    $this->DataHandler = new Datahandler("web0088.zxcs.nl", "mysql", "sderijknl_minecade", "sderijknl", "vMVZEZsH2F");
    $this->Display = new Display();
  }
  public function __destruct(){}
  
  public function createContact(){

    try {
      
    } catch (Exception $e) {
  throw $e;
}

  }

  public function readContacts(){

    try {
      
    } catch (Exception $e) {
  throw $e;
}

  }

  public function readallContacts(){

    try {
      
    } catch (Exception $e) {
  throw $e;
}

  }

  public function updateContact(){

    try {
      
    } catch (Exception $e) {
  throw $e;
}

  }

  public function deleteContact(){

    try {
      
    } catch (Exception $e) {
  throw $e;
}

  }
}
