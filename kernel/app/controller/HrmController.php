<?php
require_once(LIB."Controller.php");
class HrmController extends Controller{
    public function __construct(){
        $this->models = array("Hrm");
        parent::__construct();
    }

    function logged_only()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }


    public function index(){
        if (!empty($_POST())){
            if(!empty($_POST['username']) && !empty($_POST['password'])){
                $this->Hrm->readAll("username = 'pedro' password = 't'" );
                    $_SESSION['flash']['success'] = "Vous etes maintenant connectes au site";
                    header('Location: home.php');
                    exit();
                }else{
                    $_SESSION['flash']['danger'] = "Identifiant ou mot de passe incorrect";
                }
                session_start();
            }else {
                $this->render("login");
            }
        }
}