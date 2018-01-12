<?php
function debug($var){
    echo "<pre>";
    print_r($var);
    echo "</pre>";
}
session_start();
//Define all needed constant
$webroot = dirname(str_replace("index.php","",$_SERVER['SCRIPT_NAME']));
if($webroot != "/"){
    $webroot .= "/";
}
//Root path of the app
define("ROOT",dirname(str_replace("index.php","",$_SERVER['SCRIPT_FILENAME']))."/kernel/");
//Webroot path
define("WEBROOT",$webroot);
//Path for web resources ( img,js,css )
define("WEBROOTSRC",str_replace("index.php","",$_SERVER['SCRIPT_FILENAME'])."webroot/");
//path for the app path ( models, views, controllers)
define("APP",ROOT."app/");
//path for parent classes
define("LIB",ROOT."lib/");
//path for config of the app, like Database config
define("CONFIG",APP."config/");

//Subpath for the app
define("MODEL",APP."model/");
define("CONTROLLER",APP."controller/");
define("VIEW",APP."view/");
define("LAYOUT",VIEW."layout/");
//Subpath for the web resources
define("CSS",WEBROOT."css/");
define("JS",WEBROOT."js/");
define("IMG",WEBROOT."img/");

//Define the controller
if(!empty($_GET['p'])){
    $params = explode('/',$_GET['p']);
    $controller = ucfirst($params[0]);
}else{
    $controller = "Home";
    $params = array();
}
//Define the method
if(!empty($params[1])){
    $action = $params[1];
}else{
    $action = "index";
}
$controller = $controller."Controller";
$controllerFile = CONTROLLER.$controller.".php";

//Require the controller file
if(file_exists($controllerFile)){
    require($controllerFile);
}else{
    $controller = "ErrorController";
    $controllerFile = CONTROLLER.$controller.".php";
    $action = "e404";
    require($controllerFile);
}

//Construct the controller
if(class_exists($controller)){
    $controller = new $controller();
}else{
    $controller = "ErrorController";
    $controllerFile = CONTROLLER.$controller.".php";
    $action = "e404";
    require($controllerFile);
    $controller = new $controller();
}

//Execute the method
if(method_exists($controller,$action)){
    unset($params[0]);
    unset($params[1]);
    call_user_func_array(array($controller,$action),$params);
}else{
    $controller = "ErrorController";
    $controllerFile = CONTROLLER.$controller.".php";
    $action = "e404";
    require($controllerFile);
    $controller = new $controller();
    call_user_func_array(array($controller,$action),$params);
}
?>