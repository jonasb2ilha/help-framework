<?php

namespace Core;

use Core\Error;

class Container
{
    public static function newController($controller)
    {
        $urlArray   = explode('/', $controller);

       
        if ($urlArray[0] == "Admin") {
            $objController = "App\\Controllers\\" . $controller;
            if ($objController) {
                return new $objController;
            } else {
                return Error::controller();
            }

        } else {

            $objController = "App\\Controllers\\" . $controller;

            if (file_exists("../app/Controllers/". $controller . ".php")) {

                return new $objController;

            } else {
                
                return Error::controller();
               
            }
        }

        
    }

}
