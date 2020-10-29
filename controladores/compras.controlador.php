<?php

use Dompdf\Dompdf;
require("vistas/modulos/conversor.php");
Class ControladorCompras{

	/*=============================================
	MOSTRAR NOTIFICACIONES
	=============================================*/

	static public function ctrPdfCompra($file, $id_pedido){

	    $content = file_get_contents($file);

	    $compra = ModeloUsuarios::mdlMostrarCompra($id_pedido);

	    $productos =  ModeloUsuarios::mdlProductosCompra($id_pedido);

	    $tr = '';
	    $total_filas = 0;

	    $precio_total = 0;

	    foreach ($productos as $producto) {

	    	$productoDB = ModeloProductos::mdlMostrarInfoProducto('productos', 'id', $producto['id_producto']);

	    	$detalles = json_decode($productoDB['detalles']);

	    	$tr .= "<tr>
				<td>$producto[cantidad].000</td>
				<td>" . $detalles->Unidad[0] . "</td>
				<td>" . $detalles->Codigo[0] . "</td>
				<td>$productoDB[titulo]</td>
				<td style='text-align:right;'>".number_format($productoDB['precio'],2)."</td>
				<td style='text-align:right;'>".number_format(($productoDB['precio'] * $producto['cantidad'] ),2) . "</td>
				<td style='text-align:right;'>0.00%</td>
				<td style='text-align:right;'>0.00</td>
				<td style='text-align:right;'>".number_format(($productoDB['precio'] * $producto['cantidad'] ),2). "</td>
				</tr>
	    	";

	    	$precio_total += ($producto['pago'] * $producto['cantidad'] );

	    	$total_filas++;
	    }

	    $filas_restantes = 5;

	    $total = $filas_restantes - $total_filas;

	    if ($total > 0) {
	    	for ($i=0; $i < $total; $i++) { 
		    	$tr .= "<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
		    	";
		    }
	    }

	    $usuario = ModeloUsuarios::mdlMostrarUsuario('usuarios', 'id', $compra['id_usuario']);

	    $rfc = $_SESSION['rfc'];
	    

	    if (!$rfc) {
	    	$rfc = 'XAXX010101000';
	    }

	    $numero = $precio_total;

		if($numero) {
			$resultado = convertir($numero);
		}

	    $content = str_replace('{{id_pedido}}', $compra['id_pedido'], $content);
	    $content = str_replace('{{nombre_cliente}}', $usuario['nombre'], $content);
	    $content = str_replace('{{fecha_hora}}', self::fechaCompra($compra['fecha']), $content);
	    $fecha = self::fechaCompra($compra['fecha']);
	    $content = str_replace('{{id_cliente}}',$usuario['id'], $content);
	    setlocale(LC_ALL, "es_MX");
	    $content = str_replace('{{fecha_vencimiento}}', strftime('%B %e %Y',strtotime($compra['fecha'])), $content);
	    $content = str_replace('{{envio}}', $compra['direccion'], $content);
	    $content = str_replace('{{metodo_pago}}', str_pad(4, 2, "0", STR_PAD_LEFT), $content);
	    $content = str_replace('{{subtotal}}', $compra['total_pago'], $content);
	    $content = str_replace('{{total}}', number_format($precio_total,2), $content);
	    $content = str_replace('{{productos}}', $tr, $content);

	    $content = str_replace('{{rfc}}', $rfc, $content);
	    $content = str_replace('{{domicilio}}', $_SESSION['domicilio'], $content);
	    $content = str_replace('{{codigo}}', $usuario['cp'], $content);
	    $content = str_replace('{{municipio}}', $usuario['municipio'], $content);
	    $content = str_replace('{{ciudad}}', $usuario['ciudad'], $content);
	    $content = str_replace('{{estado}}', $usuario['estado'], $content);
	    $content = str_replace('{{pais}}', $usuario['pais'], $content);
	    $content = str_replace('{{colonia}}', $_SESSION['colonia'], $content);
	    $content = str_replace('{{telefono}}', $usuario['telefono'], $content);
	    $content = str_replace('{{cantidadtotal}}', $resultado, $content);

		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->loadHtml($content);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'portrait');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream("pedido - $compra[id_pedido].pdf");

		/*ob_start();

	    include $file;

	    $content = ob_get_clean();

	    $html2pdf = new Html2Pdf('P', 'A4', 'fr');
	    $html2pdf->setDefaultFont('Arial');
	    $html2pdf->writeHTML($content);
	    $html2pdf->output('example00.pdf');*/
	}

	static public function ctrPdfPedido($file, $id_pedido)
	{
		$content = file_get_contents($file);

	    $pedido = ModeloUsuarios::mdlMostrarPedido($id_pedido);

	    $productos = ModeloUsuarios::mdlProductosPedido($id_pedido);

	    $tr = '';
	    $total_filas = 0;

	    $precio_total = 0;

	    foreach ($productos as $producto) {

	    	$productoDB = ModeloProductos::mdlMostrarInfoProducto('productos', 'unidad', $producto['codigo']);

	    	$detalles = json_decode($productoDB['detalles']);

	    	$tr .= "<tr>
				<td>$producto[cantidad]</td>
				<td>" . $detalles->Unidad[0] . "</td>
				<td>" . $detalles->Codigo[0] . "</td>
				<td>$productoDB[titulo]</td>
				<td style='text-align:right;'>".number_format($productoDB['precio'],2)."</td>
				<td style='text-align:right;'>".number_format(($productoDB['precio'] * $producto['cantidad'] ),2) . "</td>
				<td style='text-align:right;'>0.00%</td>
				<td style='text-align:right;'>0.00</td>
				<td style='text-align:right;'>".number_format(($productoDB['precio'] * $producto['cantidad'] ),2). "</td>
				</tr>
	    	";

	    	$precio_total += ($productoDB['precio'] * $producto['cantidad'] );

	    	$total_filas++;
	    }

	    $filas_restantes = 5;

	    $total = $filas_restantes - $total_filas;

	    if ($total > 0) {
	    	for ($i=0; $i < $total; $i++) { 
		    	$tr .= "<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
		    	";
		    }
	    }

	    $usuario = ModeloUsuarios::mdlMostrarUsuarioMayoreo('usuariosmayoreo', 'id', $pedido['id_usuario']);

	    $rfc = $_SESSION['rfc'];
	    

	    if (!$rfc) {
	    	$rfc = 'XAXX010101000';
	    }

	    $numero = $precio_total;

		if($numero) {
			$resultado = convertir($numero);
		}

	    $content = str_replace('{{id_pedido}}', $pedido['id_pedido'], $content);
	    $content = str_replace('{{nombre_cliente}}', $usuario['nombre'], $content);
	    $content = str_replace('{{fecha_hora}}', self::fechaCompra($pedido['fecha']), $content);
	    $fecha = self::fechaCompra($pedido['fecha']);
	    $content = str_replace('{{id_cliente}}',$usuario['id'], $content);
	    setlocale(LC_ALL, "es_MX");
	    $content = str_replace('{{fecha_vencimiento}}', strftime('%B %e %Y',strtotime($pedido['fecha'])), $content);
	    $content = str_replace('{{envio}}', $pedido['direccion'], $content);
	    $content = str_replace('{{metodo_pago}}', str_pad(4, 2, "0", STR_PAD_LEFT), $content);
	    $content = str_replace('{{subtotal}}', $compra['total_pago'], $content);
	    $content = str_replace('{{total}}', number_format($precio_total,2), $content);
	    $content = str_replace('{{productos}}', $tr, $content);

	    $content = str_replace('{{rfc}}', $rfc, $content);
	    $content = str_replace('{{domicilio}}', $usuario['domicilio'], $content);
	    $content = str_replace('{{codigo}}', $usuario['cp'], $content);
	    $content = str_replace('{{municipio}}', $usuario['municipio'], $content);
	    $content = str_replace('{{ciudad}}', $usuario['ciudad'], $content);
	    $content = str_replace('{{estado}}', $usuario['estado'], $content);
	    $content = str_replace('{{pais}}', $usuario['pais'], $content);
	    $content = str_replace('{{colonia}}', $usuario['colonia'], $content);
	    $content = str_replace('{{telefono}}', $usuario['telefono'], $content);
	    $content = str_replace('{{cantidadtotal}}', $resultado, $content);

		// instantiate and use the dompdf class
		$dompdf = new Dompdf();
		$dompdf->loadHtml($content);

		// (Optional) Setup the paper size and orientation
		$dompdf->setPaper('A4', 'portrait');

		// Render the HTML as PDF
		$dompdf->render();

		// Output the generated PDF to Browser
		$dompdf->stream("pedido - $compra[id_pedido].pdf");
	}

	public static function fechaCompra($fecha)
	{
		return "$fecha[8]$fecha[9]/$fecha[5]$fecha[6]/$fecha[0]$fecha[1]$fecha[2]$fecha[3] $fecha[11]$fecha[12]:$fecha[14]$fecha[15]:$fecha[17]$fecha[18]";
	}

}