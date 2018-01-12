<?php
require_once(LIB."Controller.php");
class HrmController extends Controller{
    public function __construct(){
        $this->models = array("Candidate","Experience");
        parent::__construct();
    }
    public function index(){
        $this->render("index");
    }
}
?>