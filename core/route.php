<?php
namespace core;

class route{
    public $controller = 'site';
    public $action = 'index';
    
    public function __construct()
    {
        $t_arr = explode('/', trim($_SERVER['SCRIPT_NAME'],'/'));
        unset($t_arr[count($t_arr)-1]);
        $t_arr = implode('/', $t_arr);
        $uri = ltrim($_SERVER['REQUEST_URI'],'/'.$t_arr.'/');
        $uri = trim($uri, '/');
        
        $uri_arr = explode('?', $uri);
        
        /*
         * 处理路由
         */
        if (isset($uri_arr[0]) && !empty($uri_arr[0])){
            $route_str = $uri_arr[0];
            $route = explode('/', $route_str);
            if (count($route) > 1){
                $action = explode('-', $route[count($route)-1]);
                $this->action = str_replace(' ', '', ucwords(implode(' ', $action)));
                unset($route[count($route)-1]);
                $controller = explode('-', $route[count($route)-1]);
                unset($route[count($route)-1]);
                $controllerPath = implode('\\', $route);
                $this->controller = trim($controllerPath.'\\'.str_replace(' ', '', ucwords(implode(' ', $controller))),'\\');
            }elseif (count($route) == 1){
                $controller = explode('-', $route[0]);
                $this->controller = str_replace(' ', '', ucwords(implode(' ', $controller)));
            }
        }
    }
}