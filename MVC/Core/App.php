<?php
    class App {

    protected $controller ="Home" ;
    protected $action ="show";
    protected $params ="";
        function __construct()
        {
            $arr = $this->getUrl();
            //Kiem tra controller
            if(isset($arr[0])){
                if(file_exists("./mvc/controller/".$arr[0].".php")){
                    $this->controller = $arr[0];
                    unset($arr[0]);
                } 
            }
                
            require_once "./MVC/Controllers/".$this->controller.".php";
            $this->controller = new $this->controller;
            
            //xu ly action
            if(isset($arr[1])){
                if(method_exists($this->controller,$arr[1])){
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }
            //xu ly params
            $this->params = $arr?array_values($arr):[];
            call_user_func_array([$this->controller, $this->action], $this->params );
           
        }
            
        function getUrl()
        {
           if(isset($_GET["url"])){
             return explode("/",filter_var(trim($_GET["url"],"/")));
             
            }
        }
    }
?>