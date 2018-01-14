<?php
require_once(LIB."Controller.php");
class ApiController extends Controller
{
    public function __construct()
    {
        $this->layout = "Json";
        $this->models = array("Skill", "Level","Candidate");
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
}