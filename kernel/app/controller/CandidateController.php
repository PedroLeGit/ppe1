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
        //Register the candidate
        if($_POST['username'] && $_POST['lastname'] && $_POST['firstname'] && $_POST['email'] && $_POST['address'] && $_POST['city'] && $_POST['postalcode'] && $_POST['password']){
            $this->Candidate->postToObj();
            $this->Candidate->setPassword(sha1($_POST['password']));
            if($this->Candidate->create()){
                $tmp = $this->Candidate->readAll('"username" = \''.$_POST['username'].'\'');
                if($tmp) {
                    $_SESSION['id_candidate'] = $tmp[0]['id_candidate'];
                }
            }
        }
        //Add experiences to the candidate
        if(isset($_POST['nbExp']) && isset($_SESSION['id_candidate']) && $this->Candidate->read($_SESSION['id_candidate'])){
            $this->Experience->setCandidate($_SESSION['id_candidate']);
            for($i = 0;$i <= $_POST['nbExp'];$i++){
                if(!empty($_POST[$i])) {
                    $this->Experience->setLabel($_POST[$i]);
                    $this->Experience->create();
                }
            }
        }

        //Choose the view
        $toDo = $this->checkProfile(@$_SESSION['id_candidate']);
        if($toDo) {
            if ($toDo['exp']) {
                $view = "register_experience";
            }
        }else{
            $view = "register_candidate";
        }
        $this->render($view);
    }


    private function checkProfile($id = null){
        if($id && $this->Candidate->read($id)){
            //Check all steps
            if(!empty($_SESSION)) {
                $exp = $this->Experience->readAll('"candidate" = ' . $_SESSION['id_candidate']);
                if (!$exp) {
                    $toDo['exp'] = true;
                } else {
                    $toDo['exp'] = false;
                }
            }
        }else{
            $toDo = null;
        }
        return($toDo);
    }
}
?>