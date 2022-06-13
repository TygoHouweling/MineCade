<?php
require_once 'model/UsersLogic.php';
require_once 'model/AdminLogic.php';
require_once 'model/Display.php';


class UsersController
{
    public function __construct()
    {
        $this->UsersLogic = new UsersLogic();
        $this->AdminLogic = new AdminLogic();
        $this->Display = new Display();
    }
    public function __destruct()
    {
    }
    public function handleRequest()
    {
        try {

            isset($_GET['con']) === 'users' ? $_GET['con'] : '';

            $op = isset($_GET['op']) ? $_GET['op'] : '';

            switch ($op) {
                case 'read':
                    $this->collectReadUser();
                    break;

                default:
                    $this->CollectReadAllUsers();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectReadUsers()
    {

        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        $res = $this->UsersLogic->readUser($id);
        $html = $this->Display->CreateCard($res);
        //var_dump($html);

        include 'view/admin/users/read.php';
    }

    public function CollectReadAllUsers()
    {
        $page = isset($_GET['number']) ? (int)$_GET['number'] : 1;
        $perPage = 5;
        $limit = ($page > 1) ? ($page * $perPage) - $perPage : 0;

        $res = $this->UsersLogic->readAllUsers($limit, $perPage);

        $pages = $res[0];
        //var_dump($res[1]);
        $pagination = $this->Display->PageNavigation($pages, $page);
        $users = $this->Display->createTable($res[1], true);
        include 'view/admin/users.php';
    }


    // public function collectCreateUsers()
    // {
    //     $event_name = isset($_REQUEST['event_name']) ? $_REQUEST['event_name'] : NULL;
    //     $event_desc = isset($_REQUEST['event_desc']) ? $_REQUEST['event_desc'] : NULL;
    //     $event_shortdesc = isset($_REQUEST['event_shortdesc']) ? $_REQUEST['event_shortdesc'] : NULL;
    //     $event_date = isset($_REQUEST['event_date']) ? $_REQUEST['event_date'] : NULL;
    //     $event_location = isset($_REQUEST['event_location']) ? $_REQUEST['event_location'] : NULL;
    //     $event_zipcode = isset($_REQUEST['event_zipcode']) ? $_REQUEST['event_zipcode'] : NULL;

    //     $already_send = isset($already_send) ? $already_send : false;
    //     if ($already_send == true) {
    //     } else {
    //         if (isset($_POST['submit'])) {
    //             $image = $this->UsersLogic->fileUpload();
    //             $html = $this->UsersLogic->createEvent($event_name, $event_desc, $event_shortdesc, $event_date, $event_location, $event_zipcode, $image);
    //             $_SESSION['msg'] = 'Event is aangemaakt.';
    //             $already_send = true;
    //         }
    //     }

    //     $already_send = false;

    //     include 'view/admin/Users/create.php';
    // }

    // public function collectUpdateUsers()
    // {
    //     $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
    //     $event_name = isset($_REQUEST['event_name']) ? $_REQUEST['event_name'] : NULL;
    //     $event_desc = isset($_REQUEST['event_desc']) ? $_REQUEST['event_desc'] : NULL;
    //     $event_date = isset($_REQUEST['event_date']) ? $_REQUEST['event_date'] : NULL;
    //     $event_location = isset($_REQUEST['event_location']) ? $_REQUEST['event_location'] : NULL;
    //     $event_zipcode = isset($_REQUEST['event_zipcode']) ? $_REQUEST['event_zipcode'] : NULL;

    //     if (isset($_REQUEST['updateSubmit'])) {

    //         $res = $this->EventLogic->updateEvent($id, $event_name, $event_desc, $event_date, $event_location, $event_zipcode);
    //         $html = $this->EventLogic->readUsers($id);
    //         $html = $this->Display->CreateCard($html);
    //     }

    //     $html = $this->UsersLogic->readUsers($id);


    //     include 'view/admin/Users/update.php';
    // }

    // public function deleteRequest()
    // {
    //     include 'view/admin/Users/deletewarning.php';
    // }

    // public function collectDeleteEvent($id)
    // {
    //     $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;


    //     $html = $this->UsersLogic->deleteEvent($id);
    //     //$html = $html->fetch(PDO::FETCH_ASSOC);

    //     include 'view/admin/Users/deleteconfirm.php';
    // }
}
