<?php

require_once "../controladores/productos.controlador.php";
require_once "../modelos/productos.modelo.php";

class AjaxProductos{

	public $valor;
	public $item;
	public $ruta;

	public function ajaxVistaProducto(){
		
		$item1 = $this->item;
		$valor1 = $this->valor;
		
		$item2 = "ruta";
		$valor2 = $this->ruta;
	
		$respuesta = ControladorProductos::ctrActualizarProducto($item1, $valor1, $item2, $valor2);

		echo $respuesta;

	}

	public function obtenerProducto($id)
	{
		$producto = ControladorProductos::ctrMostrarInfoProducto('id', $id);

		return $producto;
	}

}

if(isset($_POST["valor"])){

	$vista = new AjaxProductos();
	$vista -> valor = $_POST["valor"];
	$vista -> item = $_POST["item"];
	$vista -> ruta = $_POST["ruta"];
	$vista -> ajaxVistaProducto();
}

if(isset($_POST["obtenerProducto"])){

	$vista = new AjaxProductos();

	echo json_encode($vista->obtenerProducto($_POST["idProducto"]));
}


 