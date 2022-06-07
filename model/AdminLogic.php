<?php

require_once "model/DataHandler.php";


class AdminLogic
{
  public function __construct()
  {
    $this->DataHandler = new Datahandler("web0088.zxcs.nl", "mysql", "sderijknl_minecade", "sderijknl_minecade", "stan2022");
  }
  public function __destruct()
  {
  }

  public function createEvent($event_name, $event_desc,$event_shortdesc, $event_date, $event_location, $event_zipcode,$event_image)
  {
    try {

      $sql = "INSERT INTO `events`(`event_name`, `event_desc`,`event_shortdesc`, `event_date`, `event_location`, `event_zipcode`,`event_image`) VALUES ('{$event_name}', '{$event_desc}','{$event_shortdesc}', '{$event_date}', '{$event_location}', '{$event_zipcode}','{$event_image}')";
      $html = $this->DataHandler->createData($sql);
      return $html;
    } catch (Exception $e) {
      throw $e;
    }
  }

  public function fileUpload()
  {
    $randomhash = md5(date('YmdFhms'));
    $target_dir = "view/assets/images/uploaded_Images/";
    // die(var_dump($_FILES['image']));
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
    $image = $randomhash.".".$imageFileType;
    $target_file = $target_dir . basename($image);
    $uploadOk = 1;

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["image"]["tmp_name"]);
      if($check !== false) {
        $uploadOk = 1;
      } else {
        $msg = "File is not an image.";
        $uploadOk = 0;
        $_SESSION['error']=true;
        return $msg;
      }
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      $msg = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
      $_SESSION['error']=true;
      return $msg;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      $msg = "Sorry, your file was not uploaded.";
      $_SESSION['error']=true;
      return $msg;
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        $msg = "Avatar has been uploaded.";
      } else {
        $msg = "Sorry, there was an error uploading your file.";
        $_SESSION['error']=true;
        return $msg;
      }
    }
      return $image;
  }
}
