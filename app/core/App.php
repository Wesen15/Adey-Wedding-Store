<?php


class App {
    protected $controller = 'Home';     //Variable accessible within the class or its descendants.
    protected $method = 'index';
    protected $params = [];
    public function __construct() 
    {
        $url = $this->parseURL();   //Parsing URL
        if($url == NULL)          
               {
                $url = [$this->controller];    
        }
        //controller    //Checking if there is a controller file/folder in url[0]
        if( file_exists('../app/controllers/' . $url[0] . '.php') ) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;  //Initializing controller

        //method
        if(isset($url[1])) {    //Checking if $url[1] is defined
            if( method_exists($this->controller, $url[1])) {   //Checking if there is an object
                $this->method = $url[1];
                unset($url[1]);
            }
        }


        //params
        if( !empty($url)) {         //Checking if the url variable is empty
            $this->params = array_values($url); //Returning url values to array
            //var_dump($url);
        }

        //Run controller and method, and send params if any
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL() {    //Parse URL function
        if( isset($_GET['url'])) {  //Checking if the url variable is defined
            $url = rtrim($_GET['url'],'/'); //Removing / character from the url
            $url = filter_var($url, FILTER_SANITIZE_URL);  //Filtering the url 
            $url = explode('/', $url);  //Changing the / separator and url into an array
            return $url;
        }
    }
}
