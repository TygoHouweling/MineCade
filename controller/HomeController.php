<?php
require_once 'model/Display.php';
require_once 'model/HomeLogic.php';

class HomeController {
    public function __construct() {
        $this->Display = new Display();
        $this->HomeLogic = new HomeLogic();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            isset($_GET['con']) === 'home' ? $_GET['con'] : '';

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
            //input sql command
            $sql = "SELECT `event_id`,`event_name`,`event_date`,`event_image`,`event_desc`, `event_shortdesc` FROM `events` ORDER BY `event_date`";
            $result = $this->HomeLogic->getearliestEvents($sql);
            $result = $this->Display->limit_date(6,$result);
            include 'view/home.php';
        }

        public function readAboutFile(){
            include('view/about.php');
        }
}