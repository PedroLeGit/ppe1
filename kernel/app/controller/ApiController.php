<?php
require_once(LIB."Controller.php");
class ApiController extends Controller
{
    public function __construct()
    {
        $this->layout = "Json";
        $this->models = array("Skill", "Level","Candidate","Experience");
        parent::__construct();
    }
    public function index(){

    }
    public function skill($query = null){
        if($query){
            $tmp = $this->Skill->readAll('"label" LIKE \'%'.htmlentities(strtolower($query)).'%\'');
            if($tmp) {
                foreach ($tmp as $skill) {
                    $res['items'][] = array(
                        'id_skill' => $skill['id_skill'],
                        'label' => ucwords($skill['label'])
                    );
                }
            }else{
                $res['items'] = array();
            }
            $this->set(array("json" => json_encode($res)));
            $this->render("json");
        }
    }
    public function candidateUsername($query = null,$strict = 0){
        if($query){
            if($strict == 0){
                $where = '"username" LIKE \'%'.htmlentities(strtolower($query)).'%\'';
            }else{
                $where = '"username" = \''.htmlentities(strtolower($query)).'\'';
            }
            $tmp = $this->Candidate->readAll($where);
            if($tmp) {
                foreach ($tmp as $user) {
                    $res['items'][] = $user['username'];
                }
            }else{
                $res['items'] = array();
            }
            $this->set(array("json" => json_encode($res)));
            $this->render("json");
        }
    }
    public function candidate($id = null){
        if($id){
            if($this->Candidate->read($id)) {
                if($_POST['firstname'] && $_POST['lastname'] && $_POST['email'] && $_POST['address'] && $_POST['city'] && $_POST['postalcode']){
                    $this->Candidate->postToObj();
                    $this->Candidate->update();
                }

                $tmp = $this->Candidate->getAll();
                unset($tmp['password']);
            }else{
                $res = array();
            }
            $this->set(array("json" => json_encode($tmp)));
            $this->render("json");
        }
    }
    public function experience($id = null){
        if($id){
            if($tmp = $this->Experience->readAll("candidate = ".$id)) {
                $res = $tmp;
            }else{
                $res = array();
            }
            $this->set(array("json" => json_encode($tmp)));
            $this->render("json");
        }
    }
    public function experienceById($id = null,$param = null){
        if($id){
            if($param){
                if ($this->Experience->read($id) && $this->Experience->getCandidate() == $_SESSION['id_candidate']) {
                    $this->Experience->delete($id);
                    $res = true;
                }else{
                    $res = false;
                }
            }else {
                if ($this->Experience->read($id) && $this->Experience->getCandidate() == $_SESSION['id_candidate']) {
                    if ($_POST['label']) {
                        $this->Experience->setLabel($_POST['label']);
                        $this->Experience->update();
                    }
                    $res = $this->Experience->getAll();
                } else {
                    $res = array();

                }
            }
            $this->set(array("json" => json_encode($res)));
            $this->render("json");
        }
    }
}