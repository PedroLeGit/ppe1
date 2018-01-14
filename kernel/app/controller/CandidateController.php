<?php
require_once(LIB."Controller.php");
class CandidateController extends Controller{
    public function __construct(){
        $this->models = array("Candidate","Experience","Formation","SkillCandidateLevel","Skill","Level");
        parent::__construct();
    }
    public function index(){
        if(empty($_SESSION)){
            header("Location: ".WEBROOT."candidate/login");
        }else{
            if(in_array(true,$this->checkProfile($_SESSION['id_candidate']))){
                header("Location: ".WEBROOT."candidate/register");
            }
            



        }
        $this->render("index");
    }
    public function login(){
        if(empty($_SESSION) || !$this->Candidate->read($_SESSION['id_candidate'])) {
            if ($_POST['username'] && $_POST['password']) {
                $tmp = $this->Candidate->readAll('"username" = \'' . $_POST['username'] . '\' AND "password" = \'' . sha1($_POST['password']) . '\'');
                if ($tmp) {
                    $_SESSION['id_candidate'] = $tmp[0]['id_candidate'];
                } else {
                    $data['lastUsername'] = $_POST['username'];
                    $this->set($data);
                }
            }
        }else{
            header("Location: ".WEBROOT."candidate");
        }
        $this->render("login");
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
        //Add skills to the candidate
        if(isset($_POST['nbSkill']) && $testUSerExist){
            $this->SkillCandidateLevel->setCandidate($_SESSION['id_candidate']);
            for($i = 1;$i <= $_POST['nbSkill'];$i++){
                if(!empty($_POST["skillId".$i]) && !empty($_POST["levelId".$i])) {
                    $this->SkillCandidateLevel->setSkill($_POST["skillId".$i]);
                    $this->SkillCandidateLevel->setLevel($_POST["levelId".$i]);
                    $this->SkillCandidateLevel->create();
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
                $tmp = $this->Level->readAll();
                foreach ($tmp as $l){
                    $levels[] = array(
                        "id_level" => $l['id_level'],
                        "label" => ucwords($l['label'])
                    );
                }
                $this->set(array("levels" => $levels));
                $view = "register_skill";
            }else{
                $view = "register_finished";
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