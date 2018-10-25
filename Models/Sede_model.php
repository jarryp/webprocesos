
<?php 

class Sede_model extends Conexion {
	private $tabla="sede";
	private $id_sede;
	private $nombre;

	function setIdSede($id_sede){
		$this->id_sede= $id_sede;
	}

	function getIdSede(){
		return $this->id_sede;
	}

	function setNombre($nombre){
		$this->nombre = $nombre;
	}

	function getNombre(){
		return $this->nombre;
	}

	function listadoModel($fields,$orden){
		return json_encode($this->db->select2($fields,$this->tabla,$orden));
	}

}