<?php 

use Core\Redirect;
use Core\View;

if (! function_exists('Auth') ) {

	function Auth() {
		$data = [
			'user' 	=> 'B2ilha', 
			'email' => 'joninhas_b2ilha@hotmail.com', 
			'name' 	=> 'Jonas Gomes',
			'role'	=> 1,
			'ativo' => 1
		];
	}

}

if (! function_exists('view') ) {

	function view($page_view, $data, $template = null) {

		$view = new View;

		return $view->view($page_view, $data, $template);
	}

}

if (! function_exists('load_config') ) {

	function load_config($config) {

		if (file_exists(__DIR__ . "../Config/".$config.".php")) {
			return require __DIR__ . "../Config/".$config.".php";
		} else {
			return 'Aquivo de configuração não encontrado!';
		}

	}

}


if (! function_exists('json') ) {

	function json($data) {

		echo json_encode($data);

	}

}

if (! function_exists('load_plugin')) {

	function load_plugin(array $data , $master = null){
		
		if ($master) {
			if (is_array($data)) {
				$retorno = '';
				foreach ($data as $plugin):
	                $retorno .= '<script src="'.baseUrl().'/master/js/plugins/'.$plugin.'.js"></script>';
	            endforeach;
			}
		} else {
			if (is_array($data)) {
				$retorno = '';
				foreach ($data as $plugin):
	                $retorno .= '<script src="'.baseUrl().'/assets/plugins/'.$plugin.'.js"></script>';
	            endforeach;
			}
		}

		

		return $retorno;

		
	}

}

if (! function_exists('load_js')) {

	function load_js(array $data, $master = null){
		
		if ($master) {
			if (is_array($data)) {
				$retorno = '';
				foreach ($data as $js):
	                $retorno .= ' <script src="'.baseUrl().'/master/js/'.$js.'.js"></script>';
	            endforeach;
			}
		} else {
			if (is_array($data)) {
				$retorno = '';
				foreach ($data as $js):
	                $retorno .= ' <script src="'.baseUrl().'/assets/js/'.$js.'.js"></script>';
	            endforeach;
			}
		}
		

		return $retorno;

		
	}

}

if (! function_exists('load_css')) {

	function load_css(array $data, $master = null){

		if ($master) {
			if (is_array($data)) {
				$retorno = '';
				foreach ($data as $css):
	                $retorno .= '<link rel="stylesheet" type="text/css" href="'.baseUrl().'/master/css/'.$css.'.css" media="all" />';
	            endforeach;
			}
		} else {
			if (is_array($data)) {
				$retorno = '';
				foreach ($data as $css):
	                $retorno .= '<link rel="stylesheet" type="text/css" href="'.baseUrl().'/assets/css/'.$css.'.css" media="all" />';
	            endforeach;
			}
		}
	
		return $retorno;

		
	}

}


if (! function_exists('baseUrl')) {

	function baseUrl() {
		$conf = load_config('app');
		return $conf['urlBase'];
	}

}

if (! function_exists('token')) {


	function token() {
		return hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
	}

}

if (! function_exists('flash')) {

	function flash($key, $title = null, $message, $type = 'danger', $marginTop = null, $close = null) {

		$margin = $marginTop ? "margin-top:".$marginTop : "";
		$titlulo = $title != '' ? "<h4>".$title."</h4>" : "";

		$button = "<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
			            <span aria-hidden='true'>&times;</span>
			        </button>";

		$buttonClose = $close == null ? '' : $button;

		if (!isset($_SESSION['flash'][$key])) 
			$_SESSION['flash'][$key] = "
				<div class='alert  alert-".$type." alert alert-dismissible' style='".$margin."px' id='alert-1'>
			        ".$buttonClose."
					".$titlulo."
			        ".$message."
			    </div>";
	}
	
}

if (! function_exists('get')) {

	function get($key) {

		if(isset($_SESSION['flash'][$key])) {
			$message = $_SESSION['flash'][$key];

			unset($_SESSION['flash'][$key]);

			return $message ?? '';
		}

	}
	
}

if (! function_exists('redirect')) {

	function redirect($url = null, $with = null) {

		$redirect = new Redirect;

		if (is_null($url)) {
			return $redirect->route($url = null, $with);
		}
		return $redirect->route($url, $with);
		
	}

}

if (! function_exists('session')) {

	function session($param) {
		if (isset($_SESSION[$param])) {
			return $_SESSION[$param];
		} else {
			return false;
		}
		
	}
	
}

