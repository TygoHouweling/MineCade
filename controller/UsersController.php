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
                    $this->collectReadUsers();
                    break;
                
                case 'create':
                    $this->collectCreateUsers();
                    break;    

                case 'update':
                    $this->collectUpdateUsers();
                    break;

                case 'readall':
                    $this->CollectReadAllUsers();
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

        $res = $this->UsersLogic->readUsers($id);
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


    public function collectCreateUsers()
    {
        $firstname = isset($_REQUEST['firstname']) ? $_REQUEST['firstname'] : NULL;
        $lastname = isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : NULL;
        $email = isset($_REQUEST['email']) ? $_REQUEST['v'] : NULL;
        $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : NULL;

        $already_send = isset($already_send) ? $already_send : false;
        if ($already_send == true) {
        } else {
            if (isset($_POST['submit'])) {
                $image = $this->UsersLogic->fileUpload();
                $html = $this->UsersLogic->createUser($firstname, $lastname, $email, $username);
                $_SESSION['msg'] = 'User is aangemaakt.';
                $already_send = true;
            }
        }

        $already_send = false;

        include 'view/admin/users/create.php';
    }

    public function collectUpdateUsers()
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
        $firstname = isset($_REQUEST['firstname']) ? $_REQUEST['firstname'] : NULL;
        $lastname = isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : NULL;
        $email = isset($_REQUEST['email']) ? $_REQUEST['v'] : NULL;
        $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : NULL;

        if (isset($_REQUEST['updateSubmit'])) {

            $res = $this->UsersLogic->updateEvent($id, $firstname, $lastname, $email, $username);
            $html = $this->UsersLogic->readUsers($id);
            $html = $this->Display->CreateCard($html);
        }

        $html = $this->UsersLogic->readUsers($id);
        $html = $html->FetchAll(PDO::FETCH_ASSOC);


        include 'view/admin/users/update.php';
    }

    public function deleteRequest()
    {
        include 'view/admin/users/deletewarning.php';
    }

    public function collectDeleteUsers($id)
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        $html = $this->UsersLogic->deleteEvent($id);
        //$html = $html->fetch(PDO::FETCH_ASSOC);

        include 'view/admin/users/deleteconfirm.php';
    }
}
