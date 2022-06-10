<?php

require_once 'model/UserLogic.php';
require_once 'model/Display.php';

class UserController {
    public function __construct() {
        $this->UserLogic = new UserLogic();
        $this->Display = new Display();
    }
    public function __destruct() {}
    public function handleRequest() {
        try{
            isset($_GET['con']) === 'user' ? $_GET['con'] : '';

            $op = isset($_GET['op']) ? $_GET['op'] : '';
            //$page = isset($_GET['page']) ? $_GET['page'] : '';

            switch ($op) {  
                case 'delete':
                    $this->collectDeleteUser();
                    break;

                case 'update':
                    $this->collectUpdateUser();
                    break;

                case 'test':
                    $this->collectReadallUser();
                    break;

                default:
                    $this->collectReadallUser();
                    break;
            }

        } catch (Exception $e) {
            throw $e;
        }
    }


        public function collectReadallUser(){

            $user = $this->UserLogic->readAllUsers();  
            $user = $this->Display->createTable($user, true);
            
            include 'view/admin/users/users.php';
            
        }

        public function collectDeleteUser(){
            
            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;

            if(isset($_POST['deleteSubmit'])){

               $res = $this->UserLogic->deleteUser($id);

                if($res === 1){
                    header("Location: index.php?con=admin&op=user");
                }

            }

            include 'view/admin/users/delete.php';

        }

        public function collectUpdateUser(){

            $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : null;
            $firstname = isset($_REQUEST['firstname']) ? $_REQUEST['firstname'] : null;
            $lastname = isset($_REQUEST['lastname']) ? $_REQUEST['lastname'] : null;
            $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
            $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : null;

            if(isset($_POST['updateSubmit'])){

                $res = $this->UserLogic->updateUser($id, $firstname, $lastname, $email, $username);
                
                if($res === 1){
                    header("Location: index.php?con=admin&op=user");
                }

            }
            
            $update = $this->UserLogic->readCustomer($id);
            include 'view/admin/users/update.php';

        }

}