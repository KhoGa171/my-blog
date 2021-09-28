<?php
require_once './config/config.php';
class App {
    protected $controller="Admin";
    protected $action="home";
    protected $params=[];

    public function __construct() {
        $arr = $this->UrlProcess();
        if(!empty($arr)){
            if(file_exists("./controllers/".$arr[0].".php")){
                $this->controller = $arr[0];
                unset($arr[0]);
            }
        }
        
        require_once "./controllers/".$this->controller.".php";
        
        $this->controller = new $this->controller;
        if(isset($arr[1])){
            if(method_exists($this->controller, $arr[1])){
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }
        
        $this->params = $arr?array_values($arr):[];

        call_user_func_array(array($this->controller, $this->action), $this->params);
    }

    public function UrlProcess() {
        if(isset($_GET["url"])) {
            return explode("/", filter_var(trim($_GET["url"], "/")));
        }
    }
}
?>