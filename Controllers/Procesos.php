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

	function create(){
		$this->model->setNombre($_REQUEST['nombre']);
		$this->model->setDescripcion($_REQUEST['descripcion']);
		$this->model->setIdSede($_REQUEST['cmbsede']);
		$this->model->setPresupuesto($_REQUEST['presupuesto']);
		if($this->model->save()){
			echo '<div class="alert alert-success alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					<strong>Inclusión Satisfactoria</strong>
				</div>';
		}else{
			echo '<div class="alert alert-danger alert-dismissable">
  					<button type="button" class="close" data-dismiss="alert">&times;</button>
  					<strong>Registro no agregado</strong>
				</div>';	
		}

	}


}