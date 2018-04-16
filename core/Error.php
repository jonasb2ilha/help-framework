<?php

namespace Core;

class Error {

	public static function view() {
		echo 'ERROR: View não encontrada!';  die();
	}

	public static function controller(){
		echo 'ERROR: Controller não encontrado!';  die();
	}

	public static function view()
    {
        if (file_exists(__DIR__ . "/../app/views/404.phtml"))
        {
            return require_once __DIR__ . "/../app/views/404.phtml"; die();
        }
        else
        {
            return require_once __DIR__ . "/../app/views/errors/404.phtml"; die();
        }
    }

}
