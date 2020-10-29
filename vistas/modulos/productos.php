<!--=====================================
BANNER
======================================-->

<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();


$social = ControladorPlantilla::ctrEstiloPlantilla();
$jsonRedesSociales = json_decode($social["redesSociales"],true);
echo '<script src="'.$servidor.$social["type"].'"></script>';

$ruta = $rutas[0];

$banner = ControladorProductos::ctrMostrarBanner($ruta);

date_default_timezone_set('America/Bogota');

$fecha = date('Y-m-d');
$hora = date('H:i:s');

$fechaActual = $fecha.' '.$hora;

if($banner != null){

	if($banner["estado"] != 0){

		echo '<figure class="banner">

				<img src="'.$servidor.$banner["img"].'" class="img-responsive" width="100%">';	

				if($banner["ruta"] != "sin-categoria"){

					/*=============================================
					BANNER PARA CATEGORÍAS
					=============================================*/

					if($banner["tipo"] == "categorias"){

						$item = "ruta";
						$valor = $banner["ruta"];

						$ofertas = ControladorProductos::ctrMostrarCategorias($item, $valor);

						if($ofertas["oferta"] == 1 && $ofertas["finOferta"]>$fechaActual){

							echo '<div class="textoBanner textoIzq">

								<h1 style="color:#fff" class="text-uppercase">'.$ofertas["categoria"].'</h1>

							</div>

							<div class="textoBanner textoDer">

							
								<h1 style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;;text-shadow: 3px 3px 3px #ffffff;">OFERTAS ESPECIALES</h1>';
								$datetime1 = new DateTime($ofertas["finOferta"]);
								$datetime2 = new DateTime($fechaActual);

								$interval = date_diff($datetime1, $datetime2);

								$finOferta = $interval->format('%a');

								

								if($ofertas["precioOferta"] != 0){
									
									echo '<h2 style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;;text-shadow: 3px 3px 3px #ffffff;"><strong>Los productos de esta categoría a $ '.$ofertas["precioOferta"].'</strong></h2>';

								}

								if($ofertas["descuentoOferta"] != 0){
								
									echo '<h2 style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;;text-shadow: 3px 3px 3px #ffffff;"><strong>Los productos de esta categoría con '.$ofertas["descuentoOferta"].'% de descuento</strong></h2>';
								}

							

							echo '<h3 class="col-md-0 col-sm-0 col-xs-0" style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;;text-shadow: 3px 3px 3px #ffffff;" >
								
								La oferta termina en<br>

								<div class="countdown" finOferta="'.$ofertas["finOferta"].'" id="contador">


							</h3>';
							

							echo '</div>';

						}if ($ofertas["oferta"] == 0) {

						
			
								echo '<div class="textoBanner textoIzq">

								<h1 style="color:#fff" class="text-uppercase">'.$ofertas["categoria"].'</h1>
								

							</div><div class="textoBanner textoDer">
								<h1 style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;">Por el momento no tenemos <br><br> ofertas en esta categoría.</h1>
								<h3  style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;">Espere nuestras nuevas ofertas</h3>

							</div>';
					
							
							
							
						}
						if($ofertas["oferta"] == 1 && $ofertas["finOferta"] < $fechaActual){
								echo '<div class="textoBanner textoIzq">

								<h1 style="color:#fff" class="text-uppercase">'.$ofertas["categoria"].'</h1>
								

							</div><div class="textoBanner textoDer">
								<h1 style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;">La oferta se ha terminado</h1>
								<h3  style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;">Espere nuestras nuevas ofertas</h3>

							</div>';
							}
						
						
						

					}

					/*=============================================
					BANNER PARA SUBCATEGORÍAS
					=============================================*/

					if($banner["tipo"] == "subcategorias"){

						$item = "ruta";
						$valor = $banner["ruta"];

						$ofertas = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

						if($ofertas[0]["oferta"] == 1 && $ofertas[0]["finOferta"]>$fechaActual){

							echo '<div class="textoBanner textoIzq" id="nombre-cate">

								<h1 style="color:#fff" class="text-uppercase">'.$ofertas[0]["subcategoria"].'</h1>

							</div>

							<div class="textoBanner textoDer">
							
								<h1 style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;">OFERTAS ESPECIALES</h1>';
								$datetime1 = new DateTime($ofertas[0]["finOferta"]);
								$datetime2 = new DateTime($fechaActual);

								$interval = date_diff($datetime1, $datetime2);

								$finOferta = $interval->format('%a');


								if($ofertas[0]["precioOferta"] != 0){
									
									echo '<h2 style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;"><strong>Los productos de esta categoría a $ '.$ofertas[0]["precioOferta"].'</strong></h2>';

								}

								if($ofertas[0]["descuentoOferta"] != 0){
								
									echo '<h2 style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;"><strong>Los productos de esta categoría con '.$ofertas[0]["descuentoOferta"].'% de descuento</strong></h2>';
								}

							echo '<h3 class="col-md-0 col-sm-0 col-xs-0" style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;">
								
								La oferta termina en<br>

								<div class="countdown" finOferta="'.$ofertas[0]["finOferta"].'" id="contador">


							</h3>';

							echo '</div>';

						}

						if ($ofertas[0]["oferta"] == 0) {

						
			
								echo '<div class="textoBanner textoIzq" id="nombre-subcate">

								<h1 style="color:#fff" class="text-uppercase">'.$ofertas[0]["subcategoria"].'</h1>
								

							</div><div class="textoBanner textoDer">
								<h1 style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;">Por el momento no tenemos <br><br> ofertas en esta categoría.</h1>
								<h3  style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;">Espere nuestras nuevas ofertas</h3>

							</div>';
					
							
							
							
						}
						if($ofertas[0]["oferta"] == 1 && $ofertas[0]["finOferta"] < $fechaActual){
								echo '<div class="textoBanner textoIzq" >

								<h1 style="color:#fff" class="text-uppercase">'.$ofertas[0]["subcategoria"].'</h1>
								

							</div><div class="textoBanner textoDer">
								<h1 style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;">La oferta se ha terminado</h1>
								<h3  style="color:#1971A4; text-shadow: 3px 3px 3px #ffffff;">Espere nuestras nuevas ofertas</h3>

							</div>';
							}


						
					}



				}

		echo '</figure>';

	}

}

?>

<!--=====================================
BARRA PRODUCTOS
======================================-->

<div class="container-fluid well well-sm barraProductos">

	<div class="container">
		
		<div class="row">

			<div class="col-sm-6 col-xs-6">
				
				<div class="btn-group">
					
					 <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" id="ordenar-productos">

					  Ordenar Productos <span class="caret"></span></button>

					  <ul class="dropdown-menu" role="menu">

					  <?php
					  	
						echo '<li><a href="'.$url.$rutas[0].'/1/recientes">Más reciente</a></li>
							  <li><a href="'.$url.$rutas[0].'/1/antiguos">Más antiguo</a></li>';

						?>

					  </ul>

				</div>

			</div>
			
			<div class="col-sm-6 col-xs-6 organizarProductos">

				<div class="btn-group pull-right" id="grids">

					 <button type="button" class="btn btn-default btnGrid" id="btnGrid0">
					 	
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
<div class="container-fluid ofer">
	<div class="container">
		<div class="row">
				<?php
				if($banner != null){

				if($banner["estado"] != 0){

				if($banner["ruta"] != "sin-categoria"){

					/*=============================================
					BANNER PARA CATEGORÍAS
					=============================================*/

					if($banner["tipo"] == "categorias"){

						$item = "ruta";
						$valor = $banner["ruta"];

						$ofertas = ControladorProductos::ctrMostrarCategorias($item, $valor);

						if($ofertas["oferta"] == 1 && $ofertas["finOferta"]>$fechaActual){

							echo '

							<div class="min-text">

							
								<h1 class="ofertas-especiales">OFERTAS ESPECIALES</h1>';
								$datetime1 = new DateTime($ofertas["finOferta"]);
								$datetime2 = new DateTime($fechaActual);

								$interval = date_diff($datetime1, $datetime2);

								$finOferta = $interval->format('%a');

								

								if($ofertas["precioOferta"] != 0){
									
									echo '<h2 class="prec"><strong>Los productos de esta a $ '.$ofertas["precioOferta"].'</strong></h2>';

								}

								if($ofertas["descuentoOferta"] != 0){
								
									echo '<h2 class="desc"><strong>Los productos de esta categoría con '.$ofertas["descuentoOferta"].'% de descuento</strong></h2>';
								}

							

							echo '<h3 class="fin">
								
								La oferta termina en<br>

								<div class="countdown" finOferta="'.$ofertas["finOferta"].'" id="contador2">


							</h3>';
						

							echo '</div>';

						}if ($ofertas["oferta"] == 0) {

								echo '<div class="min-text-2">
								<h1 class="oferta-0">Por el momento no tenemos ofertas en esta categoría.</h1>
								<h3 class="oferta-1">Espere nuestras nuevas ofertas</h3>

							</div>';
					
							
							
							
						}
						if($ofertas["oferta"] == 1 && $ofertas["finOferta"] < $fechaActual){
								echo '<div class="min-text-2">
								<h1 class="oferta-0">La oferta se ha terminado</h1>
								<h3 class="oferta-1">Espere nuestras nuevas ofertas</h3>

							</div>';
							}
						
						
						

					}

					/*=============================================
					BANNER PARA SUBCATEGORÍAS
					=============================================*/

					if($banner["tipo"] == "subcategorias"){

						$item = "ruta";
						$valor = $banner["ruta"];

						$ofertas = ControladorProductos::ctrMostrarSubCategorias($item, $valor);

						if($ofertas[0]["oferta"] == 1 && $ofertas[0]["finOferta"]>$fechaActual){

							echo '

							<div class="min-text">
							
								<h1 class="ofertas-especiales">OFERTAS ESPECIALES</h1>';
								$datetime1 = new DateTime($ofertas[0]["finOferta"]);
								$datetime2 = new DateTime($fechaActual);

								$interval = date_diff($datetime1, $datetime2);

								$finOferta = $interval->format('%a');


								if($ofertas[0]["precioOferta"] != 0){
									
									echo '<h2 class="prec"><strong>Los productos de esta categoría a $ '.$ofertas[0]["precioOferta"].'</strong></h2>';

								}

								if($ofertas[0]["descuentoOferta"] != 0){
								
									echo '<h2 class="desc"><strong>Los productos de esta categoría con '.$ofertas[0]["descuentoOferta"].'% de descuento</strong></h2>';
								}

							echo '<h3 class="fin">
								
								La oferta termina en<br>

								<div class="countdown" finOferta="'.$ofertas[0]["finOferta"].'" id="contador2">


							</h3>';


							echo '</div>';

						}

						if ($ofertas[0]["oferta"] == 0) {

						
			
								echo '<div class="min-text-2">
								<h1 class="oferta-0">Por el momento no tenemos <br><br> ofertas en esta categoría.</h1>
								<h3 class="oferta-1">Espere nuestras nuevas ofertas</h3>

							</div>';
					
							
							
							
						}
						if($ofertas[0]["oferta"] == 1 && $ofertas[0]["finOferta"] < $fechaActual){
								echo '<div class="min-text-2">
								<h1 class="oferta-0">La oferta se ha terminado</h1>
								<h3 class="oferta-1">Espere nuestras nuevas ofertas</h3>

							</div>';
							}


						
					}



				}

	

	}

}
			?>
		</div>
	</div>
</div>
<div class="container-fluid productos miga" >

	<div class="container">
		
		<div class="row">


			<!--=====================================
			BREADCRUMB O MIGAS DE PAN
			======================================-->

			<ul class="breadcrumb fondoBreadcrumb text-uppercase" id="bed">
				
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

					if(isset($_SESSION["ordenar"])){

						$modo = $_SESSION["ordenar"];

					}else{

						$modo = "DESC";

					}		

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
			LLAMADO DE PRODUCTOS DE CATEGORÍAS, SUBCATEGORÍAS Y DESTACADOS
			=============================================*/

			if($rutas[0] == "ofertas-del-mes"){

				$item2 = "oferta";
				$valor2 = 1;
				$ordenar = "id";

			}else if($rutas[0] == "lo-mas-vendido"){

				$item2 = null;
				$valor2 = null;
				$ordenar = "ventas";

			}else if($rutas[0] == "lo-mas-visto"){

				$item2 = null;
				$valor2 = null;
				$ordenar = "vistas";

			}else{

				$ordenar = "id";
				$item1 = "ruta";
				$valor1 = $rutas[0];

				$categoria = ControladorProductos::ctrMostrarCategorias($item1, $valor1);

				if(!$categoria){

					$subCategoria = ControladorProductos::ctrMostrarSubCategorias($item1, $valor1);

					$item2 = "id_subcategoria";
					$valor2 = $subCategoria[0]["id"];

				}else{

					$item2 = "id_categoria";
					$valor2 = $categoria["id"];

				}
			}		

			$productos = ControladorProductos::ctrMostrarProductos($ordenar, $item2, $valor2, $base, $tope, $modo);
			$listaProductos = ControladorProductos::ctrListarProductos($ordenar, $item2, $valor2);


			if(!$productos){

				echo '<div class="col-xs-12 error404 text-center err">

						 <h1><small>¡Oops!</small></h1>

						 <h2>Aún no hay productos en esta sección</h2>

					</div>';
				

			}else{
				
				echo '<ul class="grid0 prod" id="ofr">';
				$contador = 0;

					foreach ($productos as $key => $value) {
						$contador++;
					
					echo '<li class="col-md-3 col-sm-4 col-xs-6">

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

											echo '<span class="label label-info fontSize">'.$value["descuentoOferta"].'% DE DESCUENTO</span> <small>
						
												<strong class="oferta" id="prec-desc">MXN $'.number_format($value["precio"],2).'</strong>

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
										
										<i class="fa fa-heart" aria-hidden="true" style="color:#777777"></i>

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
											
											<i class="fa fa-eye" aria-hidden="true" style="color:#777777"></i>

										</button>	
									
									</a>

								</div>

							</div>

						</li>';
				if ($contador==4) {
					echo  '<div class=clear></div>';
					echo '<div class=clear></div>';
				}
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

											echo '<span class="label label-info">'.$value["descuentoOferta"].'% DE DESCUENTO</span><small>
						
												<strong class="oferta" id="prec-desc">MXN $'.number_format($value["precio"],2).'</strong>

											</small>
';

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
											echo '<h3><small style="font-weight:bold" class="prec-p">MXN $'.number_format($value["precio"],2).'</small></h3>';
										
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

						  			<i class="fa fa-heart" aria-hidden="true" style="color:#777777"></i>

						  		</button>';

									
						  		if($value["tipo"] == "fisico"){

										if($value["oferta"] != 0 && $value["finOferta"]>$fechaActual && $value["existencias"]>0){

											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.number_format($value["precioOferta"],2).'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';

										}
										if($value["oferta"] != 0 && $value["finOferta"]<$fechaActual && $value["existencias"]>0){

											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.number_format($value["precio"],2).'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';
										}
										if($value["oferta"] == 0 && $value["existencias"] > 0){

											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.number_format($value["precio"],2).'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';
										}else{

										}
										

									}

						  		echo '<a href="'.$url.$value["ruta"].'" class="pixelProducto">

							  		<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

							  		<i class="fa fa-eye" aria-hidden="true" style="color:#777777"></i>

							  		</button>

						  		</a>
							
							</div>

						</div>

						<div class="col-xs-12"><hr></div>

					</li>';

				}

				echo '</ul>';
			}
			if($productos){
					echo '<ul class="breadcrumb fondoBreadcrumb text-uppercase sub-ruta">
				
				<li><a href="<?php echo $url;  ?>">INICIO</a></li>
				<li class="active pagActiva"><?php echo $rutas[0] ?></li>

			</ul>';
			}else{
				
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

								echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';

							}

							echo ' <li class="disabled"><a>...</a></li>
								   <li id="item'.$pagProductos.'"><a href="'.$url.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
								   <li><a href="'.$url.$rutas[0].'/2"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

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
									  <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> ';
							
								for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

									echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';

								}

								echo ' <li class="disabled"><a>...</a></li>
									   <li id="item'.$pagProductos.'"><a href="'.$url.$rutas[0].'/'.$pagProductos.'">'.$pagProductos.'</a></li>
									   <li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

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
								   <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
								   <li id="item1"><a href="'.$url.$rutas[0].'/1">1</a></li>
								   <li class="disabled"><a>...</a></li>
								';
							
								for($i = $numPagActual; $i <= ($numPagActual+3); $i ++){

									echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';

								}


								echo '  <li><a href="'.$url.$rutas[0].'/'.($numPagActual+1).'"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
									</ul>';
						}

						/*=============================================
						LOS BOTONES DE LAS ÚLTIMAS 4 PÁGINAS Y LA PRIMERA PÁG
						=============================================*/

						else{

							$numPagActual = $rutas[1];

							echo '<ul class="pagination">
								   <li><a href="'.$url.$rutas[0].'/'.($numPagActual-1).'"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li> 
								   <li id="item1"><a href="'.$url.$rutas[0].'/1">1</a></li>
								   <li class="disabled"><a>...</a></li>
								';
							
							for($i = ($pagProductos-3); $i <= $pagProductos; $i ++){

								echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';

							}

							echo ' </ul>';

						}

					}else{

						echo '<ul class="pagination">';
						
						for($i = 1; $i <= $pagProductos; $i ++){

							echo '<li id="item'.$i.'"><a href="'.$url.$rutas[0].'/'.$i.'">'.$i.'</a></li>';

						}

						echo '</ul>';

					}

				}

			?>

			</center>

</div>

</div>

</div>