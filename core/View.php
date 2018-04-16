<?php

namespace Core;

class View {

	private $view;
	private $data;
	private $template;
	private $laod;

	public function view($view, $data = null, $template = null) {
        $this->_view = $view;
        $this->_data = $data;
        $this->_template = $template;
        return $this->private_view($this->_view, $this->_data, $this->_template);
    }

    private function private_view($view, $data = null, $template = null){
    	

    	$load = function ($data) {

    		if (empty($this->_data) === false) {
    			extract(func_get_arg(0));
    		}

    		if ($this->_template) {

    			if (file_exists("../app/Views/". $this->_view . ".phtml")){

    				require_once "../app/Views/template/header.phtml";
		    		require_once "../app/Views/" . $this->_view . ".phtml";
		    		require_once "../app/Views/template/footer.phtml";

		    	} else {

		    		Error::view();

		    	}

    			
    		} else {

    			if (file_exists("../app/Views/". $this->_view . ".phtml")){

		    		require_once "../app/Views/" . $this->_view . ".phtml";

		    	} else {

		    		Error::view();

		    	}
    		}

    	};

    	$load($this->_data);
        $load = (object)$this->_data = NULL;

    } 

}
