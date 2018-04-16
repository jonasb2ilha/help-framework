<?php

namespace App\Controllers;

use Core\BaseController;


class IndexController extends BaseController
{
	public function index() {

		$data = [
			'title' => 'Bem vindo ao nosso sistema'
		];

		


		return view('index', $data, true);
	}


}
