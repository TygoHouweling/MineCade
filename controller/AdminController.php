<?php
require_once 'model/AdminLogic.php';
require_once 'model/Display.php';


class AdminController {
    public function __construct() {
        $this->AdminLogic = new AdminLogic();
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

                    case 'events':
                        $this->collectCreateEvents();
                    break;
            
                default:
                    $this->readAllProducts();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectCreateEvents() {
        $event_name = isset($_REQUEST['event_name']) ? $_REQUEST['event_name'] : NULL;
        $event_desc = isset($_REQUEST['event_desc']) ? $_REQUEST['event_desc'] : NULL;
        $event_date = isset($_REQUEST['event_date']) ? $_REQUEST['event_date'] : NULL;
        $event_location = isset($_REQUEST['event_location']) ? $_REQUEST['event_location'] : NULL;
        $event_zipcode = isset($_REQUEST['event_zipcode']) ? $_REQUEST['event_zipcode'] : NULL;

        if(isset($_POST['submit'])) {
            $html = $this->AdminLogic->createEvent($event_name, $event_desc, $event_date, $event_location, $event_zipcode);
        }

        include 'view/admin/events/events.php';
    }

}