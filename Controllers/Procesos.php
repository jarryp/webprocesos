<?php
header("Access-Control-Allow-Origin: *");

class Procesos extends Controllers {

	function __construct(){
		parent::__construct();
	}

	public function procesos(){
		//echo "Hola desde el Controlador de usarios";
		$UserName = Session::getSession("usuario");

		if($UserName!=""){
			$this->view->render($this,'procesos');
		}else{
			header("Location:".URL);
		}
	}

	public function saluda(){
		echo "Hola desde controlador de procesos";
	}

	function listado(){
		echo $this->model->listadoModel();
	}


}