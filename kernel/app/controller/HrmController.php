<?php
require_once(LIB."Controller.php");
class HrmController extends Controller{
    public function __construct(){
        $this->models = array("Hrm", "Sm");

        parent::__construct();
    }


    public function index(){
        if (!empty($_POST)){
            if(!empty($_POST['username']) && !empty($_POST['password'])){
                $this->Hrm->readAll("username = 'pedro' password = 't'" );
                    header('Location: ' . WEBROOT. 'hrm/home');
                    exit();
                }else{
                    $this->set(array("error" => "Identifiants non reconnus"));
                }
            }
        $this->render("login");
        }

        public function home(){
            $this->render("home");
        }

        public function createsm(){
            if(!empty($_POST)){
                if(!empty($_POST['username']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['department']) && !empty($_POST['postalcode']) && !empty($_POST['password'])){
                    echo "1";
                    $this->Sm->postToObj();
                    echo "2";
                    $this->Sm->setPassword(sha1($_POST['password']));
                    echo "3";
                    $this->Sm->create();
                    echo "4";
                    $this->Sm->readAll();
                    echo "5";
                }
            }
            $this->render(createsm);
        }

        public function checkoffer(){
            echo "absolument aucune idee de quoi trouver ici en script";
        }

        public function deletesm(){
            echo "Suppression des Chefs de Service";
        }

        public function logout(){
            unset($_SESSION);
            session_destroy();
            $this->render(login);
        }
}