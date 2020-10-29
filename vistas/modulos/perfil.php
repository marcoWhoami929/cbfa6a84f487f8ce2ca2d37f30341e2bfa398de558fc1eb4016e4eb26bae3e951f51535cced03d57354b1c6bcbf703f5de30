<!--=====================================
VALIDAR SESIÓN
======================================-->

<?php
error_reporting(1);
$url = Ruta::ctrRuta();
$servidor = Ruta::ctrRutaServidor();

if(!isset($_SESSION["validarSesion"])){

	echo '<script>
	
		window.location = "'.$url.'";

	</script>';

	exit();

}

if(isset($_GET["merchantId"])){

  echo '<script>

    localStorage.removeItem("listaProductos");
    localStorage.removeItem("cantidadCesta");
    localStorage.removeItem("sumaCesta");

    </script>';

}

$social = ControladorPlantilla::ctrEstiloPlantilla();
$jsonRedesSociales = json_decode($social["redesSociales"],true);
echo '<script src="'.$servidor.$social["type"].'"></script>';

date_default_timezone_set('America/Bogota');

$fecha = date('Y-m-d');
$hora = date('H:i:s');

$fechaActual = $fecha.' '.$hora;

?>

<!--=====================================
BREADCRUMB PERFIL
======================================-->

<div class="container-fluid well well-sm" id="barraClientes">
	
	<div class="container">
		
		<div class="row">
			
			<ul class="breadcrumb fondoBreadcrumb text-uppercase">
				
				<li><a href="<?php echo $url;  ?>">INICIO</a></li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</ul>

		</div>

	</div>

</div>

<!--=====================================
SECCIÓN PERFIL
======================================-->

<div class="container-fluid" class="perfil-user" id="menuClientes">
	


	<div class="container">

		<ul class="nav nav-tabs">
		  
	  		<li class="active">	  			
			  	<a data-toggle="tab" href="#compras">
			  	<i class="fa fa-list-ul"></i> MIS COMPRAS</a>
	  		</li>

	  		<li> 				
		  		<a data-toggle="tab" href="#deseos">
		  		<i class="fa fa-gift"></i> MI LISTA DE DESEOS</a>
	  		</li>

	  		<li>				
	  			<a data-toggle="tab" href="#perfil">
	  			<i class="fa fa-user"></i> EDITAR PERFIL</a>
	  		</li>

	  		<li>				
		 	 	<a href="<?php echo $url; ?>ofertas">
		 	 	<i class="fa fa-star"></i>	VER OFERTAS</a>
	  		</li>
		
		</ul>

		<div class="tab-content">

			<!--=====================================
			PESTAÑA COMPRAS
			======================================-->

	  		<div id="compras" class="tab-pane fade in active">

	  			<?php
					$item = "id_usuario";
					$valor = $_SESSION["id"];

					$compras = ControladorUsuarios::ctrMostrarCompras($item, $valor);

					if(!$compras){
						echo '
							<div class="text-center error404">		               
					    		<h1><small>¡Oops!</small></h1>
					    		<h2>Aún no tienes compras realizadas en esta tienda</h2>
					  		</div>
				  		';

					}else{
						?>

						<div class="table-responsive">
							<table class="table tablaVentas"  id="ventas">
		        
								<thead>

								<tr>
								  
								  <th style="width:10px"># Pedido</th>
								  <th>Productos</th>    
								  <th>Metodo</th>
								  <th>Dirección</th>
								  <th>País</th>
								  <th>Total</th>
								  <th>Fecha</th>
								  <th>Nota de compra</th>
								  <th>Productos</th>
								</tr>

								</thead> 

								<tbody>
									<?php 

										foreach ($compras as $key => $value1) {

											$ordenar = "id";
											$item = "id";
											$valor = $value1["id_producto"];

											
												echo '<tr>
													    
													<td>'. $value1['id_pedido'] . '</td>
													<td>'. $value1['cantidad_productos'] . '</td>
													<td>'.$value1['metodo'].'</td>
													<td>'. $value1['direccion'] . '</td>
													<td>'. $value1['pais'] . '</td>
													<td width="10%">$ '. number_format($value1['total_pago'],2) . '</td>
													<td>'. $value1['fecha'] . '</td>
													<td>
														<a href="pdf/' . $value1['id_pedido'] . '">
															Ver
														</a>
													</td>
													<td>
														<a href="compra/' . $value1['id_pedido'] . '">Ver Productos</a>
													</td>
												</tr>';
											

											
											
										}
									?>
								</tbody>
						  
							</table>

						</div>
					<?php
					}
				?>
		  	</div>

		  	<!--=====================================
			PESTAÑA DESEOS
			======================================-->

		  	<div id="deseos" class="tab-pane fade">
				<?php

					$item = $_SESSION["id"];

					$deseos = ControladorUsuarios::ctrMostrarDeseos($item);

					if(!$deseos){

						echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center error404">
					               
				    		<h1><small>¡Oops!</small></h1>
				    
				    		<h2>Aún no tiene productos en su lista de deseos</h2>

				  		</div>';
					
					}else{

						echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					               
				    		<h2><small class="subtitulos">Mi lista de deseos</small></h2>
				    
				    		

				  		</div>';
						foreach ($deseos as $key => $value1) {

							$ordenar = "id";
							$valor = $value1["id_producto"];
							$item = "id";

							$productos = ControladorProductos::ctrListarProductos($ordenar, $item, $valor);



							echo '<ul class="grid0">';

								foreach ($productos as $key => $value2) {
								
								echo '<li class="col-md-3 col-sm-6 col-xs-12">

										<figure>
											
											<a href="'.$url.$value2["ruta"].'" class="pixelProducto">
												
												<img src="'.$servidor.$value2["portada"].'" class="img-responsive">

											</a>

										</figure>

										<h4>
								
											<small>
												
												<a href="'.$url.$value2["ruta"].'" class="pixelProducto">
													
													<small style="text-transform:uppercase;fontSize:12px;font-weight:bold;">'.$value2["titulo"].'</small><br>

													<span style="color:rgba(0,0,0,0)">-</span>';


													if($value2["oferta"] != 0 && $value2["finOferta"]>$fechaActual){

																echo '<span class="label label-info fontSize">'.$value2["descuentoOferta"].'% DE DESCUENTO</span> <small>
											
																	<strong class="oferta" id="prec-desc">MXN $'.number_format($value2["precio"],2).'</strong>

																</small>';

															}else if($value2["oferta"] == 0){
																	echo '<span class="label label-danger" id="no-ofer">El producto no tiene oferta</span>';
															}else{
																echo '<span class="label label-warning" id="fin-ofer">La oferta ha terminado</span>';
															}	


												echo '</a>	

											</small>			

										</h4>

										<div class="col-xs-8 precio">';

										if($value2["precio"] == 0){

											echo '<h2 style="margin-top:-10px"><small>GRATIS</small></h2>';

										}else{

											if($value2["oferta"] != 0 && $value2["finOferta"]>$fechaActual){
											if($value2["detalles"] != null){

												$detalles = json_decode($value2["detalles"], true);


												if($value2["tipo"] == "fisico"){


													
													foreach($detalles["Marca"] as $marca => $Marca)
													{
														
																switch ($value2['id_categoria']) {
																	case 1:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Pintura Automotriz</small></h3>';
																	break;
																	case 2:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Pintura Arquitectónica</small></h3>';
																	break;
																	case 3:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Pintura Industrial</small></h3>';
																	break;
																	case 4:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Equipos de Aplicación</small></h3>';
																	break;
																	case 5:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Estética Automotriz</small></h3>';
																	break;
																	case 6:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-">Abrasivos</small></h3>';
																	break;
																	case 7:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Complementos</small></h3>';
																	break;
																default:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Sin categoría</small></h3>';
																	break;
															}
															if ($value2["existencias"]<=0) {
																echo '<h3><small id="existencias"><span class="label label-danger" style="font-size:12px;">SIN EXISTENCIAS</span></small></h3>';
															}else if($value2["existencias"]>=5 && $value2["existencias"] < $value2["stockMax"]){
																echo '<h3><small id="existencias">Existencias: <span class="label label-info" style="font-size:12px;">'.$value2["existencias"].'</span></small></h3>';
															}else if ($value2["existencias"]>=5 && $value2["existencias"] > $value2["stockMax"]) {

																echo '<h3><small id="existencias">Existencias: <span class="label label-info" style="font-size:12px;">'.$value2["existencias"].'</span></small></h3>';
															}
															else if($value2["existencias"]<5 && $value2["existencias"] > $value2["stockMin"]){
																echo '<h3><small id="existencias">Existencias: <span class="label label-warning" style="font-size:12px;">'.$value2["existencias"].'</span></small></h3>';
															}
														echo '<h3><small style="font-weight:bold" class="prec-p">MXN $'.number_format($value2["precioOferta"], 2).'</small></h3>';
													
													}	
												}
											}

												$social = ControladorPlantilla::ctrEstiloPlantilla();
												$jsonRedesSociales = json_decode($social["redesSociales"],true);

												switch ($Marca) {
													case 'ZAAK':
														echo '<img src="'.$servidor.$social["zaak"].'" class="img-responsive" width="100%" id="img-marca">';
														break;
													case 'GONI':
														echo '<img src="'.$servidor.$social["goni"].'" class="img-responsive" width="100%" id="img-marca">';
														break;
													case '3M':
														echo '<img src="'.$servidor.$social["3m"].'" class="img-responsive" width="100%" id="img-marca">';
														break;
													case 'EXCELO':
														echo '<img src="'.$servidor.$social["excelo"].'" class="img-responsive" width="100%" id="img-marca">';
														break;
													default:
														echo "Sin Marca";
														break;
												}

											}else{

												if($value2["detalles"] != null){

												$detalles = json_decode($value2["detalles"], true);


												if($value2["tipo"] == "fisico"){


													
													foreach($detalles["Marca"] as $marca => $Marca)
													{
														
																switch ($value2['id_categoria']) {
																	case 1:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Pintura Automotriz</small></h3>';
																	break;
																	case 2:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Pintura Arquitectónica</small></h3>';
																	break;
																	case 3:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Pintura Industrial</small></h3>';
																	break;
																	case 4:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Equipos de Aplicación</small></h3>';
																	break;
																	case 5:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Estética Automotriz</small></h3>';
																	break;
																	case 6:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Abrasivos</small></h3>';
																	break;
																	case 7:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Complementos</small></h3>';
																	break;
																default:
																	echo '<h3 id="categoria-h"><small id="categoria-pro-3">Sin categoría</small></h3>';
																	break;
															}
															if ($value2["existencias"]<=0) {
																echo '<h3><small id="existencias"><span class="label label-danger" style="font-size:12px;">SIN EXISTENCIAS</span></small></h3>';
															}else if($value2["existencias"]>=5 && $value2["existencias"] < $value2["stockMax"]){
																echo '<h3><small id="existencias">Existencias: <span class="label label-info" style="font-size:12px;">'.$value2["existencias"].'</span></small></h3>';
															}else if ($value2["existencias"]>=5 && $value2["existencias"] > $value2["stockMax"]) {

																echo '<h3><small id="existencias">Existencias: <span class="label label-info" style="font-size:12px;">'.$value2["existencias"].'</span></small></h3>';
															}
															else if($value2["existencias"]<5 && $value2["existencias"] > $value2["stockMin"]){
																echo '<h3><small id="existencias">Existencias: <span class="label label-warning" style="font-size:12px;">'.$value2["existencias"].'</span></small></h3>';
															}
															else if($value2["existencias"]<5 && $value2["existencias"] <= $value2["stockMin"]){
																echo '<h3><small id="existencias">Existencias: <span class="label label-warning" style="font-size:12px;">'.$value2["existencias"].'</span></small></h3>';
															}
														echo '<h3><small style="font-weight:bold" class="prec-p">MXN $'.number_format($value2["precio"],2).'</small></h3>';
													
													}	
												}
											}
												switch ($Marca) {
													case 'ZAAK':
														echo '<img src="'.$servidor.$social["zaak"].'" class="img-responsive" width="100%" id="img-marca">';
														break;
													case 'GONI':
														echo '<img src="'.$servidor.$social["goni"].'" class="img-responsive" width="100%" id="img-marca">';
														break;
													case '3M':
														echo '<img src="'.$servidor.$social["3m"].'" class="img-responsive" width="100%" id="img-marca">';
														break;
													case 'EXCELO':
														echo '<img src="'.$servidor.$social["excelo"].'" class="img-responsive" width="100%" id="img-marca">';
														break;
													default:
														echo "Sin Marca";
														break;
												}


											}
											
										}
														
										echo '</div>
										<form action="" method="post" name="" style="display:none;"> 
												  <select class="form-control seleccionarCantidad" name="seleccionarCantidad" id="seleccionarCantidad">
													<option value="0" disabled>Seleccionar Cantidad</option>
													<option value="1">1</option>
													
													
													</select>

											</form>
										<div class="col-xs-4 enlaces">
											
											<div class="btn-group pull-right">
												
												<button type="button" class="btn btn-danger btn-xs quitarDeseo" idDeseo="'.$value1["id"].'" data-toggle="tooltip" title="Quitar de mi lista de deseos">
													
													<i class="fa fa-heart" aria-hidden="true"></i>

												</button>';
												if($value2["tipo"] == "fisico"){

													if($value2["oferta"] != 0 && $value2["finOferta"]>$fechaActual && $value2["existencias"]>0){

														echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value2["id"].'" imagen="'.$servidor.$value2["portada"].'" titulo="'.$value2["titulo"].'" precio="'.($value2["precioOferta"]).'" tipo="'.$value2["tipo"].'" peso="'.$value2["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

														<i class="fa fa-shopping-cart" aria-hidden="true"></i>

														</button>';

													}
													if($value2["oferta"] != 0 && $value2["finOferta"]<$fechaActual && $value2["existencias"]>0){

														echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value2["id"].'" imagen="'.$servidor.$value2["portada"].'" titulo="'.$value2["titulo"].'" precio="'.($value2["precio"]).'" tipo="'.$value2["tipo"].'" peso="'.$value2["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

														<i class="fa fa-shopping-cart" aria-hidden="true" ></i>

														</button>';
													}
													if($value2["oferta"] == 0 && $value2["existencias"] > 0){

														echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value2["id"].'" imagen="'.$servidor.$value2["portada"].'" titulo="'.$value2["titulo"].'" precio="'.($value2["precio"]).'" tipo="'.$value2["tipo"].'" peso="'.$value2["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

														<i class="fa fa-shopping-cart" aria-hidden="true"></i>

														</button>';
													}else{

													}
													

												}

													
												echo '<a href="'.$url.$value2["ruta"].'" class="pixelProducto">
												
													<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
														
														<i class="fa fa-eye" aria-hidden="true"></i>

													</button>	
												
												</a>

											</div>

										</div>

									</li>';
								}

							echo '</ul>';


						}

					}

				?>
		  	</div>
			<!--=====================================
			PESTAÑA PERFIL
			======================================-->
		  	
		  	<div id="perfil" class="tab-pane fade">
		    	
				<div class="row">
					
					<form method="post" enctype="multipart/form-data">
					
						<div class="col-md-3 col-sm-4 col-xs-12 text-center">
							
							<br>

							<figure id="imgPerfil">
								
							<?php

							echo '<input type="hidden" value="'.$_SESSION["id"].'" id="idUsuario" name="idUsuario">
							      <input type="hidden" value="'.$_SESSION["password"].'" name="passUsuario">
							      <input type="hidden" value="'.$_SESSION["foto"].'" name="fotoUsuario" id="fotoUsuario">
							      <input type="hidden" value="'.$_SESSION["modo"].'" name="modoUsuario" id="modoUsuario">';


							if($_SESSION["modo"] == "directo"){

								if($_SESSION["foto"] != ""){

									echo '<img src="'.$url.$_SESSION["foto"].'" class="img-thumbnail">';

								}else{

									echo '<img src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" class="img-thumbnail">';

								}
					

							}else{

								echo '<img src="'.$_SESSION["foto"].'" class="img-thumbnail">';
							}		

							?>

							</figure>

							<br>

							<?php

							if($_SESSION["modo"] == "directo"){
							
							echo '<button type="button" class="btn btn-default" id="btnCambiarFoto">
									
									Cambiar foto de perfil
									
									</button>';

							}

							?>

							<div id="subirImagen">
								
								<input type="file" class="form-control" id="datosImagen" name="datosImagen">

								<img class="previsualizar">

							</div>

						</div>	

						<div class="col-md-9 col-sm-8 col-xs-12">

						<br>
							
						<?php
						$item = "id";
						$valor = $_SESSION["id"];

						$usuarios = ControladorUsuarios::ctrMostrarUsuario($item, $valor);
						if($_SESSION["modo"] != "directo"){

						echo '

									<div class="container col-lg-12">
									<div class="row">
									<div class="col-lg-6">
										<label class="control-label text-muted text-uppercase">Nombre:</label>
									
											<div class="input-group">
										
												<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
												<input type="text" class="form-control" id="editarNombreRedes" name="editarNombreRedes" value="'.$usuarios["nombre"].'" readonly>

											</div>
									</div>
									
									<div class="col-lg-6">
										<label class="control-label text-muted text-uppercase">Correo electrónico:</label>
									
											<div class="input-group">
										
												<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
												<input type="text" class="form-control" id="editarEmailRedes" name="editarEmailRedes"  value="'.$usuarios["email"].'" readonly>

											</div>
									</div>
									</div>
									<div class="row">
									<div class="col-lg-6">
										<label class="control-label text-muted text-uppercase">Modo de registro en el sistema:</label>
									
											<div class="input-group">
										
												<span class="input-group-addon"><i class="fa fa-'.$_SESSION["modo"].'"></i></span>
												<input type="text" class="form-control text-uppercase"  value="'.$usuarios["modo"].'" readonly>

											</div>
									</div>
								
									<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">CP:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarCpRedes" id="editarCpRedes" class="form-control text-uppercase"  value="'.$usuarios["cp"].'" required placeholder="Ingresar código postal">

										</div>
									</div>
									</div>
									<div class="row">
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Pais:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarPaisRedes" id="editarPaisRedes" class="form-control text-uppercase"  value="'.$usuarios["pais"].'" required placeholder="Ingresar país">

										</div>
								</div>

								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Ciudad:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarCiudadRedes" id="editarCiudadRedes" class="form-control text-uppercase"  value="'.$usuarios["ciudad"].'" required placeholder="Ingresar ciudad">

										</div>
								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Estado:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarEstadoRedes" id="editarEstadoRedes" class="form-control text-uppercase"  value="'.$usuarios["estado"].'" required placeholder="Ingresar estado">

										</div>
								</div>
								
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Municipio:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarMunicipioRedes" id="editarMunicipioRedes" class="form-control text-uppercase"  value="'.$usuarios["municipio"].'" required placeholder="Ingresar municipio">

										</div>

								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">RFC:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarRfcRedes" id="editarRfcRedes" class="form-control text-uppercase"  value="'.$usuarios["rfc"].'" placeholder="Ingresar rfc">

										</div>
								</div>

								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Domicilio:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarDomicilioRedes" id="editarDomicilioRedes" class="form-control text-uppercase"  value="'.$usuarios["domicilio"].'" required placeholder="Ingresar domicilio">

										</div>
								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Colonia:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarColoniaRedes" id="editarColoniaRedes" class="form-control text-uppercase"  value="'.$usuarios["colonia"].'" required placeholder="Ingresar colonia">

										</div>
								</div>
								<div class="col-lg-6">

								<label class="control-label text-muted text-uppercase">Teléfono:</label>
									<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarTelefonoRedes" id="editarTelefonoRedes" class="form-control text-uppercase"  value="'.$usuarios["telefono"].'" required placeholder="Ingresar teléfono">

										</div>
										

								</div>
								</div>
								<div class="row">

									<div class="col-lg-12">

									<button type="submit" class="btn btn-default backColor btn-md pull-left" style="margin-top:20px;">Actualizar Datos</button>

									</div>

								</div>
							</div>';
		

						}else{

							echo '
							<div class="container col-lg-12">
								<div class="row">
								<div class="col-lg-6">

										<label class="control-label text-muted text-uppercase" for="editarNombre">Nombre de usuario:</label>
											
											<div class="input-group">
										
												<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
												<input type="text" class="form-control" id="editarNombre" name="editarNombre" value="'.$usuarios["nombre"].'" placeholder="Ingresar nombre de usuario" required>

											</div>
								</div>
							
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase" for="editarEmail">Correo Electrónico:</label>

										<div class="input-group">
										
												<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
												<input type="text" class="form-control" id="editarEmail" name="editarEmail" value="'.$usuarios["email"].'" placeholder="Ingresar email" required>

										</div>
								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">

									<label class="control-label text-muted text-uppercase" for="editarPassword">Cambiar Contraseña:</label>

										<div class="input-group">
										
												<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
												<input type="password" class="form-control" id="editarPassword" name="editarPassword" placeholder="Ingresar la nueva contraseña">

											</div>

								</div>

								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">CP:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarCp" id="editarCp" class="form-control text-uppercase"  value="'.$usuarios["cp"].'" required placeholder="Ingresar código postal">

										</div>
								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Pais:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarPais" id="editarPais" class="form-control text-uppercase"  value="'.$usuarios["pais"].'" required placeholder="Ingresar páis">

										</div>
								</div>

								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Ciudad:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarCiudad" id="editarCiudad" class="form-control text-uppercase"  value="'.$usuarios["ciudad"].'" required placeholder="Ingresar ciudad">

										</div>
								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Estado:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarEstado" id="editarEstado" class="form-control text-uppercase"  value="'.$usuarios["estado"].'" required placeholder="Ingresar estado">

										</div>
								</div>
								
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Municipio:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarMunicipio" id="editarMunicipio" class="form-control text-uppercase"  value="'.$usuarios["municipio"].'" required placeholder="Ingresar municipio">

										</div>

								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">RFC:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarRfc" id="editarRfc" class="form-control text-uppercase"  value="'.$usuarios["rfc"].'" placeholder="Ingresar rfc">

										</div>
								</div>

								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Domicilio:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarDomicilio" id="editarDomicilio" class="form-control text-uppercase"  value="'.$usuarios["domicilio"].'" required placeholder="Ingresar domicilio">

										</div>
								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Colonia:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarColonia" id="editarColonia" class="form-control text-uppercase"  value="'.$usuarios["colonia"].'" required placeholder="Ingresar colonia">

										</div>
								</div>
								<div class="col-lg-6">

								<label class="control-label text-muted text-uppercase">Teléfono:</label>
									<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarTelefono" id="editarTelefono" class="form-control text-uppercase"  value="'.$usuarios["telefono"].'" required placeholder="Ingresar teléfono">

									</div>
										

								</div>
							
								
								</div>
								<div class="row">
								<div class="col-lg-6">

									<button type="submit" class="btn btn-default backColor btn-md pull-left" style="margin-top:20px;">Actualizar Datos</button>

								</div>
								</div>
							</div>';


						}

						?>

						</div>

						<?php

							$actualizarPerfilRedes = new ControladorUsuarios();
							$actualizarPerfilRedes->ctrActualizarPerfilRedes();

						?>					


						<?php

							$actualizarPerfil = new ControladorUsuarios();
							$actualizarPerfil->ctrActualizarPerfil();

						?>					

					</form>
					<!--
					<button class="btn btn-danger btn-md pull-right" id="eliminarUsuario">Eliminar cuenta</button>

					<?php

							//$borrarUsuario = new ControladorUsuarios();
							//$borrarUsuario->ctrEliminarUsuario();

						?>	
					-->
				</div>

		  	</div>

		</div>

	</div>

</div>
<script type="text/javascript">
	$(document).ready( function () { $('#ventas').DataTable({
		"language": idioma_espanol
	}); } );

	var idioma_espanol = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
}
</script>