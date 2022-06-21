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

                case 'signUp':
                    $this->signUp();
                    break;

                case 'signedUp':
                    $this->signedUp();
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
        $result = $this->HomeLogic->readCalendar($eventName, $eventDate, $eventLocation);
        include 'view/calendar/calendar.php';
        include 'view/calendar/calendarView.php';
    }

    public function signUp(){
        $id = isset($_REQUEST['users_id']) ? $_REQUEST['users_id'] : NULL;
        $eventID = isset($_REQUEST['event_id']) ? $_REQUEST['event_id'] : NULL;

        $html = $this->HomeLogic->signUp($id, $eventID);

        include('view/eventsignUp.php');
    } 

    public function signedUp()
    {
        if(isset($_REQUEST['confirm'])&&$_REQUEST['confirm']=='true'){

            $userID = $_SESSION['id'];
            $eventID = $_REQUEST['event_id'];

        $html = $this->HomeLogic->signedUp($userID, $eventID);

        unset($_REQUEST['submit']);
        }
        include('view/signedUp.php');
    }
}