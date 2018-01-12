<?php
require_once(LIB."Controller.php");
class ErrorController extends Controller{
    public function __construct(){
        $this->models = array();
        parent::__construct();
    }
    public function index($code = "000",$message = "Error."){
        $this->set(array("code"=>$code,"message" => $message));
        $this->render("index");
    }
    public function e404(){
        $this->set(array("code"=>"404","message" => "Error file not found."));
        $this->render("index");
    }
    public function e403(){
        $this->set(array("code"=>"403","message" => "Access denied."));
        $this->render("index");
    }
}
?>