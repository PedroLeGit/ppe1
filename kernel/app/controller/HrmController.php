<?php
require_once(LIB."Controller.php");
class HrmController extends Controller{
    public function __construct(){
        $this->models = array("Hrm", "Sm", "Department");

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

        public function create_sm(){
            if(!empty($_POST)){
                if(!empty($_POST['username']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['city']) && !empty($_POST['department']) && !empty($_POST['postalcode']) && !empty($_POST['password'])){
                    $tab = $this->Department->readAll();
                    if(!empty($tab)) {
                        $this->Sm->postToObj();
                        $this->Sm->create();
                        $this->Sm->readAll();
                    }else{
                        $this->set(array("error" => "Creation impossible. Vous ne pouvez pas creer de Chef de Service si aucun Service n'existe."));
                    }
                }
            }
            $this->render(create_sm);
        }

    public function delete_sm(){
        echo "Suppression des Chefs de Service";
    }

        public function check_offer(){
            echo "absolument aucune idee de quoi trouver ici en script";
        }



        public function create_department(){
            if(!empty($_POST)) {
                if (!empty($_POST['label']) && !empty($_POST['staff'])) {
                    $this->Department->postToObj();
                    $this->Department->create();
                    $this->set(array("success" => "Service cree avec succes"));
                } else {
                    //il y a peu de chances que cette erreur soit affichee un jour mais on ne sait jamais
                    $this->set(array("error" => "Formulaire incorrect"));
                }
            }
            $this->render(create_department);
        }

        public function delete_department(){
            $tab = $this->Department->readAll();
            print_r($tab);
        }



        public function logout(){
            unset($_SESSION);
            session_destroy();
            $this->render(login);
        }
}