<?php
require_once(LIB."Controller.php");
class ApiController extends Controller
{
    public function __construct()
    {
        $this->layout = "Json";
        $this->models = array("Skill", "Level");
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
}