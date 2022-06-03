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

<<<<<<< Updated upstream
                case '':
                    //$this->NameController->handleRequest();
                    break;

                case 'read':
                    $this->CollectReadEvent($_REQUEST['event_id']);
                    break;

                case 'update':
                    $this->CollectUpdateEvents();
=======
                case 'update':
                    $this->collectUpdateEvents();
                    break;

                case 'deleterequest':
                    $this->deleteRequest();
                    break;
                    
                case 'delete':
                    $this->collectDeleteEvent($_REQUEST['id']);
                    break;

                case 'create':
                    $this->collectCreateEvents();
                    break;

                case 'read':
                    $this->collectReadEvent();
>>>>>>> Stashed changes
                    break;
            
                default:
                    $this->readAllEvents();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }

<<<<<<< Updated upstream
    public function CollectReadEvent() 
    {
=======
    public function collectReadEvent(){

>>>>>>> Stashed changes
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        $res = $this->EventLogic->readEvents($id);
        $html = $this->Display->CreateCard($res);
<<<<<<< Updated upstream

=======
    
>>>>>>> Stashed changes
        include 'view/admin/events/read.php';
    }

    public function CollectReadAllEvents()
    {
        $page = isset($_GET['number']) ? (int)$_GET['number'] : 1;      
        $perPage = 5;
        $limit = ($page > 1) ? ($page * $perPage) - $perPage : 0;

        $res = $this->EventLogic->readAllEvents($limit,$perPage);

        $pages = $res[0];
        $pagination = $this->Display->PageNavigation($pages,$page);
<<<<<<< Updated upstream
        
=======
>>>>>>> Stashed changes
        $events = $this->Display->createTable($res[1], true);
    
        include 'view/admin/events.php';
    }


    public function collectCreateEvents() {
        $event_name = isset($_REQUEST['event_name']) ? $_REQUEST['event_name'] : NULL;
        $event_desc = isset($_REQUEST['event_desc']) ? $_REQUEST['event_desc'] : NULL;
        $event_shortdesc = isset($_REQUEST['event_shortdesc']) ? $_REQUEST['event_shortdesc'] : NULL;
        $event_date = isset($_REQUEST['event_date']) ? $_REQUEST['event_date'] : NULL;
        $event_location = isset($_REQUEST['event_location']) ? $_REQUEST['event_location'] : NULL;
        $event_zipcode = isset($_REQUEST['event_zipcode']) ? $_REQUEST['event_zipcode'] : NULL;
        $event_zipcode = isset($_REQUEST['image']) ? $_REQUEST['image'] : NULL;

        $already_send = isset($already_send)?$already_send:false;
        if($already_send==true){

        } else {
<<<<<<< Updated upstream
            if(isset($_POST['submit'])) {
                $image = $this->AdminLogic->fileUpload();
                $html = $this->AdminLogic->createEvent($event_name, $event_desc, $event_shortdesc, $event_date, $event_location, $event_zipcode,$image);
=======
            if(isset($_REQUEST['submit'])) {
                $html = $this->AdminLogic->createEvent($event_name, $event_desc, $event_date, $event_location, $event_zipcode);
>>>>>>> Stashed changes
                $_SESSION['msg']='Event is aangemaakt.';
                $already_send = true;
            }
        }

        $already_send=false;

        include 'view/admin/events/create.php';
    }

<<<<<<< Updated upstream
    public function CollectUpdateEvents()
    {
        $id = isset($_REQUEST['event_id']) ? $_REQUEST['event_id'] :null;
=======
    public function collectUpdateEvents()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] :null;
>>>>>>> Stashed changes
        $event_name = isset($_REQUEST['event_name']) ? $_REQUEST['event_name'] : NULL;
        $event_desc = isset($_REQUEST['event_desc']) ? $_REQUEST['event_desc'] : NULL;
        $event_date = isset($_REQUEST['event_date']) ? $_REQUEST['event_date'] : NULL;
        $event_location = isset($_REQUEST['event_location']) ? $_REQUEST['event_location'] : NULL;
        $event_zipcode = isset($_REQUEST['event_zipcode']) ? $_REQUEST['event_zipcode'] : NULL;

<<<<<<< Updated upstream
        if (isset($_POST['updateSubmit'])) {
=======
        if (isset($_REQUEST['updateSubmit'])) {
>>>>>>> Stashed changes
                
            $res = $this->EventLogic->updateEvent($id, $event_name, $event_desc, $event_date, $event_location, $event_zipcode);
            $html = $this->EventLogic->readEvents($id);   
            $html = $this->Display->CreateCard($html);
<<<<<<< Updated upstream
        
=======
>>>>>>> Stashed changes
        }

        $html = $this->EventLogic->readEvents($id);
        $html = $html->fetch(PDO::FETCH_ASSOC);

        include 'view/admin/events/update.php';
    }

<<<<<<< Updated upstream
=======
    public function deleteRequest()
    {
        include 'view/admin/events/deletewarning.php';
    }

    public function collectDeleteEvent($id)
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] :null;
    

        $html = $this->EventLogic->deleteEvent($id);
        //$html = $html->fetch(PDO::FETCH_ASSOC);

        include 'view/admin/events/deleteconfirm.php';
    }

>>>>>>> Stashed changes
}