<?php
require_once 'controller/AuthController.php';
require_once 'controller/HomeController.php';
require_once 'controller/EventController.php';
require_once 'model/Display.php';

class MainController
{
    public function __construct()
    {
        $this->AuthController = new AuthController();
        $this->HomeController = new HomeController();
        $this->EventController = new EventController();
        $this->Display = new Display();
    }
    public function __destruct()
    {
    }
    public function handleRequest()
    {
        try {
            $controller = isset($_GET['con']) ? $_GET['con'] : '';

            switch ($controller) {
                case 'home':
                    $this->HomeController->handleRequest();
                    break;

                case 'auth':
                    $this->AuthController->handleRequest();
                    break;

                case 'admin';
                    $this->EventController->handleRequest();
                    break;

                default:
                    $this->HomeController->handleRequest();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectReadJSON($file){
        return $this->Display->readJSON($file);
    }
}
