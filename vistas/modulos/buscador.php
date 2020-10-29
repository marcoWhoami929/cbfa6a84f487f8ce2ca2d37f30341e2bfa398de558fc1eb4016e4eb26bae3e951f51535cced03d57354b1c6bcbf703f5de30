<?php


$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();
date_default_timezone_set('America/Bogota');

$fecha = date('Y-m-d');
$hora = date('H:i:s');

$fechaActual = $fecha.' '.$hora;


$social = ControladorPlantilla::ctrEstiloPlantilla();
	$jsonRedesSociales = json_decode($social["redesSociales"],true);
	echo '<script src="'.$servidor.$social["type"].'"></script>'

?>

<!--=====================================
BARRA PRODUCTOS
======================================-->

<div class="container-fluid well well-sm barraProductos2 busc">
	

	<div class="container">
		
		<div class="row">

			<div class="col-sm-6 col-xs-12">
				
				<div class="btn-group">
					
					 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">

					  Ordenar Productos <span class="caret"></span></button>

					  <ul class="dropdown-menu" role="menu">

					  <?php
					  	
						echo '<li><a href="'.$url.$rutas[0].'/1/recientes/'.$rutas[3].'">Más reciente</a></li>
							  <li><a href="'.$url.$rutas[0].'/1/antiguos/'.$rutas[3].'">Más antiguo</a></li>';

						?>

					  </ul>

				</div>

			</div>
			
			<div class="col-sm-6 col-xs-12 organizarProductos">

				<div class="btn-group pull-right" id="grids">

					 <button type="button" class="btn btn-default btnGrid btn-grid-buscar" id="btnGrid0">
					 	
						<i class="fa fa-th" aria-hidden="true"></i>  

						<span class="col-xs-0 pull-right"> Cuadrícula</span>

					 </button>

					 <button type="button" class="btn btn-default btnList" id="btnList0">
					 	
						<i class="fa fa-list" aria-hidden="true"></i> 

						<span class="col-xs-0 pull-right"> Listado</span>

					 </button>
					
				</div>		

			</div>

		</div>

	</div>

</div>

<!--=====================================
LISTAR PRODUCTOS
======================================-->

<div class="container-fluid productos">

	<div class="container">
		
		<div class="row">

			<!--=====================================
			BREADCRUMB O MIGAS DE PAN
			======================================-->

			<ul class="breadcrumb fondoBreadcrumb text-uppercase">
				
				<li><a href="<?php echo $url;  ?>">INICIO</a></li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</ul>

			<?php

			/*=============================================
			LLAMADO DE PAGINACIÓN
			=============================================*/

			if(isset($rutas[1])){

				if(isset($rutas[2])){

					if($rutas[2] == "antiguos"){

						$modo = "ASC";
						$_SESSION["ordenar"] = "ASC";

					}else{

						$modo = "DESC";
						$_SESSION["ordenar"] = "DESC";

					}

				}else{

					$modo = $_SESSION["ordenar"];

				}

				$base = ($rutas[1] - 1)*12;
				$tope = 12;

			}else{

				$rutas[1] = 1;
				$base = 0;
				$tope = 12;
				$modo = "DESC";

			}

			/*=============================================
			LLAMADO DE PRODUCTOS POR BÚSQUEDA
			=============================================*/

			$productos = null;
			$listaProductos = null;

			$ordenar = "id";

			if(isset($rutas[3])){

				$busqueda = $rutas[3];

				$productos = ControladorProductos::ctrBuscarProductos($busqueda, $ordenar, $modo, $base, $tope);
				$listaProductos = ControladorProductos::ctrListarProductosBusqueda($busqueda);

			}

			
				if(!$productos){

				echo '<div class="col-xs-12 error404 text-center">

						 <h1><small>¡Oops!</small></h1>

						 <h2>Aún no hay productos en esta sección</h2>

					</div>';

			}else{

				echo '<ul class="grid0">';

					
					foreach ($productos as $key => $value) {
					
					echo '<li class="col-md-3 col-sm-4 col-xs-12">

							<figure>
								
								<a href="'.$url.$value["ruta"].'" class="pixelProducto">
									
									<img src="'.$servidor.$value["portada"].'" class="img-responsive">

								</a>

							</figure>

							

							<h4>
					
								<small>
									
									<a href="'.$url.$value["ruta"].'" class="pixelProducto">
										
										<strong class="nombre-p">'.$value["titulo"].'</strong><br>

										<span style="color:rgba(0,0,0,0)">-</span>';


										if($value["oferta"] != 0 && $value["finOferta"]>$fechaActual){

											echo '<span class="label label-warning fontSize">'.$value["descuentoOferta"].'% DESCUENTO</span><small>
						
												<strong class="oferta">MXN $'.number_format($value["precio"],2).'</strong>

											</small>';

										}else if($value["oferta"] == 0){
												echo '<span class="label label-warning" id="no-ofer">El producto no tiene oferta<small>
						
												

											</small>';
										}else{
											echo '<span class="label label-warning" id="fin-ofer">La oferta ha terminado</span><small>
						
												

											</small>';
										}	

									echo '</a>	

								</small>			

							</h4>

							<div class="col-xs-6 precio">';

							if($value["precio"] == 0){

								echo '<h2><small>GRATIS</small></h2>';

							}else{

								if($value["oferta"] != 0 && $value["finOferta"]>$fechaActual){

									if($value["detalles"] != null){

									$detalles = json_decode($value["detalles"], true);


									if($value["tipo"] == "fisico"){


										
										foreach($detalles["Marca"] as $marca => $Marca)
										{
											switch ($value['id_categoria']) {
														case 1:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Pintura Automotriz</small></h3>';
														break;
														case 2:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Pintura Arquitectónica</small></h3>';
														break;
														case 3:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Pintura Industrial</small></h3>';
														break;
														case 4:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Equipos de Aplicación</small></h3>';
														break;
														case 5:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Estética Automotriz</small></h3>';
														break;
														case 6:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Abrasivos</small></h3>';
														break;
														case 7:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Complementos</small></h3>';
														break;
													default:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Sin categoría</small></h3>';
														break;
												}
												if ($value["existencias"]<=0) {
													echo '<h3><small id="existencias"><span class="label label-danger" style="font-size:12px;">SIN EXISTENCIAS</span></small></h3>';
												}else if($value["existencias"]>=5 && $value["existencias"] < $value["stockMax"]){
													echo '<h3><small id="existencias">Existencias: <span class="label label-info" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}else if ($value["existencias"]>=5 && $value["existencias"] > $value["stockMax"]) {

													echo '<h3><small id="existencias">Existencias: <span class="label label-info" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}
												else if($value["existencias"]<5 && $value["existencias"] > $value["stockMin"]){
													echo '<h3><small id="existencias">Existencias: <span class="label label-warning" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}
												else if($value["existencias"]<5 && $value["existencias"] <= $value["stockMin"]){
													echo '<h3><small id="existencias">Existencias: <span class="label label-warning" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}
											echo '<h3><small style="font-weight:bold" class="prec-p">MXN $'.number_format($value["precioOferta"], 2).'</small></h3>';
										
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
								else{


									if($value["detalles"] != null){

									$detalles = json_decode($value["detalles"], true);


									if($value["tipo"] == "fisico"){


										
										foreach($detalles["Marca"] as $marca => $Marca)
										{
											switch ($value['id_categoria']) {
														case 1:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Pintura Automotriz</small></h3>';
														break;
														case 2:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Pintura Arquitectónica</small></h3>';
														break;
														case 3:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Pintura Industrial</small></h3>';
														break;
														case 4:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Equipos de Aplicación</small></h3>';
														break;
														case 5:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Estética Automotriz</small></h3>';
														break;
														case 6:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Abrasivos</small></h3>';
														break;
														case 7:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Complementos</small></h3>';
														break;
													default:
														echo '<h3 id="categoria-h"><small id="categoria-pro">Sin categoría</small></h3>';
														break;
												}
												if ($value["existencias"]<=0) {
													echo '<h3><small id="existencias"><span class="label label-danger" style="font-size:12px;">SIN EXISTENCIAS</span></small></h3>';
												}else if($value["existencias"]>=5 && $value["existencias"] < $value["stockMax"]){
													echo '<h3><small id="existencias">Existencias: <span class="label label-info" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}else if ($value["existencias"]>=5 && $value["existencias"] > $value["stockMax"]) {

													echo '<h3><small id="existencias">Existencias: <span class="label label-info" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}
												else if($value["existencias"]<5 && $value["existencias"] > $value["stockMin"]){
													echo '<h3><small id="existencias">Existencias: <span class="label label-warning" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}
												else if($value["existencias"]<5 && $value["existencias"] <= $value["stockMin"]){
													echo '<h3><small id="existencias">Existencias: <span class="label label-warning" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}
											echo '<h3><small style="font-weight:bold" class="prec-p">MXN $'.number_format($value["precio"],2).'</small></h3>';
										
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

							<div class="col-xs-6 enlaces">
								
								<div class="btn-group pull-right">
									
									<button type="button" class="btn btn-default btn-xs deseos" idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">
										
										<i class="fa fa-heart" aria-hidden="true" style="#777777"></i>

									</button>';

									if($value["tipo"] == "fisico"){

										if($value["oferta"] != 0 && $value["finOferta"]>$fechaActual && $value["existencias"]>0){

											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';

										}
										if($value["oferta"] != 0 && $value["finOferta"]<$fechaActual && $value["existencias"]>0){

											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';
										}
										if($value["oferta"] == 0 && $value["existencias"] > 0){

											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';
										}else{

										}
										

									}

									echo '<a href="'.$url.$value["ruta"].'" class="pixelProducto">
									
										<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
											
											<i class="fa fa-eye" aria-hidden="true" style="#777777"></i>

										</button>	
									
									</a>

								</div>

							</div>

						</li>';
				}

				echo '</ul>

				<ul class="list0" style="display:none">';

				foreach ($productos as $key => $value) {

					echo '<li class="col-xs-12">
					  
				  		<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
							   
							<figure>
						
								<a href="'.$url.$value["ruta"].'" class="pixelProducto">
									
									<img src="'.$servidor.$value["portada"].'" class="img-responsive">

								</a>

							</figure>

					  	</div>  	
							  
						<div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">
							
							<h1>

								<small>

									<a href="'.$url.$value["ruta"].'" class="pixelProducto">
										
										<strong class="nombre-p-list">'.$value["titulo"].'</strong><br>';

										

										if($value["oferta"] != 0 && $value["finOferta"]>$fechaActual){

											echo '<span class="label label-info">'.$value["descuentoOferta"].'% DESCUENTO</span><small>
						
												<strong class="oferta">MXN $'.number_format($value["precio"],2).'</strong>

											</small>';

										}else if($value["oferta"] == 0){
												echo '<span class="label label-danger" id="no-ofer">El producto no tiene oferta<small>
						
												

											</small>';
										}else{
											echo '<span class="label label-warning" id="fin-ofer">La oferta ha terminado</span><small>
						
												

											</small>';
										}		

									echo '</a>

								</small>

							</h1>

							<p class="text-muted">'.$value["titular"].'</p>';

							if($value["precio"] == 0){

								echo '<h2><small>GRATIS</small></h2>';

							}else{

								if($value["oferta"] != 0 && $value["finOferta"]>$fechaActual){

									if($value["detalles"] != null){

									$detalles = json_decode($value["detalles"], true);


									if($value["tipo"] == "fisico"){


										
										foreach($detalles["Marca"] as $marca => $Marca)
										{
											switch ($value['id_categoria']) {
														case 1:

														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Pintura Automotriz</small></h3>';
														break;
														case 2:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Pintura Arquitectónica</small></h3>';
														break;
														case 3:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Pintura Industrial</small></h3>';
														break;
														case 4:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Equipos de Aplicación</small></h3>';
														break;
														case 5:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Estética Automotriz</small></h3>';
														break;
														case 6:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Abrasivos</small></h3>';
														break;
														case 7:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Complementos</small></h3>';
														break;
													default:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Sin categoría</small></h3>';
														break;
												}
												if ($value["existencias"]<=0) {
													echo '<h3><small id="existencias"><span class="label label-danger" style="font-size:12px;">SIN EXISTENCIAS</span></small></h3>';
												}else if($value["existencias"]>=5 && $value["existencias"] < $value["stockMax"]){
													echo '<h3><small id="existencias">Existencias: <span class="label label-info" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}else if ($value["existencias"]>=5 && $value["existencias"] > $value["stockMax"]) {

													echo '<h3><small id="existencias">Existencias: <span class="label label-info" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}
												else if($value["existencias"]<5 && $value["existencias"] > $value["stockMin"]){
													echo '<h3><small id="existencias">Existencias: <span class="label label-warning" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}
												else if($value["existencias"]<5 && $value["existencias"] <= $value["stockMin"]){
													echo '<h3><small id="existencias">Existencias: <span class="label label-warning" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}
											echo '<h3><small style="font-weight:bold" class="prec-p">MXN $'.number_format($value["precioOferta"],2).'</small></h3>';
										
										}	
									}
								}
									switch ($Marca) {
										case 'ZAAK':
											echo '<img src="'.$servidor.$social["zaak"].'" class="img-responsive" width="15%" id="img-marca2">';
											break;
										case 'GONI':
											echo '<img src="'.$servidor.$social["goni"].'" class="img-responsive" width="15%" id="img-marca2">';
											break;
										case '3M':
											echo '<img src="'.$servidor.$social["3m"].'" class="img-responsive" width="15%" id="img-marca2">';
											break;
										case 'EXCELO':
											echo '<img src="'.$servidor.$social["excelo"].'" class="img-responsive" width="15%" id="img-marca2">';
											break;
										default:
											echo "Sin Marca";
											break;
									}

								}else{

									if($value["detalles"] != null){

									$detalles = json_decode($value["detalles"], true);


									if($value["tipo"] == "fisico"){


										
										foreach($detalles["Marca"] as $marca => $Marca)
										{
											switch ($value['id_categoria']) {
														case 1:

														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Pintura Automotriz</small></h3>';
														break;
														case 2:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Pintura Arquitectónica</small></h3>';
														break;
														case 3:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Pintura Industrial</small></h3>';
														break;
														case 4:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Equipos de Aplicación</small></h3>';
														break;
														case 5:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Estética Automotriz</small></h3>';
														break;
														case 6:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Abrasivos</small></h3>';
														break;
														case 7:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Complementos</small></h3>';
														break;
													default:
														echo '<h3 id="categoria-h-2"><small id="categoria-pro-2">Sin categoría</small></h3>';
														break;
												}

												if ($value["existencias"]<=0) {
													echo '<h3><small id="existencias"><span class="label label-danger" style="font-size:12px;">SIN EXISTENCIAS</span></small></h3>';
												}else if($value["existencias"]>=5 && $value["existencias"] < $value["stockMax"]){
													echo '<h3><small id="existencias">Existencias: <span class="label label-info" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}else if ($value["existencias"]>=5 && $value["existencias"] > $value["stockMax"]) {

													echo '<h3><small id="existencias">Existencias: <span class="label label-info" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}
												else if($value["existencias"]<5 && $value["existencias"] > $value["stockMin"]){
													echo '<h3><small id="existencias">Existencias: <span class="label label-warning" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}
												else if($value["existencias"]<5 && $value["existencias"] <= $value["stockMin"]){
													echo '<h3><small id="existencias">Existencias: <span class="label label-warning" style="font-size:12px;">'.$value["existencias"].'</span></small></h3>';
												}
											echo '<h3><small style="font-weight:bold" class="prec-p">MXN $'.number_format($value["precio"], 2).'</small></h3>';
										
										}	
									}
								}
									switch ($Marca) {
										case 'ZAAK':
											echo '<img src="'.$servidor.$social["zaak"].'" class="img-responsive" width="15%" id="img-marca2">';
											break;
										case 'GONI':
											echo '<img src="'.$servidor.$social["goni"].'" class="img-responsive" width="15%" id="img-marca2">';
											break;
										case '3M':
											echo '<img src="'.$servidor.$social["3m"].'" class="img-responsive" width="15%" id="img-marca2">';
											break;
										case 'EXCELO':
											echo '<img src="'.$servidor.$social["excelo"].'" class="img-responsive" width="15%" id="img-marca2">';
											break;
										default:
											echo "Sin Marca";
											break;
									}

								}
								
							}

							echo '

								<form action="" method="post" name="" style="display:none;"> 
												  <select class="form-control seleccionarCantidad" name="seleccionarCantidad" id="seleccionarCantidad">
													<option value="0" disabled>Seleccionar Cantidad</option>
													<option value="1">1</option>
													
													
													</select>

											</form>

							';
							echo '<div class="btn-group pull-left enlaces">
						  	
						  		<button type="button" class="btn btn-default btn-xs deseos"  idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">

						  			<i class="fa fa-heart" aria-hidden="true" style="color#777777"></i>

						  		</button>';
						  		if($value["tipo"] == "fisico"){

										if($value["oferta"] != 0 && $value["finOferta"]>$fechaActual && $value["existencias"]>0){

											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';

										}
										if($value["oferta"] != 0 && $value["finOferta"]<$fechaActual && $value["existencias"]>0){

											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';
										}
										if($value["oferta"] == 0 && $value["existencias"] > 0){

											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';
										}else{

										}
										

									}

						  		echo '<a href="'.$url.$value["ruta"].'" class="pixelProducto">

							  		<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

							  		<i class="fa fa-eye" aria-hidden="true"></i>

							  		</button>

						  		</a>
							
							</div>

						</div>

						<div class="col-xs-12"><hr></div>

					</li>';

				}

				echo '</ul>';
			}

			?>

			<div class="clearfix"></div>

			<center>

			<!--=====================================
			PAGINACIÓN
			======================================-->
			
			<?php

				if(count($listaProductos) != 0){

					$pagProductos = ceil(count($listaProductos)/12);

					if($pagProductos > 4){

						/*=============================================
						LOS BOTONES DE LAS PRIMERAS 4 PÁGINAS Y LA ÚLTIMA PÁG
						=============================================*/

						if($rutas[1] == 1){

							echo '<ul class="pagination">';
							
							for($i = 1; $i <= 4; $i ++){

								echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

							}

							echo ' <li class="disabled"><a>...</a></li>
								   <li id="item'.$pagProductos.'"><a href="'.$url.$rutas[0].'/'.$pagProductos.'/'.$rutas[2].'/'.$rutas[3].'">'.$pagProductos.'</a></li>
								   <li><a href="'.$url.$rutas[0].'/2/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

							</ul>';

						}

						/*=============================================
						LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ABAJO
						=============================================*/

						else if($rutas[1] != $pagProductos && 
							    $rutas[1] != 1 &&
							    $rutas[1] <  ($pagProductos/2) &&
							    $rutas[1] < ($pagProductos-3)
							    ){

								$numPagActual = $rutas[1];

								echo '<ul class="pagination">
									  <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> ';
							
								for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

									echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

								}

								echo ' <li class="disabled"><a>...</a></li>
									   <li id="item'.$pagProductos.'"><a href="'.$url.$rutas[0].'/'.$pagProductos.'/'.$rutas[2].'/'.$rutas[3].'">'.$pagProductos.'</a></li>
									   <li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

								</ul>';

						}

						/*=============================================
						LOS BOTONES DE LA MITAD DE PÁGINAS HACIA ARRIBA
						=============================================*/

						else if($rutas[1] != $pagProductos && 
							    $rutas[1] != 1 &&
							    $rutas[1] >=  ($pagProductos/2) &&
							    $rutas[1] < ($pagProductos-3)
							    ){

								$numPagActual = $rutas[1];
							
								echo '<ul class="pagination">
								   <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
								   <li id="item1"><a href="'.$url.$rutas[0].'/1/'.$rutas[2].'/'.$rutas[3].'">1</a></li>
								   <li class="disabled"><a>...</a></li>
								';
							
								for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

									echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

								}


								echo '  <li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
									</ul>';
						}

						/*=============================================
						LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG
						=============================================*/

						else{

							$numPagActual = $rutas[1];

							echo '<ul class="pagination">
								   <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'/'.$rutas[2].'/'.$rutas[3].'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
								   <li id="item1"><a href="'.$url.$rutas[0].'/1/'.$rutas[2].'/'.$rutas[3].'">1</a></li>
								   <li class="disabled"><a>...</a></li>
								';
							
							for($i = ($pagProductos-3); $i <= $pagProductos; $i ++){

								echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

							}

							echo ' </ul>';

						}

					}else{

						echo '<ul class="pagination">';
						
						for($i = 1; $i <= $pagProductos; $i ++){

							echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'/'.$rutas[2].'/'.$rutas[3].'">'.$i.'</a></li>';

						}

						echo '</ul>';

					}

				}

			?>

			</center>

</div>

</div>

</div>
