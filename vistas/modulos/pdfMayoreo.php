<!DOCTYPE html>
<html lang="es">
	<head>
		<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
		<meta charset="utf-8" />
		<style>
			.logo{
				width: 200px;
			}
			.address{
				display: inline;
				width: 100px;
				padding: 0px;
				margin:0px;
				padding-left: 20px;
				border: 1px solid red;
			}
			.titulo{
				font-size: 17px;
				font-weight: bold;
				text-align: left;
				font-family: 'Varela Round', sans-serif;

			}
			.cotizacion{
				font-size: 15px;
				font-weight: bold;
				text-align: right;
				font-family: 'Varela Round', sans-serif;
				color: #30AB4F;
				margin-right: 28px;

			}
			.rfc{
				color: #0362CE;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 12px;
				text-align: left;
				margin-left: -70px;
			}
			.dir1{
				color: #0362CE;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 12px;
				margin-left: -70px;
			}
			.matriz{
				color: #0362CE;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 12px;
				margin-left: -70px;
			}
			.matriz1{
				color: #000000;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 12px;
				margin-left: 10px;
			}
			.direccion{
				color: #000000;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 12px;
				margin-left: -70px;

			}
			.direccion1{
				color: #000000;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 12px;
				margin-left: -70px;

			}
			.direccion2{
				color: #000000;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 12px;
				margin-left: -70px;

			}
			.nroPedido{
				color: #0362CE;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 12px;
				margin-left: 200px;
			}
			.pedido{
				color: #0362CE;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 12px;
				margin-left: 50px;
			}
			.numFolio{
				color: black;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 12px;
			}
			.expedicion{
				color: black;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 8px;
			}
			.fechaExpedicion{
				color: black;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 8px;
			}
			.fecha-exp{
				color: black;
				font-family: 'Varela Round', sans-serif;
				font-weight: lighter;
				font-size: 9px;
			}
			.table th, .table td{
				border: none;
			}

			.table tbody td{
				height: 40px;
				text-align: left;
			}
			.vl {
			    border-left: 2px solid;
			    height: 115px;
			    z-index: 101;
			    color: #ABABAB;
			    margin-top: -45px;
			    margin-left: 500px;
			}
			hr{
				border-style: solid;
   				border-width: 1px;
				color: #ABABAB;
			}

		</style>
	
	</head>
	<body>
		<table style="width: 100%;">
			<thead>
				<tr>
					<th>
						<b class="titulo">PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V.</b>
					</th>
					<th>
						<b class="cotizacion">PEDIDO</b>
					</th>
					
				</tr>
			</thead>
		</table>
		<table style="width: 100%;">
			<thead>
				<tr>
					<th>
						<img class="logo" src="../backend/vistas/img/plantilla/logo.png" />
					</th>
					<th>
						<b class="rfc">PCP970822467</b> <b class="nroPedido">Folio <b class="numFolio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{id_pedido}}</b></b>
						<br>
						<b class="dir1">Régimen General de Ley Personas Morales</b>  <b class="pedido">Interno: <b class="numFolio">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></b>
						<br>
						<b class="matriz">Matriz:</b><b class="matriz1">Libertad 5973</b>
						<br>
						<b class="direccion"><strong class="direccion" style="font-weight: bold;">Col.</strong>San Baltazar Campeche <strong>C.P</strong> 72550 <strong>Localidad</strong> Puebla</b>
						<br>
						<b class="direccion1">(Heroica Puebla) <strong>Municipio</strong> Puebla</b>
						<br>
						<b class="direccion2"><strong  class="direccion2" style="font-weight: bold;">Estado</strong> Puebla <strong>País</strong> México</b>
						<br>
					</th>
					
					
				</tr>
			</thead>
		</table>
		<br>
		<table style="width: 100%">
			
			<thead>
				<tr>
					<th>
						<b class="expedicion"><strong class="expedicion" style="font-weight: bold;color: #0362CE;">Lugar de Expedición:</strong> Ejido No. 5970 Int No. A,B,C. <strong>Col.</strong> San Baltazar Linda Vista. <strong>C.P.</strong> 72550 <strong>Localidad</strong> Puebla(Heroica</b>
						<br>
						<b class="expedicion">Puebla) <strong>Municipio</strong> Puebla <strong>Estado</strong> Puebla <strong>País</strong> México <strong>Tels.</strong> 248 86 04 - 245 53 65 - 264 50 94 - 244 29 33 - 245 04 27</b>
					</th>

					<th>
						<b class="fechaExpedicion" style="font-weight: bold;color: #0362CE;"><strong> Fecha y Hora de Expedición:</strong> <b class="fecha-exp">{{fecha_hora}}</b></b>
					</th>
				</tr>
			</thead>
		</table>
		<hr >
		<table style="width: 100%">
			<thead>
				<tr>
					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;" >Código Cliente:</b><br>
						<b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;">{{id_cliente}}</b>
					</th>
					<th>
						
					</th>
					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;" >Días de Crédito:</b> <b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;">0 Días</b>
					</th>
					<th>
						
					</th>
					<th>
						
					</th>
					<th>
						
					</th>
					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;" >Fecha de Vencimiento:</b><br>
						<b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: capitalize;">{{fecha_vencimiento}}</b>
					</th>
					<th>
							
						</th>
						<th>
							
						</th>

					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;" >Método Pago: </b><b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">{{metodo_pago}}</b>
					</th>
					<th>
							
						</th>
						<th>
							
						</th>
						<th>
							
						</th>

					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;" >Núm Cuenta:</b><b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"> NO IDENTIFICADO</b>
					</th>
				</tr>
			</thead>
		</table>
		<hr >
		<table style="width: 100%">
			<thead>
				<tr>
					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;" >Cliente:</b> <b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{nombre_cliente}}</b>
						<br>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;" >Domicilio:</b>
						<b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{domicilio}}</b>
						<br>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;" >Colonia:</b> <b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							{{colonia}}
						</b>
					</th>
					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;margin-left:-120px;" >RFC:</b> <b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							{{rfc}}
						</b>
						<br>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;margin-left:-120px;" >Tels:</b> <b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							{{telefono}}
						</b>
						<br>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;margin-left:-120px;" >C.P.</b> <b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						{{codigo}}</b>
					</th>
				</tr>
			</thead>
		</table>
		<hr >
		<table style="width: 100%">
			<thead>
				<tr>
					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;" >Municipio:</b> <b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">{{municipio}}</b>
					</th>
						
					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;margin-left: -50px;" >Ciudad:</b> <b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">{{ciudad}}</b>
					</th>

					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;margin-left: -50px;" >Estado:</b> <b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">{{estado}}</b>
					</th>
					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;margin-left: -50px;" >País:</b> <b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">{{pais}}</b>
					</th>
				</tr>
			</thead>
		</table>
		<hr >
			<table style="width: 100%">
			<thead>
				<tr>
					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;" >Observaciones: </b> <b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"></b>
					</th>
					<th>
						<b style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;" >Referencia: </b> <b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;"></b>
					</th>
				</tr>
			</thead>
		</table>
		<hr >
	    <table class="table" style="width: 100%" cellspacing="0">
	    	<thead>
		    	<tr class="row datos" style="background: #D9D4D4;" >
		    		<th style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;height: 45px">Cantidad</th>
		    		<th style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;">Unidad</th>
		    		<th style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;">Código</th>
		    		<th style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;">Descripción</th>
		    		<th style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-align: right;">Precio Unitario</th>
		    		<th style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-align: right;">Importe</th>
		    		<th style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-align: right;">%Descto.</th>
		    		<th style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-align: right;">Descto.</th>
		    		<th style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-align: right;">Importe Total</th>
		    	</tr>
	    	</thead>
	    	<tbody style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 10px;text-transform: uppercase;">
	    		{{productos}}

	    		
	    	</tbody>

	    </table>
	  
	     <hr>
	    <hr >
	   <table style="width: 100%">
	   		<thead>
	   			<tr>
	   				<th>
	   					<strong style="color: #0362CE;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 12px;"><b>Importe Total en Letra: </b></strong><br> 
	   					<strong style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 12px;text-transform: uppercase;">
	   						<b>{{cantidadtotal}}</b><strong>
	   						<div class="vl"></div>
	   				</th>
	   				<th>
	   					<strong style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 12px;margin-right: 150px;margin-top: -15px;"><b>Subtotal: </b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 12px;"><b>$</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 12px;text-align: right;">{{total}}</b><br>
	   					<hr style="margin-left: -5px;width: 97%;" >
	   					<strong style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 12px;margin-right: 150px;margin-top: -15px;"><b>IVA 16%: </b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 12px;"><b>$</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 12px;text-align: left;">0.00</b><br>
	   					<hr style="margin-left: -5px;width: 97%;" >
	   					<strong style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 12px;margin-right: 150px;margin-top: -15px;"><b>Total: </b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 12px;"><b>$</b></strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b style="color: #000000;font-family: 'Varela Round', sans-serif;font-weight: lighter;font-size: 12px;text-align: right;">{{total}}</b><br>
	   					
	   				</th>
	   			</tr>
	   		</thead>
	   </table>
	   <hr>
	   <table style="width: 100%">
	   	<thead>
	   		<tr>
	   			<th>
	   					<b style="margin-left: 200px;">NO SE ACEPTAN DEVOLUCIONES</b>
	   			</th>
	   		</tr>
	   	</thead>
	   
	   </table>
	</body>
</html>