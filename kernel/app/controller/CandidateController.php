<?php
require_once(LIB."Controller.php");
class CandidateController extends Controller{
    public function __construct(){
        $this->models = array("Candidate","Experience","Formation","SkillCandidateLevel","Skill","Level");
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
        if(isset($_SESSION['id_candidate']) && $this->Candidate->read($_SESSION['id_candidate'])) {
            $testUSerExist = true;
        }else{
            $testUSerExist = false;
        }
        //Add experiences to the candidate
        if(isset($_POST['nbExp']) && $testUSerExist){
            $this->Experience->setCandidate($_SESSION['id_candidate']);
            for($i = 0;$i <= $_POST['nbExp'];$i++){
                if(!empty($_POST[$i])) {
                    $this->Experience->setLabel($_POST[$i]);
                    $this->Experience->create();
                }
            }
        }
        //Add formation to the candidate
        if(isset($_POST['nbFormation']) && $testUSerExist){
            $this->Formation->setCandidate($_SESSION['id_candidate']);
            for($i = 0;$i <= $_POST['nbFormation'];$i++){
                if(!empty($_POST[$i])) {
                    $this->Formation->setLabel($_POST[$i]);
                    $this->Formation->create();
                }
            }
        }

        //Choose the view
        $toDo = $this->checkProfile(@$_SESSION['id_candidate']);
        if($toDo) {
            if ($toDo['exp']) {
                $view = "register_experience";
            }elseif($toDo['formation']) {
                $view = "register_formation";
            }elseif($toDo['skill']) {
                $view = "register_skill";
            }else{
                $view = "register_finished";
            }
        }else{

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

                $formation = $this->Formation->readAll('"candidate" = ' . $_SESSION['id_candidate']);
                if (!$formation) {
                    $toDo['formation'] = true;
                } else {
                    $toDo['formation'] = false;
                }
                $skill = $this->SkillCandidateLevel->readAll('"candidate" = ' . $_SESSION['id_candidate']);
                if (!$skill) {
                    $toDo['skill'] = true;
                } else {
                    $toDo['skill'] = false;
                }
            }
        }else{
            $toDo = null;
        }
        return($toDo);
    }
}
?>