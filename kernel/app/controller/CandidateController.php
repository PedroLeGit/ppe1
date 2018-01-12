<?php
require_once(LIB."Controller.php");
class CandidateController extends Controller{
    public function __construct(){
        $this->models = array("Candidate","Experience");
        parent::__construct();
    }
    public function index(){
        $this->render("index");
    }
    public function register(){
        if($_POST['username'] && $_POST['lastname'] && $_POST['firstname'] && $_POST['email'] && $_POST['address'] && $_POST['city'] && $_POST['postalcode'] && $_POST['password']){
            $this->Candidate->postToObj();
            $this->Candidate->setPassword(sha1($_POST['password']));
            if($this->Candidate->create()){
                $tmp = $this->Candidate->readAll('"username" = \''.$_POST['username'].'\'');
                if($tmp) {
                    $_SESSION['id_candidate'] = $tmp[0]['id_candidate'];
                    $_SESSION['register_finished'] = false;
                }
            }
        }
        if(isset($_SESSION['register_finished']) && !$_SESSION['register_finished']){
            $exp = $this->Experience->readAll('"candidate" = '.$_SESSION['id_candidate']);
        }
        $this->render("register");
    }
}
?>