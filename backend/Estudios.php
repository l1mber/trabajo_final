<?php 
require_once("Conexion.php");
class Estudios extends conexion{
	
	public function obtener(){	
		try{
			$this->getConexion();
			$sql="SELECT * FROM estudios";
			$resultado = $this->cnx->query($sql) or die ($sql);
			$resultado->execute();	
			return $resultado->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e)
		{
			echo "Error : ".$e->getMessage();			
		}
	}
	
	public function crear($data){

		try{
			$sql = "INSERT INTO `estudios` (`idestudios`, `nombre`, `institucion`, `departamento`, `pais`, `inicio`, `fin`, `contrasenia`) VALUES (NULL, '".$data["nombre"]."', '".$data["institucion"]."', '".$data["pais"]."', '".$data["ciudad"]."', '".$data["inicio"]."', '".$data["fin"]."', '');";
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