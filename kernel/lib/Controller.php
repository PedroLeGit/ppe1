<?php
class Controller{
    protected $vars = array();
    protected $layout = "Default";
    protected $models = array();
    public function __construct(){
        foreach ($this->models as $model){
            $this->loadModel($model);

        }
    }
    public function render($vue){
        extract($this->vars);
        ob_start();
        require(VIEW.str_replace("controller","",strtolower(get_class($this)))."/".$vue.".php");
        $content_for_layout = ob_get_clean();
        require(LAYOUT.$this->layout.".php");
    }
    public function loadModel($model){
        require (MODEL.$model.".php");
        $this->$model = new $model();
    }
    public function set($var){
        $this->vars =  array_merge($this->vars,$var);
    }
}