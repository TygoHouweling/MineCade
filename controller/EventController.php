<?php
require_once 'model/EventLogic.php';
require_once 'model/AdminLogic.php';
require_once 'model/Display.php';


class EventsController
{
    public function __construct()
    {
        $this->EventsLogic = new EventsLogic();
        $this->AdminLogic = new AdminLogic();
        $this->Display = new Display();
    }
    public function __destruct()
    {
    }
    public function handleRequest()
    {
        try {

            isset($_GET['con']) === 'admin' ? $_GET['con'] : '';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {

                case 'update':
                    $this->collectUpdateEvents();
                    break;

                case 'deleterequest':
                    $this->deleteRequest();
                    break;

                case 'delete':
                    $this->collectDeleteEvent($_REQUEST['id']);
                    break;

                case 'createEvent':
                    $this->collectCreateEvents();
                    break;

                case 'read':
                    $this->collectReadEvent();
                    break;

                case 'test':
                    $this->CollectReadAllEvents();
                    break;

                case 'about':
                    $this->collectUpdateAboutPage();
                    break;
                default:
                    $this->CollectReadAllEvents();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectReadEvent()
    {

        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        $res = $this->EventsLogic->readEvents($id);
        $html = $this->Display->CreateCard($res);
        //var_dump($html);

        include 'view/admin/events/read.php';
    }

    public function CollectReadAllEvents()
    {
        $page = isset($_GET['number']) ? (int)$_GET['number'] : 1;
        $perPage = 5;
        $limit = ($page > 1) ? ($page * $perPage) - $perPage : 0;

        $res = $this->EventsLogic->readAllEvents($limit, $perPage);

        $pages = $res[0];
        //var_dump($res[1]);
        $pagination = $this->Display->PageNavigation($pages, $page);
        $events = $this->Display->createTable($res[1], true);
        include 'view/admin/events.php';
    }


    public function collectCreateEvents()
    {
        if (isset($_REQUEST['submit'])) {
            $event_name = isset($_REQUEST['event_name']) ? $_REQUEST['event_name'] : NULL;
            $event_desc = isset($_REQUEST['event_desc']) ? $_REQUEST['event_desc'] : NULL;
            $event_shortdesc = isset($_REQUEST['event_shortdesc']) ? $_REQUEST['event_shortdesc'] : NULL;
            $event_date = isset($_REQUEST['event_date']) ? $_REQUEST['event_date'] : NULL;
            $event_location = isset($_REQUEST['event_location']) ? $_REQUEST['event_location'] : NULL;
            $event_zipcode = isset($_REQUEST['event_zipcode']) ? $_REQUEST['event_zipcode'] : NULL;
            $image = $this->AdminLogic->fileUpload();
            $html = $this->AdminLogic->createEvent($event_name, $event_desc, $event_shortdesc, $event_date, $event_location, $event_zipcode, $image);
            $_SESSION['msg'] = 'Event is aangemaakt.';
            $this->CollectReadAllEvents();
        } else {
            include 'view/admin/events/create.php';
        }
    }

    public function collectUpdateEvents()
    {

        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
        if (isset($_REQUEST['submit'])) {
            $event_name = isset($_REQUEST['event_name']) ? $_REQUEST['event_name'] : NULL;
            $event_desc = isset($_REQUEST['event_desc']) ? $_REQUEST['event_desc'] : NULL;
            $event_date = isset($_REQUEST['event_date']) ? $_REQUEST['event_date'] : NULL;
            $event_location = isset($_REQUEST['event_location']) ? $_REQUEST['event_location'] : NULL;
            $event_zipcode = isset($_REQUEST['event_zipcode']) ? $_REQUEST['event_zipcode'] : NULL;
            $res = $this->EventsLogic->updateEvent($id, $event_name, $event_desc, $event_date, $event_location, $event_zipcode);
            $_SESSION['msg']='Event has been updated';
            $this->CollectReadAllEvents();
        } else {
            $html = $this->EventsLogic->readEvents($id);
            $html = $html->FetchAll(PDO::FETCH_ASSOC);
    
            include 'view/admin/events/update.php';
        }


    }

    public function deleteRequest()
    {
        include 'view/admin/CRUD/deletewarning.php';
    }

    public function collectDeleteEvent($id)
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;


        $html = $this->EventsLogic->deleteEvent($id);
        //$html = $html->fetch(PDO::FETCH_ASSOC);

        include 'view/admin/CRUD/delete.php';
    }

    public function collectUpdateAboutPage()
    {

        if (isset($_REQUEST['submit'])) {

            $this->AdminLogic->updateAboutPage();

            $_SESSION['msg'] = 'About pagina is succesvol aangepast';
            include('view/about.php');
        } else {
            $about = $this->AdminLogic->updateAboutPage();
            include('view/admin/about/update.php');
        }
    }
}
