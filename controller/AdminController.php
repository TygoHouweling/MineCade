<?php
require_once 'model/Display.php';

class AdminController {
    public function __construct() {
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            isset($_GET['con']) === 'admin' ? $_GET['con'] : '';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {     

                case '':
                    //$this->NameController->handleRequest();
                    break;
            
                default:
                    $this->readAllProducts();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

}