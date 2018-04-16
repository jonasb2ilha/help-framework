<?php

namespace Core;

use Core\Error;

class BaseController
{
    protected $sanitized;

    protected function post(){
        $posts = $_POST;
        foreach ($posts as $name => $value) {
           $this->sanitized[$name] = filter_input(INPUT_POST, $name, FILTER_SANITIZE_STRING);
        }

       return (object) $this->sanitized;
    }

    protected function get(){
        $posts = $_GET;
        foreach ($posts as $name => $value) {
           $this->sanitized[$name] = filter_input(INPUT_GET, $name, FILTER_SANITIZE_STRING);
        }

       return (object) $this->sanitized;
    }

}
