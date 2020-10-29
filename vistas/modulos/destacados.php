<!--=====================================
BANNER
======================================-->

<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

$social = ControladorPlantilla::ctrEstiloPlantilla();
$jsonRedesSociales = json_decode($social["redesSociales"],true);
echo '<script src="'.$servidor.$social["type"].'"></script>';

$ruta = "sin-categoria";

$banner = ControladorProductos::ctrMostrarBanner($ruta);
date_default_timezone_set('America/Bogota');

$fecha = date('Y-m-d');
$hora = date('H:i:s');

$fechaActual = $fecha.' '.$hora;

$titulo1 = json_decode($banner["titulo1"],true);
$titulo2 = json_decode($banner["titulo2"],true);
$titulo3 = json_decode($banner["titulo3"],true);

if($banner["estado"] != 0){

echo '<figure class="banner">

		<img src="'.$servidor.$banner["img"].'" class="img-responsive" width="100%">	

		<div class="textoBanner '.$banner["estilo"].'">
			
			<h1 style="color:'.$titulo1["color"].'">'.$titulo1["texto"].'</h1>

			<h2 style="color:'.$titulo2["color"].'"><strong>'.$titulo2["texto"].'</strong></h2>

			<h3 style="color:'.$titulo3["color"].'">'.$titulo3["texto"].'</h3>

		</div>

	</figure>';

}


$titulosModulos = array("OFERTAS DEL MES", "LO MÁS VENDIDO", "LO MÁS VISTO");
$rutaModulos = array("ofertas-del-mes","lo-mas-vendido","lo-mas-visto");

$base = 0;
$tope = 8;

if($titulosModulos[0] == "OFERTAS DEL MES"){

$ordenar = "id";
$item = "oferta";
$valor = 1;
$modo = "DESC";

$ofertas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

}

if($titulosModulos[1] == "LO MÁS VENDIDO"){

$ordenar = "ventas";
$item = null;
$valor = null;
$modo = "DESC";

$ventas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);

}

if($titulosModulos[2] == "LO MÁS VISTO"){

$ordenar = "vistas";
$item = null;
$valor = null;
$modo = "DESC";

$vistas = ControladorProductos::ctrMostrarProductos($ordenar, $item, $valor, $base, $tope, $modo);


}

$modulos = array($ofertas, $ventas, $vistas , $categorias);

for($i = 0; $i < count($titulosModulos); $i ++){

	echo '<div class="container-fluid well well-sm barraProductos">

			<div class="container">
				
				<div class="row">
					
					<div class="col-xs-12 organizarProductos">

						<div class="btn-group pull-right">

							 <button type="button" class="btn btn-default btnGrid" id="btnGrid'.$i.'">
							 	
								<i class="fa fa-th" aria-hidden="true"></i>  

								<span class="col-xs-0 pull-right"> Cuadrícula</span>

							 </button>

							 <button type="button" class="btn btn-default btnList" id="btnList'.$i.'">
							 	
								<i class="fa fa-list" aria-hidden="true"></i> 

								<span class="col-xs-0 pull-right"> Listado</span>

							 </button>
							
						</div>		

					</div>

				</div>

			</div>

		</div>


		<div class="container-fluid productos">
	
			<div class="container">
		
				<div class="row">

					<div class="col-xs-12 tituloDestacado">

						<div class="col-sm-6 col-xs-12">
					
							<h1><small>'.$titulosModulos[$i].' </small></h1>

						</div>

						<div class="col-sm-6 col-xs-12">
					
							<a href="'.$rutaModulos[$i].' ">
								
								<button class="btn btn-default backColor pull-right">
									
									Ver más <span class="fa fa-chevron-right"></span>

								</button>

							</a>

						</div>

					</div>

					<div class="clearfix"></div>

					<hr>

				</div>

				<ul class="grid'.$i.'">';

				foreach ($modulos[$i] as $key => $value) {


					
					echo '<li class="col-md-3 col-sm-4 col-xs-12">

							<figure>
								
								<a href="'.$value["ruta"].'" class="pixelProducto">
									
									<img src="'.$servidor.$value["portada"].'" class="img-responsive" >

								</a>

							</figure>

							<h4>
					
								<small>
									
									<a href="'.$value["ruta"].'" class="pixelProducto">
										
										<strong class="nombre-p">'.$value["titulo"].'</strong><br>

										<span style="color:rgba(0,0,0,0)">-</span>';
										if($value["oferta"] != 0 && $value["finOferta"]>$fechaActual){

											echo '<span class="label label-info fontSize " id="desc-of">'.$value["descuentoOferta"].'% DESCUENTO</span><small>
						
												<strong class="oferta">MXN $'.number_format($value["precio"],2).'</strong>

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
												}else if($value["existencias"]>5 && $value["existencias"] < $value["stockMax"]){
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
								
								<div class="btn-group pull-left">
									
									<button type="button" class="btn btn-default btn-xs deseos" idProducto="'.$value["id"].'" data-toggle="tooltip" title="Agregar a mi lista de deseos">
										
										<i class="fa fa-heart" aria-hidden="true" style="color:#777777"></i>

									</button>';
									

									if($value["tipo"] == "fisico"){


										if($value["oferta"] != 0 && $value["finOferta"]>$fechaActual && $value["existencias"]>0){


											
											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" existencias="'.$value["existencias"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';

										}
										if($value["oferta"] != 0 && $value["finOferta"]<$fechaActual && $value["existencias"]>0){
											
											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" existencias="'.$value["existencias"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';
										}
										if($value["oferta"] == 0 && $value["existencias"] > 0){

												
											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" existencias="'.$value["existencias"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';
										}else{



										}
										

									}

									echo '<a href="'.$value["ruta"].'" class="pixelProducto">
									
										<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">
											
											<i class="fa fa-eye" aria-hidden="true" style="color:#777777"></i>

										</button>	
									
									</a>

								</div>

							</div>

						</li>';
				}

				echo '</ul>

				<ul class="list'.$i.'" style="display:none">';

				foreach ($modulos[$i] as $key => $value) {

					echo '<li class="col-xs-12">
					  
				  		<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
							   
							<figure>
						
								<a href="'.$value["ruta"].'" class="pixelProducto">
									
									<img src="'.$servidor.$value["portada"].'" class="img-responsive">

								</a>

							</figure>

					  	</div>
							  
						<div class="col-lg-10 col-md-7 col-sm-8 col-xs-12">
							
							<h1>

								<small>
								
									<a href="'.$value["ruta"].'" class="pixelProducto">
										
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

								if($value["oferta"] != 0 && $value["finOferta"]>$fechaActual ){

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
												}else if($value["existencias"]>5 && $value["existencias"] < $value["stockMax"]){
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


											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precioOferta"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" existencias="'.$value["existencias"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';

										}
										if($value["oferta"] != 0 && $value["finOferta"]<$fechaActual && $value["existencias"]>0){

											

											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" existencias="'.$value["existencias"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';
										}
										if($value["oferta"] == 0 && $value["existencias"] > 0){

											echo '<button type="button" class="btn btn-default btn-xs agregarCarrito"  idProducto="'.$value["id"].'" imagen="'.$servidor.$value["portada"].'" titulo="'.$value["titulo"].'" precio="'.$value["precio"].'" tipo="'.$value["tipo"].'" peso="'.$value["peso"].'" existencias="'.$value["existencias"].'" data-toggle="tooltip" title="Agregar al carrito de compras">

											<i class="fa fa-shopping-cart" aria-hidden="true" style="color:#777777"></i>

											</button>';
										}else{

										}
										

									}


						  		echo '<a href="'.$value["ruta"].'" class="pixelProducto">

							  		<button type="button" class="btn btn-default btn-xs" data-toggle="tooltip" title="Ver producto">

							  		<i class="fa fa-eye" aria-hidden="true" style="color:#777777"></i>

							  		</button>

						  		</a>
							
							</div>

						</div>

						<div class="col-xs-12"><hr></div>

					</li>';

				}

				echo '</ul>

			</div>

		</div>';

}

?>

