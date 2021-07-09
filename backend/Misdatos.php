<?php 
require_once("Conexion.php");
class Usuario extends conexion{
	
	public function obteneruser(){	
		try{
			$this->getConexion();
			$sql="SELECT * FROM misdatos";
			$resultado = $this->cnx->query($sql) or die ($sql);
			return $resultado->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e)
		{
			echo "Error : ".$e->getMessage();			
		}
	}
	
	public function crear($data){
		return json_encode($data);
	}
	
	public function modificar(){
		return "modificar" ;
	}
	
	public function eliminar($id){
		return "eliminar" . $id ;
	}
	
	public function modificaropcion(){
		return "modificaropcion" ;
	}
	
	
	
}