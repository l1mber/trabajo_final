<?php 
require_once("Conexion.php");
class Habilidades extends conexion{
	
	public function obtener(){	
		try{
			$this->getConexion();
			$sql="SELECT * FROM habilidades";
			$resultado = $this->cnx->query($sql) or die ($sql);
			return $resultado->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e)
		{
			echo "Error : ".$e->getMessage();			
		}
	}
	
	public function crear($data){

		try{
			$sql = "INSERT INTO `habilidades` (`idhabilidades`, `nombre`, `rango`) VALUES (NULL, '".$data["habilidad"]."', '".$data["nivel"]."');";
			$this->getConexion();
			return $this->cnx->query($sql) or die ($sql);
		}
		catch (PDOException $e)
		{
			echo "Error : ".$e->getMessage();			
		}
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