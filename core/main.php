<?php
namespace core;

class main{
    
    public static $classMap = [];
    
    public static $app = [];
    
    public function __construct($config=null)
    {
        self::$app = $config;
    }
    
    public static function run()
    {
        $route = new route();
        $class = APP.'\\controllers\\'.$route->controller.'Controller';
        $file = APPROOT.$class.'.php';
        $action = 'action'.$route->action;
        call_user_func_array([new $class(), $action], []);
    }
    
    public static function load($class)
    {
        if (isset(self::$classMap[$class])){
            return true;
        }else{
            $file = str_replace('\\', '/', ROOT.$class.'.php');
            if (is_file($file)){
                include $file;
                self::$classMap[$class] = true;
            }else{
                throw new \Exception('File : '.$file.' not exist.');
            }
        }
    }
}