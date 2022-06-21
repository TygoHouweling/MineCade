<?php
require_once 'model/EventParticipantsLogic.php';
require_once 'model/AdminLogic.php';
require_once 'model/Display.php';


class EventParticipantsController
{
    public function __construct()
    {
        $this->ParticipantLogic = new EventParticipantsLogic();
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

                case 'read':
                    $this->collectReadParticipant();
                    break;
                
                case 'readall':
                    $this->CollectReadAllParticipants();
                    break;

                case 'deleterequest':
                    $this->deleteRequest();
                    break;

                case 'delete':
                    $this->collectDeleteParticipant($_REQUEST['id']);
                    break;

                case 'update':
                    $this->collectUpdateParticipants();
                    break;

                default:
                    $this->CollectReadAllParticipants();
                    break;
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function collectReadParticipant()
    {

        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

        $res = $this->ParticipantLogic->readParticipants($id);
        $html = $this->Display->CreateCard($res);
        //var_dump($html);

        include 'view/admin/participants/read.php';
    }

    public function CollectReadAllParticipants()
    {
        $page = isset($_GET['number']) ? (int)$_GET['number'] : 1;
        $perPage = 5;
        $limit = ($page > 1) ? ($page * $perPage) - $perPage : 0;

        $res = $this->ParticipantLogic->readAllParticipants($limit, $perPage);
        //var_dump($res);
        $pages = $res[0];
        //var_dump($res[1]);
        $pagination = $this->Display->PageNavigation($pages, $page);
        $participants = $this->Display->createTable($res[1], false, true);
        include 'view/admin/participants.php';
    }

    public function deleteRequest()
    {
        include 'view/admin/CRUD/deletewarning.php';
    }

    public function collectDeleteParticipant($id)
    {
        $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;


        $html = $this->ParticipantLogic->deleteParticipant($id);
        //$html = $html->fetch(PDO::FETCH_ASSOC);

        include 'view/admin/CRUD/delete.php';
    }
}