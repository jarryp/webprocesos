<?php
header("Access-Control-Allow-Origin: *");

class Sede extends Controllers {

	function __construct(){
		parent::__construct();
	}

	public function sede(){
		//echo "Hola desde el Controlador de usarios";
		$UserName = Session::getSession("usuario");

		if($UserName!=""){
			$this->view->render($this,'sede');
		}else{
			header("Location:".URL);
		}
	}

	public function saluda(){
		echo "Hola desde controlador de procesos";
	}

	public function listado(){
		$json = $this->model->listadoModel("id_sede,nombre","nombre");
		echo $json;
	}


}