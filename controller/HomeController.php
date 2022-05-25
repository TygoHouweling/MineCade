<?php

class HomeController {
    public function __construct() {
    }
    public function __destruct() {}
    public function handleRequest() {
        try{


            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'about':
                    $this->readAboutFile();
                default:
                    $this->readHomeFile();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }
        public function readHomeFile(){
            include 'view/home.php';
        }

        public function readAboutFile(){
            include('view/about.php');
        }
}