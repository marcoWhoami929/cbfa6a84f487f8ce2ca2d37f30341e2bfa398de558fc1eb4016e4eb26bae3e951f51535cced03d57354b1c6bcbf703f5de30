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

<div class="container-fluid well well-sm" id="barraMayoreo">
	
	<div class="container">
		
		<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
			
			<ul class="breadcrumb fondoBreadcrumb text-uppercase">
				
				<li><a href="<?php echo $url;  ?>">INICIO</a></li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</ul>

		</div>
		<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
			
			<ul class="breadcrumb fondoBreadcrumb text-uppercase">
				
				
				<li class="active">USUARIO: <b style="color: white"><?php echo $_SESSION["nombre"] ?></b></li>
				<li class="active">EMAIL: <b style="color: white; text-transform: lowercase;"><?php echo $_SESSION["email"] ?></b></li>
				


			</ul>

		</div>

	</div>

</div>

<!--=====================================
SECCIÓN PERFIL
======================================-->

<div class="container-fluid" class="perfil-user" id="menuMayoreo">
	

	<div class="col-lg-2 col-md-2 col-sm-12 col-xs-12" style="background: #000000">
	
		<ul class="nav nav-pills nav-stacked">

		  <li class="active"><a  data-toggle="tab" href="#upload"><i class="fa fa-upload"></i> SUBIR ARCHIVO DE PEDIDO</a></li>

		  <li><a  data-toggle="tab" href="#pedido"><i class="fa fa-list-ul"></i>LISTA DE PEDIDOS</a></li>

		  <li><a  data-toggle="tab" href="#buscadore"><i class="fa fa-search"></i> BUSCADOR DE PRODUCTOS</a></li>

		  <li><a  data-toggle="tab" href="#deseos"><i class="fa fa-gift"></i> MI LISTA DE DESEOS</a></li>

		  <li><a  data-toggle="tab" href="#perfil"><i class="fa fa-user"></i> EDITAR PERFIL</a></li>

		  <li><a  data-toggle="tab" href="#estatus"><i class="fa fa-spinner" aria-hidden="true"></i>ESTATUS DE PEDIDO</a></li>


		  

		</ul>

	</div>
		<div class="container col-lg-10 col-md-10 col-sm-12 col-xs-12">

		

		<div class="tab-content">

    							
			<!--=====================================
			PESTAÑA SUBIR ARCHIVO
			======================================-->
			<div id="upload" class="tab-pane fade in active">
				
			
			<div class="container col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<br>
						<div class="row">
							<form action="control.php" method="post" enctype="multipart/form-data" id="import_form">
								<div class="col-lg-3 col-md-3 col-sm-12 col-sm-12">
								<input type="file" name="file" />
								</div>
								<div class="col-lg-1 col-md-1 col-sm-12 col-sm-12"></div>
								<div class="col-lg-8 col-md-8 col-sm-12 col-sm-12">
									<button type="submit" class="btn btn-primary" name="import_data" value="IMPORTAR" >
										
										<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#FFFFFF"></i> IMPORTAR

									</button>
								
								
								</div>
							</form>
						</div>
						<br>
						<div class="row">
							
							<div class="table-responsive">
								<table class="table" id="pedidos">
									   <thead>
								<tr>
									<th>Pedido</th>
									<th>Cantidad</th>
									<th>Fecha</th>
									<th>PDF</th>
								</tr>
								</thead>
									<tbody>
										<?php
										
										/* Database connection start */
										$servername = "localhost";
										$username = "root";
										$password = "";
										$dbname = "sfdeshop4";
										$conn = mysqli_connect($servername, $username, $password, $dbname);
										if (mysqli_connect_errno()) {
											printf("Connect failed: %sn", mysqli_connect_error());
											exit();
										}


										$sql = "SELECT *, SUM(cantidad) as cantidad_productos 
											FROM pedidos WHERE id_usuario=" . $_SESSION['id'] . " GROUP BY id_pedido";
										$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
										if(mysqli_num_rows($resultset)) {
											while( $rows = mysqli_fetch_assoc($resultset) ) {
											?>
												<tr>
													<td><?php echo $rows['id_pedido']; ?></td>
													<td><?php echo $rows['cantidad_productos']; ?></td>
													<td><?php echo $rows['fecha']; ?></td>
													<td>
														<a href="pdf-mayoreo/<?php echo $rows['id_pedido']; ?>">
															Ver
														</a>
													</td>
												</tr>
											<?php 
											}
										} else{
										?>
											<tr><td colspan="5">No hay datos en la tabla</td></tr>
										<?php
										}
										?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--cARGA DE ARCHIVOS-->

			<div class="principal">
				<h1>Subir archivo de pedido</h1>
				<form action="" id="form_subir">
					<div class="form-1-2">
						<label for="">Archivo a subir:</label>
						<input type="file" name="archivo" required>
					</div>

					<div class="barra">
						<div class="barra_azul" id="barra_estado">
							<span></span>
						</div>
					</div>
					<br>
					<br>
					<div class="acciones">
						<input type="submit" class="btn btn-success" value="Enviar">
						<input type="button" class="btn cancel btn-warning" id="cancelar" value="Cancelar">
					</div>
				</form>

				<?php 
				$host = $_SERVER["HTTP_HOST"];
				$url= $_SERVER["REQUEST_URI"];
				$dir = 'localhost/eshop/perfilMayoreo?import_status=success';
				$dir2 = 'localhost/eshop/perfilMayoreo?import_status=error';
				$dir3 = 'localhost/eshop/perfilMayoreo?import_status=invalid_file';
				$direccion = $host.$url;


				if ($direccion == $dir ) {
						echo "<script>
						swal(
							  'Excelente !',
							  'Su pedido ha sido importado exitosamente!',
							  'success'
							)
							</script>";
				}else if ($direccion == $dir2 ) {
						echo "
						<script>
							swal({
							  type: 'error',
							  title: 'Lo sentimos...',
							  text: 'Ha ocurrido un error durante la importación de su pedido!',
							  footer: 'Intentelo nuevamente'
							})
							</script>
						";
				}
				else if ($direccion == $dir3 ) {
						echo "
						<script>
							swal({
							  type: 'error',
							  title: 'Lo sentimos...',
							  text: 'El formaro de archivo que ingresó es inválido!',
							  footer: 'Intentelo nuevamente'
							})
							</script>
						";
				}
					
					
				


				 ?>
			</div>
			</div>
		  	<!--=====================================
			PESTAÑA PEDIDOS
			======================================-->

	  		<div id="pedido" class="tab-pane">

	  			<?php
					$item = "id";
					$valor = $_SESSION["id"];

					$pedidos = ControladorUsuarios::ctrMostrarUsuario($item, $valor);

					if(!$pedidos){
						echo '
							<div class="text-center error404">		               
					    		<h1><small>¡Oops!</small></h1>
					    		<h2>Aún no ha realizado ningun pedido.</h2>
					  		</div>
				  		';

					}else{
						?>

						<div class="panel-group">
							<table class="table table-bordered table-striped dt-responsive table-responsive tablaVentas" width="100%">
		        
								<thead>

								<tr>
								  
								  <th style="width:10px"># Pedido</th>
								  <th>Código</th>    
								  <th>Cantidad</th>
								  <th>Fecha</th>
								  <th>Descargar Pedido</th>
								</tr>

								</thead> 

								<tbody>
								
								</tbody>
						  
							</table>
						
							</div>

						</div>
					<?php
					}
				?>
		  	</div>
		  	<!--=====================================
			PESTAÑA BUSCADOR
			======================================-->

	  		<div id="buscadore" class="tab-pane fade">

	  				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					               
				    		<h2><small class="subtitulos">BUSCAR PRODUCTOS</small></h2>

				  	</div>
				  		<div class="col-lg-12">
							
								<form class="form-horizontal" role="form">
								
										<div class="form-group row">
											
											<div class="col-md-12">
												<input type="buscador" class="form-control buscador" id="q" placeholder="Buscar por Código, Marca, Nombre, Medida....." onkeyup='load(1);'>
											</div>
											<div class="col-md-12">
												
												<span id="loader"></span>
											</div>
											
										</div>
								</form>
								<div id="resultados"></div><!-- Carga los datos ajax -->
								<div class='outer_div'></div><!-- Carga los datos ajax -->
							
						</div>	
						
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
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					               
				    					<h2><small class="subtitulos">MI PERFIL</small></h2>

				  						</div>
						<div class="col-md-3 col-sm-4 col-xs-12 text-center">
							
							<br>

							<figure id="imgPedido">
								
							<?php

							echo '<input type="hidden" value="'.$_SESSION["id"].'" id="idUsuario" name="idUsuario" >
							      <input type="hidden" value="'.$_SESSION["password"].'" name="passUsuario">
							      <input type="hidden" value="'.$_SESSION["foto"].'" name="fotoUsuario" id="fotoUsuario">
							      <input type="hidden" value="'.$_SESSION["modo"].'" name="modoUsuario" id="modoUsuario">';


							if($_SESSION["modo"] == "mayoreo"){

								if($_SESSION["foto"] != ""){

									echo '<img src="'.$_SESSION["foto"].'" class="img-thumbnail">';

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

							if($_SESSION["modo"] == "mayoreo"){
							
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

						$usuarios = ControladorUsuarios::ctrMostrarUsuarioMayoreo($item, $valor);

						if($_SESSION["modo"] != "mayoreo"){

							echo '

									<div class="container">
									<div class="row">
									<div class="col-lg-6">
										<label class="control-label text-muted text-uppercase">Nombre:</label>
									
											<div class="input-group">
										
												<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
												<input type="text" class="form-control"  value="'.$_SESSION["nombre"].'" readonly>

											</div>
									</div>
									
									<div class="col-lg-6">
										<label class="control-label text-muted text-uppercase">Correo electrónico:</label>
									
											<div class="input-group">
										
												<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
												<input type="text" class="form-control"  value="'.$_SESSION["email"].'" readonly>

											</div>
									</div>
									</div>
									<div class="row">
									<div class="col-lg-6">
										<label class="control-label text-muted text-uppercase">Modo de registro en el sistema:</label>
									
											<div class="input-group">
										
												<span class="input-group-addon"><i class="fa fa-'.$_SESSION["modo"].'"></i></span>
												<input type="text" class="form-control text-uppercase"  value="'.$_SESSION["modo"].'" readonly>

											</div>
									</div>
								
									<div class="col-lg-6">
										<label class="control-label text-muted text-uppercase">RFC:</label>
									
											<div class="input-group">
										
												<span class="input-group-addon"><i class="fa fa-'.$_SESSION["rfc"].'"></i></span>
												<input type="text" class="form-control text-uppercase"  value="'.$_SESSION["rfc"].'">

											</div>
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
												<input type="text" class="form-control text-uppercase" id="editarNombreMayoreo" name="editarNombreMayoreo" value="'.$usuarios["nombre"].'" readonly>

											</div>
								</div>
							
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase" for="editarEmail">Correo Electrónico:</label>

										<div class="input-group">
										
												<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
												<input type="text" class="form-control text-uppercase" id="editarEmailMayoreo" name="editarEmailMayoreo" value="'.$_SESSION["email"].'" required placeholder="Ingresar correo electrónico">

										</div>
								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">

									<label class="control-label text-muted text-uppercase" for="editarPassword">Cambiar Contraseña:</label>

										<div class="input-group">
										
												<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
												<input type="password" class="form-control text-uppercase" id="editarPasswordMayoreo" name="editarPasswordMayoreo" placeholder="Escribe la nueva contraseña">

											</div>

								</div>

								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">CP:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarCpMayoreo" id="editarCpMayoreo" class="form-control text-uppercase"  value="'.$usuarios["cp"].'" required placeholder="Ingresar cp">

										</div>
								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Pais:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarPaisMayoreo" id="editarPaisMayoreo" class="form-control text-uppercase"  value="'.$usuarios["pais"].'" required placeholder="Ingresar país">

										</div>
								</div>

								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Ciudad:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarCiudadMayoreo" id="editarCiudadMayoreo" class="form-control text-uppercase"  value="'.$usuarios["ciudad"].'" required placeholder="Ingresar ciudad">

										</div>
								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Estado:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarEstadoMayoreo" id="editarEstadoMayoreo" class="form-control text-uppercase"  value="'.$usuarios["estado"].'" required placeholder="Ingresar estado">

										</div>
								</div>
								
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Municipio:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarMunicipioMayoreo" id="editarMunicipioMayoreo" class="form-control text-uppercase"  value="'.$usuarios["municipio"].'" required placeholder="Ingresar municipio">

										</div>

								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">RFC:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarRfcMayoreo" id="editarRfcMayoreo" class="form-control text-uppercase"  value="'.$usuarios["rfc"].'" placeholder="Ingresar rfc">

										</div>
								</div>

								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Domicilio:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarDomicilioMayoreo" id="editarDomicilioMayoreo" class="form-control text-uppercase"  value="'.$usuarios["domicilio"].'" required placeholder="Ingresar domicilio">

										</div>
								</div>
								</div>

								<div class="row">
								<div class="col-lg-6">
									<label class="control-label text-muted text-uppercase">Colonia:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarColoniaMayoreo" id="editarColoniaMayoreo" class="form-control text-uppercase"  value="'.$usuarios["colonia"].'" required placeholder="Ingresar colonia">

										</div>
								</div>
							
								<div class="col-lg-6">

									<label class="control-label text-muted text-uppercase">Teléfono:</label>
								
										<div class="input-group">
									
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="editarTelefonoMayoreo" id="editarTelefonoMayoreo" class="form-control text-uppercase"  value="'.$usuarios["telefono"].'" required placeholder="Ingresar teléfono">

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

							$actualizarPerfil = new ControladorUsuarios();
							$actualizarPerfil->ctrActualizarPerfilMayoreo();

						?>					

					</form>

					

				</div>

		  	</div>

		  		<!--=====================================
			PESTAÑA COMPRAS
			======================================-->

	  		<div id="estatus" class="tab-pane fade">
	  			<?php
					
							echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
					               
				    		<h2><small class="subtitulos">ESTATUS DE SUS PEDIDOS</small></h2>
				    
				    		

				  		</div>';

				
				?>
	  			
		  	</div>

		</div>

	</div>

</div>
<script type="text/javascript">
	$(document).ready( function () { $('#pedidos').DataTable({
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