<!--=====================================
VALIDAR SESIÓN
======================================-->

<?php

$url = Ruta::ctrRuta();
$servidor = Ruta::ctrRutaServidor();

if(!isset($_SESSION["validarSesion"])){

	echo '<script>
	
		window.location = "'.$url.'";

	</script>';

	exit();

}
?>

<div class="container-fluid well well-sm compra-r" >
	
	<div class="container">
		
		<div class="row">
			
			<ul class="breadcrumb fondoBreadcrumb text-uppercase">
				
				<li><a href="<?php echo $url;  ?>">INICIO</a></li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</ul>

		</div>

	</div>

</div>

<div class="container-fluid compra-p" id="perfil-user" style="margin-top:-0px;">
	<div class="container">
		<div class="row">
			<div class="col-dm-12">
				<div class="panel-group">

					<div class="row">
						<?php

							$item = "id_usuario";
							$valor = $_SESSION["id"];

							$compras = ControladorUsuarios::ctrMostrarCompraProductos($rutas[1]);

							if(!$compras){

								echo '<div class="col-xs-12 text-center error404">
						               
						    		<h1><small>¡Oops!</small></h1>
						    
						    		<h2>Aún no tienes compras realizadas en esta tienda</h2>

						  		</div>';

							}else{

								foreach ($compras as $key => $value1) {

									$ordenar = "id";
									$item = "id";
									$valor = $value1["id_producto"];

									$productos = ControladorProductos::ctrListarProductos($ordenar, $item, $valor);

									foreach ($productos as $key => $value2) {
									
										echo '<div class="panel panel-default">
											    
											    <div class="panel-body">

													<div class="col-md-2 col-sm-6 col-xs-12">

														<figure>
														
															<img class="img-thumbnail" src="'.$servidor.$value2["portada"].'">

														</figure>

													</div>

													<div class="col-sm-6 col-xs-12">

														<h1><small>'.$value2["titulo"].'</small></h1>

														<p>'.$value2["titular"].'</p>';

														if($value2["tipo"] == "virtual"){

															echo '<a href="'.$url.'curso/'.$value1["id"].'/'.$value1["id_usuario"].'/'.$value1["id_producto"].'/'.$value2["ruta"].'">
																<button class="btn btn-default pull-left">Ir al curso</button>
																</a>';

														}else{

															echo '<h6>Proceso de entrega: '.$value2["entrega"].' días hábiles</h6>';

															if($value1["envio"] == 0){

																echo '<div class="progress">

																	<div class="progress-bar progress-bar-info" role="progressbar" style="width:33.33%">
																		<i class="fa fa-check"></i> Preparando producto
																	</div>
																</div>';

																echo '<h4 class="pull-left"><small>Estamos preparando su pedido... Gracias por su compra</small></h4>';


															}

															if($value1["envio"] == 1){

																echo '<div class="progress">

																	<div class="progress-bar progress-bar-info" role="progressbar" style="width:33.33%">
																		<i class="fa fa-check"></i> Preparando producto
																	</div>

																	<div class="progress-bar progress-bar-default" role="progressbar" style="width:33.33%">
																		<i class="fa fa-check"></i> Enviando
																	</div>
																</div>';

																echo '<h4 class="pull-left"><small>Su producto ha sido entregado en paqueteria y está en camino a su destino... Gracias por su compra.</small></h4>';


															}

															if($value1["envio"] == 2){

																echo '<div class="progress">

																	
																	<div class="progress-bar progress-bar-info" role="progressbar" style="width:33.33%">
																		<i class="fa fa-check"></i> Preparando
																	</div>

																	<div class="progress-bar progress-bar-default" role="progressbar" style="width:33.33%">
																		<i class="fa fa-check"></i> Enviando
																	</div>
																	<div class="progress-bar progress-bar-success" role="progressbar" style="width:33.33%">
																		<i class="fa fa-check"></i> Entregado
																	</div>

																</div>';

																echo '<h4 class="pull-left"><small>Su producto ha sido entregado... Gracias por su compra.</small></h4>';

															}

														}

														echo '<h4 class="pull-right"><small>Comprado el '.substr($value1["fecha"],0,-8).'</small></h4>
																		
													</div>

													<div class="col-md-4 col-xs-12">';

													$datos = array("idUsuario"=>$_SESSION["id"],
																	"idProducto"=>$value1["id_producto"] );

													$comentarios = ControladorUsuarios::ctrMostrarComentariosPerfil($datos);

														echo '<div class="pull-right">

															<a class="calificarProducto" href="#modalComentarios" data-toggle="modal" idComentario="'.$comentarios["id"].'" idProducto="' . $value1["id_producto"] . '">
															
																<button class="btn btn-default backColor">Calificar Producto</button>

															</a>

														</div>

														<br><br>

														<div class="pull-right">

															<h3 class="text-right">';

															if($comentarios["calificacion"] == 0 && $comentarios["comentario"] == ""){

																echo '<i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		<i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		<i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		<i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		<i class="fa fa-star-o text-success" aria-hidden="true"></i>';

															}else{

																switch($comentarios["calificacion"]){

																	case 0.5:
																	echo '<i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																	break;

																	case 1.0:
																	echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																	break;

																	case 1.5:
																	echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																	break;

																	case 2.0:
																	echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																	break;

																	case 2.5:
																	echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																	break;

																	case 3.0:
																	echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																	break;

																	case 3.5:
																	echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																	break;

																	case 4.0:
																	echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-o text-success" aria-hidden="true"></i>';
																	break;

																	case 4.5:
																	echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star-half-o text-success" aria-hidden="true"></i>';
																	break;

																	case 5.0:
																	echo '<i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>
																		  <i class="fa fa-star text-success" aria-hidden="true"></i>';
																	break;

																}


															}
														
																
															echo '</h3>

															<p class="panel panel-default text-right" style="padding:5px">

																<small>

																'.$comentarios["comentario"].'

																</small>
															
															</p>

														</div>

													</div>

											    </div>

											</div>';

									}
									
								}
							}
						?>
					</div>
				  
				

				</div>
			</div>
		</div>
	</div>
</div>

<!--=====================================
VENTANA MODAL PARA COMENTARIOS
======================================-->

<div  class="modal fade modalFormulario" id="modalComentarios" role="dialog">
	
	<div class="modal-content modal-dialog">
		
		<div class="modal-body modalTitulo">
			
			<h3 class="backColor">CALIFICA ESTE PRODUCTO</h3>

			<button type="button" class="close" data-dismiss="modal">&times;</button>

			<form method="post" onsubmit="return validarComentario()">

				<input type="hidden" value="" id="idComentario" name="idComentario">
				<input type="hidden" value="" id="idProducto" name="idProducto">
				
				<h1 class="text-center" id="estrellas">

		       		<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>
					<i class="fa fa-star text-success" aria-hidden="true"></i>

				</h1>

				<div class="form-group text-center">

		       		<label class="radio-inline"><input type="radio" name="puntaje" value="0.5">0.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="1.0">1.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="1.5">1.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="2.0">2.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="2.5">2.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="3.0">3.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="3.5">3.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="4.0">4.0</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="4.5">4.5</label>
					<label class="radio-inline"><input type="radio" name="puntaje" value="5.0" checked>5.0</label>

				</div>

				<div class="form-group">
			  		
			  		<label for="comment" class="text-muted">Tu opinión acerca de este producto: <span><small>(máximo 300 caracteres)</small></span></label>
			  		
			  		<textarea class="form-control" rows="5" id="comentario" name="comentario" maxlength="300" required></textarea>

			  		<br>
					
					<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">

				</div>

				<?php

					$actualizarComentario = new ControladorUsuarios();
					$actualizarComentario -> ctrActualizarComentario();

				?>

			</form>

		</div>

		<div class="modal-footer">
      	
      	</div>

	</div>

</div>