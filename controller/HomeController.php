<?php
require_once 'model/Display.php';
require_once 'model/HomeLogic.php';
require_once 'model/AdminLogic.php';

class HomeController
{
    public function __construct()
    {
        $this->Display = new Display();
        $this->HomeLogic = new HomeLogic();
        $this->AdminLogic = new AdminLogic();
    }
    public function __destruct()
    { 
    }
    public function handleRequest()
    {
        try {

            isset($_GET['con']) === 'home' ? $_GET['con'] : '';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'about':
                    $this->readAboutFile();
                    break;
                case 'calendar':
                    $this->readCalendar();
                    break;
                default:
                    $this->readHomeFile();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
    public function readHomeFile()
    {
        //input sql command
        $sql = "SELECT `event_id`,`event_name`,`event_date`,`event_image`,`event_desc`, `event_shortdesc` FROM `events` ORDER BY `event_date`";
        $result = $this->HomeLogic->getearliestEvents($sql);
        $result = $this->Display->limit_date(6, $result);
        include 'view/home.php';
    }

    public function readAboutFile()
    {
        $about = $this->AdminLogic->updateAboutPage();
        include('view/about.php');
    }

    public function readCalendar()
    {
        $eventName = isset($_REQUEST['event_name']) ? $_REQUEST['event_name'] : NULL;
        $eventDate = isset($_REQUEST['event_date']) ? $_REQUEST['event_date'] : NULL;
        $eventLocation = isset($_REQUEST['event_location']) ? $_REQUEST['event_location'] : NULL;
        $html = $this->HomeLogic->readCalendar($eventName, $eventDate, $eventLocation);
        include 'view/calendar/calendarView.php';
    }
}
