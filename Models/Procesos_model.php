
<?php 

class Procesos_model extends Conexion {
	private $tabla="procesos";
	private $numero;
	private $descripcion;
	private $id_sede;
	private $presupuesto;

	function setNumero($numero){ 
		$this->numero = $numero; 
	}
	
	function getNumero(){ 
		return $this->numero; 
	}
	
	function setDescripcion($descripcion){ 
		$this->descripcion = $descripcion; 
	}

	function getDescripcion(){
		return $descripcion;
	}

	function setIdSede($id_sede){
		$this->id_sede = $id_sede;
	}

	function getIdSede(){
		return $this->id_sede;
	}

	function setPresupuesto($presupuesto){
		$this->presupuesto = $presupuesto;
	}

	function getPresupuesto(){
		return $this->presupuesto;
	}

	function listadoModel(){
		$query="select p.id_proceso ,
       					p.nombre ,
       					s.nombre as sede,
       					p.presupuesto, 
       					p.created_at
				from procesos p 
				left join sede s on s.id_sede = p.id_sede 
				order by created_at desc ";
		return json_encode($this->db->ejecutaSQL($query));
	}

}