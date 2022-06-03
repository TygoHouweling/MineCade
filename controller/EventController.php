<?php
require_once 'model/EventLogic.php';
require_once 'model/Display.php';


class AdminController {
    public function __construct() {
        $this->EventLogic = new AdminLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{

            isset($_GET['con']) === 'admin' ? $_GET['con'] : '';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {     

                case 'create':
                    $this->CreateEvents();
                    break;

                case 'read':
                    $this->CollectReadAllEvents();
                    break;
            
                default:
                    $this->CollectReadAllEvents();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function CollectReadAllEvents()
    {
        $page = isset($_GET['number']) ? (int)$_GET['number'] : 1;      
        $perPage = 5;
        $limit = ($page > 1) ? ($page * $perPage) - $perPage : 0;

        $res = $this->EventLogic->readAllEvents($limit,$perPage);

        $pages = $res[0];
        $nav = $this->Display->PageNavigation($pages,$page);
        
        $events = $this->Display->createTable($res[1], true);
    
        include 'view/admin/events/read.php';
    }


    public function collectCreateEvents() {
        $event_name = isset($_REQUEST['event_name']) ? $_REQUEST['event_name'] : NULL;
        $event_desc = isset($_REQUEST['event_desc']) ? $_REQUEST['event_desc'] : NULL;
        $event_date = isset($_REQUEST['event_date']) ? $_REQUEST['event_date'] : NULL;
        $event_location = isset($_REQUEST['event_location']) ? $_REQUEST['event_location'] : NULL;
        $event_zipcode = isset($_REQUEST['event_zipcode']) ? $_REQUEST['event_zipcode'] : NULL;

        $already_send = isset($already_send)?$already_send:false;
        if($already_send==true){

        } else {
            if(isset($_POST['submit'])) {
                $html = $this->AdminLogic->createEvent($event_name, $event_desc, $event_date, $event_location, $event_zipcode);
                $_SESSION['msg']='Event is aangemaakt.';
                $already_send = true;
            }
        }

        $already_send=false;

        include 'view/admin/events/create.php';
    }

}