<?php 

namespace Core;

class Redirect
{

    protected $url;

    public function route($url = null , $with = []) {
        $this->url = $url;
        
        if (count($with) > 0) {
            foreach ($with as $key => $value) {
                Session::set($key, $value);
            }
        }

        if (is_null($this->url)) {
            return $this;
        }
             
       return header("location:http://localhost:8000$this->url");
    }

    public function back(){
        $previous = "javascript:history.go(-1)";

         if (isset($_SERVER['HTTP_REFERER'])) {
             $previous = $_SERVER['HTTP_REFERER'];
         }

         return header("location:{$previous}");
    }

}
