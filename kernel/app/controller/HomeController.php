<?php
require_once(LIB."Controller.php");
class HomeController extends Controller{
	public function __construct(){
		$this->models = array();
		parent::__construct();
	}
	public function index(){
		$this->render("index");
	}

}
?>