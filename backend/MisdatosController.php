<?php
include_once('Misdatos.php');
$type = $_SERVER["REQUEST_METHOD"];
$model = new Usuario();
switch($type){
	case('GET'): 
		 echo json_encode($model->obteneruser());
	break;	
	case('POST'): 
	$json = file_get_contents('php://input');
		echo $model->crear($_POST);
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
