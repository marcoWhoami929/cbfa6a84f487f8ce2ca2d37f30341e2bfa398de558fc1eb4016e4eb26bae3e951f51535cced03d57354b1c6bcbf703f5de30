<?php

$servidor = Ruta::ctrRutaServidor();
$url = Ruta::ctrRuta();

/*=============================================
INICIO DE SESIÓN USUARIO
=============================================*/

if(isset($_SESSION["validarSesion"])){

	if($_SESSION["validarSesion"] == "ok"){

		echo '<script>
		
			localStorage.setItem("usuario","'.$_SESSION["id"].'");

		</script>';

	}

}

/*=============================================
API DE GOOGLE
=============================================*/

// https://console.developers.google.com/apis
// https://github.com/google/google-api-php-client

/*=============================================
CREAR EL OBJETO DE LA API GOOGLE
=============================================*/

$cliente = new Google_Client();
$cliente->setAuthConfig('modelos/client_secret.json');
$cliente->setAccessType("offline");
$cliente->setScopes(['profile','email']);

/*=============================================
RUTA PARA EL LOGIN DE GOOGLE
=============================================*/

$rutaGoogle = $cliente->createAuthUrl();

/*=============================================
RECIBIMOS LA VARIABLE GET DE GOOGLE LLAMADA CODE
=============================================*/

if(isset($_GET["code"])){

	$token = $cliente->authenticate($_GET["code"]);

	$_SESSION['id_token_google'] = $token;

	$cliente->setAccessToken($token);

}

/*=============================================
RECIBIMOS LOS DATOS CIFRADOS DE GOOGLE EN UN ARRAY
=============================================*/

if($cliente->getAccessToken()){

 	$item = $cliente->verifyIdToken();

 	$datos = array("nombre"=>$item["name"],
				   "email"=>$item["email"],
				   "foto"=>$item["picture"],
				   "password"=>"null",
				   "modo"=>"google",
				   "verificacion"=>0,
				   "emailEncriptado"=>"null");

 	$respuesta = ControladorUsuarios::ctrRegistroRedesSociales($datos);

 	echo '<script>
		
	setTimeout(function(){

		window.location = localStorage.getItem("rutaActual");

	},1000);

 	</script>';

}



?>

<!--=====================================
TOP
======================================-->

<div class="container-fluid barraSuperior" id="top">
	
	<div class="container">
		
		<div class="row">
	
			<!--=====================================
			SOCIAL
			======================================-->

			<div class="col-md-9 col-sm-8 col-xs-5 social">
				
				<ul>	

					<?php

					$social = ControladorPlantilla::ctrEstiloPlantilla();

					$jsonRedesSociales = json_decode($social["redesSociales"],true);		

					foreach ($jsonRedesSociales as $key => $value) {

						echo '<li>
								<a href="'.$value["url"].'" target="_blank">
									<i class="fa '.$value["red"].' redSocial '.$value["estilo"].'" aria-hidden="true"></i>
								</a>
							</li>';
					}

					?>
			
				</ul>

			</div>

			<!--=====================================
			REGISTRO
			======================================-->

			<div class="col-md-3 col-sm-4 col-xs-7 registro">
				
				<ul>

				<?php

				if(isset($_SESSION["validarSesion"])){

					if($_SESSION["validarSesion"] == "ok"){

						if($_SESSION["modo"] == "directo"){

							if($_SESSION["foto"] != ""){

								echo '<li>

										<img class="img-circle" src="'.$url.$_SESSION["foto"].'" width="10%">

									 </li>';

							}else{

								echo '<li>

									<img class="img-circle" src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" width="10%">

								</li>';

							}

							echo '<li>|</li>
							 <li><a href="'.$url.'perfil">Ver Perfil</a></li>
							 <li>|</li>
							 <li><a href="'.$url.'salir">Salir</a></li>';


						}
						if($_SESSION["modo"] == "mayoreo"){

							if($_SESSION["foto"] != ""){

								echo '<li>

										<img class="img-circle" src="'.$url.$_SESSION["foto"].'" width="10%">

									 </li>';

							}else{

								echo '<li>

									<img class="img-circle" src="'.$servidor.'vistas/img/usuarios/default/anonymous.png" width="10%">

								</li>';

							}

							echo '<li>|</li>
							 <li><a href="'.$url.'perfilMayoreo">Mi Perfil</a></li>
							 <li>|</li>
							 <li><a href="'.$url.'salir">Salir</a></li>';


						}
						if($_SESSION["modo"] == "facebook"){

							echo '<li>

									<img class="img-circle" src="'.$_SESSION["foto"].'" width="10%">

								   </li>
								   <li>|</li>
						 		   <li><a href="'.$url.'perfil">Ver Perfil</a></li>
						 		   <li>|</li>
						 		   <li><a href="'.$url.'salir" class="salir">Salir</a></li>';

						}

						if($_SESSION["modo"] == "google"){

							echo '<li>

									<img class="img-circle" src="'.$_SESSION["foto"].'" width="10%">

								   </li>
								   <li>|</li>
						 		   <li><a href="'.$url.'perfil">Ver Perfil</a></li>
						 		   <li>|</li>
						 		   <li><a href="'.$url.'salir">Salir</a></li>';

						}

					}

				}else{

					echo '<li><a href="#modalIngreso0" data-toggle="modal">Ingresar</a></li>
						  <li>|</li>
						  <li><a href="#modalRegistro0" data-toggle="modal" style="background: rgb(255, 254, 254)!important; color: rgb(14, 14, 14)!important;padding: 10px;border-radius: 2px;">Crear una cuenta</a></li>';

				}

				?>
	
				</ul>

			</div>	

		</div>	

	</div>

</div>
<!--=====================================
HEADER style="background-image: url('/frontend/vistas/img/plantilla/fluido 2-01.png');width: 100; height: 100; "
======================================-->

<header class="container-fluid headerEstatico">

	<div class="container">

		<div class="row" id="cabezote">

			<!--=====================================
			LOGOTIPO
			======================================-->
			
			<div class=" col-md-3 col-sm-12 col-xs-12" id="logotipo">
				
				<a href="<?php echo $url; ?>">
						
					<img src="<?php echo $servidor.$social["logo"]; ?>" class="img-responsive">

				</a>
				
			</div>

			<!--=====================================
			BLOQUE CATEGORÍAS Y BUSCADOR
			======================================-->

			<div class="col-md-5 col-sm-7 col-xs-12">
				
				<!--=====================================
				BOTÓN CATEGORÍAS
				======================================-->

				<div class="col-md-4 col-sm-4 col-xs-4 backColor" id="btnCategorias">
					
					<p>Categorías
					
						<span class="pull-right">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</span>
					
					</p>

				</div>

				<!--=====================================
				BUSCADOR
				======================================-->
				<?php 
					$social = ControladorPlantilla::ctrEstiloPlantilla();
					$jsonRedesSociales = json_decode($social["redesSociales"],true);
					echo '<script src="'.$servidor.$social["type"].'"></script>';

				?>	


				<div class="input-group col-sm-7 col-xs-8" id="buscador">
					
					<input type="search" name="buscar" class="typeahead form-control " placeholder="Buscar por código, medida, marca, y nombre..."  id="buscar" data-toggle="tooltip" title="Para elegir un producto: 1.-Seleccionar con el cursor y presionar enter. 2.-Seleccionar con las teclas de navegación pulsar la tecla tabulador y presionar enter." data-placement="top">	

					<span class="input-group-btn">
						
						<a href="http://localhost/eshop/buscador/1/recientes">

							<button class="btn btn-default backColor" type="submit" data-toggle="tooltip" title="Buscar por código, medida, marca, y nombre..."
				data-placement="bottom">
								
								<i class="fa fa-search"></i>

							</button>

						</a>

					</span>

				</div>
				
			
			</div>
			
			<!--=====================================
			BOTÓN SUCURSAL
			======================================-->
			
			<div class="col-md-1 col-sm-1 col-xs-6 backColor" id="btnSucursal">
			    
			    Tiendas
			        
			        <span class="pull-right">
							<i class="fa fa-home" aria-hidden="true"></i>
						</span>
			
			</div>
			
			    <!--=====================================
			    SUCURSALES
			    ======================================-->
			    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 col-md-offset-8 backColor" id="sucursal">
			        
			        <div class=" col-xs-2">
			            
			            <h4>Tiendas</h4>
			            
			            <hr>
			            
			            <ur>
			                <!--<li><a href="https://www.google.com/maps?q=Calle+Ejido+5970,+San+Baltazar+Linda+Vista,+72550+Puebla,+Pue.&ftid=0x85cfc0a41baf935d:0x46bba2c8064c3628">CEDIS</a></li>=-->
			                <li><a href="https://www.google.com/maps?q=Av+San+Francisco+1023,+Jardines+de+San+Manuel,+72570+Puebla,+Pue.&ftid=0x85cfc0a3dae33a51:0xcaecd8d980e2c6ad">San Manuel</a></li>
			                <li><a href="https://www.google.com/maps/place/Club+de+Golf+7108,+San+Jos%C3%A9+Mayorazgo,+72450+Puebla,+Pue./@19.0143012,-98.234526,17z/data=!3m1!4b1!4m5!3m4!1s0x85cfc750761fd25f:0xc7a4e9e73916a133!8m2!3d19.0143012!4d-98.2323373">Mayorazgo</a></li>
			                <li><a href="https://www.google.com/maps?q=Av.+de+la+Reforma+4712,+Aquiles+Serd%C3%A1n,+72070+Puebla,+Pue.&ftid=0x85cfc6d03d062b91:0x7d6568892de25440">Reforma</a></li>
			                <li><a href="https://www.google.com/maps?q=Calle+Carril+de+la+Rosa+4035,+Diez+de+Mayo,+72270+Puebla,+Pue.&ftid=0x85cfc05262bdf495:0xaf87aadff6adf36d">Xonaca</a></li>
			                <li><a href="https://www.google.com/maps/place/Av.+Manuel+Espinosa+Yglesias+31+Pte.+2717,+Benito+Ju%C3%A1rez,+Puebla,+Pue./@19.0429216,-98.2280259,17z/data=!3m1!4b1!4m5!3m4!1s0x85cfc72dceecb21b:0x40007fcadd184045!8m2!3d19.0429216!4d-98.2258372">Vergel</a></li>
			                <li><a href="https://www.google.com/maps/place/Calle+11+Sur+1707,+Barrio+de+Santiago,+72410+Puebla,+Pue./@19.0416403,-98.2102388,3a,75y,304.76h,79.72t/data=!3m6!1e1!3m4!1soJCqg-p9RjmSPfPop0oMCQ!2e0!7i13312!8i6656!4m5!3m4!1s0x85cfc0daa6393795:0x1e40196c89bd54aa!8m2!3d19.0417977!4d-98.2101236">Santiago</a></li>
			                <li><a href="https://www.google.com/maps?q=Av+50+Pte+2719,+Cleotilde+Torres,+72010+Puebla,+Pue.&ftid=0x85cfc13e67c07cbb:0x98ee2a9c5a7728e0">Capu</a></li>
			                <li><a href="https://www.google.com/maps?q=Diagonal+Defensores+de+la+Rep%C3%BAblica+755,+Adolfo+L%C3%B3pez+Mateos,+72240+Puebla,+Pue.&ftid=0x85cfc1057b97abc5:0xe0e9656f4f23698b">Diagonal</a></li>
			            </ur>
			            
			        </div>
			        
			     </div>

			<!--=====================================
			CARRITO DE COMPRAS
			======================================-->

			<div class="col-md-3 col-sm-2 col-xs-6" id="carrito">
				
				<a href="<?php echo $url;?>carrito-de-compras">

					<button class="btn btn-default pull-left backColor"> 
						
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
					
					</button>
				
				</a>	

				<p>Tu cesta <span class="cantidadCesta"></span> <br> Mxn $ <span class="sumaCesta"></span></p>	

			</div>

		</div>

		<!--=====================================
		CATEGORÍAS
		======================================-->

		<div class="col-xs-12 backColor" id="categorias">

			<?php

				$item = null;
				$valor = null;

				$categorias = ControladorProductos::ctrMostrarCategorias($item, $valor);

				foreach ($categorias as $key => $value) {

					echo '<div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
							
							<h4>
								<a href="'.$url.$value["ruta"].'" class="pixelCategorias" titulo="'.$value["categoria"].'">'.$value["categoria"].'</a>
							</h4>
							
							<hr>

							<ul>';

							$item = "id_categoria";

							$valor = $value["id"];

							$subcategorias = ControladorProductos::ctrMostrarSubCategorias($item, $valor);
							
							foreach ($subcategorias as $key => $value) {
									
									echo '<li><a href="'.$url.$value["ruta"].'" class="pixelSubCategorias" titulo="'.$value["subcategoria"].'">'.$value["subcategoria"].'</a></li>';
								}	
								
							echo '</ul>

						</div>';
				}

			?>	

		</div>

	</div>

</header>

<!--=====================================
VENTANA MODAL PARA EL REGISTRO
======================================-->

<div class="modal fade modalFormulario" id="modalRegistro" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">REGISTRARSE</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        	
			<!--=====================================
			REGISTRO FACEBOOK
			======================================-->

			<div class="col-sm-6 col-xs-12 facebook">
				
				<p>
				  <i class="fa fa-facebook"></i>
					Registro con Facebook
				</p>

			</div>

			<!--=====================================
			REGISTRO GOOGLE
			======================================-->
			<a href="<?php echo $rutaGoogle; ?>">

				<div class="col-sm-6 col-xs-12 google">
					
					<p>
					  <i class="fa fa-google"></i>
						Registro con Google
					</p>

				</div>
			</a>

			<!--=====================================
			REGISTRO DIRECTO
			======================================-->

			<form method="post" onsubmit="return registroUsuario()">
				
			<hr>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-user"></i>
						
						</span>

						<input type="text" class="form-control text-uppercase" id="regUsuario" name="regUsuario" placeholder="Nombre Completo" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>

						<input type="email" class="form-control" id="regEmail" name="regEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>
						
						</span>

						<input type="password" class="form-control" id="regPassword" name="regPassword" placeholder="Contraseña" required>

					</div>

				</div>

				<!--=====================================
				https://www.iubenda.com/ CONDICIONES DE USO Y POLÍTICAS DE PRIVACIDAD
				======================================-->

				<div class="checkBox">
					
					<label>
						
						<input id="regPoliticas" type="checkbox">
					
							<small>
								
								Al registrarse, usted acepta nuestras condiciones de uso y políticas de privacidad

								<br>

								<a href="https://www.iubenda.com/privacy-policy/74941411" class="iubenda-black iubenda-embed " title="Privacy Policy">Privacy Policy</a> <script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script> 

							</small>

					</label>

				</div>

				<?php

					$registro = new ControladorUsuarios();
					$registro -> ctrRegistroUsuario();

				?>
				
				<input type="submit" class="btn btn-default backColor btn-block" value="ENVIAR">	

			</form>

        </div>

        <div class="modal-footer">
          
			¿Ya tienes una cuenta registrada? | <strong><a href="#modalIngreso" data-dismiss="modal" data-toggle="modal">Ingresar</a></strong>

        </div>
      
    </div>

</div>
<!--=====================================
VENTANA MODAL PARA EL REGISTRO CLIENTES MAYOREO
======================================-->

<div class="modal fade modalFormulario" id="modalRegistroMayoreo" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">SOLICITAR CUENTA DE CLIENTE MAYOREO</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        

			<!--=====================================
			REGISTRO DIRECTO
			======================================-->

			<form method="post" onsubmit="return registroUsuarioMayoreo()">
				<small style="font-size: 12px;color: #323232; font-weight: bolder;">Ingrese una cuenta de correo electrónico en la cual le será enviado un correo con los datos de acceso de su nueva cuenta de cliente mayoreo.</small>
			<hr>
				
				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>

						<input type="email" class="form-control" id="regEmailMayoreo" name="regEmailMayoreo" placeholder="Correo Electrónico" required>

					</div>

				</div>
				<!--=====================================
				https://www.iubenda.com/ CONDICIONES DE USO Y POLÍTICAS DE PRIVACIDAD
				======================================-->

				<div class="checkBox">
					
					<label>
						
						<input id="regPoliticas1" type="checkbox">
					
							<small>
								
								Al registrarse, usted acepta nuestras condiciones de uso y políticas de privacidad

								<br>

								<a href="https://www.iubenda.com/privacy-policy/74941411" class="iubenda-black iubenda-embed " title="Privacy Policy">Privacy Policy</a> <script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script> 

							</small>

					</label>

				</div>

				<?php

					$registro = new ControladorUsuarios();
					$registro -> ctrRegistroUsuarioMayoreo();

				?>
				
				<input type="submit" class="btn btn-default backColor btn-block" value="SOLICITAR">	

			</form>

        </div>

        <div class="modal-footer" style="background: black">

			¿Ya solicitaste una cuenta? | <strong ><a href="#modalIngreso1" data-dismiss="modal" data-toggle="modal" style="color: white; font-weight: lighter;">Ya soy cliente mayoreo</a></strong>

        </div>
      
    </div>

</div>
<!--=====================================
VENTANA MODAL PARA EL INGRESO CLIENTES MAYOREO
======================================-->
<div class="modal fade modalFormulario" id="modalIngreso1" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">ACCESO CLIENTES MAYOREO</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        		<center>
        			<a href="<?php echo $url; ?>">
						
					<img src="<?php echo $servidor.$social["logo"]; ?>" class="img-responsive" width="50%">

				</a>
        		</center>
				
					
			<!--=====================================
			INGRESO DIRECTO
			======================================-->

			<form method="post">
				
			<hr>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-user"></i>
						
						</span>

						<input type="text" class="form-control" id="ingUsuario" name="ingUsuario" placeholder="Usuario" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>
						
						</span>

						<input type="password" class="form-control" id="ingPasswordMayoreo" name="ingPasswordMayoreo" placeholder="Contraseña" required>

					</div>

				</div>

				

				<?php

					$ingreso = new ControladorUsuarios();
					$ingreso -> ctrIngresoUsuarioMayoreo();

				?>
				
				<input type="submit" class="btn btn-default  btn-block btnIngreso button yellow" value="ACCEDER">	

				<br>
				<br>
				<br>
				<center>
					
					<a href="#modalPasswordMayoreo" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>

				</center>

			</form>

        </div>

        <div class="modal-footer">
        	 <a href="#modalIngreso" data-dismiss="modal" data-toggle="modal"><small style="font-weight: lighter; font-size: 14px;float: left;">Soy un cliente directo</small></a>
          <a href="#modalClienteMayoreo" data-dismiss="modal" data-toggle="modal"><small style="font-weight: lighter; font-size: 14px;float: right;">Aun no soy un cliente mayoreo</small></a>

			

        </div>
      
    </div>

</div>

<!--=====================================
VENTANA MODAL ACCESO PRINCIPAL
======================================-->
<div class="modal fade modalFormulario" id="modalIngreso0" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">ACCESO</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        		<center>
        			<a href="<?php echo $url; ?>">
						
					<img src="<?php echo $servidor.$social["logo"]; ?>" class="img-responsive" width="50%">

				</a>
        		</center>
				
					
			<!--=====================================
			INGRESO DIRECTO
			======================================-->

			<form method="post">
				
			<hr>

				<center><span style="font-weight: bold;">¿QUÉ TIPO DE CLIENTE ES?</span></center>
				<br>
				<br>
				<div class="form-group">
					
					<div class="input-group col-lg-12">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

						<a href="#modalIngreso" data-dismiss="modal" data-toggle="modal" class="button blue">
									CLIENTE DIRECTO
								</a>

						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

								<a href="#modalIngreso1" data-dismiss="modal" data-toggle="modal" class="button yellow">
									CLIENTE MAYOREO
								</a>
						
						</div>

					</div>

				</div>

			</form>

        </div>

        <div class="modal-footer" style="background: black">
          
			

        </div>
      
    </div>

</div>

<!--=====================================
VENTANA MODAL ACCESO PRINCIPAL PARA CREAR CUENTA
======================================-->
<div class="modal fade modalFormulario" id="modalRegistro0" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">REGISTRO</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        		<center>
        			<a href="<?php echo $url; ?>">
						
					<img src="<?php echo $servidor.$social["logo"]; ?>" class="img-responsive" width="50%">

				</a>
        		</center>
				
					
			<!--=====================================
			INGRESO DIRECTO
			======================================-->

			<form method="post">
				
			<hr>

				<center><span style="font-weight: bold;">¿QUÉ TIPO DE CLIENTE ES?</span></center>
				<br>
				<br>
				<div class="form-group">
					
					<div class="input-group col-lg-12">
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

						<a href="#modalRegistro" data-dismiss="modal" data-toggle="modal" class="button blue">
									CLIENTE DIRECTO
								</a>

						</div>
						<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

								<a href="#modalClienteMayoreo" data-dismiss="modal" data-toggle="modal" class="button yellow">
									CLIENTE MAYOREO
								</a>
						
						</div>

					</div>

				</div>

			</form>

        </div>

        <div class="modal-footer" style="background: black">
          
			

        </div>
      
    </div>

</div>



<!--=====================================
VENTANA MODAL SOLICITUD CLIENTES MAYOREO
======================================-->
<div class="modal fade modalFormulario" id="modalClienteMayoreo" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">SOLICITUD CLIENTES MAYOREO</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        		<center>
        			<a href="<?php echo $url; ?>">
						
					<img src="<?php echo $servidor.$social["logo"]; ?>" class="img-responsive" width="50%">

				</a>
        		</center>
				
				<br>
				<br>
				<small style="margin-left: 30px;margin-right: 30px;font-size: 14px;font-weight: lighter;">¡Hacer negocios con SAN FRANCISCO DEKKERLAB, ahora es más rápido y sencillo!</small>
				<center><h2>Clientes Mayoreo y Clientes Directos</h2></center>
				<br>
				<small style="margin-left: 30px;text-align: justify;font-size: 14px;font-weight: lighter;">Ordena productos, revisa el estado de tus ordenes y disponibilidad de inventario,</small><br>
				<small style="margin-left: 30px;text-align: justify;font-size: 14px;font-weight: lighter;">accediendo a nuestra tienda en línea.</small>
				<br>
				<br>
				<br>
				<small style="margin-left: 30px;text-align: justify;font-size: 13px;font-weight: bolder;">Si aun no formas parte de nuestra plataforma qué esperas, solicita una nueva cuenta </small><small style="margin-left: 30px;font-size: 13px;font-weight: bolder;">para aprovechar los beneficios que tenemos para ti.</small>


			<!--=====================================
			INGRESO DIRECTO
			======================================-->

			<form method="post">
				
			<hr>
				<div class="form-group">
					
					<div class="input-group col-lg-12">
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<center><a href="#modalRegistroMayoreo" data-dismiss="modal" data-toggle="modal" class="button yellow-2">
									SOLICITAR CUENTA/PASSWORD
								</a></center>
								
						
						</div>

					</div>

				</div>
				

			</form>

        </div>

        <div class="modal-footer" style="background: black">
         

        </div>
      
    </div>

</div>


<!--=====================================
VENTANA MODAL PARA EL INGRESO
======================================-->

<div class="modal fade modalFormulario" id="modalIngreso" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">INGRESAR</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        	
			<!--=====================================
			INGRESO FACEBOOK
			======================================-->

			<div class="col-sm-6 col-xs-12 facebook">
				
				<p>
				  <i class="fa fa-facebook"></i>
					Ingreso con Facebook
				</p>

			</div>

			<!--=====================================
			INGRESO GOOGLE
			======================================-->
			<a href="<?php echo $rutaGoogle; ?>">
			
				<div class="col-sm-6 col-xs-12 google">
					
					<p>
					  <i class="fa fa-google"></i>
						Ingreso con Google
					</p>

				</div>

			</a>

			<!--=====================================
			INGRESO DIRECTO
			======================================-->

			<form method="post">
				
			<hr>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>

						<input type="email" class="form-control" id="ingEmail" name="ingEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-lock"></i>
						
						</span>

						<input type="password" class="form-control" id="ingPassword" name="ingPassword" placeholder="Contraseña" required>

					</div>

				</div>

				

				<?php

					$ingreso = new ControladorUsuarios();
					$ingreso -> ctrIngresoUsuario();

				?>
				
				<input type="submit" class="btn btn-default  btn-block btnIngreso button yellow" value="ACCEDER">	

				<br>
				<br>
				<br>
				<center>
					
					<a href="#modalPassword" data-dismiss="modal" data-toggle="modal">¿Olvidaste tu contraseña?</a>

				</center>

			

			</form>

        </div>

        <div class="modal-footer">

          
			¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>
      
    </div>

</div>


<!--=====================================
VENTANA MODAL PARA OLVIDO DE CONTRASEÑA
======================================-->

<div class="modal fade modalFormulario" id="modalPassword" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">SOLICITUD DE NUEVA CONTRASEÑA</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        	
			<!--=====================================
			OLVIDO CONTRASEÑA
			======================================-->

			<form method="post">

				<label class="text-muted">Escribe el correo electrónico con el que estás registrado y allí te enviaremos una nueva contraseña:</label>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>
					
						<input type="email" class="form-control" id="passEmail" name="passEmail" placeholder="Correo Electrónico" required>

					</div>

				</div>			

				<?php

					$password = new ControladorUsuarios();
					$password -> ctrOlvidoPassword();

				?>
				
				<input type="submit" class="btn btn-default  btn-block button yellow" value="ACCEDER">	

			</form>

        </div>

        <div class="modal-footer">
          
			¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>
      
    </div>

</div>
<!--=====================================
VENTANA MODAL PARA OLVIDO DE CONTRASEÑA CLIENTES MAYOREO
======================================-->

<div class="modal fade modalFormulario" id="modalPasswordMayoreo" role="dialog">

    <div class="modal-content modal-dialog">

        <div class="modal-body modalTitulo">

        	<h3 class="backColor">SOLICITUD DE NUEVA CONTRASEÑA</h3>

           <button type="button" class="close" data-dismiss="modal">&times;</button>
        	
			<!--=====================================
			OLVIDO CONTRASEÑA
			======================================-->

			<form method="post">

				<label class="text-muted">Escribe el correo electrónico que registraste en tu cuenta y allí te enviaremos una nueva contraseña para acceder:</label>

				<div class="form-group">
					
					<div class="input-group">
						
						<span class="input-group-addon">
							
							<i class="glyphicon glyphicon-envelope"></i>
						
						</span>
					
						<input type="email" class="form-control" id="passEmailMayoreo" name="passEmailMayoreo" placeholder="Correo Electrónico" required>

					</div>

				</div>			

				<?php

					$password = new ControladorUsuarios();
					$password -> ctrOlvidoPasswordMayoreo();

				?>
				
				<input type="submit" class="btn btn-default  btn-block button yellow" value="SOLICITAR">	

			</form>

        </div>

        <div class="modal-footer">
          
			¿No tienes una cuenta registrada? | <strong><a href="#modalRegistro" data-dismiss="modal" data-toggle="modal">Registrarse</a></strong>

        </div>
      
    </div>

</div>

