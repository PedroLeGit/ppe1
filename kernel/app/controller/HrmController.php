<?php
require_once(LIB."Controller.php");
class HrmController extends Controller{
    public function __construct(){
        $this->models = array("Hrm");
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
                if(!empty($_POST['username']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['mail']) && !empty($_POST['adress']) && !empty($_POST['city']) && !empty($_POST['postalcode']) && !empty($_POST['password'])){
                    $this->Hrm->postToObj();
                    $this->Hrm->setPassword(sha1($_POST['password']));
                    $this->Hrm->setUsername(htmlentities(strtolower($_POST['username'])));
                    $this->Hrm->create();
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