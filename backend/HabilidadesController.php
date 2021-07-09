<?php
include_once('Habilidades.php');
$type = $_SERVER["REQUEST_METHOD"];
$model = new Habilidades();
switch($type){
	case('GET'): 
		 echo json_encode($model->obtener());
	break;	
	case('POST'): 
		echo json_encode($model->crear($_POST));
	break;	
	case('PUT'): 
		$model->modificar();
	break;	
	
	case('DELETE'): 
		$model->eliminar(1);
	break;	
	
	case('PATH'): 
		$model->modificaropcion();
	break;	
}
