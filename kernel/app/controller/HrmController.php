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

        public function createhrm(){
//            $errors = array();
//            if(!empty($errors)): ?>
<!--                <div>-->
<!--                    <p>Formulaire incomplet</p>-->
<!--                        <ul>-->
<!--                            --><?php //foreach($errors as $key): ?>
<!--                                <li>--><?//= $key; ?><!--</li>-->
<!--                            --><?php //endforeach; ?>
<!--                        </ul>-->
<!--                </div>-->
<!--            --><?php //endif;

            if(!empty($_POST)){
                if(!empty($_POST['username']) && !empty($_POST['lastname']) && !empty($_POST['firstname']) && !empty($_POST['mail']) && !empty($_POST['adress']) && !empty($_POST['city']) && !empty($_POST['pc']) && !empty($_POST['password'])){

                }
            }

        }
}