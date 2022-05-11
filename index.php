<?php
if (!isset($_SESSION)) {
    session_start();
  }

require_once 'controller/HomeController.php';

$controller = new HomeController();
$controller->handleRequest();


