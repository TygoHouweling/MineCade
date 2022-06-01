<?php

class HomeController {
    public function __construct() {
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            isset($_GET['con']) === 'home' ? $_GET['con'] : '';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {     

                case 'home':
                    $this->readHomeFile();
                    break;
            
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

}